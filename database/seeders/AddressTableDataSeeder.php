<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class AddressTableDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $address = [
    		[
	    		'user_id' => '2',
	    		'country' => 'India',
	    		'state' => 'Punjab',
	    		'city' => "Amritsar",
	    		'pincode' => '143001',
	    		'default' => '1',
	    		'created_at' => date('Y-m-d H:i:s')
    		],[
	    		'user_id' => '2',
	    		'country' => 'India',
	    		'state' => 'Punjab',
	    		'city' => "Mohali",
	    		'pincode' => '160055',
	    		'default' => '00',
	    		'created_at' => date('Y-m-d H:i:s')
    		]
    	];

    	//INSERT DATA INTO address TABLE
        \DB::table('address')->insert($address);
    }
}
