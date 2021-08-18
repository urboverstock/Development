<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class OrderTableDataSeeder extends Seeder
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
	    		'user_id' => '2',
	    		'order_number' => 'LMuy1625479102',
	    		'address_id' => '1',
	    		'price' => "500",
	    		'total_quantity' => "2",
	    		'created_at' => date('Y-m-d H:i:s')
    		],
    		[
	    		'user_id' => '2',
	    		'order_number' => 'XMnI1623388173',
	    		'address_id' => '2',
	    		'price' => "800",
	    		'total_quantity' => "2",
	    		'created_at' => date('Y-m-d H:i:s')
    		],
    		[
	    		'user_id' => '2',
	    		'order_number' => 'pIgC1623835829',
	    		'address_id' => '1',
	    		'price' => "580",
	    		'total_quantity' => "2",
	    		'created_at' => date('Y-m-d H:i:s')
    		],
    		[
	    		'user_id' => '2',
	    		'order_number' => 'BAdW1624618019',
	    		'address_id' => '1',
	    		'price' => "500",
	    		'total_quantity' => "1",
	    		'created_at' => date('Y-m-d H:i:s')
    		],
    		[
	    		'user_id' => '2',
	    		'order_number' => 'OK8o1624854493',
	    		'address_id' => '1',
	    		'price' => "150",
	    		'total_quantity' => "3",
	    		'created_at' => date('Y-m-d H:i:s')
    		],
    		[
	    		'user_id' => '2',
	    		'order_number' => '6Gnf1624855717',
	    		'address_id' => '1',
	    		'price' => "400",
	    		'total_quantity' => "2",
	    		'created_at' => date('Y-m-d H:i:s')
    		],
    		[
	    		'user_id' => '2',
	    		'order_number' => '6EIk1625478718',
	    		'address_id' => '1',
	    		'price' => "750",
	    		'total_quantity' => "3",
	    		'created_at' => date('Y-m-d H:i:s')
    		],
    		[
	    		'user_id' => '2',
	    		'order_number' => 'FucB1625034360',
	    		'address_id' => '1',
	    		'price' => "550",
	    		'total_quantity' => "1",
	    		'created_at' => date('Y-m-d H:i:s')
    		],
    		[
	    		'user_id' => '2',
	    		'order_number' => 'boMZ1625479000',
	    		'address_id_id' => '1',
	    		'price' => "1500",
	    		'total_quantity' => "3",
	    		'created_at' => date('Y-m-d H:i:s')
    		],
    	];

        //INSERT DATA INTO ORDER TABLE
        \DB::table('orders')->insert($orders);
    }
}
