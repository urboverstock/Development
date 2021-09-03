<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class UserRoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $types = [
    		[
	    		'name' => 'Admin',
                'display_name' => 'Admin',
                'guard_name' => 'web',
	    		'created_at' => date('Y-m-d H:i:s')
    		],[
	    		'name' => 'SubAdmin',
                'display_name' => 'Sub Admin',
                'guard_name' => 'web',
	    		'created_at' => date('Y-m-d H:i:s')
    		],[
	    		'name' => 'Seller',
                'display_name' => 'Seller',
                'guard_name' => 'web',
	    		'created_at' => date('Y-m-d H:i:s')
    		],[
	    		'name' => 'Customer',
                'display_name' => 'Customer',
                'guard_name' => 'web',
	    		'created_at' => date('Y-m-d H:i:s')
    		]
    	];

         //INSERT DATA INTO USER TYPES TABLE
        \DB::table('user_roles')->insert($types);
    }
}
