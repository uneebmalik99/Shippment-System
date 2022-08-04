<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Model
{
    use HasFactory;
    use softDeletes;
    protected $primaryKey = 'id';
    public $timestamps = true;
    protected $table = "users";
    protected $fillable = [
        'username',
        'authkey',
        'password',
        'password_reset_token',
        'email',
        'status',
        'user_is_detected',
        'address_line1',
        'address_line2',
        'city',
        'state',
        'zip_code',
        'fax',
        'customer_name',
    ];

    public function customers()
    {
        return $this->hasMany('App\Models\Customer');
    }

    public function exports()
    {
        return $this->hasMany('App\Models\Export');
    }

    public function notifications()
    {
        return $this->hasMany('App\Models\Notification');
    }

    public function locations()
    {
        return $this->hasMany('App\Models\Location');
    }

    public function consignees()
    {
        return $this->hasMany('App\Models\Consignee');
    }

    public function invoices()
    {
        return $this->hasMany('App\Models\Invoice');
    }

    public function auth_assignment()
    {
        return $this->hasOne('App\Models\AuthAssignment');
    }
}
