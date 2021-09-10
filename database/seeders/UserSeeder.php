<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Hash;

class UserSeeder extends Seeder
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
	    		'first_name' => 'Super Admin',
	    		'email' => 'superadmin@yopmail.com',
	    		'password' => Hash::make(12345678),
	    		'user_type' => '1',
                'profile_pic' => 'assets/images/section-7/1.png',
                'about' => '',
                'billing_address' => '',
	    		'created_at' => date('Y-m-d H:i:s')
    		],[
	    		'first_name' => 'Levis',
	    		'email' => 'levis@yopmail.com',
	    		'password' => Hash::make(12345678),
	    		'user_type' => '4',
                'profile_pic' => 'assets/images/section-7/1.png',
                'about' => 'Irish artist surviving online ⁣ vintage, 
                            reworking & drawing a sad man ⁣⁣⁣ I made
                            a documentary about my life, ok',
                'billing_address' => '',
	    		'created_at' => date('Y-m-d H:i:s')
    		],[
                'first_name' => 'Jack Jones',
                'email' => 'jack@yopmail.com',
                'password' => Hash::make(12345678),
                'user_type' => '4',
                'profile_pic' => 'assets/images/section-7/1.png',
                'about' => 'Irish artist surviving online ⁣ vintage, 
                            reworking & drawing a sad man ⁣⁣⁣ I made
                            a documentary about my life, ok',
                'billing_address' => '',
                'created_at' => date('Y-m-d H:i:s')
            ] ,[
                'first_name' => 'Jordan',
                'email' => 'jordan@yopmail.com',
                'password' => Hash::make(12345678),
                'user_type' => '4',
                'profile_pic' => 'assets/images/section-7/1.png',
                'about' => 'Irish artist surviving online ⁣ vintage, 
                            reworking & drawing a sad man ⁣⁣⁣ I made
                            a documentary about my life, ok',
                'billing_address' => '',
                'created_at' => date('Y-m-d H:i:s')
            ] 
    	];

        //INSERT DATA INTO USERS ABLE
        \DB::table('users')->insert($users);
    }
}
