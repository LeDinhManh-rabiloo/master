<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<?php foreach ($arr as $value) {?>
	<title>{{$value->name}}</title>
	<?php } ?>
	<style>
  body { font-family: DejaVu Sans, sans-serif; }
</style>
</head>
<body>
	<div class="col-md-12 ">
	<div class="panel panel-primary">
		<div class="panel-body">
			<?php 
					foreach ($arr as $value) {
				 ?>
			<div class="col-md-4" style="background-image: url({{ asset($value->avatar) }});width:300px; height: 200px; background-size: cover; float: left">
				 <!-- <img src="{{ asset('upload/images/QJfiu_thutuong.jpg') }}" alt="error" style="width: 100%; height: 100%;"> -->
			</div>
			<?php } ?>
			<div class="col-md-8" style="float: right; width:500px; height:220px;">
				<h2 style="margin: 0; font-size: 19px; font-weight: bold;"><?php foreach ($arr as $value) { ?>{{$value->name}}<?php } ?></h2>
				<p style="margin-top: 10px; font-style: italic;">
					<b>Mô tả:</b>
					<?php foreach ($arr as $value) { ?>{{$value->description}}<?php } ?>
				</p>
				<p>
					<b>Chủ đề:</b>
					<?php foreach ($arr2 as  $value) {?>{{$value->name}}<?php } ?>
				</p>
			</div>
			<div class="col-md-12" style="clear: both; top: 50px;">
				<fieldset>
					<legend>Nội dung chính</legend>
					<?php foreach ($arr as $value) { echo $value->content;} ?>
				</fieldset>
			</div>
		</div>
	</div>
</div>
</body>
</html>
