@extends('backend.admin.admin')
@section('content')
<div class="row" style="">
		<div class="col-md-10">
			<div class="panel panel-success">
				<div class="panel-heading">
					<h2>Danh sách Quản trị</h2>
				</div>
			</div>
			<a href="{{url('admin/user/addUser')}}" class="btn btn-primary" style="margin-bottom: 10px;">Thêm người dùng</a>
		<table class="table table-bordered table-hover" style="background: white; color: blue">
			<tr>
				<td width="30px">STT</td>
				<td >Name</td>
				<td width="200px;">Email</td>
				<td width="100px;">Delete</td>
				<td width="100px;">Cập nhật</td>
			</tr>
			<?php 
				$stt =0;
				foreach ($arr as $rows) {
					$stt++;
			 ?>
			 <tr>
			 	<td style="text-align: center;">{{$stt}}</td>
			 	<td>{{$rows->name}}</td>
			 	<td>{{$rows->email}}</td>
			 	<td style="text-align: center;">
			 		<a href="{{url('admin/user/delete/'.$rows->id)}}" onclick="return window.confirm('bạn có muốn xóa?');">Delete</a>
			 	</td>
			 	<td><a href="{{url('admin/user/UpdateUser'.$rows->id)}}">Cập nhật</a></td>
			 </tr>
			 <?php } ?>
		</table>
		<ul class="paginate">
			{{$arr->links()}}
		</ul>
	</div>
</div>
	
@endsection