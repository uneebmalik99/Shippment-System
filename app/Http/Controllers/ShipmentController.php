<?php

namespace App\Http\Controllers;

use App\Models\Consignee;
use App\Models\Notification;
use App\Models\Shipment;
use App\Models\Vehicle;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ShipmentController extends Controller
{

    private $type = "shipments";
    private $singular = "shipment";
    private $plural = "shipments";
    private $view = "shipment.";
    private $db_key = "id";
    private $user = [];
    private $perpage = 100;
    private $directory = "/shipment_images";
    private $action = "/admin/shipments";

    public function Notification()
    {
        $data['notification'] = Notification::with('user')->paginate($this->perpage);
        $current = Carbon::now();
        $date = $data['notification'][0]['created_at'];

        $diff = $date->diffInSeconds(\Carbon\Carbon::now());
        $days = $diff / 86400;
        $hours = $diff / 3600;
        $minutes = $diff / 60;
        $seconds = $diff % 60;

        if ($days > 1) {
            $data['date'] = (int) $days . 'd,' . (int) $hours . 'h,' . $minutes . 'm,' . $seconds . 's ';
        } elseif ($hours > 1) {
            $data['date'] = (int) $hours . 'h,' . (int) $minutes . 'm,' . $seconds . 's ';
        } elseif ($minutes > 1) {
            $data['date'] = (int) $minutes . 'm,' . $seconds . 's ';
        } else {
            $data['date'] = $seconds . 's ';
        }
        $unread = Notification::with('user')->where('status', '0')->paginate($this->perpage);
        $data['notification_count'] = count($unread);
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
            ],
        ];

        if ($request->isMethod('post')) {
            $id = $request->vehicle;
            $request->request->remove('vehicle');
            // dd($request->all());
            $data = $request->all();
            $Obj = new Shipment;
            $Obj->create($data);
            $shipment = $Obj->latest()->first();
            $vehicle = Vehicle::find($id);
            $vehicle->shipment_id = $shipment['id'];
            // dd($request->all());
            $vehicle->save();
            return redirect($this->action)->with('success', 'Vehicle addedd successfully.');
        }
        $notification = $this->Notification();
        $data['vehicles'] = Vehicle::all()->toArray();
        $data['consignees'] = Consignee::all()->toArray();
        $data['records'] = Shipment::all()->toArray();
        return view($this->view . 'create_edit', $data, $notification);
    }

}
