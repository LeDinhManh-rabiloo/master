@extends('backend.admin.admin')
@section('content')
<div class="row" style="">
	<div class="col-md-13">
		<div class="panel panel-success">
			<div class="panel-heading">
				<h2>Danh sách bài viết</h2>
			</div>
		</div>
		<a href="{{url('admin/blog/addblog')}}" class="btn btn-primary">Thêm bài viết</a>

<table class="table table-bordered table-hover">
	<tr>
		<td style="width: 30px;">STT</td>
		<td>Name</td>
		<td width="350px">Image</td>
		<td width="150px">Catalog</td>
		<td width="100px">MetaTitle</td>
		<td width="100px">Date create</td>
		<td width="90px">More</td>
	</tr>
	<?php 
		$stt =0;
		foreach ($arr as $rows) {
			$stt++;
	 ?>
	 <tr>
	 	<td style="text-align: center;">{{$stt}}</td>
	 	<td>{{$rows->name}} </td>
		 <td>
		 	<img src="../../{{$rows->avatar}}" width="100%" height="80%">
		 </td>
		 <td>{{$rows->catalog}}</td>
		 <td>{{$rows->metaTitle}}</td>
		 <td>{{$rows->created}}</td>
		 <td style="width: 80px;">
		 	<a href="{{url('admin/blog/detail'.$rows->id.$rows->catalog)}}">View</a>
		 	<a href="{{url('admin/blog/update'.$rows->id.$rows->catalog)}}">Update</a>
		 	<a href="{{url('admin/blog/delete/'.$rows->id)}}" onclick="return window.confirm('bạn có muốn xóa?');">delete</a>
		 </td>
	</tr>
	<?php } ?>
</table>
<ul class="paginate">
	{{$arr->links()}}
</ul>
	</div>
</div>

@endsection