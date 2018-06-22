@extends('backend.reading.blog.client')
@section('content1')
<div class="row" style="margin-bottom: 20px;">
	<div class="col-md-8">
		<div class="row">
			<form class="form-horizontal" action="{{url('lienhe')}}" method="post">

				<input type="hidden" name="_token" value="{{csrf_token()}}" >
				<label for="name" class="control-label" >Name <span class="required"></span></label>
				<div class="controls">
					<input type="text" name="name" class="required" id="name" >
				</div>
				<label for="email" class="control-label" >email <span class="required"></span></label>
				<div class="controls">
					<input type="email" name="email" class="required" id="email" >
				</div>
				<label for="mess" class="control-label" >Message <span class="required"></span></label>
				<div class="controls">
					<textarea class="required" rows="6" cols="50" id="message" name="mess"></textarea>
				</div>
				<div class="form-actions">
					<input class="btn btn-orange" type="submit" value="Gửi thư" id="submit_id" style="color:green">
					<input class="btn btn-success" type="reset" value="Reset" style="color: red"></btn>	
				</div>
			</form>
		</div>
	</div>
</div>
@endsection