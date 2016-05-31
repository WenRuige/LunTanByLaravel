@extends('layouts.app')
@section('content')

    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif
    <p id="alert"></p>
<script>


    function get(id){

        $.ajax({
            type:"POST",
            url:"{{asset('Home/up')}}",
            data: {'_token': $('input[name=_token]').val(),'article_id':$('input[name=id]').val(),'id':id},
            success:function(data){
                if(data ==1){
                    $('#alert').append(
                            "<div class='alert alert-success alert-dismissable'>"+
                            "<button type='button' class='close' data-dismiss='alert' aria-hidden='true'></button>"+
                            " 您已经顶过了"+
                            "</div>");
                }
                if(data==2){
                    $('#alert').append(
                            "<div class='alert alert-success alert-dismissable'>"+
                            "<button type='button' class='close' data-dismiss='alert' aria-hidden='true'></button>"+
                            " 成功"+
                            "</div>");
                }
                if(data==3){
                    $('#alert').append(
                            "<div class='alert alert-success alert-dismissable'>"+
                            "<button type='button' class='close' data-dismiss='alert' aria-hidden='true'></button>"+
                            " 操蛋!请他妈登陆"+
                            "</div>");
                }
            }
        });

    }






</script>
<div class="row">
    <div class="col-sm-2">
    </div>
    <div class="col-sm-5">
        <div class="topic panel panel-default">
            <div class="infos panel-heading">

                <div class="pull-right avatar_large">
                    <a href="">
                        <img src="{{$image['0']}}" style="width:65px; height:65px;" class="img-thumbnail avatar">
                    </a>
                </div>

                <h3 class="panel-title topic-title">

                    {{$data['title']}}</h3>
                <div class="tags">
                <a href="#">
                    <small><span class="glyphicon glyphicon-tag"></span>{{$data['column'] }}</small>
                </a>



                    </div>

                </br>
                <!-- 点赞或者是踩-->
                <button type="button" class="btn btn-default btn-sm"  id="control" value="1" onclick="get(1)">
                    <span class="glyphicon glyphicon-arrow-up"></span>
                </button>
                <button type="button" class="btn btn-default btn-sm"  id="control" value="0" onclick="get(0)">
                    <span class="glyphicon glyphicon-arrow-down"></span>
                </button>
                <!-- 点赞或者是踩-->
                <span class="badge badge-warning">{{$times}}</span>


                <div class="clearfix"></div>
            </div>

            <div class="content-body entry-content panel-body">
                内容:{{$data['content']}}
                <!--<div class="ribbon">
                    <div class="ribbon-excellent">
                        <i class="fa fa-trophy"></i> 本帖已被设为精华帖！
                    </div>

                </div>-->
            </div>


            <div class="panel-footer operate">



                <div class="pull-right">
                        <i class="glyphicon glyphicon-eye-open"></i> <span>关注</span>
                        <i class="glyphicon glyphicon-bookmark"></i> <span>收藏</span>
                </div>
                <div class="clearfix"></div>
            </div>



        </div>
        <div class="replies panel panel-default list-panel replies-index">
            <div class="panel-heading">
                <div class="total">回复数量: <b>--</b> </div>
            </div>

            <div class="panel-body">

                <ul class="list-group row">
                        @foreach($commet as $value)
                    <li class="list-group-item media" style="margin-top: 0px;">

                        <div class="avatar pull-left">
                            <a href="">
                                <img class="media-object img-thumbnail avatar" alt="" src="{{$value->image_url}}" style="width:48px;height:48px;">
                            </a>
                        </div>

                        <div class="infos">

                            <div class="media-heading meta">

                                <a href="" title="" class="remove-padding-left author">
                                    <!--- 用户-->
                                    {{$value->name}}
                                </a>

                                <span> •  </span>
                                <abbr class="timeago" title="2016-05-03 16:54:12">{{$value->updated_at}}</abbr>
                                <span> •  </span>
                                <a name="reply1" class="anchor" href="#reply1" aria-hidden="true"></a>


                            </div>

                            <div class="media-body markdown-reply content-body">
                            {{ $value->body }}
                            </div>

                        </div>

                    </li>
@endforeach

                </ul>

                <!-- Pager -->
                <div class="pull-right" style="padding-right:20px">

                </div>
            </div>
        </div>
        <form action="{{asset('Home/addCommet')}}" method="post">
            <div class="form-group">
                <label for="firstname" class="col-sm-2 control-label">回复内容</label>
                <div class="col-sm-10">
                    {!! csrf_field() !!}
                    <textarea class="form-control" rows="3" name="body"></textarea>
                    <input type="hidden" name="id" id="article_id" value="{{$data['id']}} ">
                </div>
            </div>
            <input type="submit" class="btn btn-default" style="float: right">
        </form>
    </div>
    <div class="col-sm-2">

    </div>
    </div>

@endsection