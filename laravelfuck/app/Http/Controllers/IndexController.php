<?php

namespace App\Http\Controllers;
header("Content-type:text/html;charset=utf-8");
use App\User;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Auth;
use Illuminate\Support\Facades\Redirect;

class IndexController extends Controller
{


    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index(Request $request){


        return view('index');
    }








    /******
     *
     *
     *
     *
     *                              没有用的代码们
     *
     *
     *
     *
     *
     *
     *
     *
     */













    /**  下载gitclone **/
    public function download(Request $request){



        $name = $request->user()->name;
        $path = public_path()."/".$name;
        /*    如果没有该用户的storage 则创建*/
            if(!is_dir($name)){
                @mkdir("$name");
                chmod("$name",0777);
            }
                exec("git clone $request->url",$res,$data);
                    $url_value = pathinfo($request->url);
                    $global = $url_value['filename'];

                if($data==0){

                    $this->recurse_copy(public_path()."/{$global}/",$path."/{$global}");
                    $this->delete(public_path()."/{$global}/");
                    return redirect('index');
                }else{
                    echo "fail";
                }



    }

/**  循环数据并且放到数组中 **/
    public function loop($dir){
        $files = [];
        $dir_list = scandir($dir);
        foreach($dir_list as $file){
            if($file !='.' && $file!='..'&&$file!='.git'&&$file!=".DS_Store"){
                if(is_dir($dir."/".$file)){
                    $files[$file] = self::loop($dir."/".$file);
                }else{
                    $files[] = $file;
                }
            }
        }
        return $files;
    }
  /***   递归赋值***/
    public function recurse_copy($src,$dst) {
        echo $dst;
        $dir = opendir($src);
        @mkdir($dst);
        while(false !== ( $file = readdir($dir)) ) {
            if (( $file != '.' ) && ( $file != '..' )) {
                if ( is_dir($src . '/' . $file) ) {
                    self::recurse_copy($src . '/' . $file,$dst . '/' . $file);
                }
                else {
                    copy($src . '/' . $file,$dst . '/' . $file);
                }
            }
        }
        closedir($dir);
    }
    /** 递归删除文件夹下的所有的文件**/
    public function delete($path)
    {
        if(is_dir($path))
        {
            $file_list= scandir($path);
            foreach ($file_list as $file)
            {
                if( $file!='.' && $file!='..')
                {
                    self::delete($path.'/'.$file);
                }
            }
            @rmdir($path);  //这种方法不用判断文件夹是否为空,  因为不管开始时文件夹是否为空,到达这里的时候,都是空的
        }
        else
        {
            @unlink($path);    //这两个地方最好还是要用@屏蔽一下warning错误,看着闹心
        }

    }

}
