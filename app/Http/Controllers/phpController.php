<?php 
	// Đặt namespace cho class
	namespace App\Http\Controllers;
	// Sử dụng namespace Controller
	use App\Http\Controllers\Controller;
	/**
	 * 
	 */
	class phpController extends Controller
	{
		
		public function show()
		{
			echo "PHP của bạn";
		}
		public function show2($bien)
		{
			echo $bien;
		}
	}
 ?>