<?php

namespace App\Http\Controllers\backend;
use DB;
//use Request;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Token;
use Illuminate\Support\Facades\Hash;

class usersController extends Controller
{
    public function Login(){
        return view('backend.login');
    }
    public function LoginAdmin(Request $request)
    {
        $this->validate($request,[
            'email'=>'required',
            'password'=>'required|min:3|max:32'
        ],[
            'email.required'=>'Bạn chưa nhập email',
            'password.required'=>'password chưa được nhập',
            'password.min'=>'password không được nhỏ hơn 3 ký tự',
            'password.max'=>'password không được lớn hơn 32 ký tự'
        ]);
        $loi="Email hoặc mật khẩu sai";
        $email = $request->email;
        $password=$request->password;
        if(Auth::attempt(['email'=>$email, 'password' => $password], true))
        {
             return redirect(url('admin/home/loinhac')); 
        }
        else
        {
            $loi = "Sai email hoặc mật khẩu, nhập lại email và mật khẩu";
            return redirect('admin/dangnhap')->with('thongbao',$loi);
        }
    }
    public function Show(){
    	$data["arr"] = DB::table("users")->paginate(6);
    	return view("backend.admin.user.listView",$data);
    }
    public function add(){
    	$data["arr1"] = DB::select("select * from users");
    	return view("backend.admin.user.addUsers",$data);
    }
    public function addUser(Request $request){

    	$username = $request->username;
    	$this->validate($request,[
    		'username'=>'unique:users,name',
    		'email'=>'unique:users,email',
    		'password1'=>'required|min:5|max:32',
    		'password2'=>'required|same:password1'
    	],
    	[
    		'username.unique'=>'Tên đăng nhập đã tồn tại',
    		'email.unique'=>'email đã tồn tại',
    		'password1.required'=>'Bạn chưa nhập mật khẩu',
    		'password1.min'=>'Mật khẩu phải chứa ít nhất 5 ký tự',
    		'password1.max'=>'Mật khẩu phải chứa nhiều nhất 32 ký tự',
    		'password2.required'=>'Bạn chưa nhập lại mật khẩu',
    		'password2.same'=>'Mật khẩu nhập lại không khớp'
    	]);
    	
    	$email = $request->email;
    	$pass = $request->password1;
    	$pass2 = $request->password2;
    	$password = bcrypt($pass);
    	$token = new Token();
		$strToken = $token->generate(30);

    	DB::insert("insert into users(name,email,password,remember_token) values('$username','$email','$password','$strToken')");
    	return redirect(url('admin/user/addUser'))->with('Thong bao','Thêm Thành công');
    }
    public function delete($id){
    	DB::delete("delete from users where id = $id");
    	return redirect("admin/user/list");
    }
    public function Update($id){
    	$data['arr'] = DB::select("select * from users where id = $id");
    	return view("backend.admin.user.UpdateUser",$data);
    }
    public function UpdateUser(Request $request, $id){
        $this->validate($request,[
            'password1'=>'same:password'
        ],[
            'password1.same'=>'Bạn nhập lại sai'
        ]);
        $username = $request->username;
        $pass = $request->password;
        $pass2 = $request->password1;
        $password = bcrypt($pass);
        if($pass == ""){
            DB::update("update users set name = $name where id = $id");
            return redirect(url('admin/user/list')); 
        }
       else{
            if($pass == $pass2)
            {
                DB::update("update users set name = '$username', password='$password'where id = $id");
                return redirect(url('admin/user/list'));
            }
            else
            {
                return redirect(url('admin/user/UpdateUser'.$id))->with('Thongbao');
            }
       }
    }
}
