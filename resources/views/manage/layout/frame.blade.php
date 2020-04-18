<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>{{env('APP_NAME')}}后台管理系统</title>
    <meta name="renderer" content="webkit">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <link rel="shortcut icon" href="{{asset('favicon.ico')}}" type="image/x-icon" />
    <link rel="stylesheet" href="{{asset('/admin/css/font.css')}}">
    <link rel="stylesheet" href="{{asset('/admin/css/xadmin.css')}}">
    <script type="text/javascript" src="{{asset('/admin/js/jquery.min.js')}}"></script>
    <script src="{{asset('extend/layui/layui.js')}}" charset="utf-8"></script>
    <script type="text/javascript" src="{{asset('/admin/js/xadmin.js')}}"></script>
<body>

    @if (count($errors) > 0)
    <div class="x-nav" id="frame-error">
        <ul>
            @foreach ($errors->all() as $error)
                <li style="color: red;">{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    <div class="x-nav">
        <span class="layui-breadcrumb" style="visibility: visible;">
            <span>
                @yield('content_title')
            </span>
        </span>
    </div>
    @yield('content')
    <script>
        $(function(){

            //如果有错误,则在15秒后自动隐藏
            setTimeout(function () {
                $('#frame-error').hide();
            },15000);

            $('.layui-form-checkbox').click(function () {
                var id = $(this).attr('attr');
                var input = $('#checkbox'+id);
                if(input.attr('checked') == undefined){
                    input.attr('checked',true);
                }else{
                    input.attr('checked',false);
                }
                console.log($('input[type="checkbox"]:checked').length);
            });
        });
    </script>
</body>
</html>