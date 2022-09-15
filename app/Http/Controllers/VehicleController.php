<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\Image;
use App\Models\Location;
use App\Models\Notification;
use App\Models\Vehicle;
use Carbon\Carbon;
use Illuminate\Http\Request;
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
        $data['notification'] = Notification::with('customer')->paginate($this->perpage);
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
            $unread = Notification::with('customer')->where('status', '0')->paginate($this->perpage);
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
        $data['records'] = Vehicle::with('customer')->paginate($this->perpage);
        $data['new_orders'] = Vehicle::where('status', '0')->get();
        $data['posted'] = Vehicle::where('status', '1')->get();
        $data['dispatched'] = Vehicle::where('status', '2')->get();
        $data['on_hand'] = Vehicle::where('status', '3')->get();
        $data['no_titles'] = Vehicle::where('status', '4')->get();
        $data['towing'] = Vehicle::where('status', '5')->get();
        $data['location'] = Location::all();
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
        $data['buyers'] = Customer::all()->toArray();
        $data['location'] = Location::all();
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
        $data['buyers'] = Customer::all()->toArray();
        $data['vehicle'] = Vehicle::with('customer')->find($id)->toArray();
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
            $output = [];
            $table = "";
            $page = "";
            $total = Vehicle::all()->toArray();
            $records = Vehicle::with('customer');
            $search = $request->search;
            $pagination = $request->pagination;
            $warehouse = $request->warehouse;
            $output['check'] = $request->check;
            if ($search) {
                if ($search == "") {
                    // return "search empty";
                    $records = $records->paginate($this->perpage);
                }

                if ($search != "") {
                    // return "search not empty";
                    $records = $records->where('customer_name', 'LIKE', '%' . $search . "%")
                        ->orWhere('vin', 'LIKE', '%' . $search . "%")
                        ->orWhere('year', 'LIKE', '%' . $search . "%")
                        ->orWhere('make', 'LIKE', '%' . $search . "%")
                        ->orWhere('model', 'LIKE', '%' . $search . "%")
                        ->orWhere('vehicle_type', 'LIKE', '%' . $search . "%")
                        ->orWhere('value', 'LIKE', '%' . $search . "%")
                        ->orWhere('status', 'LIKE', '%' . $search . "%");
                }
            }

            if ($warehouse != "") {
                $records = $records->where('title_state', $warehouse)->paginate($this->perpage);
                // return count($records);
            }

            if ($pagination && $search != "") {
                $this->perpage = $pagination;
                $records = $records->paginate($this->perpage);
            }

            if (count($records) > 0) {
                $i = 1;
                foreach ($records as $val) {
                    $url_edit = url($this->action . '/edit/' . $val->id);
                    $url_delete = url($this->action . '/delete/' . $val->id);
                    $table .= '<tr>' .
                    '<td>' . $i . '</td>' .
                    '<td>' . $val->customer_name . '</td>' .
                    '<td>' . $val->vin . '</td>' .
                    '<td>' . $val->year . '</td>' .
                    '<td>' . $val->make . '</td>' .
                    '<td>' . $val->model . '</td>' .
                    '<td>' . $val->vehicle_type . '</td>' .
                    '<td>' . $val->value . '</td>' .
                    '<td>' . $val->status . '</td>' .
                    '<td>' . $val->customer->customer_name . '</td>' .
                        '<td>' .
                        '<button><a href=' . $url_edit . '><i class=' . '"ti-pencil"' . '></i></a></button>' . '<button><a href=' . $url_delete . '><i class=' . '"ti-trash"' . '></i></a></button>' .
                        '</td>' .
                        '</tr>';
                    $i++;
                }
                $page .= '<div>' . '<div class=' . '"d-flex justify-content-center"' . '>' . $records->links() . '</div>' . '<div>' . '<p>' . 'Displaying ' . $records->count() . ' of ' . count($total) . ' vehicle(s)' . '</p>' . '</div>' . '</div>';
                $output = [
                    'table' => $table,
                    'pagination' => $page,
                ];
                return Response($output);
            } else {
                $table = '<tr class=' . '"font-size"' . '>' .
                    '<td colspan=' . '"11"' . 'class=' . '"h5 text-muted text-center"' . '>' . 'NO VEHICL TO DISPLAY' . '</td>' . '</tr>';
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
        // return $data;
        $image = $request->file('images');
        unset($data['images']);
        $Obj = new Vehicle;
        $new = $Obj->create($data);
        if ($new) {
            if ($image) {
                $i = 0;
                foreach ($image as $images) {
                    $image_name = time() . '.' . $images->extension();
                    $filename = Storage::putFile($this->directory, $images);
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
        // return Response($output);
        $tab = $data['tab'];
        unset($data['tab']);
        switch ($tab) {
            case ('general'):
                $output['view'] = view('layouts.vehicle_create.attachments')->render();
                break;
        }
        return Response($output);

    }
}
