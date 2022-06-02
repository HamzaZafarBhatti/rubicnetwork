<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DataWithdraw extends Model {
    protected $table = "data_withdraw_history";
    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
    public function data_operator()
    {
        return $this->belongsTo('App\Models\DataOperator');
    }
}
