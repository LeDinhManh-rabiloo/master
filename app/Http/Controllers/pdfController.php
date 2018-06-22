<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDF;
class pdfController extends Controller
{
    public function index()
		{
			$data = ['name' => 'tienduong'];	
	    	$pdf = PDF::loadView('backend.invoice', $data);
	    		return $pdf->download('invoice.pdf');
		}
}
