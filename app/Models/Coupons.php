<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Coupons extends Model {
    protected $table = "coupons";
    protected $guarded = [];

    public function plan() {
        return $this->belongsTo(Plans::class);
    }

    public function user() {
        return $this->hasOne(User::class, 'coupon', 'serial');
    }
}
