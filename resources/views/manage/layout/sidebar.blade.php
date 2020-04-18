@inject('request', 'Illuminate\Http\Request')
<div class="left-nav">
    <div id="side-nav">
        <ul id="nav">

            <li>
                <a href="javascript:;">
                    <i class="iconfont">&#xe726;</i>
                    <cite>权限系统</cite>
                    <i class="iconfont nav_right">&#xe697;</i>
                </a>
                <ul class="sub-menu">
                    @role('超级无敌管理员','admin')
                    <li>
                        <a _href="{{route('manage.admin.index')}}">
                            <i class="iconfont">&#xe6a7;</i>
                            <cite>管理员列表</cite>
                        </a>
                    </li >
                    <li>
                        <a _href="{{route('manage.roles.index')}}">
                            <i class="iconfont">&#xe6a7;</i>
                            <cite>角色管理</cite>
                        </a>
                    </li >
                    <li>
                        <a _href="{{route('manage.permissions.index')}}">
                            <i class="iconfont">&#xe6a7;</i>
                            <cite>权限管理</cite>
                        </a>
                    </li >
                    <li>
                        <a _href="/manage/log-viewer">
                            <i class="iconfont">&#xe6a7;</i>
                            <cite>错误日志</cite>
                        </a>
                    </li >
                    <li>
                        <a _href="/manage/product">
                            <i class="iconfont">&#xe6a7;</i>
                            <cite>产品管理</cite>
                        </a>
                    </li >
                    @endrole
                </ul>
            </li>


        </ul>
    </div>
</div>