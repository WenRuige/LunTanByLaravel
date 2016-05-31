<html lang="en">
<head>
    <title>beta</title>
    <!-- css/js文件 -->
    <link href="http://libs.baidu.com/bootstrap/3.0.3/css/bootstrap.min.css" rel="stylesheet">
    <script src="http://libs.baidu.com/jquery/2.0.0/jquery.min.js"></script>
    <script src="http://libs.baidu.com/bootstrap/3.0.3/js/bootstrap.min.js"></script>
    <!-- css/js文件 -->
</head>
<body>

<nav class="navbar navbar-default" role="navigation">
    <div class="navbar-header">
        <a class="navbar-brand" href="#">社区查水表</a>
    </div>
    <div>
        <ul class="nav navbar-nav">
            <li class="active"><a href="{{asset('Home/index')}}">首页</a></li>
            <li><a href="{{asset('Admin/index')}}">个人信息</a></li>
            <li><a href="{{asset('auth/logout')}}">登出</a></li>
            <!--<li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                    Java
                    <b class="caret"></b>
                </a>
                <ul class="dropdown-menu">
                    <li><a href="#">jmeter</a></li>
                    <li><a href="#">EJB</a></li>
                    <li><a href="#">Jasper Report</a></li>
                    <li class="divider"></li>
                    <li><a href="#">分离的链接</a></li>
                    <li class="divider"></li>
                    <li><a href="#">另一个分离的链接</a></li>
                </ul>
            </li>-->
        </ul>
    </div>
</nav>


@yield('content')
</body>


</body>
</html>