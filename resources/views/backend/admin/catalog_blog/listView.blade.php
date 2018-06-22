@extends('backend.admin.admin')
@section('content')
<div class="row">
	<div class="col-md-8">
		<div class="panel panel-success">
			<div class="panel-heading">
				<h2>Danh mục bài viết</h2>
			</div>
			<div class="body">
				<table class="table table-bordered table-hover">
					<tr>
						<td style="width: 40px; text-align: center;">STT</td>
						<td style="width: auto; text-align: center;">Name</td>
						<td style="text-align: center;">Meta title</td>
						<td style="width: 80px;text-align: center;">More</td>
					</tr>
					<?php 
						$stt =0;
						foreach ($arr as $rows) {
						$stt++
					 ?>
					 <tr>
					 	<td style="text-align: center;">{{$stt}}</td>
						 <td>{{$rows->name}}</td>
						 <td>{{$rows->metaTitle}}</td>
						 <td style="width: 80px;">
						 	<a href="{{url('admin/catalog_blog/Update'.$rows->id)}}">Update</a>
						 	<a href="{{url('admin/catalog_blog/delete/'.$rows->id)}}"onclick="return window.confirm('bạn có muốn xóa?');">delete</a>
						 </td>
					 </tr>
					 <?php }; ?>
				</table>
			</div>
		</div>
		<ul class="paginate">
			{{$arr->links()}}
		</ul>
	</div>

	<div class="col-md-4">
		<div class="panel panel-primary">
			<div class="panel-heading">Thêm danh mục</div>
			<div class="panel-body">
				<form action="{{url('admin/catalog_blog/add')}}" method="POST">
					<input type="hidden" name="_token" value="{{csrf_token()}}">
					<input type="text" name="topic" class="form-control" placeholder="Tên chủ đề">
					</br>
					<input type="submit" value="Thêm" class="btn btn-primary">
				</form>
			</div>
		</div>
	</div>
</div>
@endsection