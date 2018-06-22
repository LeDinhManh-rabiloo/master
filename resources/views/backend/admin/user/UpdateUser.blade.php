@extends('backend.admin.admin')
@section('content')
<div class="col-md-8 col-md-offset-2" style="margin-top: 30px; margin-bottom: 100px;">
	<div class="panel panel-primary">
		<div class="panel-heading">Sửa thông tin người dùng</div>
		<div class="panel-body">
			@if(count($errors)>0)
			<div class="alert alert-danger">
				@foreach($errors->all() as $err)
					{{$err}}<br>
				@endforeach
			</div>
			@endif
			@if(session('Thong bao'))
				<div class="alert alert-danger">
					{{session('Thongbao')}}
				</div>
			@endif
			<?php 
				foreach ($arr as $key) {
			 ?>
			<form action="{{url('admin/user/UpdateUser'.$key->id)}}" method="post">
				<?php } ?>
				<input type="hidden" name="_token" value="{{csrf_token()}}">
				<table class="table">
					
					<tr>
						<td>Email người dùng</td>
						<td>
							<input type="email" name="email" <?php foreach ($arr as $key) {?>value="{{$key->email}}" <?php } ?> class="form-control" readonly="">
						</td>
					</tr>
					<tr>
						<td>Tên người dùng cũ</td>
						<td>
							<?php 
								foreach ($arr as $key) {
							 ?>
							 {{$key->name}}
							 <?php } ?>
						</td>
					</tr>
					<tr>
						<td>Tên người dùng mới</td>
						<td> 
							<input type="text" name="username"<?php foreach ($arr as $key) {?>value="{{$key->name}}" <?php } ?> class="form-control" required="">
						</td>
					</tr>
					<tr>
						<td>Đổi Mật khẩu người dùng</td>
						<td>
							<input type="password" name="password" class="form-control ">
						</td>
					</tr>
					<tr>
						<td>Nhập lại mật khẩu</td>
						<td>
							<input type="password" name="password1" class="form-control ">
						</td>
					</tr>
					<tr>
						<td></td>
						<td>
							<input type="submit" name="" value="Cập nhật thông tin" class="btn btn-primary">
							<a href="{{url('admin/user/list')}}" class="btn btn-success">Quay lại</a>
						</td>
					</tr>
				</table>
			</form>
		</div>
	</div>
</div>
@endsection