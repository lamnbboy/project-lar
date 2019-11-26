@extends('backend.master')
@section('title', 'Danh sách sản phẩm')
@section('main')
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
	<div class="row">
		<div class="col-lg-12">
			<h1 class="page-header">Sản phẩm</h1>
		</div>
	</div><!--/.row-->
	
	<div class="row">
		<div class="col-xs-12 col-md-12 col-lg-12">
			
			<div class="panel panel-primary">
				<div class="panel-heading">Danh sách sản phẩm</div>
				<div class="panel-body">
					<div class="bootstrap-table">
						<div class="table-responsive">
							<a href="{{asset('admin/product/add')}}" class="btn btn-primary">Thêm sản phẩm</a>

							<form action="" method="GET" class="sidebar-form" style="margin-top: 20px;">
								<div class="input-group">
									<input type="text" name="search_tensp" class="form-control" style="width: 550px;" placeholder="Tìm kiếm tên sản phẩm">
									<span style="margin-left: 20px;">
								        <button type="submit" id="search-btn" class="btn btn-success">
								        	Tìm kiếm
								        </button>
									</span>
									<a href="{{asset('/admin/product')}}"><button type="button" class="btn btn-default">Làm mới</button></a>
								</div>
							</form>

							<table class="table table-bordered" style="margin-top: 30px;">				
								<thead>
									<tr class="bg-primary">
										<th>ID</th>
										<th width="30%">Tên Sản phẩm</th>
										<th>Giá sản phẩm</th>
										<th width="20%">Ảnh sản phẩm</th>
										<th>Danh mục</th>
										<th>Tùy chọn</th>
									</tr>
								</thead>
								<tbody>
									@foreach($product_list as $product)
									<tr>
										<td>{{$product->id}}</td>
										<td>{{$product->name}}</td>
										<td>{{number_format($product->price,0,'.',',')}} VNĐ</td>
										<td>
											<img height="150px" src="{{asset('storage/product-img/'.$product->image)}}" class="thumbnail">
										</td>
										<td style="color: blue;">{{$product->cate_name}}</td>
										<td>
											<a href="{{asset('admin/product/edit/'.$product->id)}}" class="btn btn-warning"><i class="fa fa-pencil" aria-hidden="true"></i> Sửa</a>
											<a onclick="return confirm('Bạn có chắc muốn xóa sản phẩm {{$product->name}} này không?')" href="{{asset('admin/product/delete/'.$product->id)}}" class="btn btn-danger"><i class="fa fa-trash" aria-hidden="true"></i> Xóa</a>
										</td>
									</tr>
									@endforeach
								</tbody>
							</table>							
						</div>
					</div>
					<div class="row text-center">
						<div class="col-md-12">
							{{$product_list->links()}}
						</div>
						
					</div>
					<div class="clearfix"></div>
				</div>
			</div>
		</div>
	</div><!--/.row-->
</div>	<!--/.main-->
@stop
