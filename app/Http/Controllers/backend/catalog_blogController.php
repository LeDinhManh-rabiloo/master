<?php

namespace App\Http\Controllers\backend;
/*Muốn sử dụng đối tượng nào thì phải sử dụng từ khóa "use" để khai báo đối tượng đó(vì đối tượng k tự khai báo trong controller)*/
//Khai báo để sử dụng đối tượng Request
use Illuminate\Http\Request;
use DB;
use App\Http\Controllers\Controller;
use App\Http\Controllers\RemoveUnicode;
//khai báo sử dụng database

class catalog_blogController extends Controller
{
    public function show(){
    	$data["arr"] = DB::table("menu_catalog")->paginate(6);
    	return view("backend.admin.catalog_blog.listView",$data);
    }
    public function delete($id){
    	//xóa bản ghisuwr dụng hàm delete
    	DB::delete("delete from menu_catalog where id = $id");
    	return redirect("admin/catalog_blog/list");
    }
    public function add(Request $request){

    	$name = $request->topic;
    	$metaTitle=RemoveString($name);
    	DB::insert("insert into menu_catalog(name,metaTitle) values('$name','$metaTitle')");
    	return redirect(url("admin/catalog_blog/list"));
    }
    public function Update($id){
        $data['arr'] = DB::select("select * from menu_catalog where id = $id");
        return view("backend.admin.catalog_blog.Updatecatalog",$data);
    }
    public function Updatecatalog(Request $request, $id){
        $name1 = $request->topic;
        $this->validate($request,[
            'topic'=>'unique:menu_catalog,name'
        ],
        [
            'topic.unique'=>'danh mục đã tồn tại'
        ]);

        $metaTitle = RemoveString($name1);
        // $data1["arr"] = DB::select("select * from menu_catalog where id != $id");
        // foreach ($data1 as $key) {
        //     return $data1["name"];
        // }
        // foreach ($data1 as $key) {
        //     if($name1 == )
        //     {
        //         return redirect(url('admin/catalog_blog/Update'.$id))->with('Thong bao');
        //     }
        // }
         DB::update("update menu_catalog set name = '$name1', metaTitle ='$metaTitle' where id = $id");
        return redirect(url('admin/catalog_blog/list'));
    }
}
