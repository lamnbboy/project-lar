@extends('frontend.master')
@section('title', 'Trang chủ')
@section('main')
<div id="wrap-inner">
	<div class="products">
		<h3>Sản phẩm nổi bật</h3>
		<div class="product-list row">
			@foreach($featured_product_list as $item)
			<div class="product-item col-md-3 col-sm-6 col-xs-12">
				<a href="{{asset('detail/'.$item->id)}}"><img height="150px" src="{{asset('storage/product-img/'.$item->image)}}" class="img-thumbnail"></a>
				<p><a href="{{asset('detail/'.$item->id)}}">{{$item->name}}</a></p>
				<p class="price">{{number_format($item->price, 0, '.', ',')}} VNĐ</p>	  
				<!-- <div class="marsk">
					<a href="{{asset('detail/'.$item->id)}}">Xem chi tiết</a>
				</div> -->
				<div class="row product_buttons">
					<input type="hidden" class="id_product" value="{{$item->id}}">
					<input type="hidden" class="url_add_cart" value="{{asset('add-to-cart')}}">
					<div class="col-md-12"><button type="button" class="btn btn-primary btn_buy_prod" style="cursor: pointer;">Mua ngay</button></div>
				</div>
			</div>
			@endforeach
		</div>                	                	
	</div>

	<div class="products">
		<h3>Sản phẩm mới</h3>
		<div class="product-list row">
			@foreach($new_product_list as $new)
			<div class="product-item col-md-3 col-sm-6 col-xs-12">
				<a href="{{asset('detail/'.$new->id)}}"><img height="150px" src="{{asset('storage/product-img/'.$new->image)}}" class="img-thumbnail"></a>
				<p><a href="{{asset('detail/'.$new->id)}}">{{$new->name}}</a></p>
				<p class="price">{{number_format($new->price, 0, '.', ',')}} VNĐ</p>	  
				<!-- <div class="marsk">
					<a href="#">Xem chi tiết</a>
				</div>  -->
				<div class="row product_buttons">
					<input type="hidden" class="id_product" value="{{$new->id}}">
					<input type="hidden" class="url_add_cart" value="{{asset('add-to-cart')}}">
					<div class="col-md-12"><button class="btn btn-primary btn_buy_prod" style="cursor: pointer;">Mua ngay</button></div>
				</div> 	                        
			</div>
			@endforeach
		</div>    
	</div>
</div>
@stop
