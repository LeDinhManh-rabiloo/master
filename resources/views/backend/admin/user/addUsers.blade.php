@extends('backend.admin.admin')
@section('content')
<div class="col-md-8 col-md-offset-2" style="margin-top: 30px; margin-bottom: 100px;">
	<div class="panel panel-primary">
		<div class="panel-heading">Thêm người dùng</div>
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
					{{session('Thong bao')}}
				</div>
			@endif
			<form action="{{url('admin/user/addUser')}}" method="post">
				<input type="hidden" name="_token" value="{{csrf_token()}}">
				<table class="table">
					<tr>
						<td>Tên người dùng</td>
						<div class="col-md-6 col-xs-offset-3">
						    @if(Request::get("err")=="user")
						    <div style="margin-top: 5px; color: red;">
						      <div class="alert alert-danger">
						        Tên đã tồn tại, mời bạn nhập tên khác
						      </div>
						    </div>
						    @endif
					  	</div>
						<td>
							<input type="text" name="username" placeholder="Tên người dùng" class="form-control" required>
						</td>
					</tr>
					<tr>
						<td>Email người dùng</td>
						<td>
							<input type="email" name="email" placeholder="Email người dùng" class="form-control" required>
						</td>
					</tr>
					<tr>
						<td>Mật khẩu người dùng</td>
						<td>
							<input type="password" name="password1" placeholder="mật khẩu" class="form-control" required>
						</td>
					</tr>
					<tr>
						<td>Nhập lại mật khẩu</td>
						<div class="col-md-6 col-xs-offset-3">
						    @if(Request::get("err")=="pass2")
						    <div style="margin-top: 5px; color: red;">
						      <div class="alert alert-danger">
						        Bạn chưa nhập lại hoặc nhập sai  mật khẩu
						      </div>
						    </div>
						    @endif
					  	</div>
						<td>
							<input type="password" name="password2" placeholder="nhập lại mật khẩu" class="form-control" required>
						</td>
					</tr>
					<tr>
						<td></td>
						<td>
							<input type="submit" name="" value="Tạo tài khoản" class="btn btn-primary">
							<a href="{{url('admin/user/list')}}" class="btn btn-success">Quay lại</a>
						</td>
					</tr>
				</table>
			</form>
		</div>
	</div>
</div>
@endsection