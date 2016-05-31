<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Vote;
use DB;
use Log;
use Auth;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class VoteController extends Controller
{

    public function __construct()
    {

       // $this->middleware('auth');
    }

    public function index(){

    }
    /**  1- 重复 2-success 3- 没有认证**/
    public function up(Request $request){


        if(Auth::check()){

                $results = DB::select('select * from vote where user_id = :user_id and article_id = :article_id',
                ['user_id' => $request->user()->id,'article_id' => $request->article_id]);

//            $file = fopen("log.txt","w");
//            fwrite($file,"$sb");
//            fclose($file);
            if($results){

                if($results[0]->is_vote == $request->id){
                    echo "1";
                }else{
                    DB::update('update vote set is_vote = ? where  user_id = ? and article_id =?',
                        ["$request->id","{$request->user()->id}","$request->article_id"]);

                    echo "2";
                }

            }else{
               Vote::create(['user_id' => $request->user()->id,'article_id' => $request->article_id,'is_vote' => $request->id]);
                echo "2";
            }
        }else{
            echo "3";
        }


    }



    public function vote(){


    }
}
