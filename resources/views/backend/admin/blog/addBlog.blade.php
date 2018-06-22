@extends('backend.admin.admin')
@section('content')
<div class="row">
	<div class="col-md-12" style="margin-top: 20px;">
		<div class="panel panel-primary">
			<div class="panel-heading">
				<h2>Thêm bài viết</h2>
			</div>
			<div class="panel-body">
				<form action="{{url('admin/blog/addblog')}}" method="post" enctype="multipart/form-data">
					<input type="hidden" name="_token" value="{{csrf_token()}}">
					<table cellpadding="3" style="width: 100%">
						<tr>
							<td width="10%">Bài viết</td>
							<td width="90%"><input type="text" name="name" placeholder="Tên bài viết" class="form-control"></td>
						</tr>
						<tr>
							<td>Ảnh:</td>
							<td>
								<input type="file" name="image" style="margin-top: 10px;">
							</td>
						</tr>
						<!-- Catalog -->
						<tr>
							<td>Chủ đề</td>
							<td>
								<select name="catalog" style="margin-top: 10px; padding: 3px;">
									<?php 
									foreach ($arrr as $value) {

									 ?>
									<option value="{{$value->id}}">{{$value->name}}</option>
									<?php } ?>
								</select>
							</td>
						</tr>
						<!-- End catalog -->
						<tr>
							<td width="10%">Mô tả bài viêt</td>
							<td width="90%">
								<textarea name="description" style="min-width: 100%;height: 100px; margin-top: 10px;" class="form-control" placeholder="Mô tả bài viết"></textarea>
							</td>
						</tr>
					</table>
					<div>
						<span>Nội dung bài viết</span></br>
						<textarea name="content" class="form-control"></textarea>
						<script>
							CKEDITOR.replace('content');
						</script>
						<input type="submit" class="btn btn-primary" value="Thêm bài viêt" style="margin-top: 20px;">
						<a href="{{url('admin/blog/list')}}" class="btn btn-success" style="margin-top: 20px;">Quay lại</a>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>	
@endsection