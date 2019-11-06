<?php

use Illuminate\Database\Seeder;

class CateTableSeeder extends Seeder
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
    			'name' => 'Iphone',
    			'order' => 'ip',
    			'description' => 'Sản phẩm độc quyền của Apple',
    		],
    		[
    			'name' => 'Sam Sung Galaxy',
    			'order' => 'ss',
    			'description' => 'Sản phẩm độc quyền của SamSung',
    		],
    	];

        DB::table('categories')->insert($data);
    }
}
