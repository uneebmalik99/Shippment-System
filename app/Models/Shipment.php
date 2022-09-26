<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Shipment extends Model
{
    use HasFactory;
    use softDeletes;
    protected $primaryKey = 'id';
    public $timestamps = true;
    protected $table = "shipments";
    protected $guarded = [];

    public function consignee()
    {
        return $this->belongsTo('App\Models\Consignee');
    }

    public function status()
    {
        return $this->belongsTo('App\Models\ShipmentStatus', 'status', 'id');
    }

    public function images()
    {
        return $this->hasMany('App\Models\ShipmentImage');
    }
}
