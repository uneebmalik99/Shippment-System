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
    protected $fillable = [
        'customer_name',
        'vin',
        'year',
        'make',
        'model',
        'vehicle_type',
        'color',
        'weight',
        'value',
        'auction',
        'buyer_id',
        'key',
        'note',
        'hat_number',
        'title_type',
        'title',
        'title_rec_date',
        'title_state',
        'title_number',
        'shipper_name',
        'status',
        'sale_date',
        'paid_date',
        'days',
        'posted_date',
        'pickup_date',
        'delivered',
        'pickup_location',
        'site',
        'dealer_fee',
        'late_fee',
        'auction_storage',
        'towing_charges',
        'warehouse_storage',
        'title_fee',
        'port_detention_fee',
        'custom_inspection',
        'additional_fee',
        'insurance',
        'vehicle_is_deleted',
        'added_by_role',
        'added_by_email',
    ];

    public function location()
    {
        return $this->belongsTo('App\Models\Location');
    }

    public function customer()
    {
        return $this->belongsTo('App\Models\Customer', 'buyer_id', 'id');
    }

    public function user()
    {
        return $this->belongsTo('App\Models\User');
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
}
