<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Http\Requests\AddCateRequest;
use App\Http\Requests\EditCateRequest;

class CategoryController extends Controller
{
    //
    public function getCate(Request $request){
        $strWhere = '';
        if(isset($request->search_cate)){
            $strWhere .= $request->search_cate;
        }

    	$data['cate_list'] = Category::where('name', 'like', '%'. $strWhere .'%')->paginate(4);

        $data['cate_list']->appends($request->all());

    	$data['cate_parent_list'] = Category::whereNull('parent_id')->get();

    	return view('backend.category', $data);
    }

    public function postCate(AddCateRequest $request){
    	$category = new Category;
    	$category->name = $request->name;
    	if($request->parent_id != 0){
    		$category->parent_id = $request->parent_id;
    	}
    	$category->order = $request->order;
    	$category->description = $request->description;

    	$category->save();

    	return back();
    }

    public function getEditCate($id){
    	$data['cate'] = Category::find($id);

    	$data['cate_parent_list'] = Category::whereNull('parent_id')->get();

    	return view('backend.editcategory', $data);
    }

    public function postEditCate(Request $request, $id){
    	$category = new Category;
    	$arr['name'] = $request->name;
    	if($request->parent_id != 0){
    		$arr['parent_id'] = $request->parent_id;
    	}
    	$arr['order'] = $request->order;
    	$arr['description'] = $request->description;

    	$category::where('id', $id)->update($arr);

    	return redirect()->intended('admin/category');
    }

    public function getDeleteCate($id){
    	Category::destroy($id);
    	return back();
    }
}
