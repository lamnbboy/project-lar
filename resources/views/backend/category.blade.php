@extends('backend.master')
@section('title', 'Danh mục sản phẩm')
@section('main')
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
	<div class="row">
		<div class="col-lg-12">
			<h1 class="page-header">Danh mục sản phẩm</h1>
		</div>
	</div><!--/.row-->
	
	<div class="row">
		<div class="col-xs-12 col-md-5 col-lg-5">
				<div class="panel panel-primary">
					<div class="panel-heading">
						Thêm danh mục
					</div>
					<div class="panel-body">
						@include('errors.note')
						<form method="post">
							<div class="form-group">
								<label>Tên danh mục:</label>
								<input required type="text" name="name" class="form-control" placeholder="Tên danh mục...">
							</div>
							<div class="form-group">
								<label>Tên Order:</label>
								<input type="text" name="order" class="form-control" placeholder="Tên order...">
							</div>
							<div class="form-group">
								<label>Mô tả danh mục:</label>
								<textarea name="description" class="form-control" placeholder="Mô tả ...."></textarea>
							</div>
							<div class="form-group">
								<label>Là danh mục con của:</label>
								<select name="parent_id" class="form-control">
									<option value="0">== Không ==</option>
									@foreach($cate_parent_list as $cate_parent)
									<option value="{{$cate_parent->id}}">{{$cate_parent->name}}</option>
									@endforeach
								</select>
							</div>
							<div class="form-group">
								<input type="submit" name="add_cate" class="form-control btn btn-primary" value="Thêm mới">
							</div>
							{{csrf_field()}}
						</form>
					</div>
				</div>
		</div>
		<div class="col-xs-12 col-md-7 col-lg-7">
			<div class="panel panel-primary">
				<div class="panel-heading">Danh sách danh mục</div>
				<div class="panel-body">
					<div class="bootstrap-table">
						<table class="table table-bordered">
			              	<thead>
				                <tr class="bg-primary">
				                  <th>Tên danh mục</th>
				                  <th>Loại danh mục</th>
				                  <th style="width:30%">Tùy chọn</th>
				                </tr>
			              	</thead>
			              	<tbody>
			              	@foreach($cate_list as $cate)
							<tr>
								<td>{{$cate->name}}</td>
								@if($cate->parent_id != '')
								<td>danh mục con</td>
								@else
								<td style="color: red;">danh mục cha</td>
								@endif
								<td>
		                    		<a href="{{asset('admin/category/edit/'.$cate->id)}}" class="btn btn-warning"><span class="glyphicon glyphicon-edit"></span> Sửa</a>
		                    		<a href="{{asset('admin/category/delete'.$cate->id)}}" onclick="return confirm('Bạn có chắc chắn muốn xóa?')" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span> Xóa</a>
		                  		</td>
		                  	</tr>
		                  	@endforeach
			                </tbody>
			            </table>
					</div>
					<div class="row text-center">
						<div class="col-md-12">
							{{$cate_list->links()}}
						</div>
						
					</div>
					<div class="clearfix"></div>
				</div>
			</div>
		</div>
	</div><!--/.row-->
</div>	<!--/.main-->
@stop