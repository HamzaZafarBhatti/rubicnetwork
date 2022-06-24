<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaymentProof extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'image',
        'caption',
        'status'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    protected function formatedCreatedAt(): Attribute
    {
        return Attribute::make(
            get: fn ($created_at) => Carbon::parse($created_at)->toFormattedDateString(),
        );
    }
}
