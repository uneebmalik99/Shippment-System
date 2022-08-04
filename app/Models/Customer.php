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
    protected $fillable = [
        'customer_name',
        'company_name',
        'phone',
        'address_line1',
        'address_line2',
        'email',
        'city',
        'state',
        'zip_code',
        'country',
        'tax_id',
        'phone_two',
        'note',
        'added_by_role',
        'added_by_email',
    ];

    public function user()
    {
        return $this->belongsTo('App\Models\User');
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
        return $this->hasMAny('App\Models\Invoice');
    }
}
