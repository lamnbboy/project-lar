@extends('frontend.master')
@section('title', 'Chi tiết giỏ hàng')
@section('main')
<link rel="stylesheet" href="css/cart.css">

<div id="wrap-inner">
	<div id="list-cart">
		<h3>Chi tiết Giỏ hàng</h3>
			<table class="table table-bordered .table-responsive text-center">
				<tr class="active">
					<td width="11.111%">Ảnh mô tả</td>
					<td width="22.222%">Tên sản phẩm</td>
					<td width="22.222%">Số lượng</td>
					<td width="16.6665%">Đơn giá</td>
					<td width="16.6665%">Thành tiền</td>
					<td width="11.112%">Xóa</td>
				</tr>
				@foreach($product_in_cart as $item)
				<tr>
					<td><img class="img-responsive" width="100px" height="100px" src="{{asset('storage/product-img/'.$item->description_image)}}"></td>
					<td>{{$item->name}}</td>
					<td>
						<div class="form-group prod-buy-quantity">
							<input type="hidden" class="id-prod" name="id_prod" value="{{$item->id_prod}}">
							<input class="form-control quantity" type="number" min="0" name="quantity" value="{{$item->quantity}}">
						</div>
					</td>
					<td><span class="price">{{number_format($item->price_order, 0, '.', ',')}}</span></td>
					<td><span class="price">{{number_format($item->money, 0, '.', ',')}}</span></td>
					<td><a href="{{asset('/cart/delete/'.$item->id_prod)}}" class="btn btn-danger" style="color: white;">Xóa</a></td>
				</tr>
				@endforeach
				<tr>
					<td colspan="4" style="text-align: center; font-weight: bold; color: blue;">Tổng tiền</td>
					<td><span class="price">{{number_format($total_money, 0, '.', ',')}}</span></td>
					<td></td>
				</tr>
			</table>
			<div class="row" id="total-price">
				<div class="col-md-6 col-sm-12 col-xs-12">										
						Tổng thanh toán: <span class="total-price">{{number_format($total_money, 0, '.', ',')}} VNĐ</span>
																								
				</div>
				<div class="col-md-6 col-sm-12 col-xs-12" id="cart-function">
					<a href="{{asset('/')}}" class="btn btn-primary">Mua tiếp</a>
					<input type="hidden" class="url_update_cart" value="{{asset('update-cart')}}">
					<button class="my-btn btn" id="update-cart" style="cursor: pointer;">Cập nhật</button>
					<a href="{{asset('/delete-cart')}}" class="my-btn btn">Xóa giỏ hàng</a>
				</div>
			</div>
			<div class="row" style="margin-top: 20px;">
				<a href="{{asset('/checkout')}}" class="btn btn-success" style="margin-left: 310px; min-width: 150px; min-height: 50px; line-height: 35px;"><i class="fa fa-shopping-cart fa-7x" style="font-size: 20px;"> Check Out</i></a>
			</div>       	                	
	</div>

	<div id="xac-nhan">
		<h3>Xác nhận mua hàng</h3>
		<form method="post">
			<div class="form-group">
				<label for="email">Email address:</label>
				<input required type="email" class="form-control" id="email" name="email">
			</div>
			<div class="form-group">
				<label for="name">Họ và tên:</label>
				<input required type="text" class="form-control" id="name" name="name">
			</div>
			<div class="form-group">
				<label for="phone">Số điện thoại:</label>
				<input required type="text" class="form-control" id="phone" name="phone">
			</div>
			<div class="form-group">
				<label for="add">Địa chỉ:</label>
				<input required type="text" class="form-control" id="add" name="add">
			</div>
			<div class="form-group text-right">
				<button type="submit" class="btn btn-default" style="cursor: pointer;">Thực hiện đơn hàng</button>
			</div>
			{{csrf_field()}}
		</form>
	</div>
</div>
@stop