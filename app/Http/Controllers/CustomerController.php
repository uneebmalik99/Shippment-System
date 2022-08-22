<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Customer;
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
        $data['records'] = Customer::paginate($this->perpage);
        return view($this->view . 'list', $data);
    }

    public function create(Request $request)
    {
        if ($request->isMethod('post')) {
            $data = $request->all();
            $Obj = new Customer;
            $request->validate([
                'customer_name' => 'required|alpha',
                'company_name' => 'required|alpha',
                'phone' => 'required|max:11|numeric',
                'email' => 'required|email',
                'zip_code' => 'numeric',
                'tax_id' => 'required|numeric|min:4|max:4',
                'phone_2' => 'required|max:11|numeric',
            ]);
            $Obj->create($data);
        }
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
        return view($this->view . 'create_edit', $data);
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
        $data['user'] = Customer::find($id)->toArray();
        return view($this->view . 'create_edit', $data);
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
        // dd($data['user']);
        return view($this->view . 'profile', $data);
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
                $page .= '<p>' . 'Displaying ' . $records->count() . ' of ' . count($total) . ' customer(s)' . '</p>';
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
