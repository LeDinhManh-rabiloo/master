<fieldset style="width: 400px; margin: auto;">
	<legend>Form</legend>
	<form method="post" action="">
		<input type="hidden" name="_token" value="{{csrf_token()}}">
		<table cellpadding="5" style="width: 100%">
			<tr>
				<td>Nhập tên</td>
				<td><input type="text" name="Hoten"></td>
			</tr>
			<tr>
				<td>Email</td>
				<td><input type="email" name="email"></td>
			</tr>
			<tr>
				<th colspan="2"><input type="submit" name="" value="submit"></th>
			</tr>
		</table>
	</form>
	
</fieldset>