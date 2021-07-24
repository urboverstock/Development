<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UserDocumentType extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('user_documents', function (Blueprint $table) {
            $table->enum('type', ['1', '2', '3'])->default(null)->nullable()->after('document');
            $table->string('doc_original_name')->default(null)->nullable()->after('document');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('user_documents', function (Blueprint $table) {
            //
        });
    }
}
