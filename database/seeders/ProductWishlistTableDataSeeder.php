<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ProductWishlistTableDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $wishlists = [
    		[
	    		'user_id' => '1',
	    		'product_id' => '1',
	    		'created_at' => date('Y-m-d H:i:s')
    		],
    		[
    			'user_id' => '1',
	    		'product_id' => '2',
	    		'created_at' => date('Y-m-d H:i:s')
    		],
    		[
    			'user_id' => '1',    		
	    		'product_id' => '9',
	    		'created_at' => date('Y-m-d H:i:s')
    		],
    		[
    			'order_id' => '3',	    		
	    		'product_id' => '3',
	    		'created_at' => date('Y-m-d H:i:s')
    		],
    		[
    			'user_id' => '1',
	    		'product_id' => '4',
	    		'created_at' => date('Y-m-d H:i:s')
    		],
    		[
    			'user_id' => '1',
	    		'product_id' => '5',
	    		'created_at' => date('Y-m-d H:i:s')
    		],
    		[
    			'user_id' => '1',
	    		'product_id' => '6',
	    		'created_at' => date('Y-m-d H:i:s')
    		],
    		[
    			'user_id' => '1',
	    		'product_id' => '7',
	    		'created_at' => date('Y-m-d H:i:s')
    		],
    		[
    			'user_id' => '1',
	    		'product_id' => '8',
	    		'created_at' => date('Y-m-d H:i:s')
    		],
    		[
    			'user_id' => '1',
	    		'product_id' => '9',
	    		'created_at' => date('Y-m-d H:i:s')
    		],
    	];

        //INSERT DATA INTO WISHLIST TABLE
        \DB::table('product_wishlists')->insert($wishlists);
    }
}
