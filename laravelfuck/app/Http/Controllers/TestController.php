<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class TestController extends Controller
{


public function  index(){

  session(['key' => 'value']);



    $data = session('key');
    echo $data;


}}
