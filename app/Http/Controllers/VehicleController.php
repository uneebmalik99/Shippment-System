<?php

namespace App\Http\Controllers;

use App\Exports\VehicleExport;
use App\Imports\VehicleImport;
use App\Http\Controllers\Controller;
use App\Models\AuctionCopy;
use App\Models\AuctionImage;
use App\Models\AuctionInvoice;
use App\Models\Image;
use App\Models\Location;
use App\Models\Notification;
use App\Models\Shipment;
use App\Models\User;
use App\Models\Vehicle;
use App\Models\VehicleStatus;
use App\Models\WarehouseImage;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use Storage;

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

            // $request->validate([
            //     'customer_name' => 'required',
            //     'vin' => 'required',
            //     'year' => 'required',
            //     'make' => 'required',
            //     'model' => 'required|numeric',
            //     'vehicle_type' => 'required',
            //     'color' => 'required',
            //     'weight' => 'required|numeric',
            //     'value' => 'required|numeric',
            //     'auction' => 'required',
            //     'buyer_id' => 'required',
            //     'key' => 'required',
            //     'note' => 'required',
            //     'hat_number' => 'required',
            //     'title_type' => 'required',
            //     'title' => 'required',
            //     'title_rec_date' => 'required|date',
            //     'title_state' => 'required',
            //     'title_number' => 'required',
            //     'shipper_name' => 'required',
            //     'status' => 'required',
            //     'sale_date' => 'required|date',
            //     'paid_date' => 'required|date',
            //     'days' => 'required|numeric',
            //     'posted_date' => 'required|date',
            //     'pickup_date' => 'required|date',
            //     'delivered' => 'required|date',
            //     'pickup_location' => 'required',
            //     'site' => 'required',
            //     'dealer_fee' => 'required|numeric',
            //     'late_fee' => 'required|numeric',
            //     'auction_storage' => 'required|numeric',
            //     'towing_charges' => 'required|numeric',
            //     'warehouse_storage' => 'required|numeric',
            //     'title_fee' => 'required|numeric',
            //     'port_detention_fee' => 'required|numeric',
            //     'custom_inspection' => 'required|numeric',
            //     'additional_fee' => 'required|numeric',
            //     'insurance' => 'required',
            //     'image' => 'required',
            //     'image.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            // ]);

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
        $data['buyers'] = User::where('role_id', '4')->toArray();
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
            $records = $records->paginate($this->perpage);
            // return count($records);
            if (count($records) > 0) {
                $i = 1;
                foreach ($records as $val) {
                    // return $val;
                    $url_edit = url($this->action . '/edit/' . $val->id);
                    $url_delete = url($this->action . '/delete/' . $val->id);
                    $table .= '<tr>' .
                    '<td>' . $i . '</td>' .
                    '<td>' .
                    '<div class=' . '"d-flex align-items-center"' . '>' .
                    '<div style=' . '"vertical-align: middle"' . '>' . '<img src=' .
                    'http://localhost/Shippment-System/public/images/user.png' . ' alt="" ' . 'class=' .
                    '"customer_image"' . '>' . '</div>' .
                    '<div>' . @$val->customer_name . '<br>' . '<span style=' .
                    '"font-size: 12px!important;"' . '>' . @$val->user->email .
                    '</span>' . '</div>' . '</div>' . '</td>' .
                    '<td>' . @$val->vin . '</td>' .
                    '<td>' . @$val->year . '</td>' .
                    '<td>' . @$val->make . '</td>' .
                    '<td>' . @$val->model . '</td>' .
                    '<td>' . @$val->vehicle_type . '</td>' .
                    '<td>' . @$val->value . '</td>' .
                    '<td>' . @$val->status . '</td>' .
                    '<td>' . @$val->user->name . '</td>' .
                        '<td>' .
                        '<button><a href=' . $url_edit . '><i class=' . '"ti-pencil"' . '></i></a></button>' . '<button><a href=' . $url_delete . '><i class=' . '"ti-trash"' . '></i></a></button>' .
                        '</td>' .
                        '</tr>';
                    $i++;
                }
                // return $table;
                $page .= '<div>' . '<div class=' . '"d-flex justify-content-center"' . '>' . $records->links() . '</div>' . '<div>' . '<p>' . 'Displaying ' . count($records) . ' of ' . count($total) . ' vehicle(s)' . '</p>' . '</div>' . '</div>';
                $output = [
                    'table' => $table,
                    'pagination' => $page,
                ];
                return Response($output);
            } else {
                $table = '<tr class=' . '"font-size"' . '>' .
                    '<td colspan=' . '"11"' . 'class=' . '"h5 text-muted text-center"' . '>' . 'NO VEHICLES TO DISPLAY' . '</td>' . '</tr>';
                $output = [
                    'table' => $table,
                ];
                return Response($output);
            }
        }
    }

    public function create_form(Request $request)
    {
        $data = $request->all();
        $tab = $data['tab'];
        $image = $request->file('images');
        unset($data['tab']);
        unset($data['images']);
        $Obj = new Vehicle;
        $new = $Obj->create($data);
        if ($new) {
            if ($image) {
                $i = 0;
                foreach ($image as $images) {
                    $image_name = time() . '.' . $images->extension();
                    $filename = Storage::putFile($this->directory, $images);
                    $images->move(public_path($this->directory), $filename);
                    $Obj_image = new Image;
                    $Obj_vehicle = $Obj->where('vin', $data['vin'])->get();
                    // return Response($Obj_vehicle[0]['id']);
                    $Obj_image->vehicle_id = $Obj_vehicle[0]['id'];
                    $Obj_image->name = $filename;
                    $Obj_image->thumbnail = $image_name;
                    $Obj_image->save();
                    $output['result'] = "Success" . $i;
                    $i++;
                }
            } else {
                $output['result'] = "failed.";
            }
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
                // return $image_name;
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
            $documents->move(public_path($this->directory), $filename);
            $size = $documents->getSize() / 1000;
            $Obj_file->vehicle_id = $Obj_vehicle[0]['id'];
            $Obj_file->name = $filename;
            $Obj_file->type = $documents->extension();
            $Obj_file->size = $size . ' kb';
            $Obj_file->save();
            $output['result'] = "Success";

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
}
