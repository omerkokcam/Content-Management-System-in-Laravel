<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Albums extends Model
{
    //use soft delete
    use SoftDeletes;
    // definite the table
    protected $table = "albums";

    public function photos(){
        return $this->hasMany('App\Models\Photos','album_id','id');
    }

}
