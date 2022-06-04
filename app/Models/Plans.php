<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Plans extends Model {
    protected $table = "plan";
    protected $guarded = [];

    public function user() {
        return $this->hasMany(User::class);
    }
}
