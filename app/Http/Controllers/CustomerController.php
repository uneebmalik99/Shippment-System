<?php

namespace App\Http\Controllers;

use App\Exports\UsersExport;
use App\Http\Controllers\Controller;
use App\Models\BillingParty;
use App\Models\Consignee;
use App\Models\CustomerDocument;
use App\Models\Location;
use App\Models\Notification;
use App\Models\Quotation;
use App\Models\Shipper;
use App\Models\User;
use App\Models\Vehicle;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Facades\Excel;
use Yajra\Datatables\Datatables;

class CustomerController extends Controller
{
    private $type = "Customers";
    private $singular = "customer";
    private $plural = "Customers";
    private $view = "customer.";
    private $db_key = "id";
    private $user = [];
    private $perpage = 100;
    private $directory = "customer_images";
    private $action = "/admin/customers";

    public function Notification()
    {

        $data['notification'] = Notification::with('user')->paginate($this->perpage);
        $data['location'] = Location::all()->toArray();
        // return $data['notification'];
        // dd(\Carbon\Carbon::now());
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
            $unread = Notification::with('user')->where('status', '0')->paginate($this->perpage);
            $data['notification_count'] = count($unread);
        } else {
            $data['notification'] = "asda";
        }

        // dd($data);
        return $data;
    }

    public function index(Request $request)
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
        $data['records'] = User::where('role_id', 4)->paginate($this->perpage);
        // $records = User::where('role_id', 4)->paginate($this->perpage);
        // foreach ($records as $record) {
        //     $date = $record['created_at']->toDateString();
        //     $dates[] = $date;
        // }
        // $i = 0;
        // foreach ($dates as $date) {
        //     $records[$i]['created_at'] = $date;
        //     $data['records'][] = $records;
        //     $i++;
        // }

        $data['active_customer'] = User::where('role_id', 4)->where('status', '1')->get()->count();

        $data['Inactive_customer'] = User::where('role_id', 4)->where('status', '0')->get()->count();

        $Obj = new User;
        $data['inactive'] = $Obj->where('status', '0')->get();
        $data['active'] = $Obj->where('status', '1')->get();

        $lastweekshipper = Shipper::select('*')
            ->whereBetween('created_at',
                [Carbon::now()->subWeek()->startOfWeek(), Carbon::now()->subWeek()->endOfWeek()]
            )->get()->count();

        $currentweekshipper = Shipper::select("*")
            ->whereBetween('created_at',
                [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()]
            )
            ->get()->count();
        if ($lastweekshipper > 0) {
            $diff = $currentweekshipper - $lastweekshipper;
            $data['lastweekanalysis'] = ($diff / $lastweekshipper) * 100;

        } else {
            $data['lastweekanalysis'] = 100;
        }
        $lastweekconsignee = Consignee::select('*')
            ->whereBetween('created_at',
                [Carbon::now()->subWeek()->startOfWeek(), Carbon::now()->subWeek()->endOfWeek()]
            )->get()->count();

        $currentweekconsignee = Consignee::select("*")
            ->whereBetween('created_at',
                [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()]
            )
            ->get()->count();
        // dd($lastweekconsignee);

        if ($lastweekconsignee > 0) {

            $differ = $currentweekconsignee - $lastweekconsignee;
            $data['lastweekconsigneeanalysis'] = ($differ / $lastweekconsignee) * 100;
        } else {
            $data['lastweekconsigneeanalysis'] = 100;
        }

        $data['shipper'] = Shipper::all();
        $data['consignees'] = Consignee::all();
        return view($this->view . 'list', $data, $notification);
    }

    public function create(Request $request)
    {

        $data = [];
        $action = url($this->action . '/create');
        $data = [
            "page_title" => $this->plural . " create",
            "page_heading" => $this->plural . ' create',
            "breadcrumbs" => array("dashboard" => "Dashboard", "#" => $this->plural . " create"),
            "action" => $action,
            "module" => ['type' => $this->type,
                'type' => $this->type,
                'singular' => $this->singular,
                'plural' => $this->plural,
                'view' => $this->view,
                'db_key' => $this->db_key,
                'action' => $this->action,
                'page' => 'create',
                'button' => 'Create',
            ],
        ];

        if ($request->ajax()) {
            $tab = $request->tab;
            $data['location'] = Location::all()->toArray();
            $output = view('layouts.customer_create.' . $tab, $data)->render();
            return Response($output);
        }

        if ($request->isMethod('post')) {
            $record = $request->all();
            $Obj = new User;
            $result = $Obj->create($record);
            return redirect($this->action)->with('success', 'Vehicle addedd successfully.');

        }
        $notification = $this->Notification();
        return view($this->view . 'create_edit', $data, $notification);
    }

    public function edit(Request $request, $id = null)
    {

        $data['documents'] = CustomerDocument::with('user')->where('user_id', $id)->get();
        $output = view('layouts.customer.customer_edit', $data)->render();
        return Response($output);
    }

    public function customerUpdate(Request $req)
    {

        $image = $req->file('images');
        // return $image[0]['name'];
        $file = $req->file('user_file');
        $file_id = $req->file_id;
        $data = $req->all();
        unset($data['file_id']);
        unset($data['user_file']);

        if ($image) {
            foreach ($image as $images) {
                $filename = Storage::putFile($this->directory, $images);
                $images->move(public_path($this->directory), $filename);
                $data['user_image'] = $filename;

                unset($data['images']);
            }

            $Obj = User::find($req->id);
            $Obj->update($data);
        } else {
            unset($data['images']);
            $Obj = User::find($req->id);
            $Obj->update($data);

        }

        if ($file) {
            foreach ($file as $files) {
                $file_name = time() . '.' . $files->extension();
                $docname = Storage::putFile($this->directory, $files);
                $documents['file'] = $docname;
                $documents['thumbnail'] = $file_name;
                $files->move(public_path($this->directory), $docname);
            }
            $Obj = CustomerDocument::find($file_id);
            $Obj->update($documents);
            // return '0';

        }
        $success = 'Customer Updated Successfully!';
        return $success;

    }

    public function delete($id = null)
    {
        $customer = User::find($id);
        $customer->delete();
        return back()->with('deleted', 'Customer Deleted Successfully!');
    }

    public function ChangeStatus($id)
    {

        $customer = User::find($id);
        if ($customer->status == '1') {

            $customer->status = '0';
            $customer->save();
        } else {

            $customer->status = '1';
            $customer->save();

        }
        $message = "Status Updated Successfully";
        return $message;
    }

    public function profile($id)
    {
        $action = url($this->action . '/profile/');
        $data = [
            'user' => User::find($id)->toArray(),
            "page_title" => "Profile " . $this->singular,
            "page_heading" => "Profile " . $this->singular,
            "button_text" => "Update ",
            "breadcrumbs" => array("dashboard" => "Dashboard", "#" => $this->plural . " List"),
            'action' => $action,
            "module" => ['type' => $this->type,
                'type' => $this->type,
                'singular' => $this->singular,
                'plural' => $this->plural,
                'view' => $this->view,
                'db_key' => $this->db_key,
                'action' => $this->action,
                'page' => 'profile',
                'button' => 'Update',
            ],
        ];

        $all_vehicles = Vehicle::all()->count();

        $customer_vehicles = Vehicle::where('added_by_user', $id)->count();
        $CustomerVehicles_value = Vehicle::get()->sum('value');
        if ($all_vehicles != 0) {
            $customer_vehicles_percentage = ($customer_vehicles / $all_vehicles) * 100;
            $data['customer_vehicles_percentage'] = round($customer_vehicles_percentage);
        } else {
            $data['customer_vehicles_percentage'] = 0;
        }
        $data['customer_vehicles'] = $customer_vehicles;
        $data['allVehicles_value'] = $CustomerVehicles_value;

        $onhand = Vehicle::where('status', '1')->orwhere('added_by_user', $id);
        $onhand_count = $onhand->count();
        $onhand_value = $onhand->sum('value');
        $data['onhand_count'] = $onhand_count;
        $data['onhand_value'] = $onhand_value;
        if ($all_vehicles != 0) {
            $onhand_count_percentage = ($onhand_count / $all_vehicles) * 100;
            $data['onhand_count_percentage'] = round($onhand_count_percentage);
        } else {
            $data['onhand_count_percentage'] = 0;
        }

        $dispatch = Vehicle::where('status', '2')->orwhere('added_by_user', $id);
        $dispatch_count = $dispatch->count();
        $dispatch_value = $dispatch->sum('value');
        $data['dispatch_count'] = $dispatch_count;
        $data['dispatch_value'] = $dispatch_value;
        if ($all_vehicles != 0) {
            $dispatch_count_percentage = ($dispatch_count / $all_vehicles) * 100;
            $data['dispatch_count_percentage'] = round($dispatch_count_percentage);
        } else {
            $data['dispatch_count_percentage'] = 0;
        }

        $manifest = Vehicle::where('status', '3')->orwhere('added_by_user', $id);
        $manifest_count = $manifest->count();
        $manifest_value = $manifest->sum('value');
        $data['manifest_count'] = $manifest_count;
        $data['manifest_value'] = $manifest_value;
        if ($all_vehicles != 0) {
            $manifest_count_percentage = ($manifest_count / $all_vehicles) * 100;
            $data['manifest_count_percentage'] = round($manifest_count_percentage);
        } else {
            $data['manifest_count_percentage'] = 0;
        }

        $shipped = Vehicle::where('status', '4')->orwhere('added_by_user', $id);
        $shipped_count = $shipped->count();
        $shipped_value = $shipped->sum('value');
        $data['shipped_count'] = $shipped_count;
        $data['shipped_value'] = $shipped_value;
        if ($all_vehicles != 0) {
            $shipped_count_percentage = ($shipped_count / $all_vehicles) * 100;
            $data['shipped_count_percentage'] = round($shipped_count_percentage);
        } else {
            $data['shipped_count_percentage'] = 0;
        }

        $arrived = Vehicle::where('status', '5')->orwhere('added_by_user', $id);
        $arrived_count = $arrived->count();
        $arrived_value = $arrived->sum('value');
        $data['arrived_count'] = $arrived_count;
        $data['arrived_value'] = $arrived_value;
        if ($all_vehicles != 0) {
            $arrived_count_percentage = ($arrived_count / $all_vehicles) * 100;
            $data['arrived_count_percentage'] = round($arrived_count_percentage);
        } else {
            $data['arrived_count_percentage'] = 0;
        }

        $posted = Vehicle::where('status', '6')->orwhere('added_by_user', $id);
        $posted_count = $posted->count();
        $posted_value = $posted->sum('value');
        $data['posted_count'] = $posted_count;
        $data['posted_value'] = $posted_value;
        if ($all_vehicles != 0) {
            $posted_count_percentage = ($posted_count / $all_vehicles) * 100;
            $data['posted_count_percentage'] = round($posted_count_percentage);
        } else {
            $data['posted_count_percentage'] = 0;
        }

        $booked = Vehicle::where('status', '7')->orwhere('added_by_user', $id);
        $booked_count = $booked->count();
        $booked_value = $booked->sum('value');
        $data['booked_count'] = $booked_count;
        $data['booked_value'] = $booked_value;
        if ($all_vehicles != 0) {
            $booked_count_percentage = ($booked_count / $all_vehicles) * 100;
            $data['booked_count_percentage'] = round($booked_count_percentage);
        } else {
            $data['booked_count_percentage'] = 0;
        }

        // return $data['records'];

        $notification = $this->Notification();
        return view($this->view . 'profile', $data, $notification);
    }

    public function search(Request $request)
    {
        if ($request->ajax()) {
            $table = "";
            $page = "";
            $total = User::where('role_id', 4)->toArray();
            $records = new User;
            if ($request->search) {
                $records = $records->where('customer_name', 'LIKE', '%' . $request->search . "%")
                    ->orWhere('lead', 'LIKE', '%' . $request->search . "%")
                    ->orWhere('level', 'LIKE', '%' . $request->search . "%")
                    ->orWhere('main_phone', 'LIKE', '%' . $request->search . "%")
                    ->orWhere('address', 'LIKE', '%' . $request->search . "%")
                    ->orWhere('status', 'LIKE', '%' . $request->search . "%")
                    ->orWhere('zip_code', 'LIKE', '%' . $request->search . "%");
            }

            if ($request->pagination) {
                $this->perpage = $request->pagination;
                $records = $records->paginate($this->perpage);
            }
            return Response('adasdasdd');

            if ($records) {
                $i = 1;
                foreach ($records as $val) {
                    if ($val->status == "1") {
                        $val->status = '<div class=' . "badge badge-success py-1 px-2 rounded" . '>Active</div>';
                    } else {
                        $val->status = '<div class=' . "badge badge-danger py-1 px-2 rounded" . '>In Active</div>';
                    }
                    $url_edit = url($this->action . '/edit/' . $val->id);
                    $url_delete = url($this->action . '/delete/' . $val->id);
                    $url_profile = url($this->action . '/profile/' . $val->id);
                    $table .= '<tr>' .
                    '<td>' . $val->customer_number . '</td>' .
                    '<td class=' . "d-block" . '>
                    <div>' . '<span>' . '<b>' . $val->customer_name . '</b>' .
                    '</span>' . '<span style=' . "font-size: 12px !important;" . '>' . $val->lead . '</span>' .
                    '</div>' . '</td>' .
                    '<td>' . $val->level . '</td>' .
                    '<td>' . $val->main_phone . '</td>' .
                    '<td>' . $val->address . '</td>' .
                    '<td>' . $val->status . '</td>' .
                    '<td>' . $val->zip_code . '</td>' .
                        '<td>' .
                        '<button><a href=' . $url_edit . '><i class=' . "ti-pencil" . '></i></a></button>' . '<button><a href=' . $url_delete . '><i class=' . "ti-trash" . '></i></a></button>' . '<button><a href=' . $url_profile . '><i class=' . "ti-trash" . '></i></a></button>' .
                        '</td>' .
                        '</tr>';
                    $i++;
                }
                $page .= '<div>' . '<div>' . '<p>' . 'Displaying ' . $records->count() . ' of ' . count($total) . ' customers(s)' . '</p>' . '</div>' . '<div>' . $records->links() . '</div>' . '</div>';
                $output = [
                    'table' => $table,
                    'pagination' => $page,
                ];
                return Response($output);
            }
        }
    }

    public function profile_tab(Request $request)
    {

        $id = $request->id;
        $data = [];
        $data['user'] = User::find($id)->toArray();
        $data['billing'] = BillingParty::where('customer_id', $id)->get();
        $data['shipper'] = Shipper::where('customer_id', $id)->get();
        $data['notification'] = Notification::where('user_id', $id)->get();
        $data['documents'] = CustomerDocument::where('user_id', $id)->get()->toArray();

        $all_vehicles = Vehicle::all()->count();

        $customer_vehicles = Vehicle::where('added_by_user', $id)->count();
        $CustomerVehicles_value = Vehicle::get()->sum('value');
        if ($all_vehicles != 0) {
            $customer_vehicles_percentage = ($customer_vehicles / $all_vehicles) * 100;
            $data['customer_vehicles_percentage'] = round($customer_vehicles_percentage);
        } else {
            $data['customer_vehicles_percentage'] = 0;
        }
        $data['customer_vehicles'] = $customer_vehicles;
        $data['allVehicles_value'] = $CustomerVehicles_value;

        $onhand = Vehicle::where('status', '1')->orwhere('added_by_user', $id);
        $onhand_count = $onhand->count();
        $onhand_value = $onhand->sum('value');
        $data['onhand_count'] = $onhand_count;
        $data['onhand_value'] = $onhand_value;
        if ($all_vehicles != 0) {
            $onhand_count_percentage = ($onhand_count / $all_vehicles) * 100;
            $data['onhand_count_percentage'] = round($onhand_count_percentage);
        } else {
            $data['onhand_count_percentage'] = 0;
        }

        $dispatch = Vehicle::where('status', '2')->orwhere('added_by_user', $id);
        $dispatch_count = $dispatch->count();
        $dispatch_value = $dispatch->sum('value');
        $data['dispatch_count'] = $dispatch_count;
        $data['dispatch_value'] = $dispatch_value;
        if ($all_vehicles != 0) {
            $dispatch_count_percentage = ($dispatch_count / $all_vehicles) * 100;
            $data['dispatch_count_percentage'] = round($dispatch_count_percentage);
        } else {
            $data['dispatch_count_percentage'] = 0;
        }

        $manifest = Vehicle::where('status', '3')->orwhere('added_by_user', $id);
        $manifest_count = $manifest->count();
        $manifest_value = $manifest->sum('value');
        $data['manifest_count'] = $manifest_count;
        $data['manifest_value'] = $manifest_value;
        if ($all_vehicles != 0) {
            $manifest_count_percentage = ($manifest_count / $all_vehicles) * 100;
            $data['manifest_count_percentage'] = round($manifest_count_percentage);
        } else {
            $data['manifest_count_percentage'] = 0;
        }

        $shipped = Vehicle::where('status', '4')->orwhere('added_by_user', $id);
        $shipped_count = $shipped->count();
        $shipped_value = $shipped->sum('value');
        $data['shipped_count'] = $shipped_count;
        $data['shipped_value'] = $shipped_value;
        if ($all_vehicles != 0) {
            $shipped_count_percentage = ($shipped_count / $all_vehicles) * 100;
            $data['shipped_count_percentage'] = round($shipped_count_percentage);
        } else {
            $data['shipped_count_percentage'] = 0;
        }

        $arrived = Vehicle::where('status', '5')->orwhere('added_by_user', $id);
        $arrived_count = $arrived->count();
        $arrived_value = $arrived->sum('value');
        $data['arrived_count'] = $arrived_count;
        $data['arrived_value'] = $arrived_value;
        if ($all_vehicles != 0) {
            $arrived_count_percentage = ($arrived_count / $all_vehicles) * 100;
            $data['arrived_count_percentage'] = round($arrived_count_percentage);
        } else {
            $data['arrived_count_percentage'] = 0;
        }

        $posted = Vehicle::where('status', '6')->orwhere('added_by_user', $id);
        $posted_count = $posted->count();
        $posted_value = $posted->sum('value');
        $data['posted_count'] = $posted_count;
        $data['posted_value'] = $posted_value;
        if ($all_vehicles != 0) {
            $posted_count_percentage = ($posted_count / $all_vehicles) * 100;
            $data['posted_count_percentage'] = round($posted_count_percentage);
        } else {
            $data['posted_count_percentage'] = 0;
        }

        $booked = Vehicle::where('status', '7')->orwhere('added_by_user', $id);
        $booked_count = $booked->count();
        $booked_value = $booked->sum('value');
        $data['booked_count'] = $booked_count;
        $data['booked_value'] = $booked_value;
        if ($all_vehicles != 0) {
            $booked_count_percentage = ($booked_count / $all_vehicles) * 100;
            $data['booked_count_percentage'] = round($booked_count_percentage);
        } else {
            $data['booked_count_percentage'] = 0;
        }

        if ($request->tab) {
            $tab = $request->tab;
            $output = view('layouts.customer.' . $tab, $data)->render();
            // ddd($data);
        }
        return Response($output);
    }

    public function general_create(Request $request)
    {

        if ($request->ajax()) {
            // $data = [];
            $data = $request->all();
            $tab = $request->tab;
            $image = $request->file('images');
            $file = $request->file('user_file');
            unset($data['user_file']);
            unset($data['tab']);
            $email = $data['email'];
            $output = [];
            $documents = [];
            $view_data = [];
            $action = url($this->action . '/create');
            $view_data = [
                "page_title" => $this->plural . " create",
                "page_heading" => $this->plural . ' create',
                "breadcrumbs" => array("dashboard" => "Dashboard", "#" => $this->plural . " create"),
                "action" => $action,
                "module" => ['type' => $this->type,
                    'type' => $this->type,
                    'singular' => $this->singular,
                    'plural' => $this->plural,
                    'view' => $this->view,
                    'db_key' => $this->db_key,
                    'action' => $this->action,
                    'page' => 'create',
                    'button' => 'Create',
                    'email' => $email,
                ],
            ];

            switch ($tab) {
                case ('general_customer'):
                    $view = view('layouts.customer_create.billing', $view_data)->render();

                    break;

                case ('billing_customer'):
                    $view = view('layouts.customer_create.shipper', $view_data)->render();

                    break;

                case ('shipper_customer'):
                    $view = view('layouts.customer_create.quotation', $view_data)->render();

                    break;
            }

            if ($tab != "general_customer") {
                $customer = User::where('email', $email)->get();
                foreach ($customer as $val) {
                    $id = $val['id'];
                }
                $data['customer_id'] = $id;

                unset($data['email']);
            }

            if ($tab == "general_customer") {
                if ($image) {
                    foreach ($image as $images) {
                        $filename = Storage::putFile($this->directory, $images);
                        $images->move(public_path($this->directory), $filename);
                        $data['user_image'] = $filename;
                        $data['password'] = Hash::make($request->password);
                        unset($data['images']);
                    }
                }
                $request->validate([
                    'name' => 'required',
                    'username' => 'required',
                    'password' => 'required',
                    'phone' => 'required',
                    'fax' => 'required',
                    'email' => 'required',
                    'source' => 'required',
                    'company_name' => 'required',
                    'company_email' => 'required',
                    'customer_type' => 'required',
                    'sales_type' => 'required',
                    'payment_type' => 'required',
                    'payment_term' => 'required',
                    'industry' => 'required',
                    'sales_person' => 'required',
                    'inside_person' => 'required',
                    'level' => 'required',
                    'location_number' => 'required',
                    'country' => 'required',
                    'zip_code' => 'required',
                    'state' => 'required',
                    'address_line1' => 'required',
                    'address_line2' => 'required',
                    'price_code' => 'required',
                ]);
                $Obj = new User;
                $Obj->create($data);
                // $email = $data['email'];
                $user = User::where('email', $email)->get();
                $user_id = $user[0]['id'];

                if ($file) {
                    foreach ($file as $files) {
                        $file_name = time() . '.' . $files->extension();
                        $docname = Storage::putFile($this->directory, $files);
                        $documents['file'] = $docname;
                        $documents['thumbnail'] = $file_name;
                        $files->move(public_path($this->directory), $docname);
                        $documents['user_id'] = $user_id;
                        $Obj = new CustomerDocument;
                        $Obj->create($documents);
                    }
                }
                $output =
                    [
                    'result' => 'success',
                    'tab' => 'Customer created successfully!',
                    'view' => $view,
                ];

            } elseif ($tab == "billing_customer") {
                $Obj = new BillingParty;
                $Obj->create($data);
                $output =
                    [
                    'result' => 'success',
                    'tab' => 'Billing data inserted!',
                    'view' => $view,
                ];

            } elseif ($tab == "shipper_customer") {
                $Obj = new Shipper;
                $Obj->create($data);
                $output =
                    [
                    'result' => 'success',
                    'tab' => 'Shipper data inserted!',
                    'view' => $view,
                ];

            } else {
                $Obj = new Quotation;
                $Obj->create($data);
                $output =
                    [
                    'result' => 'success',
                    'tab' => 'Quotation data inserted!',
                    // 'view' => $view,
                    'quotation' => 'fade',
                ];
            }
            return Response($output);
        }
    }

    public function FilterTable(Request $req, $tab = null)
    {
        $filterText = $req->id;

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

        $data['user'] = User::where('role_id', 4)->where('status', $filterText)->orwhere('city', $filterText)->orwhere('state', $filterText)->get()->toArray();

        $output = view('customer.FilterTable', $data)->render();

        return Response($output);

    }

    public function changeNotification(Request $req)
    {
        $id = $req->id;

        $notification = Notification::where('id', $id)->get();
        return Response($notification);

    }

    public function export()
    {
        return Excel::download(new UsersExport, 'customers.xlsx');
    }

    // public function import(Request $request)
    // {
    //     if ($request->ajax()) {
    //         $output = view('layouts.customer.import_customer')->render();
    //         return Response($output);
    //     }
    //     Excel::import(new CustomersImport, request()->file('import_document'));
    // }

    public function serverside(Request $request)
    {
        if ($request->ajax()) {
            $data = User::where('role_id', 4);
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $data['row'] = $row;
                    $url_view = url('admin/shipments/profile/' . $row->id);
                    $url_delete = url('admin/shipments/delete/' . $row->id);
                    $url_edit = url('admin/shipments/edit/' . $row->id);
                    $output = view('layouts.customer.action_buttons', $data)->render();
                    return $output;
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return back();
    }
}
