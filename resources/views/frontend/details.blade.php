@extends('frontend.master')
@section('title', 'Chi tiết sản phẩm')
@section('main')
<link rel="stylesheet" href="css/details.css">

<div id="wrap-inner">
	<div id="product-info">
		<div class="clearfix"></div>
		<h3>{{$item->name}}</h3>
		<div class="row">
			<div id="product-img" class="col-xs-12 col-sm-12 col-md-3 text-center">
				<img width="250px" src="{{asset('storage/product-img/'.$item->image)}}">
			</div>
			<div id="product-details" class="col-xs-12 col-sm-12 col-md-9">
				<p>Giá: <span class="price">{{number_format($item->price, 0, '.', ',')}} VNĐ</span></p>
				<p>Bảo hành: 1 đổi 1 trong 12 tháng</p> 
				<p>Phụ kiện: Dây cáp sạc, tai nghe</p>
				<p>Tình trạng: Máy mới 100%</p>
				<p>Khuyến mại: Từ ngày : <span style="color: blue;">{{Carbon\Carbon::parse($item->sale_date_start)->format('d/m/Y')}}</span> đến <span style="color: red;">{{Carbon\Carbon::parse($item->sale_date_end)->format('d/m/Y')}}</span></p>
				<!-- <p>Còn hàng: Còn hàng</p> -->
				<p class="add-cart text-center"><a href="#">Đặt hàng online</a></p>
			</div>
		</div>							
	</div>
	<div id="product-detail">
		<h3>Chi tiết sản phẩm</h3>
		<p class="text-justify">{!!$item->description!!}</p>
	</div>
	<div id="comment">
		<h3>Bình luận</h3>
		<div class="col-md-9 comment">
			<form method="post">
				<div class="form-group">
					<label for="email">Email:</label>
					<input required type="email" class="form-control" id="email" name="email">
				</div>
				<div class="form-group">
					<label for="name">Tên:</label>
					<input required type="text" class="form-control" id="name" name="name">
				</div>
				<div class="form-group">
					<label for="cm">Bình luận:</label>
					<textarea required rows="10" id="cm" class="form-control" name="content"></textarea>
				</div>
				<div class="form-group text-right">
					<button type="submit" class="btn btn-default">Gửi</button>
				</div>
				{{csrf_field()}}
			</form>
		</div>
	</div>
	<div id="comment-list">
		@foreach($comment_list as $comment)
		<ul>
			<li class="com-title">
				{{$comment->com_name}}
				<br>
				<span>{{date('d/m/Y H:i', strtotime($comment->created_at))}}</span>	
			</li>
			<li class="com-details">
				{{$comment->com_content}}
			</li>
		</ul>
		@endforeach
	</div>
</div>					
@stop