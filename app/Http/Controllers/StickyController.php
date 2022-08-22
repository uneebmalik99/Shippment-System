<?php

namespace App\Http\Controllers;

use App\Models\Sticky;
use Auth;
use Illuminate\Http\Request;

class StickyController extends Controller
{
    private $type = "sticky";
    private $singular = "sticky";
    private $plural = "sticky";
    private $view = "sticky.";
    private $db_key = "id";
    private $user = [];
    private $perpage = 100;
    private $directory = "vehicle_images";
    private $action = "/admin/sticky";

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
        $data['records'] = Sticky::with('customer')->paginate($this->perpage);
        return view($this->view . 'list', $data);
    }

    public function create(Request $request)
    {
        $sticky_id = $request->sticky_id;
        $notes = $request->notes;
        $customer_id = Auth::user()->id;
        $Obj = new Sticky;
        $data = Sticky::where('sticky_id', $sticky_id);
        if (count($data->get()) > 0) {
            $data = $data->update(['notes' => $notes]);
            // $data->notes = $notes;
            // $data->update();
            $output = "Note updated.";

        } else {
            $Obj->notes = $notes;
            $Obj->sticky_id = $sticky_id;
            $Obj->customer_id = '2';
            $Obj->save();
            $output = "Note created.";
        }
        return Response($output);
    }
}
