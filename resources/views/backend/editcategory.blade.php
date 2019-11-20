@extends('backend.master')
@section('title', 'Sửa danh mục sản phẩm')
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
						Sửa danh mục
					</div>
					<div class="panel-body">
						@include('errors.note')
						<form method="post">
							<div class="form-group">
								<label>Tên danh mục:</label>
								<input required type="text" name="name" class="form-control" placeholder="Tên danh mục..." value="{{$cate->name}}">
							</div>
							<div class="form-group">
								<label>Tên Order:</label>
								<input type="text" name="order" class="form-control" placeholder="Tên order..." value="{{$cate->order}}">
							</div>
							<div class="form-group">
								<label>Mô tả danh mục:</label>
								<textarea name="description" class="form-control" placeholder="Mô tả ....">{{$cate->description}}</textarea>
							</div>
							<div class="form-group">
								<label>Là danh mục con của:</label>
								<select name="parent_id" class="form-control">
									@if($cate->parent_id == '')
										<option value="0" selected>== Không ==</option>
									@else
										<option value="0">== Không ==</option>
									@endif
									@foreach($cate_parent_list as $cate_parent)
										@if($cate_parent->id == $cate->parent_id)
											<option value="{{$cate_parent->id}}" selected>{{$cate_parent->name}}</option>
										@else
											<option value="{{$cate_parent->id}}">{{$cate_parent->name}}</option>
										@endif
									@endforeach
								</select>
							</div>
							<div class="form-group">
								<input type="submit" name="edit_cate" class="form-control btn btn-primary" value="Sửa">
							</div>
							<div class="form-group">
								<a href="{{asset('admin/category')}}" class="form-control btn btn-danger">Hủy bỏ</a>
							</div>
							{{csrf_field()}}
						</form>
					</div>
				</div>
		</div>
	</div><!--/.row-->
</div>	<!--/.main-->
@stop