<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PaymentProof extends Model
{
    //
    protected $table = "payment_proofs";
    protected $guard = [];

	protected $fillable = array('user_id','image', 'caption', 'status');
    
    public function user() {
        return $this->belongsTo(User::class);
    }
}
