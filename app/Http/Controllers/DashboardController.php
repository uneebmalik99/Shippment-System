<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Notification;
use App\Models\User;
use App\Models\Location;
use App\Models\Vehicle;
use App\Models\Shipment;
use App\Models\Customer;
use Carbon\Carbon;


class DashboardController extends Controller
{
    private $type = "Dashboard";
    private $singular = "dashboard";
    private $plural = "dashboard";
    private $view = "dashboard.";
    private $db_key = "id";
    private $perpage = 100;
    private $user = [];
    private $directory = "user_images";
    private $action = "/admin/dashboard";


    public function Notification()
    {
    
        $data['notification'] = Notification::with('user')->paginate($this->perpage);
        $data['location'] = Location::all()->toArray();
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


    public function dashboard(){
        $data = [];
        $data = [
            // "page_title" => $this->plural . " List",
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
                'action' => $this->action,
            ],
        ];
        $data['shipments'] = Shipment::all();

        $data['TotalCustomers'] = User::where('role_id', 4)->count();
        $data['ActiveCustomers'] = User::where('role_id', 4)->where('status', '1')->count();
        $data['InActiveCustomers'] = User::where('role_id', 4)->where('status', '0')->count();


        
        
    // ===========================  vehicle status ================

        $data['TotalVehicles'] = Vehicle::all()->count();


        $data['NewOrders'] = Vehicle::where('status', 1)->count();
        $data['Dispatched'] = Vehicle::where('status', 2)->count();
        $data['onHand'] = Vehicle::where('status', 3)->count();
        $data['noTitle'] = Vehicle::where('status', 4)->count();
    

        $all_vehicles = Vehicle::all();
        $allVehicles_value = Vehicle::get()->sum('value');
        $data['all_vehicles'] = $all_vehicles;
        $data['allVehicles_value'] = $allVehicles_value;



        $onhand = Vehicle::where('status', '1');
        $onhand_count = $onhand->count();
        $onhand_value = $onhand->sum('value');
        $data['onhand_count'] = $onhand_count;
        $data['onhand_value'] = $onhand_value;

        $dispatch =  Vehicle::where('status', '2');
        $dispatch_count = $dispatch->count();
        $dispatch_value = $dispatch->sum('value'); 
        $data['dispatch_count'] = $dispatch_count;
        $data['dispatch_value'] = $dispatch_value;




        // ======= shipments statuses  ====== 


        $booked = Shipment::where('status', '1');
        $booked_count = $booked->count();
        $booked_value = Shipment::all()->count();
        $data['booked_count'] = $booked_count;
        $data['booked_total'] = $booked_value;

        $shipped = Shipment::where('status', '2');
        $shipped_count = $shipped->count();
        $shipped_value = Shipment::all()->count();
        $data['shipped_count'] = $shipped_count;
        $data['shipped_total'] = $shipped_value;

        $arrived = Shipment::where('status', '3');
        $arrived_count = $arrived->count();
        $arrived_value = Shipment::all()->count();
        $data['arrived_count'] = $arrived_count;
        $data['arrived_total'] = $arrived_value;

        $completed = Shipment::where('status', '4');
        $completed_count = $completed->count();
        $completed_value = Shipment::all()->count();
        $data['completed_count'] = $completed_count;
        $data['completed_total'] = $completed_value;

        


        $notification = $this->Notification();
        return view($this->view . 'list', $data, $notification);
    }
}

