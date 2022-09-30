<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Loading_Image extends Model
{
    use HasFactory;


    public function shipment(){
        return $this->belongsTo('App\Models\Shipment');
    }
}
