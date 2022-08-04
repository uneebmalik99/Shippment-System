<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Notification extends Model
{
    use HasFactory;
    use softDeletes;
    protected $primaryKey = 'id';
    public $timestamps = true;
    protected $table = "notifactions";
    protected $fillable = [
        'subject',
        'message',
        'is_read',
        'status',
        'user_id',
        'expiry_date',
        'added_by_role'
    ];

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
}
