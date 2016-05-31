<?php
namespace App\Repositories;

use DB;
class ArticleRepository{


    public function selectArticle($id = 10){


/**   查询并且排序 **/
        return DB::table('users')
            ->join('article','users.id','=','article.user_id')
            ->select('users.name','users.image_url' , 'article.user_id', 'article.id','article.title', 'article.column','article.created_at')
            ->orderBy('created_at','asc')
            ->simplePaginate($id);

    }

}