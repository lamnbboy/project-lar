@extends('frontend.master')
@section('title', 'Danh mục sản phẩm')
@section('main')
<link rel="stylesheet" href="css/category.css">
<link rel="stylesheet" href="css/search.css">

<div id="wrap-inner">
	<div class="products">
		<h3>{{$cate_infor->name}}</h3>
		<div class="product-list row">
			@foreach($item_list as $item)
			<div class="product-item col-md-3 col-sm-6 col-xs-12">
				<a href="#"><img height="150px" src="{{ asset('storage/product-img').'/'.$item->image }}" class="img-thumbnail"></a>
				<p><a href="#">{{$item->name}}</a></p>
				<p class="price">{{number_format($item->price, 0, '.', ',')}} VNĐ</p>	  
				<!-- <div class="marsk">
					<a href="{{asset('detail/'.$item->id)}}">Xem chi tiết</a>
				</div>   -->         
				<div class="row product_buttons">
					<input type="hidden" class="id_product" value="{{$item->id}}">
					<input type="hidden" class="url_add_cart" value="{{asset('add-to-cart')}}">
					<div class="col-md-12"><button class="btn btn-primary btn_buy_prod" style="cursor: pointer;">Mua ngay</button></div>
				</div>                          
			</div>
			@endforeach
		</div>                	                	
	</div>

	<div class="row text-center">
		<div class="col-md-12">
			{{$item_list->links()}}
		</div>
		
	</div>
</div>
@stop