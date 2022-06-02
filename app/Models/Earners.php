<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Earners extends Model {
    protected $table = "earners";
    protected $guarded = [];


	protected $fillable = array('user_id','name', 'amount', 'status');
}
