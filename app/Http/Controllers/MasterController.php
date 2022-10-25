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
use App\Models\ShippingState;
use App\Models\Vehicle;
use App\Models\Color;
use App\Models\Key;
use App\Models\Make;
use App\Models\MMS;
use App\Models\PickupLocation;
use App\Models\Series;
use App\Models\ShipperName;
use App\Models\VehicleStatus;
use App\Models\TitleType;
use App\Models\VehicleModel;
use App\Models\Site;
use App\Models\VehicleType;
use App\Models\Warehouse;

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

        $records = TitleType::all();
        $data['titletypes'] = $records;

        $records = ShipperName::all();
        $data['shippername'] = $records;


        $records = VehicleStatus::all();
        $data['vehiclestatus'] = $records;

        $records = PickupLocation::all();
        $data['pickuplocation'] = $records;

        $records = Site::all();
        $data['site'] = $records;

        $records = Warehouse::all();
        $data['warehouse'] = $records;

        $records = VehicleType::all();
        $data['vehicletype'] = $records;

        $notification = $this->Notification();
        return view($this->view . 'master', $data, $notification);
    }

    public function add_make(Request $request)
    {
        $data = [];
        $inputdata = $request->input();
        $tab_name = $request->tab ;
        $data = [
            'make_id' => $request->make,
            'model_id' => $request->model,
            'series_id' => $request->series,
            'status' => 1,
          ];
        MMS::Create($data);
        return 'success';
    }
    public function make(Request $request){
        $data = [];
        $tab = $request->tab;
        if($tab=="make"){
        $data['title'] ="Make";
        $data['placeholder'] ="Enter Make Name";
        $data['model'] = VehicleModel::all();
        $data['series'] = Series::all();
        $data['make'] = Make::all();
        $output = view('master.make',$data)->render();                     
        return Response($output);
        

        $tab = $request->id;
        $data['model'] = VehicleModel::with($tab);
        }
    }
    public function delete_master(Request $request)
    {
        $data = [];
        $inputdata = $request->input();
        $tab_name = $request->tab ;
        $id = $request->id;
        if ($tab_name =='company' && $id !="") {
            $data['deleted'] = Company::find($id)->delete();
        }
        if ($tab_name =='shippingcountries' && $id !="") {
            $data['deleted'] = ShippingCountry::find($id)->delete();
        }
        if ($tab_name =='shippingstates' && $id !="") {
            $data['deleted'] = ShippingState::find($id)->delete();
        }
        if ($tab_name =='loadingports' && $id !="") {
            $data['deleted'] = LoadingPort::find($id)->delete();
        }
        if ($tab_name =='destinationcountries' && $id !="") {
            $data['deleted'] = DestinationCountry::find($id)->delete();
        }
        if ($tab_name =='destinationport' && $id !="") {
            $data['deleted'] = DestinationPort::find($id)->delete();
        }
        if ($tab_name =='title' && $id !="") {
            $data['deleted'] = Title::find($id)->delete();
        }
        if ($tab_name =='model' && $id !="") {
            $data['deleted'] = VehicleModel::find($id)->delete();
        }
        if ($tab_name =='key' && $id !="") {
            $data['deleted'] = Key::find($id)->delete();
        }
        if ($tab_name =='color' && $id !="") {
            $data['deleted'] = Color::find($id)->delete();
        }
        if ($tab_name =='auction' && $id !="") {
            $data['deleted'] = Auction::find($id)->delete();
        }
        if ($tab_name =='pickuplocation' && $id !="") {
            $data['deleted'] = PickupLocation::find($id)->delete();
        }
        if ($tab_name =='site' && $id !="") {
            $data['deleted'] = Site::find($id)->delete();
        }
        if ($tab_name =='warehouse' && $id !="") {
            $data['deleted'] = Warehouse::find($id)->delete();
        }
        if ($tab_name =='status' && $id !="") {
            $data['deleted'] = Status::find($id)->delete();
        }
        if ($tab_name =='shippername' && $id !="") {
            $data['deleted'] = ShipperName::find($id)->delete();
        }
        if ($tab_name =='titletype' && $id !="") {
            $data['deleted'] = TitleType::find($id)->delete();
        }
        if ($tab_name =='shippment' && $id !="") {
            $data['deleted'] = Shipment::find($id)->delete();
        }
        if ($tab_name =='vehiclestatus' && $id !="") {
            $data['deleted'] = VehicleStatus::find($id)->delete();
        }
        
        return 'deleted';
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
        if ($tab=="vehiclestatus") {
            // dd($request->input());
            $data['title'] = "Update Vehicle Status";
            $data['key'] = VehicleStatus::where('id', '=', $id)->get()->toArray();
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
            if ($status=='0') {
                $status = '1';
                $company = Company::find($id);
            } else {
                $status = '0';
                $company = Company::find($id);
            }
            $company->status = $status;
            $company->save();
        }
        if ($tab_name =='shippingcountries' && $id !="") {
            if ($status=='0') {
                $status = '1';
                $shippingcountries = ShippingCountry::find($id);
            } else {
                $status = '0';
                $shippingcountries = ShippingCountry::find($id);
            }
            $shippingcountries->status = $status;
            $shippingcountries->save();
        }
        if ($tab_name =='state' && $id !="") {
            if ($status=='0') {
                $status = '1';
                $shippingstates = ShippingState::find($id);
            } else {
                $status = '0';
                $shippingstates = ShippingState::find($id);
            }
            $shippingstates->status = $status;
            $shippingstates->save();
        }
        if ($tab_name =='loadingports' && $id !="") {
            if ($status=='0') {
                $status = '1';
                $loadingports = LoadingPort::find($id);
            } else {
                $status = '0';
                $loadingports = LoadingPort::find($id);
            }
            $loadingports->status = $status;
            $loadingports->save();
        }
        if ($tab_name =='destinationcountries' && $id !="") {
            if ($status=='0') {
                $status = '1';
                $destinationcountries = DestinationCountry::find($id);
            } else {
                $status = '0';
                $destinationcountries = DestinationCountry::find($id);
            }
            $destinationcountries->status = $status;
            $destinationcountries->save();
        }
        if ($tab_name =='destinationport' && $id !="") {
            if ($status=='0') {
                $status = '1';
                $destinationport = DestinationPort::find($id);
            } else {
                $status = '0';
                $destinationport = DestinationPort::find($id);
            }
            $destinationport->status = $status;
            $destinationport->save();
        }
        if ($tab_name =='title' && $id !="") {
            $title = new Title();
            if ($status=='0') {
                $status = '1';
                $title = Title::find($id);
            } else {
                $status = '0';
                $title = Title::find($id);
            }
            $title->status = $status;
            $title->save();
        }
        if ($tab_name =='color' && $id !="") {
            $color = new color();
            if ($status=='0') {
                $status = '1';
                $color = Color::find($id);
            } else {
                $status = '0';
                $color = Color::find($id);
            }
            $color->status = $status;
            $color->save();
        }
        if ($tab_name =='key' && $id !="") {
            $key = new Key();
            if ($status=='0') {
                $status = '1';
                $key = Key::find($id);
            } else {
                $status = '0';
                $key = Key::find($id);
            }
            $key->status = $status;
            $key->save();
        }
        if ($tab_name =='auction' && $id !="") {
            $auction = new Auction();
            if ($status=='0') {
                $status = '1';
                $auction = Auction::find($id);
            } else {
                $status = '0';
                $auction = Auction::find($id);
            }
            $auction->status = $status;
            $auction->save();
        }
        if ($tab_name =='vehicletype' && $id !="") {
            if ($status=='0') {
                $status = '1';
                $vehicletype = VehicleType::find($id);
            } else {
                $status = '0';
                $vehicletype = VehicleType::find($id);
            }
            $vehicletype->status = $status;
            $vehicletype->save();
        }
        // issue aa raha kioun k table shippment ka nahi pata mujhy
        // if ($tab_name =='shippment' && $id !="") {
        //     if ($status=='0') {
        //         $status = '1';
        //         $shippment = Shipment::find($id);
        //     } else {
        //         $status = '0';
        //         $shippment = Shipment::find($id);
        //     }
        //     $shippment->status = $status;
        //     $shippment->save();
        // }
        if ($tab_name =='titletype' && $id !="") {
            $company = new Company();
            if ($status=='0') {
                $status = '1';
                $titletypes = TitleType::find($id);
            } else {
                $status = '0';
                $titletypes = TitleType::find($id);
            }
            $titletypes->status = $status;
            $titletypes->save();
        }
        if ($tab_name =='shippername' && $id !="") {
            if ($status=='0') {
                $status = '1';
                $shippername = ShipperName::find($id);
            } else {
                $status = '0';
                $shippername = ShipperName::find($id);
            }
            $shippername->status = $status;
            $shippername->save();
        }
        if ($tab_name =='status' && $id !="") {
            if ($status=='0') {
                $statuss = '1';
                $status = Status::find($id);
            } else {
                $statuss = '0';
                $status = Status::find($id);
            }
            $status->status = $statuss;
            $status->save();
        }
        if ($tab_name =='pickuplocation' && $id !="") {
            if ($status=='0') {
                $status = '1';
                $pickuplocation = PickupLocation::find($id);
            } else {
                $status = '0';
                $pickuplocation = PickupLocation::find($id);
            }
            $pickuplocation->status = $status;
            $pickuplocation->save();
        }
        if ($tab_name =='site' && $id !="") {
            // dd("testing");
            if ($status=='0') {
                $status = '1';
                $site = Site::find($id);
            } else {
                $status = '0';
                $site = Site::find($id);
            }
            $site->status = $status;
            $site->save();
        }
        if ($tab_name =='warehouse' && $id !="") {
            if ($status=='0') {
                $status = '1';
                $warehouse = Warehouse::find($id);
            } else {
                $statas = '0';
                $warehouse = Warehouse::find($id);
            }
            $warehouse->status = $statas;
            $warehouse->save();
        }
        return 'updated';
    }
    public function master_seriesadd(Request $request)
    {
        $data = [];
        if ($request->tab=="make") {
            $model = new VehicleModel();
            $model_id = $request->model_id;
            $data['model'] = VehicleModel::where('make_id', '=', $model_id)->get()->toArray();
            return $data['model'];
        }
        if ($request->tab=="model") {
            $series = new Series();
            $model_id = $request->model_id;
            $data['series'] = Series::where('model_id', '=', $model_id)->get();
            return $data['series'];
        }
    }
    
    public function showmodel(Request $request)
    {
        // dd($request->all());
        if ($request->tab=='warehouse') {
            $data = [];
            $tabname = $request->tab;
            $tab['tab'] = $tabname;
            $title['title'] ="Ware House";
            $data['placeholder'] ="Enter Key Name";
        }
        if ($request->tab=='site') {
            $data = [];
            $tabname = $request->tab;
            $tab['tab'] = $tabname;
            $title['title'] ="Site";
            $data['placeholder'] ="Enter Site Name";
        }
        if ($request->tab=='pickuplocation') {
            $data = [];
            $tabname = $request->tab;
            $tab['tab'] = $tabname;
            $title['title'] ="Pickup Location";
            $data['placeholder'] ="Enter pickuplocatio";
        }
        if ($request->tab=='vehiclestatus') {
            $data = [];
            $tabname = $request->tab;
            $tab['tab'] = $tabname;
            $title['title'] ="Status";
            $data['placeholder'] ="Enter Status";
        }
        if ($request->tab=='shippername') {
            $data = [];
            $tab['tab'] = $request->tab;
            $title['title'] ="Shipper Name";
            $data['placeholder'] ="Enter Shippername";
        }
        if ($request->tab=='titletypes') {
            $data = [];
            $tab['tab'] = $request->tab;
            $title['title'] ="Shipper Name";
            $data['placeholder'] ="Enter Title Types";
        }
        if ($request->tab=='shippment') {
            $data = [];
            $tab['tab'] = $request->tab;
            $title['title'] ="Shippment";
            $data['placeholder'] ="Enter Shippments";
        }
        if ($request->tab=='vehicletype') {
            $data = [];
            $tab['tab'] = $request->tab;
            $title['title'] ="Vehicle Types";
            $data['placeholder'] ="Enter Vehicle Types";
        }
        if ($request->tab=='auction') {
            $data = [];
            $tab['tab'] = $request->tab;
            $title['title'] ="Auction";
            $data['placeholder'] ="Enter Auction";
        }
        if ($request->tab=='key') {
            $data = [];
            $tab['tab'] = $request->tab;
            $title['title'] ="Key";
            $data['placeholder'] ="Enter Key";
        }
        if ($request->tab=='title') {
            $data = [];
            $tab['tab'] = $request->tab;
            $title['title'] ="Title";
            $data['placeholder'] ="Enter Title";
        }
        if ($request->tab=='color') {
            $data = [];
            $tab['tab'] = $request->tab;
            $title['title'] ="Title";
            $data['placeholder'] ="Enter Color";
        }
        if ($request->tab=='model') {
            $data = [];
            $tab['tab'] = $request->tab;
            $title['title'] ="Model";
        }
        if ($request->tab=='destinationport') {
            $data = [];
            $tab['tab'] = $request->tab;
            $title['title'] ="Destination Port";
            $data['placeholder'] ="Enter Destination Port";
        }
        if ($request->tab=='destinationcountries') {
            $data = [];
            $tab['tab'] = $request->tab;
            $title['title'] ="Destination Countries";
            $data['placeholder'] ="Enter Destination Countries";
        }
        if ($request->tab=='loadingports') {
            $data = [];
            $tab['tab'] = $request->tab;
            $title['title'] ="Loading Ports";
            $data['placeholder'] ="Enter Loading Ports";
        }
        if ($request->tab=='shippingstates') {
            $data = [];
            $tab['tab'] = $request->tab;
            $title['title'] ="Shipping States";
            $data['placeholder'] ="Enter Shipping States";
        }
        if ($request->tab=='shippingcountries') {
            $data = [];
            $tab['tab'] = $request->tab;
            $title['title'] ="Shipping Countries";
            $data['placeholder'] ="Enter Shipping Countries";
        }
        if ($request->tab=='company') {
            $data = [];
            $tab['tab'] = $request->tab;
            $title['title'] ="Company";
            $data['placeholder'] ="Enter Company";
        }
        $output = view('master.common', $title, $tab, $data)->render();
        return Response($output);
    }

    public function save(Request $request)
    {
        $length  = count($request->addmore);
        if ($request->tab=='warehouse') {
            for ($i=0; $i<$length; $i++) {
                $data['record_exist'] = Warehouse::where('name', '=', $request->addmore[$i])
                ->get()->toArray();
                if (!$data['record_exist']) {
                    $data = [
                        'name' => $request->addmore[$i],
                      ];
                    Warehouse::Create($data);
                }
            }
        }
        if ($request->tab=='site') {
            for ($i=0; $i<$length; $i++) {
                $data['record_exist'] = Site::where('name', '=', $request->addmore[$i])
                ->get()->toArray();
                if (!$data['record_exist']) {
                    $data = [
                        'name' => $request->addmore[$i],
                      ];
                    Site::Create($data);
                }
            }
        }
        if ($request->tab=='pickuplocation') {
            for ($i=0; $i<$length; $i++) {
                $data['record_exist'] = PickupLocation::where('name', '=', $request->addmore[$i])
                ->get()->toArray();
                if (!$data['record_exist']) {
                    $data = [
                        'name' => $request->addmore[$i],
                      ];
                    PickupLocation::Create($data);
                }
            }
        }
        if ($request->tab=='vehiclestatus') {
            for ($i=0; $i<$length; $i++) {
                $data['record_exist'] = VehicleStatus::where('status_name', '=', $request->addmore[$i])
                ->get()->toArray();
                if (!$data['record_exist']) {
                    $data = [
                        'status_name' => $request->addmore[$i],
                      ];
                      VehicleStatus::Create($data);
                }
            }
        }
        if ($request->tab=='shippername') {
            for ($i=0; $i<$length; $i++) {
                $data['record_exist'] = ShipperName::where('name', '=', $request->addmore[$i])
                ->get()->toArray();
                if (!$data['record_exist']) {
                    $data = [
                        'name' => $request->addmore[$i],
                      ];
                    ShipperName::Create($data);
                }
            }
        }
        if ($request->tab=='titletypes') {
            for ($i=0; $i<$length; $i++) {
                $data['record_exist'] = TitleType::where('name', '=', $request->addmore[$i])
                ->get()->toArray();
                if (!$data['record_exist']) {
                    $data = [
                        'name' => $request->addmore[$i],
                      ];
                    TitleType::Create($data);
                }
            }
        }
        // there is no table of shippment
        // if ($request->tab=='shippment') {
        //     for($i=0; $i<$length; $i++){
        //         $data['record_exist'] = Shipment::where('company_name', '=', $request->addmore[$i])
        //         ->get()->toArray();
        //         if(!$data['record_exist']){
        //             $data = [
        //                 'company_name' => $request->addmore[$i],
        //               ];
        //               Shipment::Create($data);
        //         }
        //     }
        
        // }
        if ($request->tab=='vehicletype') {
            for ($i=0; $i<$length; $i++) {
                $data['record_exist'] = VehicleType::where('vehicle_type', '=', $request->addmore[$i])
                ->get()->toArray();
                if (!$data['record_exist']) {
                    $data = [
                        'vehicle_type' => $request->addmore[$i],
                      ];
                    VehicleType::Create($data);
                }
            }
        }
        if ($request->tab=='auction') {
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
        }
        if ($request->tab=='key') {
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
        }
        if ($request->tab=='title') {
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
        }
        if ($request->tab=='color') {
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
        }
        // make_id error during insertion in model
        // if ($request->tab=='model') {
        //     for($i=0; $i<$length; $i++){
        //         $data['record_exist'] = VehicleModel::where('name', '=', $request->addmore[$i])
        //         ->get()->toArray();
        //         if(!$data['record_exist']){
        //             $data = [
        //                 'name' => $request->addmore[$i],
        //               ];
        //               VehicleModel::Create($data);
        //         }
        //     }
        
        // }
        if ($request->tab=='destinationport') {
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
        }
        if ($request->tab=='destinationcountries') {
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
        }
        if ($request->tab=='loadingports') {
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
        }
        if ($request->tab=='shippingstates') {
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
        if ($request->tab=='shippingcountries') {
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
        if ($request->tab=='company') {
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
        }
        if ($request->tab=='vehiclestatus') {
            for ($i=0; $i<$length; $i++) {
                $data['record_exist'] = VehicleStatus::where('status_name', '=', $request->addmore[$i])
                ->get()->toArray();
                if (!$data['record_exist']) {
                    $data = [
                        'status_name' => $request->addmore[$i],
                      ];
                    Company::Create($data);
                }
            }
        }
        
        return 'success';
    }
}
