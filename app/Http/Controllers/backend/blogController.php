<?php

namespace App\Http\Controllers\backend;

// use Illuminate\Http\Request;
use Request;
use DB;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Token;
use App\Http\Controllers\RemoveString;
use PDF;
/**
 * 
 */
class ClassName extends Controller
{
   function RemoveString($str){
      $unicode = array(
         'a'=>'á|à|ả|ã|ạ|ă|ắ|ặ|ằ|ẳ|ẵ|â|ấ|ầ|ẩ|ẫ|ậ',
            'd'=>'đ',
            'e'=>'é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ',
            'i'=>'í|ì|ỉ|ĩ|ị',
            'o'=>'ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ',
            'u'=>'ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự',
            'y'=>'ý|ỳ|ỷ|ỹ|ỵ',
         'A'=>'Á|À|Ả|Ã|Ạ|Ă|Ắ|Ặ|Ằ|Ẳ|Ẵ|Â|Ấ|Ầ|Ẩ|Ẫ|Ậ',
            'D'=>'Đ',
            'E'=>'É|È|Ẻ|Ẽ|Ẹ|Ê|Ế|Ề|Ể|Ễ|Ệ',
            'I'=>'Í|Ì|Ỉ|Ĩ|Ị',
            'O'=>'Ó|Ò|Ỏ|Õ|Ọ|Ô|Ố|Ồ|Ổ|Ỗ|Ộ|Ơ|Ớ|Ờ|Ở|Ỡ|Ợ',
            'U'=>'Ú|Ù|Ủ|Ũ|Ụ|Ư|Ứ|Ừ|Ử|Ữ|Ự',
            'Y'=>'Ý|Ỳ|Ỷ|Ỹ|Ỵ',
         );

         foreach($unicode as $nonUnicode=>$uni){
            $str = preg_replace("/($uni)/i", $nonUnicode, $str);
         }

         $str = str_replace(",", "", $str);
         $str = str_replace(".", "", $str);
         $str = str_replace(" ", "-", $str);
         $str = str_replace("?", "", $str);

      return $str;
   }
   
}
   

class blogController extends Controller
{
    public function index($id,$catalog)
        {
            $data["arr"]=DB::select("select * from menu_list_blog where id = $id");
            $data2["arr2"]=DB::select("select name from menu_catalog where id = $catalog"); 
            $pdf = PDF::loadView('backend.admin.blog.expost', $data,$data2);
            foreach ($data["arr"] as $key) {
                return $pdf->stream('Baiviet '.$key->name.'.pdf');
            }
            // return redirect("blog/detail{id}{catalog}");
            return view('backend.admin.blog.expost', $data,$data2);
            // $pdf = PDF::loadHtml('<img src="http://static.bongdaplus.vn/Assets/Soccer/teams/1567.png" />');
            // return $pdf->stream('invoice.pdf');
        }
    public function Show(){
    	$data["arr"] = DB::table("menu_list_blog")->paginate(6);
    	return view("backend.admin.blog.listView",$data);
    }
    public function Detail($id,$catalog)
    {
        $data["arr"]=DB::select("select * from menu_list_blog where id = $id");
        $data2["arr2"]=DB::select("select name from menu_catalog where id = $catalog");
        return view("backend.admin.blog.detail",$data,$data2);
    }
    public function delete($id){
    	DB::delete("delete from menu_list_blog where id = $id");
    	return redirect("admin/blog/list");
    }
    public function add()
    {
    	$data["arrr"]= DB::select("select * from menu_catalog");
    	return view("backend.admin.blog.addBlog",$data);
    }
    public function addBlog()
    {
    	$name = Request::get('name');
    	
    	if (Request::hasFile('image')) {
    		$file = Request::file('image');
    		$duoi= $file->getClientOriginalExtension();
		    if($duoi!='jpg' && $duoi!='png' && $duoi!='jpeg')
		    	{
		    		return redirect(url('admin/blog/addblog'))->with("Lỗi", "Bạn chỉ có thể đưa vào file có đuôi jpg, png hoặc jpeg");
		    	}
    		$nameimage = $file->getClientOriginalName();
    		$image1 = str_random(5)."_".$nameimage;
    		while (file_exists("upload/images/".$image1)) {
    			$image1 = str_random(5)."_".$nameimage;
    		}
    		$file->move("upload/images/",$image1);
    		$image = "upload/images/".$image1;
    	}
    	else
    	{
    		$image = "";
    	}
    	$catalog = Request::get('catalog');
    	$abc = new ClassName();
        $metaTitle = $abc->RemoveString($name);
    	$hot = 1;
    	$new=1;
		$dateTime = date("d/m/Y");
		$token = new Token();
		$strToken = $token->generate(10);
    	$description = Request::get('description');
    	$content = Request::get('content');
    	DB::insert("insert into menu_list_blog(avatar, name, metaTitle, catalog, description, content,token, hot, new, dateTime) values('$image','$name','$metaTitle', $catalog,'$description','$content','$strToken','$hot','$new','$dateTime')");
    	return redirect(url("admin/blog/list"));
    }
    public function Update($id,$catalog)
    {
        $data["arr"] = DB::select("select * from menu_list_blog where id= $id");
        $data2["arr2"]=DB::select("select * from menu_catalog");
        return view("backend.admin.blog.edit",$data, $data2);
    }
    public function UpdateBlog($id,$catalog)
    {
        $name=Request::get('name');
        $catalog=Request::get('catalog');
        $metaTitle=RemoveString($name);
        $hot = 1;
        $new = 1;
        $dateTime = date("d/m/Y");
        $token = new Token();
        $strToken = $token->generate(10);
        $description = Request::get('description');
        $content=Request::get('content');
        if (Request::hasFile('image')) {
            $file = Request::file('image');
            $duoi= $file->getClientOriginalExtension();
            if($duoi!='jpg' && $duoi!='png' && $duoi!='jpeg')
                {
                    return redirect(url('admin/blog/addblog'))->with("Lỗi", "Bạn chỉ có thể đưa vào file có đuôi jpg, png hoặc jpeg");
                }
            $nameimage = $file->getClientOriginalName();
            $image1 = str_random(5)."_".$nameimage;
            while (file_exists("upload/images/".$image1)) {
                $image1 = str_random(5)."_".$nameimage;
            }
            $file->move("upload/images/",$image1);
            $image = "upload/images/".$image1;
        }
        else
        {
            $image = "";
        }
        if ($image=="") {
            if ($name == "") {
               DB::update("update menu_list_blog set catalog='$catalog', description='$description', content='$content', token = '$strToken', hot = '$hot', new='$new', dateTime='$dateTime'");
               return redirect(url("admin/blog/list"));
            }
            else
            {
               DB::update("update menu_list_blog set name = '$name', metaTitle='$metaTitle', catalog='$catalog', description='$description', content='$content', token = '$strToken', hot = '$hot', new='$new', dateTime='$dateTime'");
               return redirect(url("admin/blog/list"));  
            }
          
        }
        else{
             DB::update("update menu_list_blog set avatar = '$image', name = '$name', metaTitle='$metaTitle', catalog='$catalog', description='$description', content='$content', token = '$strToken', hot = '$hot', new='$new', dateTime='$dateTime'");
            return redirect(url("admin/blog/list"));
        }
       
    }
}
