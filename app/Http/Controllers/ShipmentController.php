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
use Carbon\Carbon;
use Carbon\CarbonPeriod;
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

            $data = $request->all();
            $vehicles = $request->vehicle;

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

            $Obj_vehicle = new Vehicle;
            $Obj_shipment = new Shipment_Invice;
            $Obj_stamp = new Stamp_Title;
            $Obj_loading = new Loading_Image;
            $Obj_other = new Other_Document;
            $Obj = new Shipment;
            $data['status'] = "2";
            $Obj->create($data);

            $shipment = $Obj->where('container_no', $request->container_no)->get();

            if ($shipment_inovice) {

                foreach ($shipment_inovice as $shipment_images) {
                    $image_name = time() . '.' . $shipment_images->extension();
                    $filename = Storage::putFile($this->directory, $shipment_images);
                    $shipment_images->move(public_path($this->directory), $filename);
                    $Obj_shipment->name = $filename;
                    $Obj_shipment->thumbnail = $image_name;
                    $Obj_shipment->shipment_id = $shipment[0]['id'];
                    $Obj_shipment->save();
                }
            }

            if ($stamp_title) {

                foreach ($stamp_title as $stamp_images) {
                    $image_name = time() . '.' . $stamp_images->extension();
                    $filename = Storage::putFile($this->directory, $stamp_images);
                    $stamp_images->move(public_path($this->directory), $filename);
                    $Obj_stamp->name = $filename;
                    $Obj_stamp->thumbnail = $image_name;
                    $Obj_stamp->shipment_id = $shipment[0]['id'];
                    $Obj_stamp->save();
                }
            }

            if ($loading_image) {

                foreach ($loading_image as $load_images) {
                    $image_name = time() . '.' . $load_images->extension();
                    $filename = Storage::putFile($this->directory, $load_images);
                    $load_images->move(public_path($this->directory), $filename);
                    $Obj_loading->name = $filename;
                    $Obj_loading->thumbnail = $image_name;
                    $Obj_loading->shipment_id = $shipment[0]['id'];
                    $Obj_loading->save();
                }
            }

            if ($other_document) {

                foreach ($other_document as $other_images) {
                    $image_name = time() . '.' . $other_images->extension();
                    $filename = Storage::putFile($this->directory, $other_images);
                    $other_images->move(public_path($this->directory), $filename);
                    $Obj_other->name = $filename;
                    $Obj_other->thumbnail = $image_name;
                    $Obj_other->shipment_id = $shipment[0]['id'];
                    $Obj_other->save();
                }
            }

            foreach ($vehicles as $vehicle_id) {
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

    // public function profile(Request $request)
    // {
    //     $data = [];
    //     $data = [
    //         "page_title" => $this->plural . " List",
    //         "page_heading" => $this->plural . ' List',
    //         "breadcrumbs" => array('#' => $this->plural . " List"),
    //         "module" => [
    //             'type' => $this->type,
    //             'singular' => $this->singular,
    //             'plural' => $this->plural,
    //             'view' => $this->view,
    //             'db_key' => $this->db_key,
    //             'action' => $this->action,
    //             'page' => 'list',
    //         ],
    //     ];
    //     $notification = $this->Notification();
    //     if ($request->ajax()) {
    //         $tab = $request->tab;
    //         $output = view('layouts.shipment_detail.' . $tab, $data)->render();
    //         return Response($output);
    //     }
    //     return view($this->view . 'profile', $data, $notification);
    // }

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
}
