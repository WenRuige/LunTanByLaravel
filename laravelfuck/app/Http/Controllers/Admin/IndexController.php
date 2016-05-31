<?php

namespace App\Http\Controllers\Admin;

use App\Article;
use DB;
use Input;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        /** 获取数据并把数据保存为 数组**/


        $person = $request->user()->attributesToArray();

        $article = $request->user()->article()->get()->toArray();


       return view('Admin.index',compact('person','article'));
    }

   public function alter(Request $request){

       $this->validate($request,[
           'city'        => 'required',
           'introduce'   => 'required'
       ]);
       DB::table('users')->where('id',$request->user()->id)->update(['city' => $request->city,'introduce' => $request->introduce]);
       return redirect('Admin/index');
   }
    public function store(Request $request)
    {
        //
    }


    public function pic(Request $request){
        $request->input('image_url');
        $file = Input::file('image_url');

        if($file->isValid()){
            Storage::put(
                'images/'.$request->user()->id.'.jpg',
                file_get_contents($request->file('image_url')->getRealPath())
            );
        }
        $image_url  = '/laravelfuck/storage/app/images/'.$request->user()->id.'.jpg';
      DB::table('users')->where('id',$request->user()->id)->update(['image_url' =>"$image_url"]);
        return redirect('Admin/index');
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }
    public function destory(Request $request,Article $article){
            $this->authorize('destory',$article);
            $article->delete();
            return redirect('Admin/index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        $person = $request->user()->attributesToArray();

        return view('Admin.edit',['person' => $person]);
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
