<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Customer_Document extends Model
{
    use HasFactory;
    use softDeletes;
    protected $primaryKey = "id";
    public $timestamps = true;
    protected $table = "customer__documents";
    protected $fillable = [
        'file',
        'description',
        'customer_user_id',
        'thumbnail',
    ];

    public function customer()
    {
        return $this->belongsTo('App\Models\Customer');
    }
}
