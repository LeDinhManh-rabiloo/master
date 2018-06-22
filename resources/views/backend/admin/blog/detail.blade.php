@extends('backend.admin.admin')
@section('content')
<div class="col-md-12 ">
	<div class="panel panel-primary">
		<div class="panel-heading">Chi tiết bài viết</div>
		<div class="panel-body">
			<?php 
					foreach ($arr as $value) {
				 ?>
			<div class="col-md-4" style="background: url('../../{{$value->avatar}}'); width:300px; height: 200px; background-size: cover; float: left">
				<!-- <img src="../../{{$value->avatar}}" alt="error" width="100%"> -->
			</div>
			<?php } ?>
			<div class="col-md-8" style="float: left;">
				<h2 style="margin: 0; font-size: 19px; font-weight: bold;"><?php foreach ($arr as $value) { ?>{{$value->name}}<?php } ?></h2>
				<p style="margin-top: 15px; font-style: italic;">
					<b>Mô tả:</b>
					<?php foreach ($arr as $value) { ?>{{$value->description}}<?php } ?>
				</p>
				<p>
					<b>Chủ đề:</b>
					<?php foreach ($arr2 as  $value) {?>{{$value->name}}<?php } ?>
				</p>
			</div>
			<div class="col-md-12" style="margin-top:35px;">
				<fieldset>
					<legend>Nội dung chính</legend>
					<?php foreach ($arr as $value) { echo $value->content;} ?>
				</fieldset>
			</div>
			<div class="col-md-8" style="float: right;">
				<?php foreach ($arr as $key) {?>
				<a href="{{url('admin/blog/update'.$key->id.$key->catalog)}}" class="btn btn-primary">Cập nhật</a>
				<a href="{{url('admin/blog/expost'.$key->id.$key->catalog)}}" class="btn btn-primary">Xuât file PDF</a>
				<?php } ?>
				<a href="{{url('admin/blog/list')}}" class="btn btn-success">Quay lại</a>
			</div>
		</div>
	</div>
</div>
@endsection