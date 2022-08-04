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
        'hat_number',
        'year',
        'color',
        'make',
        'model',
        'vin',
        'weight',
        'pieces',
        'value',
        'license_number',
        'towed_from',
        'lotnumber',
        'towed_amount',
        'storage_amount',
        'status',
        'check_number',
        'additional_charges',
        'location_id',
        'customer_id',
        'towing_request_id',
        'is_export',
        'title_amount',
        'container_number',
        'key',
        'vehicle_is_deleted',
        'note_status',
        'added_by_role',
        'added_by_email',
    ];

    public function location()
    {
        return $this->belongsTo('App\Models\Location');
    }

    public function customer()
    {
        return $this->belongsTo('App\Models\Customer');
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
}
