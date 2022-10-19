<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Notification;
use App\Models\User;
use App\Models\Location;
use App\Models\Company;
use App\Models\Country;
use App\Models\ShippingCountry;
use App\Models\LoadingPort;
use App\Models\DestinationPort;
use App\Models\Auction;
use App\Models\DestinationCountry;
use App\Models\Title;
use App\Models\Shipment;
use App\Models\State;
use Illuminate\Http\Request;

use Carbon\Carbon;

class MasterController extends Controller
{
    private $type = "Masters";
    private $singular = "master";
    private $plural = "Masters";
    private $view = "master.";
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
        $records = User::paginate($this->perpage);
        $data['records'] = $records;

        $records = Company::all();
        $data['company'] = $records;

        $records = ShippingCountry::all();
        $data['shippingcountry'] = $records;

        $records = State::all();
        $data['state'] = $records;


        $records = LoadingPort::all();
        $data['loadingport'] = $records;
        
        $records = DestinationPort::all();
        $data['destinationport'] = $records;

        $records = Auction::all();
        $data['auction'] = $records;
        
        $records = DestinationCountry::all();
        $data['destinationcountry'] = $records;

        $records = Title::all();
        $data['title'] = $records;


        $notification = $this->Notification();
        return view($this->view . 'master', $data, $notification);
    }

    public function company(Request $request){
        $data = [];
        $tab = $request->tab;
        if($tab=="company"){
        $data['title'] ="Company";
        $data['placeholder'] ="Enter Company Name";
        $output = view('master.company',$data)->render();                     
        return Response($output);
        }
    }

    public function shipping_countries(Request $request){
        $data = [];
        $tab = $request->tab;
        if($tab=="shippingcountries"){
        $data['title'] ="shipping Country";
        $data['placeholder'] ="Enter Shipping Country Name";
        $output = view('master.shipping_countries',$data)->render();                     
        return Response($output);
        }
    }

    public function shipping_states(Request $request){
        $data = [];
        $tab = $request->tab;
        if($tab=="shippingstates"){
        $data['title'] ="shipping State";
        $data['placeholder'] ="Enter Shipping State Name";
        $output = view('master.shipping_states',$data)->render();                     
        return Response($output);
        }
    }

    

    public function loading_ports(Request $request){
        $data = [];
        $tab = $request->tab;
        if($tab=="loadingports"){
        $data['title'] ="Loading Ports";
        $data['placeholder'] ="Enter Loading Ports Name";
        $output = view('master.loading_port',$data)->render();                     
        return Response($output);
        }
    }

    public function destination_countries(Request $request){
        $data = [];
        $tab = $request->tab;
        if($tab=="destinationcountries"){
        $data['title'] ="Destination Country Name";
        $data['placeholder'] ="Enter Destination Country Name";
        $output = view('master.destination_countries',$data)->render();                     
        return Response($output);
        }
    }

    public function destination_port(Request $request){
        $data = [];
        $tab = $request->tab;
        if($tab=="destinationport"){
        $data['title'] ="Destination Port Name";
        $data['placeholder'] ="Enter Destination Port Name";
        $output = view('master.destination_port',$data)->render();                     
        return Response($output);
        }
    }

    public function make(Request $request){
        $data = [];
        $tab = $request->tab;
        if($tab=="make"){
        $data['title'] ="Make Name";
        $data['placeholder'] ="Enter Make Name";
        $output = view('master.make',$data)->render();                     
        return Response($output);
        }
    }

    public function model(Request $request){
        $data = [];
        $tab = $request->tab;
        if($tab=="model"){
        $data['title'] ="Model Name";
        $data['placeholder'] ="Enter Model Name";
        $output = view('master.model',$data)->render();                     
        return Response($output);
        }
    }

    public function color(Request $request){
        $data = [];
        $tab = $request->tab;
        if($tab=="color"){
        $data['title'] ="Color Name";
        $data['placeholder'] ="Enter Color Name";
        $output = view('master.color',$data)->render();                     
        return Response($output);
        }
    }

    public function title(Request $request){
        $data = [];
        $tab = $request->tab;
        if($tab=="title"){
        $data['title'] ="Title Name";
        $data['placeholder'] ="Enter Title Name";
        $output = view('master.title',$data)->render();                     
        return Response($output);
        }
    }

    public function key(Request $request){
        $data = [];
        $tab = $request->tab;
        if($tab=="key"){
        $data['title'] ="Key Name";
        $data['placeholder'] ="Enter Key Name";
        $output = view('master.key',$data)->render();                     
        return Response($output);
        }
    }

    public function auction(Request $request){
        $data = [];
        $tab = $request->tab;
        if($tab=="auction"){
        $data['title'] ="Auction Name";
        $data['placeholder'] ="Enter Auction Name";
        $output = view('master.auction',$data)->render();                     
        return Response($output);
        }
    }

    public function vehicle(Request $request){
        $data = [];
        $tab = $request->tab;
        if($tab=="vehicle"){
        $data['title'] ="Vehicle Name";
        $data['placeholder'] ="Enter Vehicle Name";
        $output = view('master.vehicle',$data)->render();                     
        return Response($output);
        }
    }

    public function shippment(Request $request){
        $data = [];
        $tab = $request->tab;
        if($tab=="shippment"){
        $data['title'] ="Shippment Name";
        $data['placeholder'] ="Enter Shippment Name";
        $output = view('master.shippment',$data)->render();                     
        return Response($output);
        }
    }

    public function save(Request $request){
        // dd($request);
        $data = [];
        $inputdata = $request->input();
        $tab_name = $request->tab ;
        $name = $request->name;
        if ($tab_name =='company' && $name !="") {
            $company = new Company;
            $data['name_exist'] = Company::where('name', '=', $name)
            ->get()->toArray();
            if($data['name_exist']){
                $output = view('master.company',$data['name_exist'])->render();                     
                return Response($output);
            }
            $company->name = $inputdata['name'];
            $company->save();
        }
        if ($tab_name =='shippingcountries' && $name !="") {
            $shippingcountries = new ShippingCountry();
            $data['name_exist'] = ShippingCountry::where('name', '=', $name)
            ->get()->toArray();
            if($data['name_exist']){
                $output = view('master.shippingcountries',$data['name_exist'])->render();                     
                return Response($output);
            }
            $shippingcountries->name = $inputdata['name'];
            $shippingcountries->save();
        }
        if ($tab_name =='shippingstates' && $name !="") {
            $shippingstates = new State;
            $data['name_exist'] = State::where('name', '=', $name)
            ->get()->toArray();
            if($data['name_exist']){
                $output = view('master.shippingstates',$data['name_exist'])->render();                     
                return Response($output);
            }
            $shippingstates->name = $inputdata['name'];
            $shippingstates->save();
        }
        if ($tab_name =='loadingports' && $name !="") {
            $loading_ports = new LoadingPort();
            $data['name_exist'] = LoadingPort::where('destination', '=', $name)
            ->get()->toArray();
            if($data['name_exist']){
                $output = view('master.loading_port',$data['name_exist'])->render();                     
                return Response($output);
            }
            $loading_ports->destination = $inputdata['name'];
            $loading_ports->save();
        }
        if ($tab_name =='destinationcountries' && $name !="") {
            $destination_countries = new DestinationCountry();
            $data['name_exist'] = DestinationCountry::where('name', '=', $name)
            ->get()->toArray();
            if($data['name_exist']){
                $output = view('master.destination_countries',$data['name_exist'])->render();                     
                return Response($output);
            }
            $destination_countries->name = $inputdata['name'];
            $destination_countries->save();
        }
        if ($tab_name =='destinationport' && $name !="") {
            $destinationport = new DestinationPort();
            $data['name_exist'] = DestinationPort::where('destination', '=', $name)
            ->get()->toArray();
            if($data['name_exist']){
                $output = view('master.destination_port',$data['name_exist'])->render();                     
                return Response($output);
            }
            $destinationport->destination = $inputdata['name'];
            $destinationport->save();
        }
        if ($tab_name =='make' && $name !="") {
            dd($tab_name);
        }
        if ($tab_name =='model' && $name !="") {
            dd($tab_name);
        }
        if ($tab_name =='color' && $name !="") {
            dd($tab_name);
        }
        if ($tab_name =='title' && $name !="") {
            $title = new Title();
            $data['name_exist'] = Title::where('name', '=', $name)
            ->get()->toArray();
            if($data['name_exist']){
                $output = view('master.title',$data['name_exist'])->render();                     
                return Response($output);
            }
            $title->name = $inputdata['name'];
            $title->save();
        }
        if ($tab_name =='key' && $name !="") {
            dd($tab_name);
        }
        if ($tab_name =='auction' && $name !="") {
            $auction = new Auction();
            $data['name_exist'] = Auction::where('name', '=', $name)
            ->get()->toArray();
            if($data['name_exist']){
                $output = view('master.auction',$data['name_exist'])->render();                     
                return Response($output);
            }
            $auction->name = $inputdata['name'];
            $auction->save();
        }
        if ($tab_name =='vehicle' && $name !="") {
            dd($tab_name);
        }
        if ($tab_name =='shippment' && $name !="") {
            dd($tab_name);
        }

            
    }

}
