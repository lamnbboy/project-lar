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
use Illuminate\Support\Facades\Storage;

class FrontendController extends Controller
{
    //
    public function getHome(Request $request){
    	$data['featured_product_list'] = Product::where('featured', 1)->orderBy('id', 'desc')->take(8)->get();

    	$data['new_product_list'] = Product::orderBy('id', 'desc')->take(8)->get();

    	$data['category_list'] = Category::orderBy('id', 'desc')->get();

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

    	return view('frontend.home', $data);
    }

    public function getDetail(Request $request, $id){
    	$data['item'] = Product::find($id);

    	$data['comment_list'] = Comment::where('com_product', $id)->orderBy('com_id', 'desc')->get();

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

    	return view('frontend.details', $data);
    }

    public function postComment(Request $request, $id){
    	$comment = new Comment();
    	$comment->com_name = $request->name;
    	$comment->com_email = $request->email;
    	$comment->com_content = $request->content;
    	$comment->com_product = $id;

    	$comment->save();

    	return back();
    }

    public function getCategory(Request $request, $id){
    	$data['cate_infor'] = Category::find($id);

    	$data['item_list'] = Product::where('cate_id', $id)->orderBy('id', 'desc')->paginate(4);

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

    	return view('frontend.category', $data);
    }

    public function getSearch(Request $request){
    	$result = $request->result;
    	$data['keyword'] = $result;

    	$result = str_replace(' ', '%', $result);

    	$data['item_search_list'] = Product::where('name', 'like', '%'.$result.'%')->get();

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

    	return view('frontend.search', $data);
    }

    public function postAddToCart(Request $request){

        // echo $request->id;
        // echo $request->quantity;

        // Kiểm tra xem session giỏ hàng có hay chưa :
        if($request->session()->has('cart') == false){
            // chưa có cart: => tạo mới cart session và add sản phẩm mới mua vào cart
            // $obj = array('id_prod' => $request->id, 'quantity' => $request->quantity);

            // $request->session()->put('cart', $obj);
            $obj = new \stdClass();
            $obj->id_prod = $request->id;
            $obj->quantity = $request->quantity;

            $cart = array();
            $cart[] = $obj;

            $request->session()->put('cart', $cart);
            Session::put('cart', $cart);

            // $response = new Response;
            // $response->withCookie('cart', $old_cart, 30);

            // $ok = $request->session()->get('cart');

            // print_r($ok);

        }else{
            // đã có cart:
            // $request->session()->forget('cart');
            $old_cart = $request->session()->get('cart');

            // Kiểm tra có tồn tại sản phẩm này trong cart chưa:
            $check = 0;
            foreach ($old_cart as $obj) {
                if($obj->id_prod == $request->id){
                    // đã có rồi : => tăng số lượng quantity lên:
                    $obj->quantity += 1;
                    $check = 1;
                    break;
                }
            }

            $new = new \stdClass();
            $new->id_prod = $request->id;
            $new->quantity = $request->quantity;

            if($check == 0){
                array_push($old_cart, $new);
            }

            $request->session()->put('cart', $old_cart);

            // $response = new Response;
            // $response->withCookie('cart', $old_cart, 30);

            // $ok = $request->session()->get('cart');
            
            // print_r($ok);

        }

    }

    public function getCart(Request $request){
        $data['product_in_cart'] = array();
        $data['total_cart'] = 0;
        $data['total_money'] = 0;

        if($request->session()->has('cart')){
            $cart = $request->session()->get('cart');
            foreach($cart as $obj){
                $prod = Product::find($obj->id_prod);

                $item = new \stdClass();
                $item->id_prod = $prod->id;
                $item->description_image = $prod->image;
                $item->name = $prod->name;
                $item->quantity = $obj->quantity;
                $item->price_order = (int) $prod->price;
                $item->money = $item->price_order * $obj->quantity;

                $data['product_in_cart'][] = $item;
                $data['total_cart'] += $obj->quantity;
                $data['total_money'] += $item->money;
            }
        }elseif($request->hasCookie('cart')){
            $cart = $request->cookie('cart');
            if(is_array($cart)){
                foreach($cart as $obj){
                    $prod = Product::find($obj->id_prod);
                
                    $item = new \stdClass();
                    $item->id_prod = $prod->id;
                    $item->description_image = $prod->image;
                    $item->name = $prod->name;
                    $item->quantity = $obj->quantity;
                    $item->price_order = (int) $prod->price;
                    $item->money = $item->price_order * $obj->quantity;

                    $data['product_in_cart'][] = $item;
                    $data['total_cart'] += $obj->quantity;
                    $data['total_money'] += $item->money;
                }
            }
        }

        return view('frontend.cart', $data);
    }

    public function postUpdateCart(Request $request){
        // print_r($request->id_prod);
        // print_r($request->quantity);

        $arr_id_prod = $request->id_prod;
        $arr_quantity_prod = $request->quantity;

        if($request->session()->has('cart')){
            $cart = $request->session()->get('cart');
            $updated_cart = array();

            $i = 0;
            foreach($cart as $item){
                if($item->id_prod == $arr_id_prod[$i] && $arr_quantity_prod[$i] != 0){
                    $obj = new \stdClass();
                    $obj->id_prod = $arr_id_prod[$i];
                    $obj->quantity = $arr_quantity_prod[$i];

                    $updated_cart[] = $obj;

                    $i++;
                }
            }

            if(empty($updated_cart)){
                $request->session()->forget('cart');
            }else{
                $request->session()->put('cart', $updated_cart);
            }

            // print_r($request->session()->get('cart'));
        }elseif($request->hasCookie('cart')){
            $cart = $request->cookie('cart');
            $updated_cart = array();

            $i = 0;
            foreach($cart as $item){
                if($item->id_prod == $arr_id_prod[$i] && $arr_quantity_prod[$i] != 0){
                    $obj = new \stdClass();
                    $obj->id_prod = $arr_id_prod[$i];
                    $obj->quantity = $arr_quantity_prod[$i];

                    $updated_cart[] = $obj;

                    $i++;
                }
            }

            if(empty($updated_cart)){
                // xóa cookie
            }else{
                // update lại cookie với $updated_cart
            }

            // print_r($request->session()->get('cart'));
        }
    }

    public function deleteOneItemOfCart(Request $request, $id){
        if($request->session()->has('cart')){
            $cart = $request->session()->get('cart');

            $i = 0;
            foreach($cart as $item){
                if($item->id_prod == $id){
                    array_splice($cart, $i, 1);
                    break;
                }
                $i++;
            }

            $request->session()->put('cart', $cart);

            // print_r($request->session()->get('cart'));
        }elseif($request->hasCookie('cart')){
            $cart = $request->cookie('cart');

            $i = 0;
            foreach($cart as $item){
                if($item->id_prod == $id){
                    array_splice($cart, $i, 1);
                    break;
                }
                $i++;
            }

            // update lại cookie vs $cart

            // print_r($request->session()->get('cart'));
        }

        return back();
    }

    public function deleteAllOfCart(Request $request){
        if($request->session()->has('cart')){
            // xóa session cart
            $request->session()->forget('cart');
        }elseif($request->hasCookie('cart')){
            // xóa cookie cart
        }

        return back();
    }

    public function postCompleteShopping(Request $request){
        if($request->session()->has('cart')){
            $data['info'] = $request->all();

            $data['product_in_cart'] = array();
            $data['total_cart'] = 0;
            $data['total_money'] = 0;

            $cart = $request->session()->get('cart');

            foreach($cart as $obj){
                $prod = Product::find($obj->id_prod);

                $item = new \stdClass();
                $item->id_prod = $prod->id;
                $item->name = $prod->name;
                $item->quantity = $obj->quantity;
                $item->price_order = (int) $prod->price;
                $item->money = $item->price_order * $obj->quantity;

                $data['product_in_cart'][] = $item;
                $data['total_cart'] += $obj->quantity;
                $data['total_money'] += $item->money;
            }

            $email = $request->email;

            Mail::send('frontend.email', $data, function($message) use ($email){
                $message->from('ngtathuan98@gmail.com', 'LAMN');

                $message->to($email, $email);

                // $message->cc('cowell.gec', '');

                $message->subject('Xác nhận hóa đơn mua hàng COWELL-GEC Shop');
            });

            // Lưu DB cho order
            $new_order = new Order();
            $new_order->email_cus = $request->email;
            $new_order->name_cus = $request->name;
            $new_order->phone_cus = $request->phone;
            $new_order->address_cus = $request->add;
            $new_order->status = 1;
            $new_order->total_money = $data['total_money'];

            $check = $new_order->save();

            // Vòng lặp từng sản phẩm trong cart để lưu DB cho details order
            foreach($data['product_in_cart'] as $pr){
                $new_detail_order = new DetailOrder();
                $new_detail_order->id_order = $new_order->id;
                $new_detail_order->id_product = $pr->id_prod;
                $new_detail_order->quantity = $pr->quantity;
                $new_detail_order->money = $pr->price_order;

                $new_detail_order->save();
            }

            $request->session()->forget('cart');

            return redirect('complete');
        }
    }

    public function getComplete(Request $request){

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

        return view('frontend.complete', $data);
    }

    public function getApiCart(Request $request){
        $data['product_in_cart'] = array();
        $data['total_cart'] = 0;
        $data['total_money'] = 0;

        if($request->session()->has('cart')){
            $cart = $request->session()->get('cart');
            foreach($cart as $obj){
                $prod = Product::find($obj->id_prod);

                $item = new \stdClass();
                $item->id_prod = $prod->id;
                $item->description_image = $prod->image;
                $item->name = $prod->name;
                $item->quantity = $obj->quantity;
                $item->price_order = (int) $prod->price;
                $item->money = $item->price_order * $obj->quantity;

                $data['product_in_cart'][] = $item;
                $data['total_cart'] += $obj->quantity;
                $data['total_money'] += $item->money;
            }
        }elseif($request->hasCookie('cart')){
            $cart = $request->cookie('cart');
            if(is_array($cart)){
                foreach($cart as $obj){
                    $prod = Product::find($obj->id_prod);
                
                    $item = new \stdClass();
                    $item->id_prod = $prod->id;
                    $item->description_image = $prod->image;
                    $item->name = $prod->name;
                    $item->quantity = $obj->quantity;
                    $item->price_order = (int) $prod->price;
                    $item->money = $item->price_order * $obj->quantity;

                    $data['product_in_cart'][] = $item;
                    $data['total_cart'] += $obj->quantity;
                    $data['total_money'] += $item->money;
                }
            }
        }

        return response()->json($data, 200);
    }

    public function postApiCheckOut(Request $request){

        if($request->session()->has('cart')){
            $data['info'] = $request->all();

            $data['product_in_cart'] = array();
            $data['total_cart'] = 0;
            $data['total_money'] = 0;

            $cart = $request->session()->get('cart');

            foreach($cart as $obj){
                $prod = Product::find($obj->id_prod);

                $item = new \stdClass();
                $item->id_prod = $prod->id;
                $item->name = $prod->name;
                $item->quantity = $obj->quantity;
                $item->price_order = (int) $prod->price;
                $item->money = $item->price_order * $obj->quantity;

                $data['product_in_cart'][] = $item;
                $data['total_cart'] += $obj->quantity;
                $data['total_money'] += $item->money;
            }

            // $email = $request->email_cus;

            // Mail::send('frontend.email', $data, function($message) use ($email){
            //     $message->from('ngtathuan98@gmail.com', 'LAMN');

            //     $message->to($email, $email);

            //     // $message->cc('cowell.gec', '');

            //     $message->subject('Xác nhận hóa đơn mua hàng COWELL-GEC Shop');
            // });

            // Lưu DB cho order
            $new_order = new Order();
            $new_order->email_cus = $request->email_cus;
            $new_order->name_cus = $request->name_cus;
            $new_order->phone_cus = $request->phone_cus;
            $new_order->address_cus = $request->address_cus;
            $new_order->status = 1;
            $new_order->total_money = $data['total_money'];

            $check = $new_order->save();

            // Vòng lặp từng sản phẩm trong cart để lưu DB cho details order
            foreach($data['product_in_cart'] as $pr){
                $new_detail_order = new DetailOrder();
                $new_detail_order->id_order = $new_order->id;
                $new_detail_order->id_product = $pr->id_prod;
                $new_detail_order->quantity = $pr->quantity;
                $new_detail_order->money = $pr->price_order;

                $new_detail_order->save();
            }

            $request->session()->forget('cart');

            $tb = new \stdClass();
            $tb->status = true;
            $tb->message = 'CheckOut successfully';

            return response()->json($tb);
        }

        $tb = new \stdClass();
        $tb->status = false;
        $tb->message = 'Have not any product to checkout => Failed';

        return response()->json($tb);
    }
}
