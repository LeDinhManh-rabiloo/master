<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
// Auth::routes();
// thao tac trên view
// Route::get("thao_tac",function(){
// 	return view("thaotac");
// });
	/*
	 Form trong laravel
	 -muốn lấy các controll của form sử dụng route::Post
	 -Định nghĩa Route trên view phải sử dụng tag <input type="hidden" name="_token" value="{{cfrs_token()}}"
	 */
 // Route::get("form",function(){
 // 	return view("Form");
 // });
 // Route::post("form", function(){
 // 	$ten = Request::get("Hoten");
 // 	$email = Request::get("email");
 // 	return view("admin");
 // });
 // Route::group(array("prefix"=>"admin"), function(){
 // 	Route::get("user",function(){
 // 		echo "Đây là trang user";
 // 	});
 // 	Route::get("quantri",function(){
 // 		echo "Đây là trang quản trị";
 // 	});
 // });
 // Route::get("test",function(){
 // 	return view("test/admin");
 // });
 // Route::get("controller","phpController@show");//("tên đường dẫn","tên class controller@ + funtion")
 // Route::get("{bien}", "phpController@show2");


// Route::get('/home', 'HomeController@index')->name('home');
//======================================================
// Backend
//=======Login=====
Route::get("admin/dangnhap","backend\usersController@Login");
Route::post("admin/dangnhap","backend\usersController@LoginAdmin");
Route::group(array("prefix"=>"admin", "middleware"=>"adminLogin"),function(){
	Route::get("home/loinhac",function(){
		return view("backend.admin.Home");
	});
	//===============================================
	//danh mục bài viết
	//hiển thị các danh mục bài viết của trang blog
	Route::get("catalog_blog/list","backend\catalog_blogController@show");
	//delete catalog_blog
	Route::get("catalog_blog/delete/{id}","backend\catalog_blogController@delete");
	//Thêm danh mục bài viết
	Route::get("catalog_blog/add","backend\catalog_blogContronller@add");
	Route::post("catalog_blog/add","backend\catalog_blogController@add");
	//Update danh mục bài viết:
	Route::get("catalog_blog/Update{id}","backend\catalog_blogController@Update");
	Route::post("catalog_blog/Update{id}","backend\catalog_blogController@Updatecatalog");
	//hết danh mục bài viết
	/*==================================================*/
	//blog
	//hiển thị danh sách các bài viết trên blog
	Route::get("blog/list","backend\blogController@show");
	//delete blog
	Route::get("blog/delete/{id}","backend\blogController@delete");
	//add blog
	Route::get("blog/addblog","backend\blogController@add");
	Route::post("blog/addblog","backend\blogController@addBlog");
	//detail blog
	Route::get("blog/detail{id}{catalog}","backend\blogController@Detail");
	//Update blog
	Route::get("blog/update{id}{catalog}","backend\blogController@Update");
	Route::post("blog/update{id}{catalog}","backend\blogController@UpdateBlog");
	//xuất file PDF:
	Route::get("blog/expost{id}{catalog}","backend\blogController@index");
	//hết blog
	/*=====================================================*/
	//User blog
	//hiển thị các tài khoản admin của trang blog
	Route::get("user/list","backend\usersController@show");
	//Thêm user:
	Route::get("user/addUser","backend\usersController@add");
	Route::post("user/addUser","backend\usersController@addUser");
	//Xóa user:
	Route::get("user/delete/{id}","backend\usersController@delete");
	//Sửa user:
	Route::get("user/UpdateUser{id}","backend\usersController@Update");
	Route::post("user/UpdateUser{id}","backend\usersController@UpdateUser");
	//hết users
	/*======================================================*/
	
});
Route::get("test",function(){
	//tao password
	echo Hash::make("123456");
});
//==== Login ========
// Route::get("admin/login", function(){
// 	//backend.login: là file login.blade.php nằm trong thư mục backend
// 	return view("backend.login");
// });
// Route::post("admin/login",function(){
// 	$email = Request::get("email");
// 	$password = Request::get("password");
// 	//attempt là hàm xác thực đăng nhập trả về gt true hoặc false
// 	if(Auth::attempt(array("email"=>$email,"password"=>$password))){
// 		//Khi đăng nhập thành công, di chuyển đến trang cần chỉ định, sử dụng hàm redirect
// 		return redirect(url("admin/home/loinhac"));
// 	}
// 	else
// 		return redirect(url("admin/login?err=false"));
// });
Route::get("logout",function(){
	//thực hiện đăng xuất
	Auth::logout();
	return redirect(url("admin/dangnhap"));
});
Route::get("admin",function(){
	//kiểm tra nếu user đã đăng nhập thì di chuyển đến các trang trong admin nếu không thì yêu cầu đăng nhập
	if (Auth::check()==true) {
		return redirect(url("admin/home/loinhac"));
	}
	else{
		return redirect("dangnhap");
	}
});

//Phần backend của Trang người dùng
//==============Home=================
Route::get("home","backend\home\BlogController@home");
Route::get("lienhe",['as'=>'lienhe','uses'=>'backend\home\BlogController@lienhe']);
Route::post("lienhe",['as'=>'postlienhe','uses'=>'backend\home\BlogController@postlienhe']);
//=======================export pdf====================
Route::get('pdf','pdfController@index');