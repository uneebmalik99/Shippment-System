<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\Vehicle;
use Illuminate\Http\Request;

class VehicleController extends Controller
{

    private $type = "vehicles";
    private $singular = "vehicle";
    private $plural = "vehicles";
    private $view = "vehicle.";
    private $db_key = "id";
    private $user = [];
    private $perpage = 100;
    private $directory = "vehicle_images";
    private $action = "/admin/vehicles";

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

        $data['records'] = Vehicle::with('customer')->paginate($this->perpage);
        return view($this->view . 'list', $data);

    }

    public function create(Request $request)
    {
        if ($request->isMethod('post')) {
            $data = $request->all();
            $Obj = new Vehicle;
            $Obj->create($data);
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
            return redirect($this->action)->with('success', 'Vehicle addedd successfully.');
        }
        $data = [];
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
            ],
        ];
        $data['buyers'] = Customer::all()->toArray();

        return view($this->view . 'create_edit', $data);
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
        $data['buyers'] = Customer::all()->toArray();
        $data['vehicle'] = Vehicle::with('customer')->find($id)->toArray();
        return view($this->view . 'create_edit', $data);
    }

    public function delete($id = null)
    {
        $Vehicle = Vehicle::find($id);
        $Vehicle->delete();
        return redirect($this->action);
    }

    public function search(Request $request)
    {
        if ($request->ajax()) {
            $table = "";
            $page = "";
            $total = Vehicle::all()->toArray();
            $records = Vehicle::with('customer');
            $check = $request->check;
            $location = $request->location;
            if ($request->search != "") {
                $records = $records->where('customer_name', 'LIKE', '%' . $request->search . "%")
                    ->orWhere('vin', 'LIKE', '%' . $request->search . "%")
                    ->orWhere('year', 'LIKE', '%' . $request->search . "%")
                    ->orWhere('make', 'LIKE', '%' . $request->search . "%")
                    ->orWhere('model', 'LIKE', '%' . $request->search . "%")
                    ->orWhere('vehicle_type', 'LIKE', '%' . $request->search . "%")
                    ->orWhere('value', 'LIKE', '%' . $request->search . "%");
            }

            if ($check == 'all_vehicles') {
                $records = $records;
            } elseif ($check == "new_order") {
                $records = $records;
            } elseif ($check == "posted") {
                $records = $records;
            } elseif ($check == "dispatch") {
                $records = $records;
            } elseif ($check == "on_hand") {
                $records = $records;
            } elseif ($check == "titles") {
                $records = $records;
            } else {
                $records = $records;
            }

            if ($location == "NJ") 
            {
                $records = $records->where('title_state', $location);
            } 
            elseif ($location == "SAV") 
            {
                $records = $records->where('title_state', $location);
            } 
            elseif ($location == "TX") 
            {
                $records = $records->where('title_state', $location);
            } 
            elseif ($location == "LA") 
            {
                $records = $records->where('title_state', $location);
            } 
            elseif ($location == "SEA") 
            {
                $records = $records->where('title_state', $location);
            } 
            elseif ($location == "BAL") 
            {
                $records = $records->where('title_state', $location);
            } 
            elseif ($location == "NFK") 
            {
                $records = $records->where('title_state', $location);
            } 
            else 
            {
                $records = $records;
            }

            if ($request->pagination) {
                $this->perpage = $request->pagination;
                $records = $records->paginate($this->perpage);
            }

            if ($records) {
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
                    '<td>' . $val->customer->customer_name . '</td>' .
                        '<td>' .
                        '<button><a href=' . $url_edit . '><i class=' . '"ti-pencil"' . '></i></a></button>' . '<button><a href=' . $url_delete . '><i class=' . '"ti-trash"' . '></i></a></button>' .
                        '</td>' .
                        '</tr>';
                    $i++;
                }
                $page .= '<p>' . 'Displaying ' . $records->count() . ' of ' . count($total) . ' vehicle(s)' . '</p>';
                $output = [
                    'table' => $table,
                    'pagination' => $page,
                ];
                return Response($output);
            }
        }

    }

}
