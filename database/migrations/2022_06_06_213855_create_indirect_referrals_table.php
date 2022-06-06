<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('indirect_referrals', function (Blueprint $table) {
            $table->id();
            $table->foreignId('referee_id')->references('id')->on('users')->cascadeOnDelete();
            $table->foreignId('referral_id')->references('id')->on('users')->cascadeOnDelete();
            $table->float('referee_ref_earning');
            $table->float('bonus');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('indirect_referrals');
    }
};
