<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGuestUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('guest_users', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable()->default(null);
            $table->string('email')->nullable()->default(null);
            $table->string('isd_code')->nullable()->default(null);
            $table->string('phone_number')->nullable()->default(null);
            $table->string('location')->nullable()->default(null);
            $table->string('gender')->nullable()->default(null);
            $table->timestamp('email_verified_at')->nullable()->default(null);
            $table->string('password')->nullable();
            $table->unsignedBigInteger('user_type')->nullable()->default(1);
            $table->string('profile_pic')->nullable();
            $table->text('about')->nullable();
            $table->string('latitude')->nullable();
            $table->string('longitude')->nullable();
            $table->string('website_link')->nullable();
            $table->string('physical_address')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('guest_user');
    }
}
