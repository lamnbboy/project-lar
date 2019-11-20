@extends('frontend.master')
@section('title', 'Tìm kiếm')
@section('main')
<link rel="stylesheet" href="css/search.css">

<div id="wrap-inner">
	<div class="products">
		<h3>Tìm kiếm với từ khóa: <span>{{$keyword}}</span></h3>
		<div class="product-list row">
			@foreach($item_search_list as $item)
			<div class="product-item col-md-3 col-sm-6 col-xs-12">
				<a href="#"><img height="150px" src="{{asset('storage/product-img/'.$item->image)}}" class="img-thumbnail"></a>
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

	<!-- <div id="pagination">
		<ul class="pagination pagination-lg justify-content-center">
			<li class="page-item">
				<a class="page-link" href="#" aria-label="Previous">
					<span aria-hidden="true">&laquo;</span>
					<span class="sr-only">Previous</span>
				</a>
			</li>
			<li class="page-item disabled"><a class="page-link" href="#">1</a></li>
			<li class="page-item"><a class="page-link" href="#">2</a></li>
			<li class="page-item"><a class="page-link" href="#">3</a></li>
			<li class="page-item">
				<a class="page-link" href="#" aria-label="Next">
					<span aria-hidden="true">&raquo;</span>
					<span class="sr-only">Next</span>
				</a>
			</li>
		</ul>
	</div> -->
</div>
@stop