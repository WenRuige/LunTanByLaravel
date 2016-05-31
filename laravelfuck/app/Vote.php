<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vote extends Model
{

    protected $table ="vote";
    protected $fillable = ['user_id','article_id','is_vote'];




    public function article(){

        return $this->belongsTo(Article::class);
    }
}
