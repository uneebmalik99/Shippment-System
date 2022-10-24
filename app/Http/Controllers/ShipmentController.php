<?php

namespace App\Http\Controllers;

use App\Models\Consignee;
use App\Models\Loading_Image;
use App\Models\Location;
use App\Models\Notification;
use App\Models\Other_Document;
use App\Models\Shipment;
use App\Models\Shipment_Invice;
use App\Models\Stamp_Title;
use App\Models\Vehicle;
use App\Models\Country;
use App\Models\State;
use Carbon\Carbon;
use Carbon\CarbonPeriod;
use Illuminate\Http\Request;
use Storage;
use Yajra\Datatables\Datatables;

class ShipmentController extends Controller
{

    private $type = "Shipments";
    private $singular = "Shipment";
    private $plural = "Shipments";
    private $view = "shipment.";
    private $db_key = "id";
    private $user = [];
    private $perpage = 100;
    private $directory = "/shipment_images";
    private $action = "/admin/shipments";

    private function Notification()
    {
        $data['notification'] = Notification::with('user')->paginate($this->perpage);
        $data['location'] = Location::all()->toArray();
        // dd();
        if ($data['notification']->toArray()) {
            $current = Carbon::now();
            foreach ($data['notification'] as $key => $date_notification) {

                $date = $date_notification->created_at;
                $diff = $date->diffInSeconds(\Carbon\Carbon::now());
                $days = $diff / 86400;
                $hours = $diff / 3600;
                $minutes = $diff / 3600;
                $seconds = $diff % 60;

                if ($days > 1) {
                    $data['notification'][$key]['date'] = (int) $days . 'd,' . (int) $hours . 'h,' . (int) $minutes . 'm,' . $seconds . 's ';
                } elseif ($hours > 1) {
                    $data['notification'][$key]['date'] = (int) $hours . 'h,' . (int) $minutes . 'm,' . (int) $seconds . 's ';
                } elseif ($minutes > 1) {
                    $data['notification'][$key]['date'] = (int) $minutes . 'm,' . (int) $seconds . 's ';
                } else {
                    $data['notification'][$key]['date'] = (int) $seconds . 's ';
                }
            }
            $unread = Notification::with('user')->where('status', '0')->paginate($this->perpage);
            $data['notification_count'] = count($unread);
        } else {
            $data['notification'] = "asda";
        }
        // dd($data);
        return $data;
    }

    public function index()
    {
        $data = [];
        $data = [
            "page_title" => $this->plural . " List",
            "page_heading" => $this->plural . ' List',
            "breadcrumbs" => array('#' => $this->plural . " List"),
            "module" => [
                'type' => $this->type,
                'singular' => $this->singular,
                'plural' => $this->plural,
                'view' => $this->view,
                'db_key' => $this->db_key,
                'action' => $this->action,
                'page' => 'list',
            ],
        ];

        $notification = $this->Notification();
        $data['records'] = Shipment::with('consignee')->paginate($this->perpage);
        $data['booked'] = Shipment::with('consignee')->where('status', '1')->paginate($this->perpage);
        $data['shipped'] = Shipment::with('consignee')->where('status', '2')->paginate($this->perpage);
        $data['arrived'] = Shipment::with('consignee')->where('status', '3')->paginate($this->perpage);
        $data['completed'] = Shipment::with('consignee')->where('status', '4')->paginate($this->perpage);
        // dd($data);
        // years
        $current_date = Carbon::now();
        $period = CarbonPeriod::create('2022-09-09', $current_date);
        $period = CarbonPeriod::create('2022-09-09', $current_date);
        // dd($period->toArray());
        foreach ($period as $date) {
            // dd($date);
            $data['date'][] = $date->format('Y-m-d');
        }
        // dd($data['date']);
        return view($this->view . 'list', $data, $notification);
    }

    public function create(Request $request)
    {
        $action = url($this->action . '/create');
        $data = [
            "page_title" => $this->plural . " create",
            "page_heading" => $this->plural . ' create',
            "breadcrumbs" => array("dashboard" => "Dashboard", "#" => $this->plural . " create"),
            "action" => $action,
            "button_text" => "Create",
            "module" => [
                'type' => $this->type,
                'type' => $this->type,
                'singular' => $this->singular,
                'plural' => $this->plural,
                'view' => $this->view,
                'db_key' => $this->db_key,
                'action' => $this->action,
                'page' => 'create',
            ],
        ];

        $notification = $this->Notification();
        $data['vehicles'] = Vehicle::where('shipment_id', null)->get();
        $data['consignees'] = Consignee::all()->toArray();
        $data['records'] = Shipment::all()->toArray();
        $data['location'] = Location::all()->toArray();
        $data['countries'] = Country::where('status', '1')->get();
        $data['states'] = State::where('status', '1')->get();
        if ($request->ajax()) {
            $tab = $request->tab;
            $output = view('shipment.' . $tab, $data)->render();
            return Response($output);
        }
    }
    private function store($request)
    {

        // $request->request->remove('vehicle');
        $data = $request->all();
        $Obj = new Shipment;
        $Obj->create($data);
        $shipment = $Obj->latest()->first();

        $vehicle = Vehicle::find($id);

        $vehicle->shipment_id = $shipment->id;
        // dd($request->all());
        $vehicle->save();
        return redirect($this->action)->with('success', 'Vehicle added successfully.');
    }
    // public function attachmentsIndex()
    // {
    //     $action = url($this->action . '/attachments');
    //     $data = [
    //         "page_title" => $this->plural . " attachments",
    //         "page_heading" => $this->plural . ' attachments',
    //         "breadcrumbs" => array("dashboard" => "Dashboard", "#" => $this->plural . " attachments"),
    //         "action" => $action,
    //         "button_text" => "Upload Image",
    //         "module" => [
    //             'type' => $this->type,
    //             'type' => $this->type,
    //             'singular' => $this->singular,
    //             'plural' => $this->plural,
    //             'view' => $this->view,
    //             'db_key' => $this->db_key,
    //             'action' => $this->action,
    //             'page' => 'attachment',
    //         ],
    //     ];
    //     $notification = $this->Notification();
    //     return view('shipment.attachments', $notification, $data);
    // }
    public function create_form(Request $request)
    {
        // return $request->all();
        if ($request->ajax()) {
            $data = [];
            $data = $request->all();
            $vehicles = $request->vehicle;
            $tab = $request->tab;

            $loading_image = $request->file('loading_image');
            $shipment_inovice = $request->file('shipment_inovice');
            $stamp_title = $request->file('stamp_title');
            $other_document = $request->file('other_document');

            // dd($image);
            unset($data['vehicle']);
            unset($data['shipment_vehicle_table_length']);
            unset($data['loading_image']);
            unset($data['shipment_inovice']);
            unset($data['stamp_title']);
            unset($data['other_document']);
            unset($data['tab']);

            $Obj_vehicle = new Vehicle;
            $Obj = new Shipment;
            $data['status'] = "2";
            $Obj->create($data);

            $shipment = $Obj->where('container_no', $request->container_no)->get();
            $data['shipment_id'] = $shipment[0]['id'];
            foreach ($vehicles as $vehicle_id) {
                $get_vehicle = $Obj_vehicle->find($vehicle_id);
                $get_vehicle->shipment_id = $shipment[0]['id'];
                $get_vehicle->save();
            }
            $view = view('shipment.' . $tab, $data)->render();
            return Response($view);

            // if ($shipment_inovice) {

            //     foreach ($shipment_inovice as $shipment_images) {
            //         $image_name = time() . '.' . $shipment_images->extension();
            //         $filename = Storage::putFile($this->directory, $shipment_images);
            //         $shipment_images->move(public_path($this->directory), $filename);
            //         $Obj_shipment->name = $filename;
            //         $Obj_shipment->thumbnail = $image_name;
            //         $Obj_shipment->shipment_id = $shipment[0]['id'];
            //         $Obj_shipment->save();
            //     }
            // }

            // if ($stamp_title) {

            //     foreach ($stamp_title as $stamp_images) {
            //         $image_name = time() . '.' . $stamp_images->extension();
            //         $filename = Storage::putFile($this->directory, $stamp_images);
            //         $stamp_images->move(public_path($this->directory), $filename);
            //         $Obj_stamp->name = $filename;
            //         $Obj_stamp->thumbnail = $image_name;
            //         $Obj_stamp->shipment_id = $shipment[0]['id'];
            //         $Obj_stamp->save();
            //     }
            // }

            // if ($loading_image) {

            //     foreach ($loading_image as $load_images) {
            //         $image_name = time() . '.' . $load_images->extension();
            //         $filename = Storage::putFile($this->directory, $load_images);
            //         $load_images->move(public_path($this->directory), $filename);
            //         $Obj_loading->name = $filename;
            //         $Obj_loading->thumbnail = $image_name;
            //         $Obj_loading->shipment_id = $shipment[0]['id'];
            //         $Obj_loading->save();
            //     }
            // }

            // if ($other_document) {

            //     foreach ($other_document as $other_images) {
            //         $image_name = time() . '.' . $other_images->extension();
            //         $filename = Storage::putFile($this->directory, $other_images);
            //         $other_images->move(public_path($this->directory), $filename);
            //         $Obj_other->name = $filename;
            //         $Obj_other->thumbnail = $image_name;
            //         $Obj_other->shipment_id = $shipment[0]['id'];
            //         $Obj_other->save();
            //     }
            // }

            // if ($get_vehicle) {
            //     return "Success!";
            // } else {
            //     return "Failed!";
            // }
        }
    }

    public function create_images(Request $request)
    {
        // dd($request->shipment_id);
        $shipment_id = $request->shipment_id;
        $data = [];
        $shipment_inovice = $request->file('shipment_inovice');
        $stamp_title = $request->file('stamp_title');
        $loading_image = $request->file('loading_image');
        $other_document = $request->file('other_document');

        if ($shipment_inovice) {
            $Obj_shipment = new Shipment_Invice;
            foreach ($shipment_inovice as $shipment_images) {
                $image_name = time() . '.' . $shipment_images->extension();
                $filename = Storage::putFile($this->directory, $shipment_images);
                $shipment_images->move(public_path($this->directory), $filename);
                $data = [
                    'name' => $filename,
                    'thumbnail' => $image_name,
                    'shipment_id' => $shipment_id,
                ];
                $Obj_shipment->create($data);
            }
            // dd('adsasdssa');
        }

        if ($stamp_title) {
            $Obj_stamp = new Stamp_Title;
            foreach ($stamp_title as $stamp_images) {
                $image_name = time() . '.' . $stamp_images->extension();
                $filename = Storage::putFile($this->directory, $stamp_images);
                $stamp_images->move(public_path($this->directory), $filename);
                $data = [
                    'name' => $filename,
                    'thumbnail' => $image_name,
                    'shipment_id' => $shipment_id,
                ];
                $Obj_stamp->create($data);
            }
        }

        if ($loading_image) {
            $Obj_loading = new Loading_Image;
            foreach ($loading_image as $load_images) {
                $image_name = time() . '.' . $load_images->extension();
                $filename = Storage::putFile($this->directory, $load_images);
                $load_images->move(public_path($this->directory), $filename);
                $data = [
                    'name' => $filename,
                    'thumbnail' => $image_name,
                    'shipment_id' => $shipment_id,
                ];
                $Obj_loading->create($data);
            }
        }

        if ($other_document) {
            $Obj_other = new Other_Document;
            foreach ($other_document as $other_images) {
                $image_name = time() . '.' . $other_images->extension();
                $filename = Storage::putFile($this->directory, $other_images);
                $other_images->move(public_path($this->directory), $filename);
                $data = [
                    'name' => $filename,
                    'thumbnail' => $image_name,
                    'shipment_id' => $shipment_id,
                ];
                $Obj_other->create($data);
            }
        }
        return "Success";

    }

    public function profile(Request $request)
    {
        $data = [];
        $data = [
            "page_title" => $this->plural . " List",
            "page_heading" => $this->plural . ' List',
            "breadcrumbs" => array('#' => $this->plural . " List"),
            "module" => [
                'type' => $this->type,
                'singular' => $this->singular,
                'plural' => $this->plural,
                'view' => $this->view,
                'db_key' => $this->db_key,
                'action' => $this->action,
                'page' => 'list',
            ],
        ];
        $notification = $this->Notification();
        $data['shipments'] = Shipment::with('vehicle')->where('id', $request->id)->get();
        // dd($data['shipments']);
        if ($request->ajax()) {
            $tab = $request->tab;
            $output = view('layouts.shipment_detail.' . $tab, $data)->render();
            return Response($output);
        }
        return view($this->view . 'profile', $data, $notification);
    }

    public function filtering(Request $request)
    {
        if ($request->ajax()) {
            $data = [];
            $port_of_loading = $request->port_of_loading;
            $loading_date = $request->loading_date;
            $arrival_date = $request->arrival_date;
            $destination_port = $request->destination_port;
            $records = new Shipment;
            if ($port_of_loading) {
                if ($port_of_loading != "") {
                    $records = $records->where('loading_port', $port_of_loading);
                }
            }

            if ($loading_date) {
                if ($loading_date != "") {
                    $records = $records->orwhere('loading_date', $loading_date);
                }
            }

            if ($arrival_date) {
                if ($arrival_date != "") {
                    $records = $records->orwhere('est_arrival_date', $arrival_date);
                }
            }

            if ($destination_port) {
                if ($destination_port != "") {
                    $records = $records->orwhere('destination_port', $destination_port);
                }
            }
            $records = $records->get();

            if ($port_of_loading == "all" || $destination_port == "all") {
                $records = Shipment::all();
            }

            $data = [
                "page_title" => $this->plural . " List",
                "page_heading" => $this->plural . ' List',
                "breadcrumbs" => array('#' => $this->plural . " List"),
                "module" => [
                    'type' => $this->type,
                    'singular' => $this->singular,
                    'plural' => $this->plural,
                    'view' => $this->view,
                    'db_key' => $this->db_key,
                    'action' => $this->action,
                    'page' => 'list',
                ],
            ];
            $data['records'] = $records;
            $output = view('layouts.shipment_filter.filtering', $data)->render();
            return Response($output);
        }
    }

    public function delete($id)
    {

        $del = Shipment::find($id)->delete();
        if ($del) {
            return back()->with('success', 'Shipment Delete Successfully');
        } else {
            return back()->with('failed', 'Some Error Occurs');

        }
    }

    public function serverside(Request $request)
    {
        if ($request->ajax()) {
            $data = Shipment::select('*');
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('id', function($row){
                    $data['row'] = $row;
                    $data['vehicles'] = Vehicle::where('shipment_id', $row->id)->get();
                    $output = view('layouts.shipment_filter.vehicle_table', $data)->render();
                    return $output;
                })
                ->addColumn('shipment_id', function($row){
                    $totalVehicles = Vehicle::where('shipment_id', $row->id)->count();
                    $vehicles = '<p style="cursor:pointer"  data-toggle="modal" data-target="#exampleModalCenter'.$row->id.'">'.$totalVehicles.' Vehicles</p>';
                    return $vehicles;
                })
                ->addColumn('action', function ($row) {
                    $url_view = url('admin/shipments/profile/' . $row->id);
                    $url_delete = url('admin/shipments/delete/' . $row->id);
                    $url_edit = url('admin/shipments/edit/' . $row->id);

                    $btn = "<button class='profile-button'>
                                            <a href='$url_view'>
                                                <svg width='14' height='13' viewBox='0 0 16 14' fill='none'
                                                    xmlns='http://www.w3.org/2000/svg'>
                                                    <path
                                                        d='M16 7C16 7 13 2.1875 8 2.1875C3 2.1875 0 7 0 7C0 7 3 11.8125 8 11.8125C13 11.8125 16 7 16 7ZM1.173 7C1.65651 6.35698 2.21264 5.7581 2.833 5.21237C4.12 4.0845 5.88 3.0625 8 3.0625C10.12 3.0625 11.879 4.0845 13.168 5.21237C13.7884 5.7581 14.3445 6.35698 14.828 7C14.77 7.07613 14.706 7.16013 14.633 7.252C14.298 7.672 13.803 8.232 13.168 8.78763C11.879 9.9155 10.119 10.9375 8 10.9375C5.88 10.9375 4.121 9.9155 2.832 8.78763C2.21165 8.2419 1.65552 7.64301 1.172 7H1.173Z'
                                                        fill='#048B52' />
                                                    <path
                                                        d='M8 4.8125C7.33696 4.8125 6.70107 5.04297 6.23223 5.4532C5.76339 5.86344 5.5 6.41984 5.5 7C5.5 7.58016 5.76339 8.13656 6.23223 8.5468C6.70107 8.95703 7.33696 9.1875 8 9.1875C8.66304 9.1875 9.29893 8.95703 9.76777 8.5468C10.2366 8.13656 10.5 7.58016 10.5 7C10.5 6.41984 10.2366 5.86344 9.76777 5.4532C9.29893 5.04297 8.66304 4.8125 8 4.8125ZM4.5 7C4.5 6.18777 4.86875 5.40882 5.52513 4.83449C6.1815 4.26016 7.07174 3.9375 8 3.9375C8.92826 3.9375 9.8185 4.26016 10.4749 4.83449C11.1313 5.40882 11.5 6.18777 11.5 7C11.5 7.81223 11.1313 8.59118 10.4749 9.16551C9.8185 9.73984 8.92826 10.0625 8 10.0625C7.07174 10.0625 6.1815 9.73984 5.52513 9.16551C4.86875 8.59118 4.5 7.81223 4.5 7Z'
                                                        fill='#048B52' />
                                                </svg>
                                            </a>
                                        </button>
                                        <button class='edit-button'>
                                            <a href='$url_edit'>
                                                <svg width='14' height='13' viewBox='0 0 16 16' fill='none'
                                                    xmlns='http://www.w3.org/2000/svg'>
                                                    <path
                                                        d='M2.66708 14.0004C2.72022 14.0068 2.77394 14.0068 2.82708 14.0004L5.49375 13.3338C5.61205 13.3056 5.7204 13.2457 5.80708 13.1604L14.0004 4.94042C14.2488 4.69061 14.3881 4.35267 14.3881 4.00042C14.3881 3.64818 14.2488 3.31024 14.0004 3.06042L12.9471 2.00042C12.8233 1.87646 12.6762 1.77811 12.5143 1.71101C12.3525 1.64391 12.179 1.60938 12.0037 1.60938C11.8285 1.60938 11.655 1.64391 11.4932 1.71101C11.3313 1.77811 11.1842 1.87646 11.0604 2.00042L2.86708 10.1938C2.78094 10.2808 2.71891 10.3888 2.68708 10.5071L2.02042 13.1738C1.99645 13.26 1.99011 13.3502 2.00177 13.439C2.01342 13.5277 2.04284 13.6133 2.08826 13.6904C2.13368 13.7676 2.19417 13.8348 2.26613 13.888C2.33808 13.9413 2.42003 13.9795 2.50708 14.0004C2.56022 14.0068 2.61394 14.0068 2.66708 14.0004ZM12.0004 2.94042L13.0604 4.00042L12.0004 5.06042L10.9471 4.00042L12.0004 2.94042ZM3.94042 11.0071L10.0004 4.94042L11.0604 6.00042L4.99375 12.0671L3.58708 12.4138L3.94042 11.0071Z'
                                                        fill='#2C77E7' />
                                                </svg>
                                            </a>
                                        </button>
                                    
                                        ";
                    return $btn;
                })
                ->rawColumns(['id','action','shipment_id'])
                ->make(true);
        }

        return back();
    }

    public function filterShipmentt(Request $req)
    {
        if ($req->ajax()) {
            $data = [];
            $data['records'] = Shipment::where('status', $req->id)->get();
            $output = view('layouts.shipment_filter.filtering', $data)->render();
            return Response($output);
        }
    }

    public function search_shipment(Request $req){
        $search_text = $req->searchText;
        $data = [];
        if ($req->searchText) {
            $data['vehicles'] = Vehicle::where('vin', 'LIKE', '%' . $search_text . "%")->where('shipment_id', null)->get()->toArray();
                
                $output = view('layouts.shipment_filter.filterVehicles', $data)->render();
                return Response($output);
        }


    }
}
