<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Vehicle extends Model
{
    use HasFactory;
    use softDeletes;
    protected $primaryKey = 'id';
    public $timestamps = true;
    protected $table = "vehicles";
    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo('App\Models\User', 'buyer_id', 'id');
    }

    public function location()
    {
        return $this->belongsTo('App\Models\Location', 'title_state', 'id');
    }

    public function document()
    {
        return $this->hasOne('App\Models\Document');
    }

    public function towing_request()
    {
        return $this->belongTo('App\Models\Towing_Request');
    }

    public function conditions()
    {
        return $this->belongsToMany('App\Models\Condition');
    }

    public function images()
    {
        return $this->hasMany('App\Models\Image');
    }

    public function features()
    {
        return $this->belongsToMany('App\Models\Feature');
    }

    public function sticky_notes()
    {
        return $this->hasMany('App\Models\StickyNote');
    }

    public function vehicle_status()
    {
        return $this->belongsTo('App\Models\VehicleStatus');
    }

    public function auction_image()
    {
        return $this->hasMany('App\Models\AuctionImage');
    }

    public function warehouse_image()
    {
        return $this->hasMany('App\Models\WarehouseImage');
    }

    public function auction_invoice()
    {
        return $this->hasOne('App\Models\AuctionInvoice');
    }
}
