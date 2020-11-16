<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Photos extends Model
{
    //define the table
    protected $table = "photos";
    //use soft deletes
    use softDeletes;

}
