<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;

class UserController extends Controller
{
    private $type = "users";
    private $singular = "user";
    private $plural = "users";
    private $view = "user.";
    private $db_key = "id";
    private $user = [];
    private $directory = "user_images";

    public function index()
    {
        $data = [];
        $data = [
            "page_title" => $this->plural . " List",
            "page_heading" => $this->plural . ' List',
            "breadcrumbs" => $this->plural . " List",
            "module" => ['type' => $this->type,
                'singular' => $this->singular,
                'plural' => $this->plural,
                'view' => $this->view,
                'db_key' => $this->db_key,
            ],
        ];
        $records = User::all();
        $data['records'] = $records;
        // dd($data);
        return view($this->view . 'list', $data);

    }
}
