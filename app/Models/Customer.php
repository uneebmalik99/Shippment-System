<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Customer extends Model
{
    use HasFactory;
    use softDeletes;
    protected $primaryKey = 'id';
    public $timestamps = true;
    protected $table = "customers";
    protected $guarded = [];
    protected $fillable = [
        'customer_number',
        'customer_name',
        'customer_email',
        'level',
        'status',
        'main_phone',
        'main_fax',
        'industry',
        'source',
        'customer_type',
        'sales_tpye',
        'sales_person',
        'inside_person',
        'lead',
        'payment_type',
        'payment_term',
        'price_code',
        'location_number',
        'country',
        'zip_code',
        'state',
        'country',
        'address_1',
        'address_2',
        'added_by_role',
        'added_by_email',
    ];

    public function user()
    {
        return $this->belongsTo('App\Models\User', 'id', 'id');
    }

    public function vehicles()
    {
        return $this->hasMany('App\Models\Vehicle');
    }

    public function exports()
    {
        return $this->hasMany('App\Models\Export');
    }

    public function customer_documents()
    {
        return $this->hasMany('App\Models\Customer_Document');
    }

    public function invoices()
    {
        return $this->hasMany('App\Models\Invoice');
    }

    public function billings()
    {
        return $this->hasMany('App\Models\BillingParty');
    }

    public function shippers()
    {
        return $this->hasMany('App\Models\Shipper');
    }

    public function quotations()
    {
        return $this->hasMany('App\Models\Quotation');
    }
}
