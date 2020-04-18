<div class="container">
    <div class="logo"><a href="{{route('manage.home.index')}}">{{env('APP_NAME')}}后台管理系统</a></div>
    <div class="left_open">
        <i title="展开左侧栏" class="iconfont">&#xe699;</i>
    </div>
    <!--
    <ul class="layui-nav left fast-add" lay-filter="">
        <li class="layui-nav-item">
            <a href="javascript:;">+新增</a>
            <dl class="layui-nav-child">
                <dd><a onclick="x_admin_show('资讯','http://www.baidu.com')"><i class="iconfont">&#xe6a2;</i>资讯</a></dd>
                <dd><a onclick="x_admin_show('图片','http://www.baidu.com')"><i class="iconfont">&#xe6a8;</i>图片</a></dd>
                <dd><a onclick="x_admin_show('用户','http://www.baidu.com')"><i class="iconfont">&#xe6b8;</i>用户</a></dd>
            </dl>
        </li>
    </ul>
    -->
    <ul class="layui-nav right" lay-filter="">
        <li class="layui-nav-item to-index"><a href="/">前台首页</a></li>
        <li class="layui-nav-item">
            <a href="javascript:;">{{ auth('admin')->user()->name }}</a>
        </li>
        <li class="layui-nav-item">
            {!! Form::open(array('method'=>'PUTCH','route'=>['manage.logout'],'style'=>'display:inline')) !!}
            <button class="layui-btn-danger layui-btn layui-btn-xs" href="javascript:;">退出</button>
            {!! Form::close() !!}
        </li>
    </ul>


</div>