<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Notification;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;
use Illuminate\Http\Request;

class UserController extends Controller
{
    private $type = "users";
    private $singular = "user";
    private $plural = "users";
    private $view = "user.";
    private $db_key = "id";
    private $perpage = 100;
    private $user = [];
    private $directory = "user_images";
    private $action = "/admin/users";

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

        $data['role'] = Auth::user()->role_id;


        $records = User::all();
        $data['records'] = $records;
        $notification = $this->Notification();    
        return view($this->view . 'list', $data, $notification);
    }

    public function create(Request $request)
    {
        if ($request->isMethod('post')) {
            $data = $request->all();
            $Obj = new User;
            $Obj->create($data);
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
        $notification = $this->Notification();
        return view($this->view . "create_edit", $data, $notification);

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
                'email' => 'required|email|unique:users',
                'status' => 'required|min:1',
                'phone' => 'required|numeric',
                'customer_name' => 'required|min:8',
            ]);
            $Obj->update($data);
        }
        $action = url($this->action . '/edit/' . $id);
        $data = [];
        $data = [
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
        $notification = $this->Notification();
        $data['user'] = User::find($id)->toArray();
        return view($this->view . 'create_edit', $data, $notification);
    }

    public function delete($id)
    {
        $user = User::find($id);
        $user->delete();
        return view($this->view . 'list');
    }

    public function profile(Request $request, $id = null)
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
        $notification = $this->Notification();
        $data['records'] = User::find($id)->toArray();
        return view($this->view . 'profile', $data, $notification);
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

    public function search(Request $request)
    {
        if ($request->ajax()) {
            $table = "";
            $page = "";
            $total = User::all()->toArray();
            $records = new User;
            if ($request->search) {
                $records = $records->where('username', 'LIKE', '%' . $request->search . "%")
                    ->orWhere('email', 'LIKE', '%' . $request->search . "%")
                    ->orWhere('status', 'LIKE', '%' . $request->search . "%")
                    ->orWhere('city', 'LIKE', '%' . $request->search . "%")
                    ->orWhere('state', 'LIKE', '%' . $request->search . "%")
                    ->orWhere('phone', 'LIKE', '%' . $request->search . "%")
                    ->orWhere('customer_name', 'LIKE', '%' . $request->search . "%");
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
                    $table .= '<tr>' .
                    '<td>' . $i . '</td>' .
                    '<td>' . $val->username . '</td>' .
                    '<td>' . $val->email . '</td>' .
                    '<td>' . $val->status . '</td>' .
                    '<td>' . $val->city . '</td>' .
                    '<td>' . $val->state . '</td>' .
                    '<td>' . $val->phone . '</td>' .
                    '<td>' . $val->customer_name . '</td>' .

                        '<td>' . '<button><a href=' . $url_edit . '><i class=' . '"ti-pencil"' . '></i></a></button>' . '<button><a href=' . $url_delete . '><i class=' . '"ti-trash"' . '></i></a></button>' . '</td>' .
                        '</tr>';
                    $i++;
                }
                $page .= '<div>' . '<div>' . '<p>' . 'Displaying ' . $records->count() . ' of ' . count($total) . ' user(s)' . '</p>' . '</div>' . '<div>' . $records->links() . '</div>' . '</div>';
                $output = [
                    'table' => $table,
                    'pagination' => $page,
                ];
                return Response($output);
            }
        }
    }

}
