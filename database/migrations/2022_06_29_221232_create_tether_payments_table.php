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
        Schema::create('tether_payments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->foreignId('stake_plan_id')->constrained()->cascadeOnDelete();
            $table->foreignId('user_stake_plan_id')->constrained()->cascadeOnDelete();
            $table->foreignId('wallet_address_id')->constrained()->cascadeOnDelete();
            $table->mediumText('hash');
            $table->text('image');
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
        Schema::dropIfExists('tether_payments');
    }
};
