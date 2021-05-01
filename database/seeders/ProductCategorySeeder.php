<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ProductCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [
    		[
	    		'name' => 'Men',
	    		'created_at' => date('Y-m-d H:i:s')
    		],[
	    		'name' => 'Women',
	    		'created_at' => date('Y-m-d H:i:s')
    		],
    	];

        //INSERT DATA INTO PRODUCT CATEGORY ABLE
        \DB::table('product_categories')->insert($categories);
    }
}
