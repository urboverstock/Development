<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class OrderDetailTableDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $orders = [
    		[
	    		'order_id' => '1',
	    		'product_id' => '1',
	    		'product_quantity' => "2",
	    		'product_price' => "250",
	    		'status' => NULL,
	    		'created_at' => date('Y-m-d H:i:s')
    		],
    		[
    			'order_id' => '2',
	    		'product_id' => '2',
	    		'product_quantity' => "2",
	    		'product_price' => "200",
	    		'status' => NULL,
	    		'created_at' => date('Y-m-d H:i:s')
    		],
    		[
    			'order_id' => '2',	    		
	    		'product_id' => '9',
	    		'product_quantity' => "2",
	    		'product_price' => "200",
	    		'status' => NULL,
	    		'created_at' => date('Y-m-d H:i:s')
    		],
    		[
    			'order_id' => '3',	    		
	    		'product_id' => '3',
	    		'product_quantity' => "2",
	    		'product_price' => "290",
	    		'status' => NULL,
	    		'created_at' => date('Y-m-d H:i:s')
    		],
    		[
    			'order_id' => '4',	    		
	    		'product_id' => '4',
	    		'product_quantity' => "1",
	    		'product_price' => "500",
	    		'status' => NULL,
	    		'created_at' => date('Y-m-d H:i:s')
    		],
    		[
    			'order_id' => '5',	    		
	    		'product_id' => '5',
	    		'product_quantity' => "3",
	    		'product_price' => "50",
	    		'status' => NULL,
	    		'created_at' => date('Y-m-d H:i:s')
    		],
    		[
    			'order_id' => '6',	    		
	    		'product_id' => '6',
	    		'product_quantity' => "2",
	    		'product_price' => "200",
	    		'status' => NULL,
	    		'created_at' => date('Y-m-d H:i:s')
    		],
    		[
    			'order_id' => '7',	    		
	    		'product_id' => '7',
	    		'product_quantity' => "3",
	    		'product_price' => "250",
	    		'status' => NULL,
	    		'created_at' => date('Y-m-d H:i:s')
    		],
    		[
    			'order_id' => '8',	    		
	    		'product_id' => '8',
	    		'product_quantity' => "1",
	    		'product_price' => "550",
	    		'status' => NULL,
	    		'created_at' => date('Y-m-d H:i:s')
    		],
    		[
    			'order_id' => '9',	    		
	    		'product_id' => '9',
	    		'product_quantity' => "3",
	    		'product_price' => "500",
	    		'status' => NULL,
	    		'created_at' => date('Y-m-d H:i:s')
    		],
    	];

        //INSERT DATA INTO ORDER TABLE
        \DB::table('order_details')->insert($orders);
    }
}
