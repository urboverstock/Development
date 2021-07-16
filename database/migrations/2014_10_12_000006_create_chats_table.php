<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChatsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chats', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('chat_room_id');
            $table->text('message')->nullable();
            $table->string('file')->nullable(true);
            $table->enum('message_type', ['T','I','V','F'])->default('T')->nullable()->comment('T=text, I=image, V=video, F=file');
            $table->string('read_by')->nullable()->default(null)->comment('comma seperated id of users');
            $table->string('deleted_by')->nullable()->default(null)->comment('comma seperated id of users');
            $table->foreign('chat_room_id')->references('id')->on('chat_rooms')->onDelete('cascade');
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
        Schema::dropIfExists('chats');
    }
}
