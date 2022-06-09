<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PostUser extends Model
{
    use HasFactory;

    protected $fillable = [
        'post_id',
        'user_id',
        'bonus',
    ];

    public function user()
    {
        return $this->belongsTo(User::class)->select('name', 'username', 'id');
    }
    public function post()
    {
        return $this->belongsTo(Post::class)->select('id', 'title');
    }
}
