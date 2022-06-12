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
        Schema::create('user_stake_plans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->foreignId('stake_plan_id')->constrained()->cascadeOnDelete();
            $table->boolean('status');
            $table->foreignId('stake_coupon_id')->nullable()->constrained()->cascadeOnDelete();
            $table->float('stake_profit')->default(0);
            $table->boolean('is_withdrawn')->default(0);
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
        Schema::dropIfExists('user_stake_plans');
    }
};
