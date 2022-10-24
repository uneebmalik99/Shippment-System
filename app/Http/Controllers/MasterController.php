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
use App\Models\ShipmentLine;
use App\Models\ShipmentStatus;
use App\Models\ShippingState;
use App\Models\Vehicle;
use App\Models\Color;
use App\Models\ContainerType;
use App\Models\ContainerSize;
use App\Models\Key;
use App\Models\Make;
use App\Models\Series;
use App\Models\VehicleModel;
use App\Models\VehicleType;
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

        $records = ShippingState::all();
        $data['shippingstates'] = $records;


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

        $records = Key::all();
        $data['key'] = $records;

        $records = VehicleModel::all();
        $data['model'] = $records;

        $records = Color::all();
        $data['color'] = $records;

        $records = Make::all();
        $data['make'] = $records;

        $data['shipment_types'] = ShipmentStatus::all();
        $data['shipment_lines'] = ShipmentLine::all();
        $data['container_types'] = ContainerType::all();
        $data['container_size'] = ContainerSize::all();
        // return $data['shipment_types'];


        $notification = $this->Notification();
        return view($this->view . 'master', $data, $notification);
    }

    public function company(Request $request)
    {
        $data = [];
        $tab = $request->tab;
        if ($tab=="company") {
            $data['title'] ="Company";
            $data['placeholder'] ="Enter Company Name";
            $output = view('master.company', $data)->render();
            return Response($output);
        }
    }

    public function shipping_countries(Request $request)
    {
        $data = [];
        $tab = $request->tab;
        if ($tab=="shippingcountries") {
            $data['title'] ="shipping Country";
            $data['placeholder'] ="Enter Shipping Country Name";
            $output = view('master.shipping_countries', $data)->render();
            return Response($output);
        }
    }

    public function shipping_states(Request $request)
    {
        $data = [];
        $tab = $request->tab;
        if ($tab=="shippingstates") {
            $data['title'] ="shipping State";
            $data['placeholder'] ="Enter Shipping State Name";
            $output = view('master.shipping_states', $data)->render();
            return Response($output);
        }
    }

    public function loading_ports(Request $request)
    {
        $data = [];
        $tab = $request->tab;
        if ($tab=="loadingports") {
            $data['title'] ="Loading Ports";
            $data['placeholder'] ="Enter Loading Ports Name";
            $output = view('master.loading_port', $data)->render();
            return Response($output);
        }
    }

    public function destination_countries(Request $request)
    {
        $data = [];
        $tab = $request->tab;
        if ($tab=="destinationcountries") {
            $data['title'] ="Destination Country Name";
            $data['placeholder'] ="Enter Destination Country Name";
            $output = view('master.destination_countries', $data)->render();
            return Response($output);
        }
    }

    public function destination_port(Request $request)
    {
        $data = [];
        $tab = $request->tab;
        if ($tab=="destinationport") {
            $data['title'] ="Destination Port Name";
            $data['placeholder'] ="Enter Destination Port Name";
            $output = view('master.destination_port', $data)->render();
            return Response($output);
        }
    }

    public function make(Request $request)
    {
        $data = [];
        $tab = $request->tab;
        if ($tab=="make") {
            $data['title'] ="Make Name";
            $data['placeholder'] ="Enter Make Name";
            $data['model'] = VehicleModel::all();
            $data['series'] = Series::all();
            $data['make'] = Make::all();
            $output = view('master.make', $data)->render();
            return Response($output);


            $tab = $request->id;
            $data['model'] = VehicleModel::with($tab);
        }
    }

    public function model(Request $request)
    {
        $data = [];
        $tab = $request->tab;
        if ($tab=="model") {
            $data['title'] ="Model Name";
            $data['placeholder'] ="Enter Model Name";
            $output = view('master.model', $data)->render();
            return Response($output);
        }
    }

    public function color(Request $request)
    {
        $data = [];
        $tab = $request->tab;
        if ($tab=="color") {
            $data['title'] ="Color Name";
            $data['placeholder'] ="Enter Color Name";
            $output = view('master.color', $data)->render();
            return Response($output);
        }
    }

    public function title(Request $request)
    {
        $data = [];
        $tab = $request->tab;
        if ($tab=="title") {
            $data['title'] ="Title Name";
            $data['placeholder'] ="Enter Title Name";
            $output = view('master.title', $data)->render();
            return Response($output);
        }
    }

    public function key(Request $request)
    {
        $data = [];
        $tab = $request->tab;
        if ($tab=="key") {
            $data['title'] ="Key Name";
            $data['placeholder'] ="Enter Key Name";
            $output = view('master.key', $data)->render();
            return Response($output);
        }
    }

    public function auction(Request $request)
    {
        $data = [];
        $tab = $request->tab;
        if ($tab=="auction") {
            $data['title'] ="Auction Name";
            $data['placeholder'] ="Enter Auction Name";
            $output = view('master.auction', $data)->render();
            return Response($output);
        }
    }

    public function vehicle(Request $request)
    {
        $data = [];
        $tab = $request->tab;
        if ($tab=="vehicle") {
            $data['title'] ="Vehicle Name";
            $data['placeholder'] ="Enter Vehicle Name";
            $output = view('master.vehicle', $data)->render();
            return Response($output);
        }
    }

    public function shippment(Request $request)
    {
        $data = [];
        $tab = $request->tab;
        if ($tab=="shippment") {
            $data['title'] ="Shippment Name";
            $data['placeholder'] ="Enter Shippment Name";
            $output = view('master.shippment', $data)->render();
            return Response($output);
        }
    }
    public function shippmenttypes(Request $request){
        $data = [];
        $tab = $request->tab;
        // return $tab;
        if ($tab=="shippmenttypes") {
            $data['title'] ="Shippment Types";
            $data['placeholder'] ="Enter Shippment Name";
            $output = view('master.shipmentTypes', $data)->render();
            return Response($output);
        }
    }

    public function save(Request $request)
    {
        // dd($request->all());
        $length  = count($request->addmore);
        $data = [];
        $inputdata = $request->input();
        $tab_name = $request->tab ;
        if ($tab_name =='company') {
            // $company = new Company;

            for ($i=0; $i<$length; $i++) {
                $data['record_exist'] = Company::where('name', '=', $request->addmore[$i])
                ->get()->toArray();
                if (!$data['record_exist']) {
                    $data = [
                        'name' => $request->addmore[$i],
                      ];
                    Company::Create($data);
                }
            }
            return 'success';

            // foreach($request->addmore as $values){
            //     $data = [
            //         'name' => $values,
            //     ];
            // }

            // $company->save($data);
            // $company = new Company;
            // $data['name_exist'] = Company::where('name', '=', $name)
            // ->get()->toArray();
            // if($data['name_exist']){
            //     $output = view('master.company',$data['name_exist'])->render();
            //     return Response($output);
            // }
            // $company->name = $inputdata['name'];
            // $company->save();
        }
        if ($tab_name =='shippingcountries') {
            for ($i=0; $i<$length; $i++) {
                $data['record_exist'] = ShippingCountry::where('name', '=', $request->addmore[$i])
                ->get()->toArray();
                if (!$data['record_exist']) {
                    $data = [
                        'name' => $request->addmore[$i],
                      ];
                    ShippingCountry::Create($data);
                }
            }
            return 'success';
        }
        if ($tab_name =='shippingstates') {
            for ($i=0; $i<$length; $i++) {
                for ($i=0; $i<$length; $i++) {
                    $data['record_exist'] = ShippingState::where('name', '=', $request->addmore[$i])
                    ->get()->toArray();
                    if (!$data['record_exist']) {
                        $data = [
                            'name' => $request->addmore[$i],
                          ];
                        ShippingState::Create($data);
                    }
                }
                return 'success';
            }
            return 'success';
            // $shippingstates = new State;
            // $data['name_exist'] = State::where('name', '=', $name)
            // ->get()->toArray();
            // if($data['name_exist']){
            //     $output = view('master.shippingstates',$data['name_exist'])->render();
            //     return Response($output);
            // }
            // $shippingstates->name = $inputdata['name'];
            // $shippingstates->save();
        }
        if ($tab_name =='loadingports') {
            for ($i=0; $i<$length; $i++) {
                $data['record_exist'] = LoadingPort::where('destination', '=', $request->addmore[$i])
                ->get()->toArray();
                if (!$data['record_exist']) {
                    $data = [
                        'destination' => $request->addmore[$i],
                      ];
                    LoadingPort::Create($data);
                }
            }
            return 'success';
            // $loading_ports = new LoadingPort();
            // $data['name_exist'] = LoadingPort::where('destination', '=', $name)
            // ->get()->toArray();
            // if($data['name_exist']){
            //     $output = view('master.loading_port',$data['name_exist'])->render();
            //     return Response($output);
            // }
            // $loading_ports->destination = $inputdata['name'];
            // $loading_ports->save();
        }
        if ($tab_name =='destinationcountries') {
            for ($i=0; $i<$length; $i++) {
                $data['record_exist'] = DestinationCountry::where('name', '=', $request->addmore[$i])
                ->get()->toArray();
                if (!$data['record_exist']) {
                    $data = [
                        'name' => $request->addmore[$i],
                      ];
                    DestinationCountry::Create($data);
                }
            }
            return 'success';
            // dd($request->input());
            // $destination_countries = new DestinationCountry();
            // $data['name_exist'] = DestinationCountry::where('name', '=', $name)
            // ->get()->toArray();
            // if($data['name_exist']){
            //     $output = view('master.destination_countries',$data['name_exist'])->render();
            //     return Response($output);
            // }
            // $destination_countries->name = $inputdata['name'];
            // $destination_countries->save();
        }
        if ($tab_name =='destinationport') {
            for ($i=0; $i<$length; $i++) {
                $data['record_exist'] = DestinationPort::where('destination', '=', $request->addmore[$i])
                ->get()->toArray();
                if (!$data['record_exist']) {
                    $data = [
                        'destination' => $request->addmore[$i],
                      ];
                    DestinationPort::Create($data);
                }
            }
            return 'success';
            // $destinationport = new DestinationPort();
            // $data['name_exist'] = DestinationPort::where('destination', '=', $name)
            // ->get()->toArray();
            // if($data['name_exist']){
            //     $output = view('master.destination_port',$data['name_exist'])->render();
            //     return Response($output);
            // }
            // $destinationport->destination = $inputdata['name'];
            // $destinationport->save();
        }

        if ($tab_name =='shippmenttypes') {
            return 'success';
            for ($i=0; $i<$length; $i++) {
                $data['record_exist'] = DestinationPort::where('destination', '=', $request->addmore[$i])
                ->get()->toArray();
                if (!$data['record_exist']) {
                    $data = [
                        'destination' => $request->addmore[$i],
                      ];
                    ShipmentStatus::Create($data);
                }
            }
            return 'success';
            // $destinationport = new DestinationPort();
            // $data['name_exist'] = DestinationPort::where('destination', '=', $name)
            // ->get()->toArray();
            // if($data['name_exist']){
            //     $output = view('master.destination_port',$data['name_exist'])->render();
            //     return Response($output);
            // }
            // $destinationport->destination = $inputdata['name'];
            // $destinationport->save();
        }

        if ($tab_name =='model') {
            for ($i=0; $i<$length; $i++) {
                $data['record_exist'] = VehicleModel::where('name', '=', $request->addmore[$i])
                ->get()->toArray();
                if (!$data['record_exist']) {
                    $data = [
                        'name' => $request->addmore[$i],
                      ];
                    VehicleModel::Create($data);
                }
            }
            return 'success';
            // $title = new Title();
            // $data['name_exist'] = Title::where('name', '=', $name)
            // ->get()->toArray();
            // if($data['name_exist']){
            //     $output = view('master.title',$data['name_exist'])->render();
            //     return Response($output);
            // }
            // $title->name = $inputdata['name'];
            // $title->save();
        }
        if ($tab_name =='color') {
            for ($i=0; $i<$length; $i++) {
                $data['record_exist'] = Color::where('name', '=', $request->addmore[$i])
                ->get()->toArray();
                if (!$data['record_exist']) {
                    $data = [
                        'name' => $request->addmore[$i],
                      ];
                    Color::Create($data);
                }
            }
            return 'success';
        }
        if ($tab_name =='title') {
            for ($i=0; $i<$length; $i++) {
                $data['record_exist'] = Title::where('name', '=', $request->addmore[$i])
                ->get()->toArray();
                if (!$data['record_exist']) {
                    $data = [
                        'name' => $request->addmore[$i],
                      ];
                    Title::Create($data);
                }
            }
            return 'success';
            // $title = new Title();
            // $data['name_exist'] = Title::where('name', '=', $name)
            // ->get()->toArray();
            // if($data['name_exist']){
            //     $output = view('master.title',$data['name_exist'])->render();
            //     return Response($output);
            // }
            // $title->name = $inputdata['name'];
            // $title->save();
        }
        if ($tab_name =='key') {
            for ($i=0; $i<$length; $i++) {
                $data['record_exist'] = Key::where('name', '=', $request->addmore[$i])
                ->get()->toArray();
                if (!$data['record_exist']) {
                    $data = [
                        'name' => $request->addmore[$i],
                      ];
                    Key::Create($data);
                }
            }
            return 'success';
            // $title = new Title();
            // $data['name_exist'] = Title::where('name', '=', $name)
            // ->get()->toArray();
            // if($data['name_exist']){
            //     $output = view('master.title',$data['name_exist'])->render();
            //     return Response($output);
            // }
            // $title->name = $inputdata['name'];
            // $title->save();
        }
        if ($tab_name =='auction') {
            for ($i=0; $i<$length; $i++) {
                $data['record_exist'] = Auction::where('name', '=', $request->addmore[$i])
                ->get()->toArray();
                if (!$data['record_exist']) {
                    $data = [
                        'name' => $request->addmore[$i],
                      ];
                    Auction::Create($data);
                }
            }
            return 'success';
            // $auction = new Auction();
            // $data['name_exist'] = Auction::where('name', '=', $name)
            // ->get()->toArray();
            // if($data['name_exist']){
            //     $output = view('master.auction',$data['name_exist'])->render();
            //     return Response($output);
            // }
            // $auction->name = $inputdata['name'];
            // $auction->save();
        }
        if ($tab_name =='vehicle') {
            dd($tab_name);
        }
        if ($tab_name =='shippment') {
            dd($tab_name);
        }
    }
    public function add_make(Request $request)
    {
        // dd($request->all());
        // $length  = count($request->addmore);
        $data = [];
        $inputdata = $request->input();
        $tab_name = $request->tab ;
        $data['record_exist'] = Make::where('name', '=', $request->make)
        ->get()->toArray();
        if (!$data['record_exist']) {
            $data = [
                'name' => $request->make,
                'model_id' => $request->model_id,
                'status' => 1,
              ];
            Make::Create($data);
        }
        return 'success';
        // $title = new Title();
        // $data['name_exist'] = Title::where('name', '=', $name)
        // ->get()->toArray();
        // if($data['name_exist']){
            //     $output = view('master.title',$data['name_exist'])->render();
            //     return Response($output);
        // }
        // $title->name = $inputdata['name'];
        // $title->save();
    }
    public function delete_master(Request $request)
    {
        $data = [];
        $inputdata = $request->input();
        $tab_name = $request->tab ;
        $id = $request->id;
        if ($tab_name =='company' && $id !="") {
            $company = new Company();
            $data['deleted'] = Company::find($id)->delete();
        }
        if ($tab_name =='shippingcountries' && $id !="") {
            $shippingcountries = new ShippingCountry();
            $data['deleted'] = ShippingCountry::find($id)->delete();
        }
        if ($tab_name =='shippingstates' && $id !="") {
            $shippingstates = new ShippingState();
            $data['deleted'] = ShippingState::find($id)->delete();
        }
        if ($tab_name =='loadingports' && $id !="") {
            $loadingport = new LoadingPort();
            $data['deleted'] = LoadingPort::find($id)->delete();
        }
        if ($tab_name =='destinationcountries' && $id !="") {
            $destinationcountries = new DestinationCountry();
            $data['deleted'] = DestinationCountry::find($id)->delete();
        }
        if ($tab_name =='destinationport' && $id !="") {
            $destinationport = new DestinationPort();
            $data['deleted'] = DestinationPort::find($id)->delete();
        }
        if ($tab_name =='title' && $id !="") {
            $title = new Title();
            $data['deleted'] = Title::find($id)->delete();
        }
        if ($tab_name =='model' && $id !="") {
            $model = new VehicleModel();
            $data['deleted'] = VehicleModel::find($id)->delete();
        }
        if ($tab_name =='key' && $id !="") {
            $key = new Key();
            $data['deleted'] = Key::find($id)->delete();
        }
        if ($tab_name =='color' && $id !="") {
            $color = new Color();
            $data['deleted'] = Color::find($id)->delete();
            // dd($data['deleted']);
            return 'deleted';
        }
        if ($tab_name =='auction' && $id !="") {
            $auction = new Auction();
            $data['deleted'] = Auction::find($id)->delete();
        }
    }

    public function update_master(Request $request)
    {
        // dd($request->input());
        $data = [];
        $tab = $request->tab;
        $id  = $request->id;
        if ($tab=="company") {
            $data['title'] = "Update Company";
            $data['company'] = Company::where('id', '=', $id)->get()->toArray();
            $output = view('master.company', $data)->render();
            return Response($output);
        }
        if ($tab=="shippingcountries") {
            $data['title'] = "Update Shipping Countries";
            $data['shippingcountries'] = ShippingCountry::where('id', '=', $id)->get()->toArray();
            $output = view('master.shipping_countries', $data)->render();
            return Response($output);
        }
        if ($tab=="shippingstates") {
            $data['title'] = "Update Shipping States";
            $data['shippingstates'] = ShippingState::where('id', '=', $id)->get()->toArray();
            $output = view('master.shipping_states', $data)->render();
            return Response($output);
        }
        if ($tab=="loadingports") {
            // dd($request->input());
            $data['title'] = "Update Loading Ports";
            $data['loadingports'] = LoadingPort::where('id', '=', $id)->get()->toArray();
            $output = view('master.loading_port', $data)->render();
            return Response($output);
        }
        if ($tab=="destinationcountries") {
            // dd($request->input());
            $data['title'] = "Update Destination Countries";
            $data['destinationcountries'] = DestinationCountry::where('id', '=', $id)->get()->toArray();
            $output = view('master.destination_countries', $data)->render();
            return Response($output);
        }
        if ($tab=="destinationport") {
            // dd($request->input());
            $data['title'] = "Update Destination Port";
            $data['destinationport'] = DestinationPort::where('id', '=', $id)->get()->toArray();
            $output = view('master.destination_port', $data)->render();
            return Response($output);
        }
        if ($tab=="title") {
            $data['title'] = "Update Title";
            $data['titledata'] = Title::where('id', '=', $id)->get()->toArray();
            $output = view('master.title', $data)->render();
            return Response($output);
        }
        if ($tab=="auction") {
            // dd($request->input());
            $data['title'] = "Update Auction";
            $data['auction'] = Auction::where('id', '=', $id)->get()->toArray();
            $output = view('master.auction', $data)->render();
            return Response($output);
        }
        if ($tab=="model") {
            // dd($request->input());
            $data['title'] = "Update model";
            $data['model'] = VehicleModel::where('id', '=', $id)->get()->toArray();
            $output = view('master.model', $data)->render();
            return Response($output);
        }
        if ($tab=="make") {
            // dd($request->input());
            $data['title'] = "Update make";
            $data['make'] = Make::where('id', '=', $id)->get()->toArray();
            $output = view('master.make', $data)->render();
            return Response($output);
        }
        if ($tab=="color") {
            // dd($request->input());
            $data['color'] = "Update color";
            $data['color'] = Color::where('id', '=', $id)->get()->toArray();
            $output = view('master.color', $data)->render();
            return Response($output);
        }
        if ($tab=="key") {
            // dd($request->input());
            $data['title'] = "Update key";
            $data['key'] = Key::where('id', '=', $id)->get()->toArray();
            $output = view('master.key', $data)->render();
            return Response($output);
        }
    }
    public function update_save(Request $request)
    {
        $data = [];
        $tab_name = $request->tab ;
        $id = $request->id;
        $name = $request->name;

        if ($tab_name =='company' && $name !="" && $id !="") {
            $company = new Company();
            $company = Company::find($id);
            $company->name = $request['name'];
            $company->save();
            return 'updated';
        }
        if ($tab_name =='shippingcountries') {
            $shippingcountry = new ShippingCountry();
            $shippingcountry = ShippingCountry::find($id);
            $shippingcountry->name = $name;
            $shippingcountry->save();
            return 'updated';
        }
        if ($tab_name =='shippingstates') {
            $sta = new ShippingState();
            $shippingstates = ShippingState::find($id);
            $shippingstates->name = $name;
            $shippingstates->save();
            return 'updated';
        }
        if ($tab_name =='loadingports') {
            $loadingports = new LoadingPort();
            $loadingports = LoadingPort::find($id);
            $loadingports->destination = $name;
            $loadingports->save();
            return 'updated';
        }
        if ($tab_name =='destinationcountries') {
            $destinationcountries = new DestinationCountry();
            $destinationcountries = DestinationCountry::find($id);
            $destinationcountries->name = $name;
            $destinationcountries->save();
            return 'updated';
        }
        if ($tab_name =='destinationport') {
            $destinationport = new DestinationPort();
            $destinationport = DestinationPort::find($id);
            $destinationport->destination = $name;
            $destinationport->save();
            return 'updated';
        }
        if ($tab_name =='title') {
            $title = new Title();
            $title = $title::find($id);
            $title->name = $name;
            $title->save();
            return 'updated';
        }
        if ($tab_name =='color') {
            $color = new Color();
            $color = $color::find($id);
            $color->name = $name;
            $color->save();
            return 'updated';
        }
        if ($tab_name =='auction') {
            $auction = new Auction();
            $auction = $auction::find($id);
            $auction->name = $name;
            $auction->save();
            return 'updated';
        }
        if ($tab_name =='make') {
            $make = new Make();
            $make = $make::find($id);
            $make->name = $name;
            $make->save();
            return 'updated';
        }
        if ($tab_name =='model') {
            $model = new VehicleModel();
            $model = $model::find($id);
            $model->name = $name;
            $model->save();
            return 'updated';
        }
        if ($tab_name =='key') {
            $key = new Key();
            $key = $key::find($id);
            $key->name = $name;
            $key->save();
            return 'updated';
        }
    }
    public function master_status(Request $request)
    {
        // dd($request->input());
        $data = [];
        $tab_name = $request->tab ;
        $id = $request->id;
        $status = $request->status;
        if ($tab_name =='company' && $id !="") {
            $company = new Company();
            if ($status=='0') {
                $status = '1';
                $company = Company::find($id);
                $company->status = $status;
                $company->save();
            } else {
                $status = '0';
                $company = Company::find($id);
                $company->status = $status;
                $company->save();
            }
            return 'updated';
        }
        if ($tab_name =='shippingcountries' && $id !="") {
            $shippingcountries = new ShippingCountry();
            if ($status=='0') {
                $status = '1';
                $shippingcountries = ShippingCountry::find($id);
                $shippingcountries->status = $status;
                $shippingcountries->save();
            } else {
                $status = '0';
                $shippingcountries = ShippingCountry::find($id);
                $shippingcountries->status = $status;
                $shippingcountries->save();
            }
            return 'updated';
        }
        if ($tab_name =='state' && $id !="") {
            $shippingstates = new ShippingState();
            if ($status=='0') {
                $status = '1';
                $shippingstates = ShippingState::find($id);
                $shippingstates->status = $status;
                $shippingstates->save();
            } else {
                $status = '0';
                $shippingstates = ShippingState::find($id);
                $shippingstates->status = $status;
                $shippingstates->save();
            }
            return 'updated';
        }
        if ($tab_name =='loadingports' && $id !="") {
            $loadingports = new LoadingPort();
            if ($status=='0') {
                $status = '1';
                $loadingports = LoadingPort::find($id);
                $loadingports->status = $status;
                $loadingports->save();
            } else {
                $status = '0';
                $loadingports = LoadingPort::find($id);
                $loadingports->status = $status;
                $loadingports->save();
            }
            return 'updated';
        }
        if ($tab_name =='destinationcountries' && $id !="") {
            $destinationcountries = new DestinationCountry();
            if ($status=='0') {
                $status = '1';
                $destinationcountries = DestinationCountry::find($id);
                $destinationcountries->status = $status;
                $destinationcountries->save();
            } else {
                $status = '0';
                $destinationcountries = DestinationCountry::find($id);
                $destinationcountries->status = $status;
                $destinationcountries->save();
            }
            return 'updated';
        }
        if ($tab_name =='destinationport' && $id !="") {
            $destinationport = new DestinationPort();
            if ($status=='0') {
                $status = '1';
                $destinationport = DestinationPort::find($id);
                $destinationport->status = $status;
                $destinationport->save();
            } else {
                $status = '0';
                $destinationport = DestinationPort::find($id);
                $destinationport->status = $status;
                $destinationport->save();
            }
            return 'updated';
        }
        if ($tab_name =='title' && $id !="") {
            $title = new Title();
            if ($status=='0') {
                $status = '1';
                $title = Title::find($id);
                $title->status = $status;
                $title->save();
            } else {
                $status = '0';
                $title = Title::find($id);
                $title->status = $status;
                $title->save();
            }
            return 'updated';
        }
        if ($tab_name =='color' && $id !="") {
            $color = new color();
            if ($status=='0') {
                $status = '1';
                $color = Color::find($id);
                $color->status = $status;
                $color->save();
            } else {
                $status = '0';
                $color = Color::find($id);
                $color->status = $status;
                $color->save();
            }
            return 'updated';
        }
        if ($tab_name =='key' && $id !="") {
            $key = new Key();
            if ($status=='0') {
                $status = '1';
                $key = Key::find($id);
                $key->status = $status;
                $key->save();
            } else {
                $status = '0';
                $key = Key::find($id);
                $key->status = $status;
                $key->save();
            }
            return 'updated';
        }
        if ($tab_name =='auction' && $id !="") {
            $auction = new Auction();
            if ($status=='0') {
                $status = '1';
                $auction = Auction::find($id);
                $auction->status = $status;
                $auction->save();
            } else {
                $status = '0';
                $auction = Auction::find($id);
                $auction->status = $status;
                $auction->save();
            }
            return 'updated';
        }
    }
    public function master_seriesadd(Request $request)
    {
        // dd($request->all());
        $data = [];
        if ($request->tab=="make") {
            $make_id = $request->model_id;
            $make = new Make;
            $data['make'] = Make::where('id', '=', $make_id)->get()->toArray(); 
            // dd($data['make']);
            foreach ($data['make'] as $make_record) {
                $make_id = $make_record['id'];
                $make_status = $make_record['status'];
                $model_id = $make_record['model_id'];
                if ($make_status=='0') {
                    dd("test1");
                    $data['model'] = VehicleModel::where('make_id', '=', $model_id)->get()->toArray();
                    // dd($data['model']);
                    foreach ($data['model'] as $model_record) {
                        $model_id = $model_record['id'];
                        $make_status = $model_record['status'];
                        if ($make_status=='0') {
                            // dd("1st");
                            $model = VehicleModel::find($model_id);
                            $model->status = '1';
                            $model->save();
                        }else{
                            // dd("2nd case");
                            $model = VehicleModel::find($model_id);
                            // dd($model);
                            $model->status = '0';
                            $model->save();
                        }
                    }
                    $make = Make::find($make_id);
                    $make->status = '1';
                    $make->save();

                } else {
                    dd("test2");
                    $make = Make::find($make_id);
                    $make->status = '0';
                    $make->save();
                }
            }


            // dd("make");
            // $model = new VehicleModel;
            // $model_id = $request->model_id;
            // $data['model'] = VehicleModel::where('id','=',$model_id)->get()->toArray();

            // foreach($data['model'] as $modelrecord){
        //     dd($modelrecord['id']);
            // }
            // dd($data['model']);
            // $output = view('master.make', $data)->render();
            // return $data['model'];
        }
        if ($request->tab=="model") {
            // dd("model");
            // dd($request->all());
            $series = new Series();
            $model_id = $request->model_id;
            $data['series'] = Series::where('model_id', '=', $model_id)->get();
            // dd($data['series']);
            return $data['series'];
        }
        // $output = view('master.make', $data)->render();
        // return Response($data['series']);
    }
}
