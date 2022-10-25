<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Key;
use App\Models\MMS;
use App\Models\Make;
use App\Models\Site;
use App\Models\User;
use App\Models\Color;
// use App\Models\State;
use App\Models\Title;
use App\Models\Series;
use App\Models\Auction;
use App\Models\Company;
use App\Models\Country;
use App\Models\State;
// use App\Models\Status;
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
use Illuminate\Http\Request;
use App\Models\ShippingState;
use App\Models\VehicleStatus;
use App\Models\PickupLocation;
use App\Models\DestinationPort;
use App\Models\ShippingCountry;

use App\Models\DestinationCountry;

use App\Http\Controllers\Controller;

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
        $data['companies'] = $records;
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
        $records = ContainerSize::all();
        $data['containersize'] = $records;
        $records = ShipmentLine::all();
        $data['shipmentlines'] = $records;
        $records = ShipmentStatus::all();
        $data['shipmentstatus'] = $records;
        $records = ContainerType::all();
        $data['containertype'] = $records;

        $data['loading_countries'] = ShippingCountry::with('state.loading_ports')->get()->toArray();
        $data['Vehicle_mms'] = Make::with('model.series')->get()->toArray();

        // $data['states_countries'] = State::with('country')->where('status','1')->get();
        // return $data['Vehicle_mms'];
        $notification = $this->Notification();
        return view($this->view . 'master', $data, $notification);
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
        if ($tab_name =='companies' && $id !="") {
            $data['deleted'] = Company::find($id)->delete();
        }
        if ($tab_name =='shippingcountries' && $id !="") {
            $data['deleted'] = ShippingCountry::find($id)->delete();
        }
        if ($tab_name =='shippingstates' && $id !="") {
            $data['deleted'] = ShippingState::find($id)->delete();
        }
        if ($tab_name =='loadingport' && $id !="") {
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
        if ($tab_name =='shipmentstatus' && $id !="") {
            $data['deleted'] = ShipmentStatus::find($id)->delete();
        }
        if ($tab_name =='shipmentlines' && $id !="") {
            $data['deleted'] = ShipmentLine::find($id)->delete();
        }
        if ($tab_name =='containertype' && $id !="") {
            $data['deleted'] = ContainerType::find($id)->delete();
        }
        if ($tab_name =='containersize' && $id !="") {
            $data['deleted'] = ContainerSize::find($id)->delete();
        }
        return 'deleted';
    }

    public function update_master(Request $request)
    {
        // dd($request->input());
        $data = [];
        $tab = $request->tab;
        $id  = $request->id;
        if ($tab=="companies") {
            $data['title'] = "Update Company";
            $data['record'] = Company::where('id', '=', $id)->get()->toArray();
        }
        if ($tab=="shippingcountries") {
            $data['title'] = "Update Shipping Countries";
            $data['record'] = ShippingCountry::where('id', '=', $id)->get()->toArray();
        }
        if ($tab=="shippingstates") {
            $data['title'] = "Update Shipping States";
            $data['record'] = ShippingState::where('id', '=', $id)->get()->toArray();
        }
        if ($tab=="loadingport") {
            // dd($request->input());
            $data['title'] = "Update Loading Ports";
            $data['record'] = LoadingPort::where('id', '=', $id)->get()->toArray();
        }
        if ($tab=="destinationcountries") {
            // dd($request->input());
            $data['title'] = "Update Destination Countries";
            $data['record'] = DestinationCountry::where('id', '=', $id)->get()->toArray();
        }
        if ($tab=="destinationport") {
            // dd($request->input());
            $data['title'] = "Update Destination Port";
            $data['record'] = DestinationPort::where('id', '=', $id)->get()->toArray();
        }
        if ($tab=="title") {
            $data['title'] = "Update Title";
            $data['record'] = Title::where('id', '=', $id)->get()->toArray();
        }
        if ($tab=="auction") {
            // dd($request->input());
            $data['title'] = "Update Auction";
            $data['record'] = Auction::where('id', '=', $id)->get()->toArray();
        }
        if ($tab=="model") {
            // dd($request->input());
            $data['title'] = "Update model";
            $data['record'] = VehicleModel::where('id', '=', $id)->get()->toArray();
        }
        // if ($tab=="make") {
        //     // dd($request->input());
        //     $data['title'] = "Update make";
        //     $data['record'] = Make::where('id', '=', $id)->get()->toArray();
        // }
        if ($tab=="color") {
            // dd($request->input());
            $data['title'] = "Update color";
            $data['record'] = Color::where('id', '=', $id)->get()->toArray();
        }
        if ($tab=="key") {
            // dd($request->input());
            $data['title'] = "Update key";
            $data['record'] = Key::where('id', '=', $id)->get()->toArray();
        }
        if ($tab=="vehiclestatus") {
            // dd($request->input());
            $data['title'] = "Update Vehicle Status";
            $data['record'] = VehicleStatus::where('id', '=', $id)->get()->toArray();
        }
        if ($tab=="shipmentstatus") {
            // dd($request->input());
            $data['title'] = "Update Shipment Status";
            $data['record'] = ShipmentStatus::where('id', '=', $id)->get()->toArray();
        }
        if ($tab=="shipmentlines") {
            // dd($request->input());
            $data['title'] = "Update Shipment Lines";
            $data['record'] = ShipmentLine::where('id', '=', $id)->get()->toArray();
        }
        if ($tab=="containertype") {
            // dd($request->input());
            $data['title'] = "Update Container Type";
            $data['record'] = ContainerType::where('id', '=', $id)->get()->toArray();
        }
        if ($tab=="containersize") {
            // dd($request->input());
            $data['title'] = "Update Container Size";
            $data['record'] = ContainerSize::where('id', '=', $id)->get()->toArray();
        }
        if ($tab=="titletype") {
            // dd($request->input());
            $data['title'] = "Update Title Type";
            $data['record'] = TitleType::where('id', '=', $id)->get()->toArray();
        }
        if ($tab=="shippername") {
            // dd($request->input());
            $data['title'] = "Update Shippername";
            $data['record'] = ShipperName::where('id', '=', $id)->get()->toArray();
        }
        if ($tab=="vehiclestatus") {
            // dd($request->input());
            $data['title'] = "Update Vehicle Status";
            $data['record'] = VehicleStatus::where('id', '=', $id)->get()->toArray();
        }
        if ($tab=="pickuplocation") {
            // dd($request->input());
            $data['title'] = "Update Pickup Location";
            $data['record'] = PickupLocation::where('id', '=', $id)->get()->toArray();
        }
        if ($tab=="site") {
            // dd($request->input());
            $data['title'] = "Update Site";
            $data['record'] = Site::where('id', '=', $id)->get()->toArray();
        }
        if ($tab=="warehouse") {
            $data['title'] = "Update Warehouse";
            $data['record'] = Warehouse::where('id', '=', $id)->get()->toArray();
        }
        $output = view('master.common', $data)->render();
        return Response($output);
    }










    public function update_save(Request $request)
    {
        // dd($request->all());
        $data = [];
        $tab_name = $request->tab ;
        $id = $request->id;
        $name = $request->name;

        if ($tab_name =='companies' && $name !="" && $id !="") {
            $companies = new Company();
            $companies = Company::find($id);
            $companies->name = $request['name'];
            $companies->save();
        }
        if ($tab_name =='shippingcountries') {
            $shippingcountry = new ShippingCountry();
            $shippingcountry = ShippingCountry::find($id);
            $shippingcountry->name = $name;
            $shippingcountry->save();
        }
        if ($tab_name =='shippingstates') {
            $sta = new ShippingState();
            $shippingstates = ShippingState::find($id);
            $shippingstates->name = $name;
            $shippingstates->save();
        }
        if ($tab_name =='loadingport') {
            $loadingport = new LoadingPort();
            $loadingport = LoadingPort::find($id);
            $loadingport->name = $name;
            $loadingport->save();
        }
        if ($tab_name =='destinationcountries') {
            $destinationcountries = new DestinationCountry();
            $destinationcountries = DestinationCountry::find($id);
            $destinationcountries->name = $name;
            $destinationcountries->save();
        }
        if ($tab_name =='destinationport') {
            $destinationport = new DestinationPort();
            $destinationport = DestinationPort::find($id);
            $destinationport->name = $name;
            $destinationport->save();
        }
        if ($tab_name =='title') {
            $title = new Title();
            $title = $title::find($id);
            $title->name = $name;
            $title->save();
        }
        if ($tab_name =='color') {
            $color = new Color();
            $color = $color::find($id);
            $color->name = $name;
            $color->save();
        }
        if ($tab_name =='auction') {
            $auction = new Auction();
            $auction = $auction::find($id);
            $auction->name = $name;
            $auction->save();
        }
        if ($tab_name =='make') {
            $make = new Make();
            $make = $make::find($id);
            $make->name = $name;
            $make->save();
        }
        if ($tab_name =='model') {
            $model = new VehicleModel();
            $model = $model::find($id);
            $model->name = $name;
            $model->save();
        }
        if ($tab_name =='key') {
            $key = new Key();
            $key = $key::find($id);
            $key->name = $name;
            $key->save();
        }
        if ($tab_name =='shipmentstatus') {
            $key = new ShipmentStatus();
            $key = $key::find($id);
            $key->name = $name;
            $key->save();
        }
        if ($tab_name =='shipmentlines') {
            $key = new ShipmentLine();
            $key = $key::find($id);
            $key->name = $name;
            $key->save();
        }
        if ($tab_name =='containertype') {
            $key = new ContainerType();
            $key = $key::find($id);
            $key->name = $name;
            $key->save();
        }
        if ($tab_name =='containersize') {
            $key = new ContainerSize();
            $key = $key::find($id);
            $key->name = $name;
            $key->save();
        }
        if ($tab_name =='titletype') {
            $key = new TitleType();
            $key = $key::find($id);
            $key->name = $name;
            $key->save();
        }
        if ($tab_name =='shippername') {
            $key = new ShipperName();
            $key = $key::find($id);
            $key->name = $name;
            $key->save();
        }
        if ($tab_name =='vehiclestatus') {
            $key = new VehicleStatus();
            $key = $key::find($id);
            $key->name = $name;
            $key->save();
        }
        if ($tab_name =='pickuplocation') {
            $key = new PickupLocation();
            $key = $key::find($id);
            $key->name = $name;
            $key->save();
        }
        if ($tab_name =='site') {
            $key = new Site();
            $key = $key::find($id);
            $key->name = $name;
            $key->save();
        }
        if ($tab_name =='warehouse') {
            $key = new Warehouse();
            $key = $key::find($id);
            $key->name = $name;
            $key->save();
        }
        
        return 'updated';
    }
    public function master_status(Request $request)
    {
        // dd($request->input());
        $data = [];
        $tab_name = $request->tab ;
        $id = $request->id;
        $status = $request->status;
        if ($tab_name =='companies' && $id !="") {
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
       

        if ($tab_name =='loading_ports' && $id !="") {
            if ($status=='0') {
                $status = '1';
                $loadingPort = loadingPort::find($id);
            } else {
                $status = '0';
                $loadingPort = loadingPort::find($id);
            }
            $loadingPort->status = $status;
            $loadingPort->save();
        }

        if ($tab_name =='loading_state' && $id !="") {
            if ($status=='0') {
                $status = '1';
                $shippingcountries = State::find($id);
            } else {
                $status = '0';
                $shippingcountries = State::find($id);
            }
            $shippingcountries->status = $status;
            $shippingcountries->save();
        }

        

        if ($tab_name =='country' && $id !="") {
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
        // if ($tab_name =='status' && $id !="") {
        //     if ($status=='0') {
        //         $statuss = '1';
        //         $status = Status::find($id);
        //     } else {
        //         $statuss = '0';
        //         $status = Status::find($id);
        //     }
        //     $status->status = $statuss;
        //     $status->save();
        // }
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
                $status = '0';
                $warehouse = Warehouse::find($id);
            }
            $warehouse->status = $status;
            $warehouse->save();
        }
        if ($tab_name =='containersize' && $id !="") {
            if ($status=='0') {
                $status = '1';
                $containersize = ContainerSize::find($id);
            } else {
                $status = '0';
                $containersize = ContainerSize::find($id);
            }
            $containersize->status = $status;
            $containersize->save();
        }
        if ($tab_name =='shipmentlines' && $id !="") {
            if ($status=='0') {
                $status = '1';
                $shipmentlines = ShipmentLine::find($id);
            } else {
                $status = '0';
                $shipmentlines = ShipmentLine::find($id);
            }
            $shipmentlines->status = $status;
            $shipmentlines->save();
        }
        if ($tab_name =='shipmentstatus' && $id !="") {
            if ($status=='0') {
                $status = '1';
                $shipmentstatus = shipmentstatus::find($id);
            } else {
                $status = '0';
                $shipmentstatus = ShipmentStatus::find($id);
            }
            $shipmentstatus->status = $status;
            $shipmentstatus->save();
        }
        if ($tab_name =='containertype' && $id !="") {
            // dd($request->all());
            if ($status=='0') {
                $status = '1';
                $containertype = ContainerType::find($id);
            } else {
                $status = '0';
                $containertype = ContainerType::find($id);
            }
            $containertype->status = $status;
            $containertype->save();
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
            $title['title'] ="Vehicle Status";
            $data['placeholder'] ="Enter Vehicle Status";
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
        if ($request->tab=='loadingport') {
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
        if ($request->tab=='companies') {
            $data = [];
            $tab['tab'] = $request->tab;
            $title['title'] ="Company";
            $data['placeholder'] ="Enter Company";
        }
        if ($request->tab=='containersize') {
            $data = [];
            $tab['tab'] = $request->tab;
            $title['title'] ="containersize";
            $data['placeholder'] ="Enter Container Size";
        }
        if ($request->tab=='shipmentlines') {
            $data = [];
            $tab['tab'] = $request->tab;
            $title['title'] ="shipmentlines";
            $data['placeholder'] ="Enter Shipment Lines";
        }
        if ($request->tab=='containertype') {
            $data = [];
            $tab['tab'] = $request->tab;
            $title['title'] ="containertype";
            $data['placeholder'] ="Enter Container Type";
        }
        if ($request->tab=='shipmentstatus') {
            $data = [];
            $tab['tab'] = $request->tab;
            $title['title'] ="Shipment Status";
            $data['placeholder'] ="Enter Shipment Status";
        }

        $output = view('master.common', $title, $tab, $data)->render();
        return Response($output);
    }

    public function save(Request $request)
    {
        // dd($request->all());
        $length  = count($request->addmore);
        if ($request->tab=='containersize') {
            for ($i=0; $i<$length; $i++) {
                $data['record_exist'] = ContainerSize::where('name', '=', $request->addmore[$i])
                ->get()->toArray();
                if (!$data['record_exist']) {
                    $data = [
                        'name' => $request->addmore[$i],
                      ];
                      ContainerSize::Create($data);
                }
            }
        }
        if ($request->tab=='shipmentlines') {
            for ($i=0; $i<$length; $i++) {
                $data['record_exist'] = ShipmentLine::where('name', '=', $request->addmore[$i])
                ->get()->toArray();
                if (!$data['record_exist']) {
                    $data = [
                        'name' => $request->addmore[$i],
                      ];
                      ShipmentLine::Create($data);
                }
            }
        }
        if ($request->tab=='containertype') {
            for ($i=0; $i<$length; $i++) {
                $data['record_exist'] = ContainerType::where('name', '=', $request->addmore[$i])
                ->get()->toArray();
                if (!$data['record_exist']) {
                    $data = [
                        'name' => $request->addmore[$i],
                      ];
                      ContainerType::Create($data);
                }
            }
        }
        if ($request->tab=='shipmentstatus') {
            for ($i=0; $i<$length; $i++) {
                $data['record_exist'] = ShipmentStatus::where('name', '=', $request->addmore[$i])
                ->get()->toArray();
                if (!$data['record_exist']) {
                    $data = [
                        'name' => $request->addmore[$i],
                      ];
                      ShipmentStatus::Create($data);
                }
            }
        }
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
                $data['record_exist'] = VehicleStatus::where('name', '=', $request->addmore[$i])
                ->get()->toArray();
                if (!$data['record_exist']) {
                    $data = [
                        'name' => $request->addmore[$i],
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
        if ($request->tab=='loadingport') {
            for ($i=0; $i<$length; $i++) {
                $data['record_exist'] = LoadingPort::where('name', '=', $request->addmore[$i])
                ->get()->toArray();
                if (!$data['record_exist']) {
                    $data = [
                        'name' => $request->addmore[$i],
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
        }
        if ($request->tab=='companies') {
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
                $data['record_exist'] = VehicleStatus::where('name', '=', $request->addmore[$i])
                ->get()->toArray();
                if (!$data['record_exist']) {
                    $data = [
                        'name' => $request->addmore[$i],
                      ];
                    Company::Create($data);
                }
            }
        }
        
        return 'success';
    }
}
