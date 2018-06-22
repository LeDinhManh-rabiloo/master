<?php

namespace App\Http\Controllers\backend\home;

use Illuminate\Http\Request;
 // use Request;
use DB;
use Mail;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Token;
use App\Http\Controllers\RemoveString;
/**
 * 
 */
class BlogController extends Controller
{
	
	public function home()
	{
		$data["arr"] = DB::table("menu_list_blog")->paginate(6);
		$data2["arr1"] = DB::select("select * from menu_catalog");
    	return view("backend.reading.blog.Home",$data,$data2);
	}
	public function lienhe()
	{
		return view("backend.reading.blog.LienHe");
	}
	public function postlienhe(Request $request)
	{
		$input = $request->all();

		Mail::send('backend.reading.blog.blanks',$input,function($msg){
			$msg->to('manhga3689@gmail.com','manhga')->subject('Đây là mail khẩn cấp');
			$msg->to('lemanhsiquanchinhtri@gmail.com','manhga')->subject('Đây là mail khẩn cấp');
		});
		return view("backend.reading.blog.LienHe");
	}
}
