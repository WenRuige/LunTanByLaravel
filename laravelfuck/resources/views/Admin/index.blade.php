@extends('layouts.app')
@section('content')

    <script>

        function submit(){
            location.href="edit";
        }
    </script>
    <div class="row" >
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
        <div class="col-sm-5">


            <code>主题内容</code>
            <ul class="list-group">
                        @foreach($article as $value)
                    <li class="list-group-item">
                         <span class="badge"><a href="{{asset("Admin/destory/{$value['id']}")}}">删除</a></span>
                        <a href="{{asset("Home/show/{$value['id']}")}}">{{$value['title']}}</a>
                    </li>
                            @endforeach
            </ul>



        </div>
        <div class="col-sm-2">
            <dd>
                <div class="panel panel-default">
                    <div class="panel-body">
                        <form action="pic" method="post" ENCTYPE="multipart/form-data">
                            <input type="file" id="inputfile" value="更改头像" name="image_url">
                            <input type="submit" class="btn btn-default btn-xs" value="上传" style="float: right">
                            {!! csrf_field() !!}
                        </form>
                    </div>
                </div>
            </dd>
        </div>
        </div>


@endsection
