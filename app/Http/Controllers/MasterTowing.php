<?php

namespace App\Http\Controllers;
use Carbon\Carbon;
use App\Models\Key;
use App\Models\MMS;
use App\Models\Make;
use App\Models\Site;
use App\Models\User;
use App\Models\Color;
use App\Models\Title;
use App\Models\Series;
use App\Models\Auction;
use App\Models\Company;
use App\Models\Country;
use App\Models\State;
use App\Models\ContainerSize;
use App\Models\ContainerType;
use App\Models\ShipmentStatus;
use App\Models\ShipmentLine;
use App\Models\Vehicle;
use App\Models\Location;
use App\Models\Shipment;
use App\Models\TitleType;
use App\Models\Warehouse;
use App\Models\LoadingPort;
use App\Models\ShipperName;
use App\Models\VehicleType;
use App\Models\Notification;
use App\Models\VehicleModel;
use App\Models\ShippingState;
use App\Models\VehicleStatus;
use App\Models\PickupLocation;
use App\Models\DestinationPort;
use App\Models\ShippingCountry;

use App\Models\DestinationCountry;

use App\Http\Controllers\Controller;
use App\Models\DestinationState;

use Illuminate\Http\Request;

class MasterTowing extends Controller
{
    private $type = "Masters";
    private $singular = "master";
    private $plural = "Towing";
    private $view = "masterTowing.";
    private $db_key = "id";
    private $perpage = 100;
    private $user = [];
    private $directory = "user_images";
    private $action = "/admin/master";

    public function Notification()
    {
        $data['notification'] = Notification::with('user')->paginate($this->perpage);
        $data['location'] = Location::all()->toArray();
        if ($data['notification']) {
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
                'action' => $this->action,
            ],
        ];
        
        $notification = $this->Notification();
        return view($this->view . 'list', $data, $notification);
    }


}
