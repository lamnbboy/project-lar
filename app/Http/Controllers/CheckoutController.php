<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\Product;
use App\Models\Category;
use App\Models\Comment;
use App\Models\Order;
use App\Models\DetailOrder;
use Mail;
use Session;

class CheckoutController extends Controller
{
    // public function __construct(){
    // 	$this->middleware('auth');
    // }

    public function getCheckout(Request $request){
    	$data['total_cart'] = 0;

        if($request->session()->has('cart')){
            $cart = $request->session()->get('cart');
            foreach($cart as $obj){
                $data['total_cart'] += $obj->quantity;
            }
        }elseif($request->hasCookie('cart')){
            $cart = $request->cookie('cart');
            if(is_array($cart)){
                foreach($cart as $obj){
                    $data['total_cart'] += $obj->quantity;
                }
            }
        }
    	return view('frontend.checkout', $data);
    }
}
