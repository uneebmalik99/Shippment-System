<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LoadingTerminal extends Model
{
    use HasFactory;
    protected $primaryKey = 'id';
    protected $table = "loading_ports";
    protected $guarded = [];

    public function loadingPorts()
    {
        return $this->belongsTo('App\Models\LoadingPort', 'loadingport_id', 'id');
    }
}
