<?php

use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('username');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('name');
            $table->float('rubic_wallet')->default(0);
            $table->float('rubic_stake_wallet')->default(0);
            $table->float('extraction_balance')->default(0);
            $table->float('ref_earning')->default(0);
            $table->float('indirect_ref_earning')->default(0);
            $table->float('viral_share_earning')->default(0);
            $table->timestamp('email_verified_at')->nullable();
            $table->text('image')->nullable();
            $table->string('phone');
            $table->string('country')->nullable();
            $table->text('address')->nullable();
            $table->string('city')->nullable();
            $table->string('zip_code')->nullable();
            $table->boolean('status')->nullable();
            $table->ipAddress('ip_address');
            $table->dateTime('last_login')->nullable();
            // $table->string('kyc_link')->nullable();
            // $table->integer('kyc_status')->default(0);
            $table->string('pin')->default(0000);
            $table->string('verification_code');
            $table->string('sms_code');
            $table->boolean('phone_verify');
            $table->boolean('email_verify');
            $table->dateTime('email_time');
            $table->dateTime('phone_time');
            $table->boolean('upgrade')->nullable();
            $table->string('googlefa_secret')->nullable();
            $table->boolean('fa_status')->default(0);
            $table->foreignId('coupon_id');
            $table->foreignId('plan_id');
            $table->foreignId('bank_id')->nullable();
            $table->string('account_no')->nullable();
            $table->string('account_name')->nullable();
            $table->enum('account_type', ['savings', 'current'])->nullable();
            $table->foreignId('data_operator_id')->nullable();
            $table->string('phone_number')->nullable();
            // $table->boolean('is_expired')->default(0);
            $table->date('activated_at')->nullable();
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
