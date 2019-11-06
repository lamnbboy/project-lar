<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
    	$data = [
    		[
    			'name' => 'Long An Minh',
    			'email' => 'lamnbboy@gmail.com',
    			'password' => bcrypt('123456'),
    			'note' => 'đẹp trai',
    			'status' => 0
    		],
    		[
    			'name' => 'Quang tèp',
    			'email' => 'quangteo@gmail.com',
    			'password' => bcrypt('123456'),
    			'note' => 'đẹp trai',
    			'status' => 0
    		],
    	];

        DB::table('users')->insert($data);
    }
}
