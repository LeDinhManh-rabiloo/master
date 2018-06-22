@extends('backend.admin.admin')
@section('content')
<div class="col-md-6 col-md-offset-3">
	<div class="panel panel-primary">
		<div class="panel-heading">Cập nhật danh mục</div>
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
			<?php 
				foreach ($arr as $key) {
			 ?>
			<form action="{{url('admin/catalog_blog/Update'.$key->id)}}" method="post">
			<?php } ?>
				<input type="hidden" name="_token" value="{{csrf_token()}}">
					<table>
						<tr>
							<td style="width: 150px;">Chủ đề cũ</td>
							<td><input style="width: 250px;" type="text" class="form-control" readonly <?php foreach ($arr as $key ) {
								?> value="{{$key->name}}"<?php } ?> ></td>
						</tr>
						<tr>
							<td style="width: 150px;">Chủ đề mới</td>
							<td><input style="width: 250px;" type="text" name="topic" class="form-control" required></td>
						</tr>
						<tr>
							<td></td>
							<td>
								<input style="margin-top: 20px;" type="submit" value="Cập nhật" class="btn btn-primary">
							  <a href="{{url('admin/catalog_blog/list')}}" class="btn btn-success" style="margin-top: 20px;">Quay lại</a>
							</td>	
						</tr>
					</table>
				</form>
			</div>
		</div>
	</div>
</div>
@endsection