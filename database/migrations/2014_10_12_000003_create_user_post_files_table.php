<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserPostFilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_post_files', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_post_id');
            $table->string('file')->nullable();
            $table->string('file_type')->nullable();
            $table->foreign('user_post_id')->references('id')->on('user_posts')->onDelete('cascade');
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
        Schema::dropIfExists('user_post_files');
    }
}
