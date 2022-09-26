<?php

namespace App\Http\Controllers;

use App\Models\Consignee;
use App\Models\Notification;
use App\Models\Shipment;
use App\Models\Vehicle;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Storage;

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
        // dd($data['vehicles']);
        $data['consignees'] = Consignee::all()->toArray();
        $data['records'] = Shipment::all()->toArray();

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
        if ($request->ajax()) {
            $data = $request->all();
            $vehicles = $request->vehicle;
            $image = $request->file('images');
            unset($data['vehicle']);
            unset($data['shipment_vehicle_table_length']);
            $Obj_vehicle = new Vehicle;
            $Obj = new Shipment;
            if ($image) {
                foreach ($image as $images) {
                    $image_name = time() . '.' . $images->extension();
                    $filename = Storage::putFile($this->directory, $images);
                    $images->move(public_path($this->directory), $filename);
                    $data['images'] = $image_name;
                }
            }
            // dd($data);
            $data['status'] = "2";
            $Obj->create($data);

            // $Obj_vehicle = new Vehicle;
            foreach ($vehicles as $vehicle_id) {
                $shipment = $Obj->where('container_number', $request->container_number)->get();
                $get_vehicle = $Obj_vehicle->find($vehicle_id);
                $get_vehicle->shipment_id = $shipment[0]['id'];
                $get_vehicle->save();
            }
            if ($get_vehicle) {
                return "Success!";
            } else {
                return "Failed!";
            }
        }
    }
}
