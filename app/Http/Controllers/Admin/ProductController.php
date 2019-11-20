<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\AddProductRequest;
use App\Models\Product;
use App\Models\Category;
use DB;


class ProductController extends Controller
{
    //
    public function getProduct(){
    	$data['product_list'] = DB::table('products')->join('categories', 'products.cate_id', '=', 'categories.id')->select('products.*', 'categories.name as cate_name')->orderBy('products.id', 'desc')->paginate(8);
    	
    	return view('backend.product', $data);
    }

    public function getAddProduct(){
    	$data['cate_small_list'] = Category::whereNotNull('parent_id')->get();

    	return view('backend.addproduct', $data);
    }

    public function postAddProduct(AddProductRequest $request){
    	$file_img = $request->img->getClientOriginalName();

    	$product = new Product;
    	$product->name = $request->name;
    	$product->cate_id = $request->cate;
    	$product->vendor_id = $request->vendor_id;
    	$product->price = $request->price;
    	$product->quantity = $request->quantity;
    	$product->sale_date_start = $request->sale_start;
    	$product->sale_date_end = $request->sale_end;
    	$product->image = $file_img;
    	$product->description = $request->description;
    	$product->featured = $request->featured;

    	$product->save();
    	
        $path = $request->img->storeAs('product-img', $file_img, 'public');
        
    	return back();
    }

    public function getEditProduct($id){
    	$data['product'] = Product::find($id);

    	$data['cate_small_list'] = Category::whereNotNull('parent_id')->get();
    	return view('backend.editproduct', $data);
    }

    public function postEditProduct(Request $request, $id){
    	$product = new Product;

    	$arr['name'] = $request->name;
    	$arr['cate_id'] = $request->cate;
    	$arr['vendor_id'] = $request->vendor_id;
    	$arr['price'] = $request->price;
    	$arr['quantity'] = $request->quantity;
    	$arr['sale_date_start'] = $request->sale_start;
    	$arr['sale_date_end'] = $request->sale_end;
    	$arr['description'] = $request->description;
    	$arr['featured'] = $request->featured;
    	if($request->hasFile('img')){
    		$file_img = $request->img->getClientOriginalName();
    		$arr['image'] = $file_img;
    		$request->img->storeAs('product-img', $file_img , 'public');
    	}

    	$product::where('id', $id)->update($arr);

    	return redirect('admin/product');
    }

    public function getDeleteProduct($id){
    	Product::destroy($id);
    	return back();
    }
}
