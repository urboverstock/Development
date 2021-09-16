<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
    		[
	    		'first_name' => 'Admin',
	    		'email' => 'admin@yopmail.com',
	    		'password' => Hash::make(12345678),
	    		'user_type' => '2',
                'profile_pic' => 'assets/images/section-7/1.png',
                'about' => '',
                'billing_address' => '',
	    		'created_at' => date('Y-m-d H:i:s')
    		]
    	];

        //INSERT DATA INTO USERS ABLE
        \DB::table('users')->insert($users);
    }
}
