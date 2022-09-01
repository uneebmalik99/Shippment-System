<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\BillingParty;
use App\Models\Customer;
use App\Models\Notification;
use App\Models\Quotation;
use App\Models\Shipper;
use Carbon\Carbon;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    private $type = "customers";
    private $singular = "customer";
    private $plural = "customers";
    private $view = "customer.";
    private $db_key = "id";
    private $user = [];
    private $perpage = 100;
    private $directory = "customer_images";
    private $action = "/admin/customers";

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
        $data['records'] = Customer::paginate($this->perpage);
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
            $output = view('layouts.customer_create.' . $tab, $data)->render();
            return Response($output);
        }

        if ($request->isMethod('post')) {
            $record = $request->all();
            $Obj = new Customer;
            // $request->validate([
            //     'customer_name' => 'required|alpha',
            //     'company_name' => 'required|alpha',
            //     'phone' => 'required|max:12',
            //     'email' => 'required|email',
            //     'zip_code' => 'numeric',
            //     'tax_id' => 'required|numeric|min:0|max:4',
            //     'phone_2' => 'required|max:12',
            // ]);
            $result = $Obj->create($record);
            return redirect($this->action)->with('success', 'Vehicle addedd successfully.');

        }
        $notification = $this->Notification();
        return view($this->view . 'create_edit', $data, $notification);
    }

    public function edit(Request $request, $id = null)
    {
        if ($request->isMethod('post')) {
            $data = $request->all();
            $Obj = Customer::find($id);
            // $request->validate([
            //     'customer_name' => 'required',
            //     'company_name' => 'required',
            //     'phone' => 'required|max:12|alpha_dash',
            //     'email' => 'required|email',
            //     'zip_code' => 'numeric',
            //     'tax_id' => 'required|numeric|max:4',
            //     'phone_2' => 'required|max:12|alpha_dash',
            // ]);
            $Obj->update($data);
            return redirect($this->action)->with('success', 'Edited successfully.');
        }
        $action = url($this->action . '/edit/' . $id);
        $data = [];
        $data = [
            // 'user' => Customer::all()->toArray(),
            "page_title" => "Edit " . $this->singular,
            "page_heading" => "Edit " . $this->singular,
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
                'page' => 'edit',
                'button' => 'Update',
            ],
        ];
        $notification = $this->Notification();
        $data['user'] = Customer::find($id)->toArray();
        return view($this->view . 'create_edit', $data, $notification);
    }

    public function delete($id = null)
    {
        $customer = Customer::find($id);
        $customer->delete();
        return redirect($this->action);
    }

    public function profile($id)
    {
        $action = url($this->action . '/profile/');
        $data = [
            'user' => Customer::find($id)->toArray(),
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
        $notification = $this->Notification();
        return view($this->view . 'profile', $data, $notification);
    }

    public function search(Request $request)
    {
        if ($request->ajax()) {
            $table = "";
            $page = "";
            $total = Customer::all()->toArray();
            $records = new Customer;
            if ($request->search) {
                $records = $records->where('customer_name', 'LIKE', '%' . $request->search . "%")
                    ->orWhere('company_name', 'LIKE', '%' . $request->search . "%")
                    ->orWhere('phone', 'LIKE', '%' . $request->search . "%")
                    ->orWhere('email', 'LIKE', '%' . $request->search . "%")
                    ->orWhere('state', 'LIKE', '%' . $request->search . "%")
                    ->orWhere('country', 'LIKE', '%' . $request->search . "%")
                    ->orWhere('tax_id', 'LIKE', '%' . $request->search . "%");
            }
            if ($request->pagination) {
                $this->perpage = $request->pagination;
                $records = $records->paginate($this->perpage);
            }

            if ($records) {
                $i = 1;
                foreach ($records as $val) {
                    $url_edit = url($this->action . '/edit/' . $val->id);
                    $url_delete = url($this->action . '/delete/' . $val->id);
                    $url_profile = url($this->action . '/profile/' . $val->id);
                    $table .= '<tr>' .
                    '<td>' . $i . '</td>' .
                    '<td>' . $val->customer_name . '</td>' .
                    '<td>' . $val->company_name . '</td>' .
                    '<td>' . $val->phone . '</td>' .
                    '<td>' . $val->email . '</td>' .
                    '<td>' . $val->state . '</td>' .
                    '<td>' . $val->country . '</td>' .
                    '<td>' . $val->tax_id . '</td>' .
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
        $data['user'] = Customer::find($id)->toArray();
        $data['billing'] = BillingParty::where('id', '6')->get();
        $data['shipper'] = Shipper::where('id', '1')->get();
        if ($request->tab) {
            $tab = $request->tab;
            $output = view('layouts.customer.' . $tab, $data)->render();
        }
        return Response($output);
    }

    public function general_create(Request $request)
    {
        if ($request->ajax()) {
            $tab = $request->tab;
            $data = $request->data;
            $email = $data['customer_email'];
            $output = [];
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
                case ('general'):
                    $output['view'] = view('layouts.customer_create.billing', $view_data)->render();
                    break;

                case ('billing'):
                    $output['view'] = view('layouts.customer_create.shipper', $view_data)->render();
                    break;

                case ('shipper'):
                    $output['view'] = view('layouts.customer_create.quotation', $view_data)->render();
                    break;
            }

            if ($tab != "general") {
                $customer = Customer::where('customer_email', $email)->get();
                foreach ($customer as $val) {
                    $id = $val['id'];
                }
                $data['customer_id'] = $id;
                unset($data['customer_email']);
            }

            if ($tab == "general") {
                $Obj = new Customer;
                $Obj->create($data);
                $output['result'] = "Success!";

            } elseif ($tab == "billing") {
                $Obj = new BillingParty;
                $Obj->create($data);
                $output['result'] = "Success!";

            } elseif ($tab == "shipper") {
                $Obj = new Shipper;
                $Obj->create($data);
                $output['result'] = "Success!";

            } else {
                $Obj = new Quotation;
                $Obj->create($data);
                $output['result'] = "Success!";
            }
            return Response($output);
        }
    }
}
