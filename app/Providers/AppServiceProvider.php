<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Category;
use Session;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
        $data['cate_parent_list'] = Category::whereNull('parent_id')->get();

        $data['cate_small_list'] = Category::whereNotNull('parent_id')->get();

        // $data['cart'] = array();
        // $data['total_cart'] = 0;
        
        // if(Session::has('cart')){
        //     die('o');
        //     $data['cart'] = Session::get('cart');
        // }

        view()->share($data);
    }
}
