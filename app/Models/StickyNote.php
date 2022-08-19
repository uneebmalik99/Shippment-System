<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class StickyNote extends Model
{
    use HasFactory;
    use softDeletes;
    protected $primaryKey = 'id';
    public $timestamps = true;
    protected $table = "vehicles";
    protected $fillables = [
        'name',
        'notes',
        'customer_id',
    ];

    public function customer()
    {
        return $this->belongsTo('App\Models\Customer', 'customer_id', 'id');
    }

}
