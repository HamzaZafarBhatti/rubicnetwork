<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'details',
        'image',
        'category_post_id',
        'views',
        'status',
        'post_date',
    ];

    public function category()
    {
        return $this->belongsTo(CategoryPost::class, 'category_post_id');
    }
}
