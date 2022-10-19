<?php

namespace App\Http\Controllers;

use App\Models\Location;
use App\Models\Export;
use App\Models\Invoice;
use App\Models\Consignee;
use App\Models\Notification;
use Carbon\Carbon;
use GuzzleHttp\Promise\Create;
use Illuminate\Http\Request;
use LDAP\Result;


class InvoiceController extends Controller
{
    private $type = "Invoice";
    private $singular = "invoice";
    private $plural = "Invoices";
    private $view = "invoice.";
    private $db_key = "id";
    private $user = [];
    private $perpage = 100;
    private $directory = "/invoice_images";
    private $action = "/admin/invoices";

    public function Notification()
    {
        $data['notification'] = Notification::with('user')->get();
        $data['location'] = Location::all()->toArray();
        // dd();
        if ($data['notification']->toArray()) {
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
            $unread = Notification::with('user')->where('status', '0')->get();
            $data['notification_count'] = count($unread);
        } else {
            $data['notification'] = "asda";
        }
        // dd($data);
        return $data;
    }

    public function index()
    {
        $data = [];

        // dd($data);

        $data = [
            "page_title" => $this->plural . " List",
            "page_heading" => $this->plural . ' List',
            'records' => Invoice::with('user')->get()->toArray(),
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
        return view($this->view . 'list', $data, $notification);
    }

    public function create(Request $request)
    {
        if ($request->isMethod('post')) {
            $invoice = $request->all();

            // dd($invoice);
            // return $data1;
            // $obj =[
            //     'export_id' => $request->export_id,
            //     'customer_user_id' => $request->user_name,
            //     'total_amount' => $request->total_amount,
            //     'paid_amount' => $request->paid_amount,
            //     'adjustment_damaged' => $request->damaged,
            //     'adjustment_storage' => $request->storage,
            //     'discount' => $request->discount,
            //     'adjustment_other' => $request->other,
            //     'note' => $request->note,
            //     'upload_invoice' => $request->upload_invoice,
            // ];
            $obj = new Invoice;
            $result = $obj->create($invoice);
            return back();
        }

        $data = [];
        $action = url($this->action . '/create');
        $data = [
            "page_title" => $this->plural . " List",
            "page_heading" => $this->plural . ' List',
            "breadcrumbs" => array('#' => $this->plural . " List"),
            "action" => $action,
            "module" => [
                'type' => $this->type,
                'singular' => $this->singular,
                'plural' => $this->plural,
                'view' => $this->view,
                'db_key' => $this->db_key,
                'page' => 'list',
            ],
        ];
        $data['export'] = Export::all()->toArray();
        $data['customer'] = Consignee::all();
        $notification = $this->Notification();
        return view($this->view . 'create_edit', $data, $notification);
    }


    public function update(Request $request, $id = null)
    {

        if ($request->isMethod('post')) {
            $invoice = $request->all();
            $obj = new Invoice;
            $result = $obj->update($invoice);
            return back();
        }

        $data = [];
        $action = url($this->action . '/create');
        $data = [
            "page_title" => $this->plural . " List",
            "page_heading" => $this->plural . ' List',
            "breadcrumbs" => array('#' => $this->plural . " List"),
            "action" => $action,
            "module" => [
                'type' => $this->type,
                'singular' => $this->singular,
                'plural' => $this->plural,
                'view' => $this->view,
                'db_key' => $this->db_key,
                'page' => 'list',
            ],
        ];
        $data['invoices'] = Invoice::with('export', 'consignee')->where('id', $id)->get();
        // dd($data['invoices']);
        // dd($data['invoices'][0]['consignee']['consignee_name']);
        $data['export'] = Export::all()->toArray();
        $data['customer'] = Consignee::all();
        $notification = $this->Notification();
        return view($this->view . 'create_edit', $data, $notification);
    }
   
    public function delete( $id = null){
                $data= Invoice::find($id);
                $data->delete();
                return back();
    }
}
