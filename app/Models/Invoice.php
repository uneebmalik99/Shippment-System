<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Invoice extends Model
{
    use HasFactory;
    use softDeletes;
    protected $primaryKey = 'id';
    public $timestamps = true;
    protected $table = "invoices";
    protected $fillable = [
        'export_id',
        'customer_user_id',
        'consignee_id',
        'total_amount',
        'paid_amount',
        'export_invoice',
        'note',
        'adjustment_damaged',
        'adjustment_storage',
        'adjustment_discount',
        'adjustment_other',
        'is_deleted',
        'currency',
        'discount',
        'before_discount',
        'upload_invoice',
        'added_by_role',
    ];

    public function export()
    {
        return $this->belongsTo('App\Models\Export');
    }


    public function consignee()
    {
        return $this->belongsTo('App\Models\Consignee');
    }
    public function user()
    {
        return $this->belongsTo('App\Models\User','customer_user_id','id');
    }
}
