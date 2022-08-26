<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\Notification;
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
        return view($this->view . 'create_edit', $data, $notification   );
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
        if ($request->tab) {
            $tab = $request->tab;
            $output = view('layouts.customer.' . $tab)->render();
        }
        return Response($output);
    }

}
