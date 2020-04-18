<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>{{env('APP_NAME')}}后台管理系统</title>
    <meta name="renderer" content="webkit|ie-comp|ie-stand">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width,user-scalable=yes, minimum-scale=0.4, initial-scale=0.8,target-densitydpi=low-dpi" />
    <meta http-equiv="Cache-Control" content="no-siteapp" />

    <link rel="shortcut icon" href="{{asset('favicon.ico')}}" type="image/x-icon" />
    <link rel="stylesheet" href="{{asset('/admin/css/font.css')}}">
    <link rel="stylesheet" href="{{asset('/admin/css/xadmin.css')}}">
    <script type="text/javascript" src="{{asset('/admin/js/jquery.min.js')}}"></script>
    <script src="{{asset('extend/layui/layui.js')}}" charset="utf-8"></script>
    <script type="text/javascript" src="{{asset('/admin/js/xadmin.js')}}"></script>

</head>
<body class="login-bg">
<style>
    li {padding: 15px; color:red;}
</style>
<div class="login layui-anim layui-anim-up">
    <div class="message">{{env('APP_NAME')}}后台管理系统</div>
    <div id="darkbannerwrap"></div>
    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    {!! Form::open(['route'=>'manage.login','class'=>'layui-form','method'=>'post']) !!}
        <input name="name" placeholder="用户名"  type="text" lay-verify="required" class="layui-input" >
        <hr class="hr15">
        <input name="password" lay-verify="required" placeholder="密码"  type="password" class="layui-input">
        <hr class="hr15">
        <input value="登录" lay-submit lay-filter="login" style="width:100%;" type="submit">
        <hr class="hr20" >
    {!! Form::close() !!}
</div>

</body>
</html>