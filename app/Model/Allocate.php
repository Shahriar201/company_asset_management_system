<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Allocate extends Model
{
    public function user(){
        return $this->belongsTo(User::class, 'employee_id', 'id');
    }

    public function asset(){
        return $this->belongsTo(Asset::class, 'asset_id', 'id');
    }
}
