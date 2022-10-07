<?php

namespace App\Http\Controllers;

use App\Exports\VehicleExport;
use App\Http\Controllers\Controller;
use App\Imports\VehicleImport;
use App\Models\AuctionCopy;
use App\Models\AuctionImage;
use App\Models\AuctionInvoice;
use App\Models\BillOfSale;
use App\Models\Image;
use App\Models\Location;
use App\Models\Notification;
use App\Models\OriginalTitle;
use App\Models\PickupImage;
use App\Models\Shipment;
use App\Models\User;
use App\Models\Vehicle;
use App\Models\VehicleStatus;
use App\Models\WarehouseImage;
use Carbon\Carbon;
use DataTables;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use Storage;
use DataTables;

class VehicleController extends Controller
{

    private $type = "Vehicles";
    private $singular = "vehicle";
    private $plural = "Vehicles";
    private $view = "vehicle.";
    private $db_key = "id";
    private $user = [];
    private $perpage = 100;
    private $directory = "/vehicle_images";
    private $action = "/admin/vehicles";

    public function Notification()
    {
        $data['notification'] = Notification::with('user')->get();
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
            $unread = Notification::with('user')->where('status', '0')->get();
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
        $data['records'] = Vehicle::with('user')->get()->toArray();
        $data['new_orders'] = Vehicle::where('status', '1')->get();
        $data['posted'] = Vehicle::where('status', '2')->get();
        $data['dispatched'] = Vehicle::where('status', '3')->get();
        $data['on_hand'] = Vehicle::where('status', '4')->get();
        $data['no_titles'] = Vehicle::where('status', '5')->get();
        $data['towing'] = Vehicle::where('status', '6')->get();
        $data['location'] = Location::all();
        $data['status'] = VehicleStatus::all();
        // dd($data['status']);
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
            "module" => ['type' => $this->type,
                'type' => $this->type,
                'singular' => $this->singular,
                'plural' => $this->plural,
                'view' => $this->view,
                'db_key' => $this->db_key,
                'action' => $this->action,
                'page' => 'create',
                'button' => 'Create',
            ],
        ];
        $data['buyers'] = User::where('role_id', '4')->get();
        $data['location'] = Location::all();
        $data['shipment'] = Shipment::all();
        if ($request->ajax()) {
            $tab = $request->tab;
            $output = view('layouts.vehicle_create.' . $tab, $data)->render();
            return Response($output);
        }

        if ($request->isMethod('post')) {
            $data = $request->all();
            $Obj = new Vehicle;
            $Obj->create($data);
            $vehicle = $Obj->latest()->first();
            return redirect($this->action)->with('success', 'Vehicle addedd successfully.');
        }

        $notification = $this->Notification();
        return view($this->view . 'create_edit', $data, $notification);
    }

    public function edit(Request $request, $id = null)
    {
        if ($request->isMethod('post')) {
            $data = $request->all();
            $Obj = Vehicle::find($id);
            $request->validate([
                'customer_name' => 'required',
                'vin' => 'required',
                'year' => 'required',
                'make' => 'required',
                'model' => 'required|numeric',
                'vehicle_type' => 'required',
                'color' => 'required',
                'weight' => 'required|numeric',
                'value' => 'required|numeric',
                'auction' => 'required',
                'buyer_id' => 'required',
                'key' => 'required',
                'note' => 'required',
                'hat_number' => 'required',
                'title_type' => 'required',
                'title' => 'required',
                'title_rec_date' => 'required|date',
                'title_state' => 'required',
                'title_number' => 'required',
                'shipper_name' => 'required',
                'status' => 'required',
                'sale_date' => 'required|date',
                'paid_date' => 'required|date',
                'days' => 'required|numeric',
                'posted_date' => 'required|date',
                'pickup_date' => 'required|date',
                'delivered' => 'required|date',
                'pickup_location' => 'required',
                'site' => 'required',
                'dealer_fee' => 'required|numeric',
                'late_fee' => 'required|numeric',
                'auction_storage' => 'required|numeric',
                'towing_charges' => 'required|numeric',
                'warehouse_storage' => 'required|numeric',
                'title_fee' => 'required|numeric',
                'port_detention_fee' => 'required|numeric',
                'custom_inspection' => 'required|numeric',
                'additional_fee' => 'required|numeric',
                'insurance' => 'required',
            ]);
            $Obj->update($data);
            return redirect($this->action)->with('success', 'Edited successfully.');
        }
        $action = url($this->action . '/edit/' . $id);
        $data = [];
        $data = [
            "page_title" => "Edit " . $this->singular,
            "page_heading" => "Edit " . $this->singular,
            "button_text" => "Update ",
            "breadcrumbs" => array("dashboard" => "Dashboard", "#" => $this->plural . " List"),
            'action' => $action,
            "module" => ['type' => $this->type,
                'type' => $this->type,
                'singular' => $this->singular,
                'plural' => $this->plural,
                'view' => $this->view,
                'db_key' => $this->db_key,
                'action' => $this->action,
                'page' => 'edit',
            ],
        ];
        $notification = $this->Notification();
        $data['buyers'] = User::where('role_id', '4')->get();
        $data['vehicle'] = Vehicle::with('user')->find($id)->toArray();
        return view($this->view . 'create_edit', $data, $notification);
    }

    public function delete($id = null)
    {
        $Vehicle = Vehicle::find($id);
        $Vehicle->delete();
        return redirect($this->action);
    }

    public function filtering(Request $request)
    {
        if ($request->ajax()) {
            // dd($request->all());
            $output = [];
            $table = "";
            $page = "";
            $total = Vehicle::all()->toArray();
            $records = Vehicle::with('user');
            $warehouse = $request->warehouse;
            $year = $request->year;
            $make = $request->make;
            $model = $request->model;
            $status = $request->status;
            $status_name = $request->status_name;

            if ($warehouse) {
                if ($warehouse != "") {
                    $records = $records->where('title_state', $warehouse);

                    // dd($records);
                    // return $records;
                }
            }

            if ($year) {
                if ($year != "") {
                    $records = $records->where('year', $year);
                    // return $records;
                }
            }

            if ($make) {
                if ($make != "") {
                    $records = $records->where('make', $make);
                    // return count($records);
                }
            }

            if ($model) {
                if ($model != "") {
                    $records = $records->where('model', $model);
                    // return count($records);
                }
            }

            if ($status) {
                if ($status != "") {
                    $records = $records->with('images')->where('status', $status)->paginate($this->perpage);
                    $data['records'] = $records;
                    $output['view'] = view('vehicle.' . $status_name, $data)->render();
                    return Response($output);

                    // return count($records);
                }
            }
            $output['records'] = $records->paginate($this->perpage);
            // return count($records);
            // if (count($records) > 0) {
            //     $i = 1;
            //     foreach ($records as $val) {
            //         // return $val;
            //         $url_edit = url($this->action . '/edit/' . $val->id);
            //         $url_delete = url($this->action . '/delete/' . $val->id);
            //         $table .= '<tr>' .
            //         '<td>' . $i . '</td>' .
            //         '<td>' .
            //         '<div class=' . '"d-flex align-items-center"' . '>' .
            //         '<div style=' . '"vertical-align: middle"' . '>' . '<img src=' .
            //         'http://localhost/Shippment-System/public/images/user.png' . ' alt="" ' . 'class=' .
            //         '"customer_image"' . '>' . '</div>' .
            //         '<div>' . $val->customer_name . '<br>' . '<span style=' .
            //         '"font-size: 12px!important;"' . '>' . @$val->user->email .
            //         '</span>' . '</div>' . '</div>' . '</td>' .
            //         '<td>' . @$val->vin . '</td>' .
            //         '<td>' . @$val->year . '</td>' .
            //         '<td>' . @$val->make . '</td>' .
            //         '<td>' . @$val->model . '</td>' .
            //         '<td>' . @$val->vehicle_type . '</td>' .
            //         '<td>' . @$val->value . '</td>' .
            //         '<td>' . @$val->status . '</td>' .
            //         '<td>' . @$val->user->name . '</td>' .
            //             '<td>' .
            //             '<button><a href=' . $url_edit . '><i class=' . '"ti-pencil"' . '></i></a></button>' . '<button><a href=' . $url_delete . '><i class=' . '"ti-trash"' . '></i></a></button>' .
            //             '</td>' .
            //             '</tr>';
            //         $i++;
            //     }
            //     // return $table;
            //     $page .= '<div>' . '<div class=' . '"d-flex justify-content-center"' . '>' . $records->links() . '</div>' . '<div>' . '<p>' . 'Displaying ' . count($records) . ' of ' . count($total) . ' vehicle(s)' . '</p>' . '</div>' . '</div>';
            //     $output = [
            //         'table' => $table,
            //         'pagination' => $page,
            //     ];
            //     return Response($output);
            // } else {
            //     $table = '<tr class=' . '"font-size"' . '>' .
            //         '<td colspan=' . '"11"' . 'class=' . '"h5 text-muted text-center"' . '>' . 'NO VEHICLES TO DISPLAY' . '</td>' . '</tr>';
            //     $output = [
            //         'table' => $table,
            //     ];
            // }
            return view('layouts.vehicle.FilterTable', $output)->render();
        }
    }

    public function create_form(Request $request)
    {
        $data = $request->all();
        $tab = $data['tab'];
        $image = $request->file('images');
        $billofsales = $request->file('billofsales');
        $originaltitle = $request->file('originaltitle');
        $pickup = $request->file('pickup');
        unset($data['tab']);
        // unset($data['images']);
        unset($data['billofsales']);
        unset($data['originaltitle']);
        unset($data['pickup']);
        $Obj = new Vehicle;
        $Obj_bill = new BillOfSale;
        $Obj_title = new OriginalTitle;
        $Obj_pikcup = new PickupImage;
        $new = $Obj->create($data);
        $Obj_vehicle = $Obj->where('vin', $data['vin'])->get();
        if ($new) {
            if ($billofsales) {
                foreach ($billofsales as $billofsale) {
                    $image_name = time() . '.' . $billofsale->extension();
                    $filename = Storage::putFile($this->directory, $billofsale);
                    $billofsale->move(public_path($this->directory), $filename);
                    $Obj_bill->vehicle_id = $Obj_vehicle[0]['id'];
                    $Obj_bill->name = $filename;
                    $Obj_bill->thumbnail = $image_name;
                    $Obj_bill->save();
                }
            }

            if ($originaltitle) {
                foreach ($originaltitle as $originaltitles) {
                    $image_name = time() . '.' . $originaltitles->extension();
                    $filename = Storage::putFile($this->directory, $originaltitles);
                    $originaltitles->move(public_path($this->directory), $filename);
                    $Obj_title->vehicle_id = $Obj_vehicle[0]['id'];
                    $Obj_title->name = $filename;
                    $Obj_title->thumbnail = $image_name;
                    $Obj_title->save();
                }
            }

            if ($pickup) {
                foreach ($pickup as $pickups) {
                    $image_name = time() . '.' . $pickups->extension();
                    $filename = Storage::putFile($this->directory, $pickups);
                    $pickups->move(public_path($this->directory), $filename);
                    $Obj_pikcup->vehicle_id = $Obj_vehicle[0]['id'];
                    $Obj_pikcup->name = $filename;
                    $Obj_pikcup->thumbnail = $image_name;
                    $Obj_pikcup->save();
                }
            }
        } else {
            return "Vehicle not created.";
        }

        switch ($tab) {
            case ('general'):
                $output['view'] = view('layouts.vehicle_create.attachments')->render();
                break;
        }
        return Response($output);
    }

    public function store_image(Request $request)
    {
        $data = $request->all();
        $tab = $data['tab'];
        unset($data['tab']);
        $images = $request->file('images');
        $documents = $request->file('name');
        // dd($documents);
        $Obj = new Vehicle;
        $Obj_vehicle = $Obj->where('vin', $request->vin)->get();
        $i = 0;
        if ($request->hasFile('images')) {
            foreach ($images as $image) {
                switch ($tab) {
                    case ('auction'):
                        $Obj_image = new AuctionImage;
                        $this->directory = "/auction_images";
                        break;
                    case ('warehouse'):
                        $Obj_image = new WarehouseImage;
                        $this->directory = "/warehouse_images";
                        break;
                    case ('billofsales'):
                        $Obj_image = new BillOfSale;
                        $this->directory = "/billofsales_images";
                        break;
                    case ('originalTitle'):
                        $Obj_image = new OriginalTitle;
                        $this->directory = "/OriginalTitle_images";
                        break;
                    case ('pickup'):
                        $Obj_image = new PickupImage;
                        $this->directory = "/pickup_images";
                        break;
                }
                $image_name = time() . '.' . $image->extension();
                $filename = Storage::putFile($this->directory, $image);
                $image->move(public_path($this->directory), $filename);
                $Obj_image->vehicle_id = $Obj_vehicle[0]['id'];
                $Obj_image->name = $filename;
                $Obj_image->thumbnail = $image_name;
                $Obj_image->save();
                $output['result'] = "Success" . $i;
                $i++;
            }
        }

        if ($request->hasFile('name')) {
            // dd($tab);
            switch ($tab) {
                case ('invoice'):
                    $Obj_file = new AuctionInvoice;
                    $this->directory = "/auction_invoices";

                    break;
                case ('auction_copy'):
                    $Obj_file = new AuctionCopy;
                    $this->directory = "/auction_copies";

                    break;
            }
            $filename = Storage::putFile($this->directory, $documents);
            $type = $documents->extension();
            $doc = $documents->move(public_path($this->directory), $filename);
            // dd($doc->getSize() / 1000);/
            $size = $doc->getSize() / 1000;
            // dd($size);
            $Obj_file->vehicle_id = $Obj_vehicle[0]['id'];
            $Obj_file->name = $filename;
            $Obj_file->type = $type;
            $Obj_file->size = $size . ' kb';
            $Obj_file->save();
   
            $output['result'] =  "Success";

        }
        return Response($output);
    }

    public function export()
    {
        return Excel::download(new VehicleExport, 'vehicles.xlsx');
    }

    public function import(Request $request)
    {
        if ($request->ajax()) {
            $output = view('layouts.vehicle.import_vehicles')->render();
            return Response($output);
        }
        Excel::import(new VehicleImport, request()->file('import_document'));
        return redirect()->route('vehicle.list')->with('success', "Vehicles imported successfully!");
    }

    public function profile($id)
    {
        $action = url($this->action . '/profile/');
        $data = [
            'vehicle' => Vehicle::with('images')->find($id)->toArray(),
            "page_title" => "Profile " . $this->singular,
            "page_heading" => "Profile " . $this->singular,
            "button_text" => "Update ",
            "breadcrumbs" => array("dashboard" => "Dashboard", "#" => $this->plural . " List"),
            'action' => $action,
            "module" => ['type' => $this->type,
                'type' => $this->type,
                'singular' => $this->singular,
                'plural' => $this->plural,
                'view' => $this->view,
                'db_key' => $this->db_key,
                'action' => $this->action,
                'page' => 'profile',
                'button' => 'Update',
            ],
        ];

        $notification = $this->Notification();
        return view($this->view . 'profile', $data, $notification);

    }

    public function profile_tab(Request $request)
    {

        $id = $request->id;
        $tab = $request->tab;

        $data = [];

        $data['vehicle'] = Vehicle::with('images')->find($id)->toArray();

        $output = view('layouts.vehicle_information.' . $tab, $data)->render();

        return Response($output);

    }
    public function changesImages(Request $request)
    {

        $data = [];
        $output = [];
        $id = $request->id;
        // return $id;

        if ($request->tab == 'auction_images') {
            $data['images'] = AuctionImage::where('vehicle_id', $request->id)->get()->toArray();
            $url = url('public/auction_images');
        } else if ($request->tab == 'warehouse_images') {
            $data['images'] = WarehouseImage::where('vehicle_id', $request->id)->get()->toArray();
            $url = url('public/warehouse_images');
        } else {
            $data['images'] = Image::where('vehicle_id', $request->id)->get()->toArray();
            $url = url('public/vehicle_images');
        }

        foreach ($data['images'] as $img) {
            $output[] = '<div class="img">
         <img src=' . $url . '/' . $img['name'] . ' alt=" " style="width: 60px; height: 55px; ">
        </div>';
        }

        return Response($output);
    }

    public function serverside(Request $request)
    {

        
        if ($request->ajax()) {
            $data = Vehicle::select('*');
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $url_view = url('admin/vehicle/profile/' . $row->id);
                    $url_delete = url('admin/vehicles/delete/' . $row->id);
                    $url_edit = url('admin/vehicles/edit/' . $row->id);


                    $btn = "<button class='profile-button'><a href=$url_view>
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
                                        <a href=$url_edit>
                                            <svg width='14' height='13' viewBox='0 0 16 16' fill='none'
                                                xmlns='http://www.w3.org/2000/svg'>
                                                <path
                                                    d='M2.66708 14.0004C2.72022 14.0068 2.77394 14.0068 2.82708 14.0004L5.49375 13.3338C5.61205 13.3056 5.7204 13.2457 5.80708 13.1604L14.0004 4.94042C14.2488 4.69061 14.3881 4.35267 14.3881 4.00042C14.3881 3.64818 14.2488 3.31024 14.0004 3.06042L12.9471 2.00042C12.8233 1.87646 12.6762 1.77811 12.5143 1.71101C12.3525 1.64391 12.179 1.60938 12.0037 1.60938C11.8285 1.60938 11.655 1.64391 11.4932 1.71101C11.3313 1.77811 11.1842 1.87646 11.0604 2.00042L2.86708 10.1938C2.78094 10.2808 2.71891 10.3888 2.68708 10.5071L2.02042 13.1738C1.99645 13.26 1.99011 13.3502 2.00177 13.439C2.01342 13.5277 2.04284 13.6133 2.08826 13.6904C2.13368 13.7676 2.19417 13.8348 2.26613 13.888C2.33808 13.9413 2.42003 13.9795 2.50708 14.0004C2.56022 14.0068 2.61394 14.0068 2.66708 14.0004ZM12.0004 2.94042L13.0604 4.00042L12.0004 5.06042L10.9471 4.00042L12.0004 2.94042ZM3.94042 11.0071L10.0004 4.94042L11.0604 6.00042L4.99375 12.0671L3.58708 12.4138L3.94042 11.0071Z'
                                                    fill='#2C77E7'/>
                                            </svg>
                                        </a>
                                    </button>
                       <button class='delete-button'>
                       <a href=$url_delete)>
                           <svg width='14' height='13' viewBox='0 0 12 12' fill='none'
                               xmlns='http://www.w3.org/2000/svg'>
                               <path
                                   d='M5 3H7C7 2.73478 6.89464 2.48043 6.70711 2.29289C6.51957 2.10536 6.26522 2 6 2C5.73478 2 5.48043 2.10536 5.29289 2.29289C5.10536 2.48043 5 2.73478 5 3V3ZM4 3C4 2.46957 4.21071 1.96086 4.58579 1.58579C4.96086 1.21071 5.46957 1 6 1C6.53043 1 7.03914 1.21071 7.41421 1.58579C7.78929 1.96086 8 2.46957 8 3H10.5C10.6326 3 10.7598 3.05268 10.8536 3.14645C10.9473 3.24021 11 3.36739 11 3.5C11 3.63261 10.9473 3.75979 10.8536 3.85355C10.7598 3.94732 10.6326 4 10.5 4H10.059L9.616 9.17C9.57341 9.66923 9.34499 10.1343 8.97593 10.4732C8.60686 10.8121 8.12405 11.0001 7.623 11H4.377C3.87595 11.0001 3.39314 10.8121 3.02407 10.4732C2.65501 10.1343 2.42659 9.66923 2.384 9.17L1.941 4H1.5C1.36739 4 1.24021 3.94732 1.14645 3.85355C1.05268 3.75979 1 3.63261 1 3.5C1 3.36739 1.05268 3.24021 1.14645 3.14645C1.24021 3.05268 1.36739 3 1.5 3H4ZM7.5 6C7.5 5.86739 7.44732 5.74021 7.35355 5.64645C7.25979 5.55268 7.13261 5.5 7 5.5C6.86739 5.5 6.74021 5.55268 6.64645 5.64645C6.55268 5.74021 6.5 5.86739 6.5 6V8C6.5 8.13261 6.55268 8.25979 6.64645 8.35355C6.74021 8.44732 6.86739 8.5 7 8.5C7.13261 8.5 7.25979 8.44732 7.35355 8.35355C7.44732 8.25979 7.5 8.13261 7.5 8V6ZM5 5.5C5.13261 5.5 5.25979 5.55268 5.35355 5.64645C5.44732 5.74021 5.5 5.86739 5.5 6V8C5.5 8.13261 5.44732 8.25979 5.35355 8.35355C5.25979 8.44732 5.13261 8.5 5 8.5C4.86739 8.5 4.74021 8.44732 4.64645 8.35355C4.55268 8.25979 4.5 8.13261 4.5 8V6C4.5 5.86739 4.55268 5.74021 4.64645 5.64645C4.74021 5.55268 4.86739 5.5 5 5.5V5.5ZM3.38 9.085C3.4013 9.3347 3.51558 9.5673 3.70022 9.73676C3.88486 9.90621 4.12639 10.0002 4.377 10H7.623C7.87344 9.9999 8.11472 9.90584 8.29915 9.73642C8.48357 9.56699 8.59771 9.33453 8.619 9.085L9.055 4H2.945L3.381 9.085H3.38Z'
                                   fill='#EF5757' />
                           </svg>

                       </a>
                   </button>
                     ";
                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return back();
    }
}
