<?php

namespace App;
use App\User;
use Illuminate\Database\Eloquent\Model;

class Commet extends Model
{

    protected $table ="commet";
    protected $fillable = ['body','article_id','user_id'];
    protected $hidden = ['id'];
    public function article(){

        return $this->belongsTo(Article::class);
    }
}
