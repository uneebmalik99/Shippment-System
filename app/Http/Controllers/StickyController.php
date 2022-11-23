<?php

namespace App\Http\Controllers;

use App\Models\Notification;
use App\Models\Sticky;
use App\Models\Location;
use Auth;
use Carbon\Carbon;
use Illuminate\Http\Request;

class StickyController extends Controller
{
    private $type = "sticky";
    private $singular = "sticky";
    private $plural = "sticky";
    private $view = "sticky.";
    private $db_key = "id";
    private $user = [];
    private $perpage = 100;
    private $directory = "vehicle_images";
    private $action = "/admin/sticky";

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
        $data['location'] = Location::all();
        $data['records'] = Sticky::with('user')->paginate($this->perpage);
        return view($this->view . 'list', $data, $notification);
    }

    public function create(Request $request)
    {
        $sticky_id = $request->sticky_id;
        $notes = $request->notes;
        $customer_id = Auth::user()->id;
        $Obj = new Sticky;
        $data = Sticky::where('sticky_id', $sticky_id);
        if (count($data->get()) > 0) {
            $data = $data->update(['notes' => $notes]);
            // $data->notes = $notes;
            // $data->update();
            $output = "Note updated.";

        } else {
            $Obj->notes = $notes;
            $Obj->sticky_id = $sticky_id;
            $Obj->customer_id = '2';
            $Obj->save();
            $output = "Note created.";
        }
        return Response($output);
    }
}
