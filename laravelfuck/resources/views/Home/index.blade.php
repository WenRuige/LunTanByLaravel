@extends('layouts.app')
@section('content')


    <script>

        function submit(){
            location.href="Article";
        }
    </script>


    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif

    <div class="row">
        <div class="col-sm-2">
        </div>
        <div class="col-sm-5">
            </br>


            <div class="m-post" style="
  background: #FFFFFF;">







            @foreach($article as $data)
                <li class="list-group-item media 1" style="margin-top: 0px;">

                    <a class="pull-right" href="">
                        <span class="badge badge-reply-count">1</span>
                    </a>

                    <div class="avatar pull-left">
                        <a href="{{asset("Home/showPerson/$data->user_id")}}">
                            <img class="media-object img-thumbnail avatar" alt="Summer" src="{{$data->image_url}}" style="width:48px;height:48px;">
                        </a>
                    </div>

                    <div class="infos">

                        <div class="media-heading">

                            <span class="label label-warning">置顶</span>

                            <a href="show/{{$data->id}}" title="">
                                {{$data->title}}
                            </a>
                        </div>
                        <div class="media-body meta">

                            <!--<a href="" class="remove-padding-left" id="pin-2085">
                                <span class="fa fa-thumbs-o-up"> 8 </span>
                            </a>-->
                            <span> •  </span>

                            <a href="" title="php" 1="">
                                {{$data->column}}
                            </a>


                           <!--<span> • </span>最后由
                            <a href="https://phphub.org/users/4377">
                                SteelQ
                            </a>-->
                            <span> • </span>
                            <span class="timeago">{{$data->created_at}}</span>
                        </div>

                    </div>

                </li>
                    @endforeach
                {!! $article->render() !!}
            </div>

        </div>





        <div class="col-sm-2">

            <div class="panel panel-default">
                <div class="panel-body">
                    <button type="button" class="btn btn-info" onclick="submit()">发布新内容</button>
                </div>


            </div>

            <div class="panel panel-default">
                <div class="panel-body">

                    <form class="bs-example bs-example-form" role="form" action="{{asset('Home/sendMail')}}" method="post">
                        {!! csrf_field() !!}
                                <div class="input-group">
                                    <input type="text" class="form-control" name="mail">
               <span class="input-group-btn">
                  <input type="submit" class="btn btn-danger" type="button" value="订阅我!">


               </span>
                                </div>

                    </form>
                </div>
            </div>
            <div class="panel panel-default">
                <div class="panel-body">
                    <span class="label label-default">默认标签</span>
                    <span class="label label-primary">主要标签</span>
                    <span class="label label-success">成功标签</span>
                    <span class="label label-info">信息标签</span>
                    <span class="label label-warning">警告标签</span>
                    <span class="label label-danger">危险标签</span>

                </div>


            </div>





            </div>
        </div>
    </div>

    @endsection