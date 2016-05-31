@extends('layouts.app')
@section('content')
    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif
    <div class="row" >
        <div class="col-sm-4">


            <div style="text-align: center;">
                <a href="">
                    <img src="{{$person['image_url']}}" class="img-thumbnail users-show-avatar" style="width: 206px;margin: 4px 4px 15px;min-height:190px">
                </a>
            </div>



            <dl class="dl-horizontal">

                <!--<dt><lable>&nbsp; </lable></dt><dd> 用户 ID: 1</dd>-->
                <dt><label>粉丝数</label></dt><dd><kbd>{{$fans}}</kbd></dd>
                <dt><label>关注数</label></dt><dd><kbd>{{$concern}}</kbd></dd>
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

                </dd>
            </dl>

            <div class="clearfix"></div>


        </div>
        <div class="col-sm-5">


            <a href="{{asset("Home/follow/{$person['id']}")}}" class="btn btn-primary btn-group-sm" role="button" style="float: right">
                   关注我?
            </a>

            <ul id="myTab" class="nav nav-tabs">
                <li class="active"><a href="#home" data-toggle="tab">
                        个人信息</a>
                </li>
                <li><a href="#ios" data-toggle="tab">WTF</a></li>

            </ul>
            <div id="myTabContent" class="tab-content">
                <div class="tab-pane fade in active" id="home">
                    <p>W3Cschoool菜鸟教程是一个提供最新的web技术站点，本站免费提供了建站相关的技术文档，帮助广大web技术爱好者快速入门并建立自己的网站。菜鸟先飞早入行——学的不仅是技术，更是梦想。</p>
                </div>
                <div class="tab-pane fade" id="ios">
                    <p>iOS 是一个由苹果公司开发和发布的手机操作系统。最初是于 2007 年首次发布 iPhone、iPod Touch 和 Apple
                        TV。iOS 派生自 OS X，它们共享 Darwin 基础。OS X 操作系统是用在苹果电脑上，iOS 是苹果的移动版本。</p>
                </div>

            </div>
            <script>
                $(function () {
                    $('#myTab li:eq(1) a').tab('show');
                });
            </script>

            <hr>
<code>主题内容</code>
            <ul class="list-group">
                @foreach($article as $data)
                <li class="list-group-item">
                    <span class="badge">新</span>
                   <a href="{{asset("Home/show/$data->id")}}">{{$data->title}}</a>
                </li>
                @endforeach
            </ul>


        </div>
        <div class="col-sm-2">

        </div>
    </div>


@endsection
