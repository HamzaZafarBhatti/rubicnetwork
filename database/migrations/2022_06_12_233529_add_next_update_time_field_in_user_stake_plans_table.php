<?php

use Carbon\Carbon;
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
            $table->dateTime('next_update_time')->after('is_withdrawn');
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
            $table->dropColumn('next_update_time');
        });
    }
};
