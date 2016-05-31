<?php

namespace App\Http\Controllers\Home;

use App\Vote;
use DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Article;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Commet;
class ArticleController extends Controller
{

    /**    如果用户没有登陆则跳转登陆,如果用户登陆了则进行下一步操作**/
    public function index(Request $request)
    {
            if(Auth::check()){
                return view('Home.Article');
            }else{
               return  view('auth.login');
            }
    }
/** 添加评论 ,如果没有登陆默认跳转 */
    public function addCommet(Request $request){
        if(Auth::check()){
            Commet::create([
                'body'       => $request->body,
                'user_id'    => $request->user()->id,
                'article_id' => $request->id,
            ]);
            return redirect("Home/show/$request->id");
        }else{

            return redirect("Home/show/$request->id")->with('status', '您没有登陆,请点击上方登陆');
        }
    }

    /** 存入内容
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'title'    => 'required',
            'column'   => 'required',
            'content'  => 'required'
        ]);

        $request->user()->article()->create([
            'column'  => $request->column,
            'title'   => $request->title,
            'content' => $request->content,
        ]);
        /**   跳转到 目录下需要角标*/
            return redirect('Home/index');
    }

    /**  直接就实例化了 非常方便**/
    public function show(Request $request,Article $article)
    {

        /**   被顶起来的次数**/
        $uptimes =  Vote::where(['article_id'=>$article->id,'is_vote' => 1])->count();
        /** 被踩的次数 **/
        $downtimes =Vote::where(['article_id'=>$article->id,'is_vote' => 0])->count();
        $times = $uptimes-$downtimes;

        /**  通过文章的id 找到对应的用户头像的url**/
        $image = $article->user()->lists('image_url')->toArray();
        /** 获取文章的信息**/
        $data =  $article->toArray();
        /** join 查询获取评论和用户头像 **/
        $commet = DB::table('users')->join('commet','users.id','=','commet.user_id')->select('users.name','users.image_url','commet.body','commet.updated_at')->
             where('commet.article_id','=',"$article->id")->get();
        return view('Home.detail',compact('data','image','commet','times'));



    }


}
