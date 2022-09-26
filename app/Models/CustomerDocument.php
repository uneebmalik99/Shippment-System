<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomerDocument extends Model
{
    use HasFactory;

    protected $primaryKey = "id";
    public $timestamps = true;
    protected $table = "customer_documents";
    protected $fillable = [
        'file',
        'description',
        'customer_user_id',
        'thumbnail',
    ];

    public function user()
    {
        return $this->belongsTo('App\Models\User', 'user_id', 'id');
    }
}
