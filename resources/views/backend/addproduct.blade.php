@extends('backend.master')
@section('title', 'Thêm sản phẩm mới')
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
				<div class="panel-heading">Thêm sản phẩm</div>
				<div class="panel-body">
					@include('errors.note')
					<form method="post" enctype="multipart/form-data">
						<div class="row" style="margin-bottom:40px">
							<div class="col-xs-8">
								<div class="form-group" >
									<label>Tên sản phẩm</label>
									<input required type="text" name="name" class="form-control">
								</div>
								<div class="form-group" >
									<label>Giá sản phẩm</label>
									<input required type="number" name="price" class="form-control">
								</div>
								<div class="form-group" >
									<label>Ảnh sản phẩm</label>
									<input required id="img" type="file" name="img" class="form-control hidden" onchange="changeImg(this)">
				                    <img id="avatar" class="thumbnail" width="300px" src="img/new_seo-10-512.png">
								</div>
								<div class="form-group" >
									<label>Số lượng sản phẩm</label>
									<input required type="number" name="quantity" class="form-control">
								</div>
								<div class="form-group" >
									<label>Ngày khuyến mãi bắt đầu</label>
									<input required type="date" name="sale_start" class="form-control">
								</div>
								<div class="form-group" >
									<label>Ngày khuyến mãi kết thúc</label>
									<input required type="date" name="sale_end" class="form-control">
								</div>
								<div class="form-group" >
									<label>Miêu tả</label>
									<textarea class="ckeditor" required name="description"></textarea>

									<script type="text/javascript">
										var editor = CKEDITOR.replace('description',{
											language:'vi',
											filebrowserImageBrowseUrl: '../../editor/ckfinder/ckfinder.html?Type=Images',
											filebrowserFlashBrowseUrl: '../../editor/ckfinder/ckfinder.html?Type=Flash',
											filebrowserImageUploadUrl: '../../editor/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
											filebrowserFlashUploadUrl: '../../editor/public/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash',
										});
									</script>

								</div>
								<div class="form-group" >
									<label>Danh mục</label>
									<select required name="cate" class="form-control">
										@foreach($cate_small_list as $cate)
										<option value="{{$cate->id}}">{{$cate->name}}</option>
										@endforeach
				                    </select>
								</div>
								<div class="form-group" >
									<label>Mã nhà sản xuất</label>
									<input required type="number" name="vendor_id" class="form-control">
								</div>
								<div class="form-group" >
									<label>Sản phẩm nổi bật</label><br>
									Có: <input type="radio" name="featured" value="1">
									Không: <input type="radio" checked name="featured" value="0">
								</div>
								<input type="submit" name="submit" value="Thêm" class="btn btn-primary">
								<a href="{{asset('admin/product')}}" class="btn btn-danger">Hủy bỏ</a>
							</div>
						</div>
						{{csrf_field()}}
					</form>
					<div class="clearfix"></div>
				</div>
			</div>
		</div>
	</div><!--/.row-->
</div>	<!--/.main-->
@stop