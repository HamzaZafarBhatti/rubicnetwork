<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ticket extends Model {
    protected $table = "support";
    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function latest_replies()
    {
        return $this->hasMany(Reply::class, 'ticket_id', 'ticket_id');
    }
}
