@extends('layouts.app')
@section('content')




    <div class="row">
        <div class="col-sm-2">
        </div>
        <div class="col-sm-4">
            <form action="store" method="post">
                <div class="form-group">
                    <label for="firstname" class="col-sm-2 control-label">栏目</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="firstname" name="column"
                               placeholder="请输入名字">
                    </div>
                </div>
                </br>
                </br>
                {!! csrf_field() !!}
                <div class="form-group">
                    <label for="firstname" class="col-sm-2 control-label">标题</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="firstname" name="title"
                               placeholder="请输入名字">
                    </div>
                </div>
                </br>
                </br>

                <div class="form-group">
                    <label for="firstname" class="col-sm-2 control-label">内容</label>
                    <div class="col-sm-10">
                        <textarea class="form-control" rows="3" name="content"></textarea>
                    </div>

                </div>
                <input type="submit" class="btn btn-default" style="float: right">

</form>

            </div>
        <div class="col-sm-2">
        </div>
        </div>







@endsection
