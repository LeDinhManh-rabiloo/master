<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDF;
class expostController extends Controller
{
    public function index()
		{
			$data["arr"]=DB::select("select * from menu_list_blog where id = $id");
        	$data2["arr2"]=DB::select("select name from menu_catalog where id = $catalog");	
	    	$pdf = PDF::loadView('backend.expost', $data,$data2);
	    	return $pdf->download('Baiviet$id.pdf');
		}
}
