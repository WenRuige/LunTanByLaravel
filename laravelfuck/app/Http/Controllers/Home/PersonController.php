<?php

namespace App\Http\Controllers\Home;

use App\Article;
use App\User;
use App\Follow;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class PersonController extends Controller
{
    public function index(User $user){

            /** 粉丝数 **/
        $fans = $user->follow()->get()->count();
        /** 关注人的个数 */
        $concern = Follow::where('follow_id',$user->id)->get()->count();


        $person = $user->toArray();
        $article = $user->article()->get();

        return view('Home.person',compact('person','article','fans','concern'));
    }
    public function follow(Request $request,$id){
        if(Auth::check()){
            $results = DB::select('select * from follow where user_id = :user_id and follow_id = :follow_id ',
                ['user_id' => $request->User()->id,'follow_id' => $id]);
            if($results){

                return redirect("Home/showPerson/$id")->with('status', '您已经关注他了');

            }else{

                Follow::create(['user_id' =>$request->User()->id,'follow_id' => $id ]);
                return redirect("Home/showPerson/$id")->with('status', 'success');
            }

        }else{
            return redirect("Home/index")->with('status', '您没有登陆,请点击个人信息登陆');
        }
    }
}
