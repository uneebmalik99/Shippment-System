<?php

namespace App\Http\Controllers;


use App\Http\Controllers\Controller;
use App\Models\Customer;
use Illuminate\Http\Request;
use Liwewire\Component;

class CustomerController extends Controller
{
    private $type = "customers";
    private $singular = "customer";
    private $plural = "customers";
    private $view = "customer.";
    private $db_key = "id";
    private $user = [];
    private $directory = "customer_images";
    private $action = "/admin/customers";

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
        $data['records'] = Customer::all();
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
        // dd('asd');
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

    // public function sortBy($column_name)
    // {
    //     dd('asd');
    // }
}
