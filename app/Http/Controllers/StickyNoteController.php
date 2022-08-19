<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\StickyNote;

class StickyNoteController extends Controller
{
    private $type = "stickynotes";
    private $singular = "stickynote";
    private $plural = "stickynotes";
    private $view = "stickynote.";
    private $db_key = "id";
    private $user = [];
    private $perpage = 100;
    private $directory = "vehicle_images";
    private $action = "/admin/stickynotes";

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
        $data['records'] = StickyNote::with('customer')->paginate($this->perpage);
        return view($this->view . 'list', $data);
    }

}
