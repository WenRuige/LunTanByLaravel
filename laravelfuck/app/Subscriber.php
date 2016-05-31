<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
class Subscriber extends Model
{
    protected $table ="subscriber";
    protected $fillable = ['user_id' , 'email'];


    public function user(){
        $this->belongsTo('App\User');
    }
}
