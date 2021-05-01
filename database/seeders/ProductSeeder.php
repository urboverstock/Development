<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $products = [
    		[
	    		'name' => 'Half Sleeve T-Shirt',
	    		'description' => "Pause the boring moments in this Arcade Green Men's Henley Hoodie T-Shirt. Partner this t-shirt with a pair of solid jeans, quirky sliders and wayfarers for a hangout session with friends.",
	    		'user_id' => '2',
	    		'category_id' => '1',
	    		'price' => '80.02',
	    		'created_at' => date('Y-m-d H:i:s')
    		],[
	    		'name' => 'Atlantic Deep Full Sleeve T-Shirt',
	    		'description' => "Pause the boring moments in this Arcade Green Men's Henley Hoodie T-Shirt. Partner this t-shirt with a pair of solid jeans, quirky sliders and wayfarers for a hangout session with friends.",
	    		'description' => 'Atlantic Deep Full Sleeve T-Shirt',
	    		'price' => '20.00',
	    		'user_id' => '2',
	    		'category_id' => '1',
	    		'created_at' => date('Y-m-d H:i:s')
    		],[
	    		'name' => 'Atlantic Deep Full Sleeve T-Shirt',
	    		'description' => "Pause the boring moments in this Arcade Green Men's Henley Hoodie T-Shirt. Partner this t-shirt with a pair of solid jeans, quirky sliders and wayfarers for a hangout session with friends.",
	    		'description' => 'Atlantic Deep Full Sleeve T-Shirt',
	    		'price' => '50.00',
	    		'category_id' => '2',
	    		'user_id' => '2',
	    		'created_at' => date('Y-m-d H:i:s')
    		],[
	    		'name' => 'Fur Collar Faux Leather Jacket',
	    		'description' => "Pause the boring moments in this Arcade Green Men's Henley Hoodie T-Shirt. Partner this t-shirt with a pair of solid jeans, quirky sliders and wayfarers for a hangout session with friends.",
	    		'description' => 'Atlantic Deep Full Sleeve T-Shirt',
	    		'price' => '1999',
	    		'category_id' => '1',
	    		'user_id' => '2',
	    		'created_at' => date('Y-m-d H:i:s')
			],[
	    		'name' => 'Half Sleeve T-Shirt',
	    		'description' => "Pause the boring moments in this Arcade Green Men's Henley Hoodie T-Shirt. Partner this t-shirt with a pair of solid jeans, quirky sliders and wayfarers for a hangout session with friends.",
	    		'user_id' => '2',
	    		'category_id' => '1',
	    		'price' => '80.02',
	    		'created_at' => date('Y-m-d H:i:s')
    		],[
	    		'name' => 'Atlantic Deep Full Sleeve T-Shirt',
	    		'description' => "Pause the boring moments in this Arcade Green Men's Henley Hoodie T-Shirt. Partner this t-shirt with a pair of solid jeans, quirky sliders and wayfarers for a hangout session with friends.",
	    		'description' => 'Atlantic Deep Full Sleeve T-Shirt',
	    		'price' => '20.00',
	    		'user_id' => '2',
	    		'category_id' => '1',
	    		'created_at' => date('Y-m-d H:i:s')
    		],[
	    		'name' => 'Fur Collar Faux Leather Jacket',
	    		'description' => "Pause the boring moments in this Arcade Green Men's Henley Hoodie T-Shirt. Partner this t-shirt with a pair of solid jeans, quirky sliders and wayfarers for a hangout session with friends.",
	    		'description' => 'Atlantic Deep Full Sleeve T-Shirt',
	    		'price' => '1999',
	    		'category_id' => '1',
	    		'user_id' => '2',
	    		'created_at' => date('Y-m-d H:i:s')
			]
    	];

        //INSERT DATA INTO PRODUCT CATEGORY ABLE
        \DB::table('products')->insert($products);
    }
}
