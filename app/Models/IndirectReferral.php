<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IndirectReferral extends Model
{
    use HasFactory;

    protected $fillable = [
        'referee_id',
        'referral_id',
        'referee_ref_earning',
        'bonus',
    ];
    
    public function referral()
    {   
        return $this->belongsTo(User::class, 'referral_id', 'id');
    }
    public function referee()
    {   
        return $this->belongsTo(User::class, 'referee_id', 'id');
    }
}
