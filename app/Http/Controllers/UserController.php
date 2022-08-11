<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Auth;
use Illuminate\Http\Request;

class UserController extends Controller
{
    private $type = "users";
    private $singular = "user";
    private $plural = "users";
    private $view = "user.";
    private $db_key = "id";
    private $user = [];
    private $directory = "user_images";
    private $action = "/admin/users";

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
        $records = User::all();
        $data['records'] = $records;
        // dd($data);
        return view($this->view . 'list', $data);

    }

    public function create(Request $request)
    {
        if ($request->isMethod('post')) {
            $data = $request->all();
            $Obj = new User;
            $obj->create($data);
        }
        $data = [];
        $data = [
            "page_title" => $this->plural . " create",
            "page_heading" => $this->plural . ' create',
            "breadcrumbs" => array("dashboard" => "Dashboard", "#" => $this->plural . " create"),
            "module" => ['type' => $this->type,
                'type' => $this->type,
                'singular' => $this->singular,
                'plural' => $this->plural,
                'view' => $this->view,
                'db_key' => $this->db_key,
                'action' => $this->action,
                'page' => 'create',
            ],
        ];
        return view($this->view . "create_edit", $data);

    }

    public function edit(Request $request, $id = null)
    {
        if ($request->isMethod('post')) {
            $data = $request->all();
            if (isset($data['password']) && !empty($data['password'])) {
                $data['password'] = Hash::make($data['password']);
            } else {
                unset($data['password']);
            }
            $Obj = User::find($id);
            $request->validate([
                'username' => 'required',
                'email' => 'required|email',
                'status' => 'required|min:1',
                'phone' => 'required|numeric',
                'customer_name' => 'required|min:8|alpha',
            ]);
            $Obj->update($data);
        }
        $action = url($this->action . '/edit/' . $id);
        $id = $request->all();
        $data = [];
        $data = [
            'user' => User::all()->toArray(),
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
            ],
        ];
        $data['row'] = User::find($id)->toArray();
        return view($this->view . 'create_edit', $data);
    }

    public function delete($id)
    {
        $user = User::find($id);
        $user->delete();
        return view($this->view . 'list');
    }

    public function profile()
    {
        $data = [];
        $data = [
            "page_title" => $this->singular . 'Profile',
            "page_heading" => $this->singular . 'Profile',
            "breadcrumbs" => array("dashboard" => "Dashboard", "#" => $this->plural . " List"),
            "module" => ['type' => $this->type,
                'type' => $this->type,
                'singular' => $this->singular,
                'plural' => $this->plural,
                'view' => $this->view,
                'db_key' => $this->db_key,
                'action' => $this->action,
                'page' => 'profile',
            ],
        ];
        $data['records'] = Auth::user();
        return view($this->view . 'profile', $data);
    }

    public function updateProfile(Request $request)
    {
        $data = $request->all();
        if (isset($data['password']) && !empty($data['password'])) {
            $data['password'] = Hash::make($data['password']);
        }
        if (isset($data['password']) && empty($data['password']) || $data['password'] == null) {
            unset($data['password']);
        }
        User::find(Auth::id())->update($data);
        return back()->with('success', 'Profile successfully updated.');
    }
}
