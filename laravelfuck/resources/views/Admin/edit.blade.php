@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-sm-4">

            <div style="text-align: center;">
                <a href="">
                    <img src="{{$person['image_url']}}" class="img-thumbnail users-show-avatar" style="width: 206px;margin: 4px 4px 15px;min-height:190px">
                </a>
            </div>



            <dl class="dl-horizontal">

                <!--<dt><lable>&nbsp; </lable></dt><dd> 用户 ID: 1</dd>-->

                <dt><label>Name:</label></dt><dd><strong>{{$person['name']}}</strong></dd>

                <!--<dt><label>Role:</label></dt><dd><span class="label label-warning">Founder</span></dd>

                <dt class="adr"><label> 姓名:</label></dt><dd><span class="org">李桂龙</span></dd>-->

                <!--<dt><label>Github:</label></dt>
                <dd>
                    <a href="https://github.com/summerblue" target="_blank">
                        <i class="fa fa-github-alt"></i> summerblue
                    </a>
                </dd>-->


                <dt class="adr"><label> 城市:</label></dt><dd><span class="org"><i class="fa fa-map-marker"></i> {{$person['city']}}</span></dd>
                <dt><label>签名:</label></dt><dd><span>{{$person['introduce']}}</span></dd>

                <dt>
                    <label>Since:</label>
                </dt>
                <dd><span>{{$person['created_at']}}</span></dd>
                <dd>
                    <button type="button" class="btn btn-primary btn-lg btn-block" onclick="submit()">
                        修改个人信息
                    </button>
                </dd>
            </dl>

            <div class="clearfix"></div>


        </div>
        <div class="col-sm-4">
            <form role="form" action="alter" method="post">
                <div class="form-group">
                    <label for="name">城市</label>
                    <input type="text" class="form-control" id="name" name="city"
                           placeholder="请填写你的所在位置">
                </div>
                {!! csrf_field() !!}

                <div class="form-group">
                    <label for="name">自我介绍</label>

                        <textarea class="form-control" rows="3" name="introduce"></textarea>

                </div>
                <input type="submit" class="btn btn-default" value="修改">
        </form>
        </div>
        <div class="col-sm-4">
        </div>
    </div>
    @endsection

