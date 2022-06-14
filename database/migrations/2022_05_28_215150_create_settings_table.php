<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

use function Psy\debug;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('site_name');
            $table->mediumText('site_desc');
            $table->string('email');
            $table->string('mobile');
            $table->string('address');
            $table->integer('balance_reg')->default(0);
            $table->boolean('email_notify')->default(0);
            $table->boolean('sms_notify')->default(0);
            $table->boolean('email_verification')->default(0);
            $table->boolean('sms_verification')->default(0);
            $table->boolean('registration')->default(1);
            $table->boolean('extraction_transfer')->default(1);
            $table->dateTime('extraction_transfer_start')->nullable();
            $table->dateTime('extraction_transfer_end')->nullable();
            $table->boolean('viral_share_transfer')->default(1);
            $table->dateTime('viral_share_transfer_start')->nullable();
            $table->dateTime('viral_share_transfer_end')->nullable();
            $table->boolean('ref_earning_transfer')->default(1);
            $table->dateTime('ref_earning_transfer_start')->nullable();
            $table->dateTime('ref_earning_transfer_end')->nullable();
            $table->boolean('indirect_ref_earning_transfer')->default(1);
            $table->dateTime('indirect_ref_earning_transfer_start')->nullable();
            $table->dateTime('indirect_ref_earning_transfer_end')->nullable();
            $table->boolean('stake_ref_earning_transfer')->default(1);
            $table->dateTime('stake_ref_earning_transfer_start')->nullable();
            $table->dateTime('stake_ref_earning_transfer_end')->nullable();
            $table->boolean('upgrade_status')->default(1);
            $table->integer('upgrade_fee');
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
        Schema::dropIfExists('settings');
    }
};
