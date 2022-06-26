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
        Schema::table('user_stake_plans', function (Blueprint $table) {
            //
            $table->dropColumn('start_time');
            $table->dropColumn('complete_time');
            $table->integer('remaining_days');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('user_stake_plans', function (Blueprint $table) {
            //
            $table->dropColumn('remaining_days');
            $table->dateTime('start_time')->nullable();
            $table->dateTime('complete_time')->nullable();
        });
    }
};
