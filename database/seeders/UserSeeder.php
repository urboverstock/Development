<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

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
	    		'name' => 'Super Admin',
	    		'email' => 'superadmin@yopmail.com',
	    		'password' => '$2y$10$Bm9..S6QWhzP9iXCW7RXxubllLoeMZ1d6IrP5swYMSgWgzkMYfMim',
	    		'user_type' => '1',
                'profile_pic' => 'assets/images/section-7/1.png',
                'about' => '',
	    		'created_at' => date('Y-m-d H:i:s')
    		],[
	    		'name' => 'Levis',
	    		'email' => 'levis@yopmail.com',
	    		'password' => '$2y$10$Bm9..S6QWhzP9iXCW7RXxubllLoeMZ1d6IrP5swYMSgWgzkMYfMim',
	    		'user_type' => '3',
                'profile_pic' => 'assets/images/section-7/1.png',
                'about' => 'Irish artist surviving online ⁣ vintage, 
                            reworking & drawing a sad man ⁣⁣⁣ I made
                            a documentary about my life, ok',
	    		'created_at' => date('Y-m-d H:i:s')
    		],[
                'name' => 'Jack Jones',
                'email' => 'jack@yopmail.com',
                'password' => '$2y$10$Bm9..S6QWhzP9iXCW7RXxubllLoeMZ1d6IrP5swYMSgWgzkMYfMim',
                'user_type' => '3',
                'profile_pic' => 'assets/images/section-7/1.png',
                'about' => 'Irish artist surviving online ⁣ vintage, 
                            reworking & drawing a sad man ⁣⁣⁣ I made
                            a documentary about my life, ok',
                'created_at' => date('Y-m-d H:i:s')
            ] ,[
                'name' => 'Jordan',
                'email' => 'jordan@yopmail.com',
                'password' => '$2y$10$Bm9..S6QWhzP9iXCW7RXxubllLoeMZ1d6IrP5swYMSgWgzkMYfMim',
                'user_type' => '3',
                'profile_pic' => 'assets/images/section-7/1.png',
                'about' => 'Irish artist surviving online ⁣ vintage, 
                            reworking & drawing a sad man ⁣⁣⁣ I made
                            a documentary about my life, ok',
                'created_at' => date('Y-m-d H:i:s')
            ] 
    	];

        //INSERT DATA INTO USERS ABLE
        \DB::table('users')->insert($users);
    }
}
