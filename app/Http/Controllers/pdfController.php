<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Invoice;
use PDF;

class pdfController extends Controller
{
    public function detail_data( $id = null){
        $data = [];
        $data['invoices']=Invoice::find($id)->toArray();

        
        return view('invoice.detail',$data);
    }
    public function generatePDF($id = null){
        $data = [];
        $data['invoices']=Invoice::find($id)->toArray();
        $pdf = PDF::loadview('invoice.pdf',$data);
        
        return $pdf->stream();
        // $data = [
        //     'title' => 'welcome to pdf file',
        //     'date' => date('m/d/y')
        // ];
       
       
        // return $pdf->download('detail.pdf');
        
    }
}
