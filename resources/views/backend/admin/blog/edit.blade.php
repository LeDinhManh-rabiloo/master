@extends('backend.admin.admin')
@section('content')
<div class="col-md-12">
	<div class="panel panel-primary">
		<div class="panel-heading">Cập nhật Bài viết</div>
		<div class="panel-body">
			<?php 
				foreach ($arr as $key) {
			 ?>
			<form action="{{url('admin/blog/update'.$key->id.$key->catalog)}}" method="post" enctype="multipart/form-data">
				<?php } ?>
				<input type="hidden" name="_token" value="{{csrf_token()}}">
				<div class="col-md-3">
					<?php foreach ($arr as $key) { ?>
						<img src="../../{{$key->avatar}}" width="100%" height="100%">
						<?php } ?>
					<input type="file" name="image" style="margin-top: 10px; margin-left: -15px;">
				</div>
				<div class="col-md-9">
					<?php foreach ($arr as $key ){ ?>
						
					<input type="text" name="name" placeholder ="{{$key->name}}" class="form-control" style="margin-bottom: 10px;">
					<?php } ?>
					<select name="catalog" class="form-control">
						<?php foreach ($arr2 as $value ) {?>
						 <option value="{{$value->id}}"  >
						 		<?php echo $value->name ?>
						 </option>
						<?php } ?>
					</select>
					<div style="margin-bottom: 10px;">
						
						<textarea name="description" style="width: 100%; max-width: 100%; height: 100px;">
							<?php foreach ($arr as $key) {  echo $key->description; } ?>
						</textarea>
						
					</div>
						<div style="margin-bottom: 10px;">
							<textarea name="content" >
								<?php foreach ($arr as $key) {
									echo $key->content;
								} ?>
							</textarea>
							<script type="text/javascript" >
								CKEDITOR.replace('content');
							</script>
							<input type="submit" class="btn btn-primary" value="Cập nhật" style="margin-top: 20px;">
							<a href="{{url('admin/blog/list')}}" class="btn btn-success" style="margin-top: 20px;">Quay lại</a>
						</div>
					</div>
				</div>
			</form>	
		</div>
	</div>
</div>
@endsection