<h1>{{"hello word"}}</h1>
<?php 
	for ($i=1; $i <=10 ; $i++) { 
		echo "$i, ";
	}
 ?>
 <!-- câu lệnh blade and in -->
 <h1>
 	@for($i=1;$i<10;$i++)
 {{$i}}
	@endfor
</h1>
<h1>
	@for($i=1;$i<=10;$i++)
	{!!$i!!}
	@endfor
</h1>
<h1>
	@if(1>2)
	<h1>Số 1 > số 2</h1>
	@else 
	<h1>số 1< số 2</h1>
	@endif
</h1>
<?php 
	$arr = array(array("hoten"=>"Nguyễn Văn A", "tuoi"=>"20"));
 ?>
 <h1>
 	@foreach($arr as $rows)
 		{{$rows["hoten"]}}
 		{{$rows["tuoi"]}}
 	@endforeach
 </h1>