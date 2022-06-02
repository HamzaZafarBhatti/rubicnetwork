<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model {
    protected $table = "trending";
    protected $guarded = [];

    public function category()
    {
        return $this->belongsTo('App\Models\Category','cat_id');
    }

    public function users()
    {
        return $this->belongsToMany('App\Models\User', 'trending_user', 'trending_id', 'user_id');
    }
}
