<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Notification;
use App\Models\User;
use App\Models\Vehicle;
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

        $customer = Customer::all();
        $data['customers'] = $customer->toArray();

        $all_vehicles = Vehicle::all();
        $allVehicles_value = Vehicle::get()->sum('value');
        $data['all_vehicles'] = $all_vehicles;
        $data['allVehicles_value'] = $allVehicles_value;


        $onhand = Vehicle::where('status', '0');
        $onhand_count = $onhand->count();
        $onhand_value = $onhand->sum('value');
        $data['onhand_count'] = $onhand_count;
        $data['onhand_value'] = $onhand_value;

        $dispatch =  Vehicle::where('status', '1');
        $dispatch_count = $dispatch->count();
        $dispatch_value = $dispatch->sum('value'); 
        $data['dispatch_count'] = $dispatch_count;
        $data['dispatch_value'] = $dispatch_value;


        $manifest = Vehicle::where('status', '2');
        $manifest_count = $manifest->count();
        $manifest_value = $manifest->sum('value');
        $data['manifest_count'] = $manifest_count;
        $data['manifest_value'] = $manifest_value;


        $shipped = Vehicle::where('status', '3');
        $shipped_count = $shipped->count();
        $shipped_value = $shipped->sum('value');
        $data['shipped_count'] = $shipped_count;
        $data['shipped_value'] = $shipped_value;

     
        $arrived = Vehicle::where('status', '4');
        $arrived_count = $arrived->count();
        $arrived_value = $arrived->sum('value');
        $data['arrived_count'] = $arrived_count;
        $data['arrived_value'] = $arrived_value;
        


        $notification = $this->Notification();
        return view($this->view . 'list', $data, $notification);
    }
}

