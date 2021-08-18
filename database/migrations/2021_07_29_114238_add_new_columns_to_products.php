<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddNewColumnsToProducts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('products', function (Blueprint $table) {
            $table->double('compare_price', 8,2)->nullable()->after('price');
            $table->double('cost_per_price', 8,2)->nullable()->after('compare_price');
            $table->string('brand')->nullable()->after('cost_per_price');
            $table->string('sku', 100)->nullable()->after('brand');
            $table->string('barcode', 100)->nullable()->after('sku');
            $table->integer('charge_tax')->default(0)->nullable()->after('barcode')->comment('0 No 1 Yes');
            $table->integer('quantity')->default(0)->nullable()->after('charge_tax');
            $table->integer('track_quantity')->default(0)->nullable()->after('quantity')->comment('0 No 1 Yes');
            $table->integer('continue_selling')->default(0)->nullable()->after('track_quantity')->comment('0 No 1 Yes');
            $table->string('tags', 255)->nullable()->after('continue_selling');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('products', function (Blueprint $table) {
            //
        });
    }
}
