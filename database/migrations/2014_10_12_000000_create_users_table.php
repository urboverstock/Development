<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
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
            $table->string('first_name')->nullable()->default(null);
            $table->string('last_name')->nullable()->default(null);
            $table->string('email')->nullable()->default(null);
            $table->string('isd_code')->nullable()->default(null);
            $table->string('phone_number')->nullable()->default(null);
            $table->string('location')->nullable()->default(null);
            $table->string('gender')->nullable()->default(null);
            $table->timestamp('email_verified_at')->nullable()->default(null);
            $table->string('password');
            $table->unsignedBigInteger('user_type')->nullable()->default(1);
            $table->string('profile_pic')->nullable();
            $table->text('about')->nullable();
            $table->string('latitude')->nullable();
            $table->string('longitude')->nullable();
            $table->string('website_link')->nullable();
            $table->enum('featured', ['0', '1'])->default('0')->comment('0 No, 1 Yes');
            $table->enum('pro_seller', ['0', '1'])->default('0')->comment('0 No, 1 Yes');
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
