<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Commet;
use App\Vote;
class Article extends Model
{
    /* 设置表关系*/
    protected $table ="article";

    protected $fillable = ['column','title','content'];




    public function user(){

        return $this->belongsTo('App\User');
    }




    public function vote(){

        return $this->hasMany(Vote::class);
    }

    public function commet(){

        return $this->hasMany(Commet::class);
    }
}
