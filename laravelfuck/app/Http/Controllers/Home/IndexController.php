<?php

namespace App\Http\Controllers\Home;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Repositories\ArticleRepository;
use Illuminate\Support\Facades\Mail;
use App\Subscriber;
class IndexController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    protected  $article;
        /***    此处为依赖注入  **/
    public function __construct(ArticleRepository $article)
    {

        $this->article = $article;

    }
  /**  此处显示发帖的列表 **/
    public function index()
    {

     return view('Home.index',['article' => $this->article->selectArticle(10)]);

    }

    /**   mail 发送**/
    public function sendMail(Request $request){
        /**  验证(邮箱必须/email格式必须)**/
        if(Auth::check()){
            if(DB::table('subscriber')->select('id'))
            $this->validate($request,['mail' => 'required|email']);

            $flag = DB::table('subscriber')->select('user_id')->where('user_id','=', $request->user()->id )->get();
            if($flag){
                return redirect("Home/index")->with('status', '您已经订阅过了');
            }else{

                $request->user()->subscriber()->create([
                    'email' => $request->mail
                ]);
                $address = $request->mail;
                Mail::raw('您已经订阅成功,无法取消订阅 , we do it just fuck u ',function ($message) use($address){
                    $message->from('18763152802@163.com',$name='订阅者');
                    $message->sender('18763152802@163.com', $name = '订阅者');
                    $message->to($address, $name = null);
                    $message->replyTo($address, $name = null);
                    $message->subject('F U C K');
                });
            }
        }else{
            return redirect("Home/index")->with('status', '您没有登陆,请点击个人信息登陆');
        }


    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
