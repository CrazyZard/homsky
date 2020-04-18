@inject('request', 'Illuminate\Http\Request')
@extends('manage.layout.frame')
@section('content')
    <div class="x-body">
        <div class="layui-row">
            <form class="layui-form layui-col-md12 x-so">
                <input class="layui-input" placeholder="开始日" name="start" id="start">
                <input class="layui-input" placeholder="截止日" name="end" id="end">
                <input type="text" name="username"  placeholder="请输入用户名" autocomplete="off" class="layui-input">
                <button class="layui-btn"  lay-submit="" lay-filter="sreach"><i class="layui-icon">&#xe615;</i></button>
            </form>
        </div>
        <xblock>
            <button class="layui-btn" onclick="window.location.href='{{route('manage.admin.create')}}'"><i class="layui-icon"></i>添加</button>
            <span class="x-right" style="line-height:40px">共有数据：{{$admins->total()}} 条</span>
        </xblock>
        <table class="layui-table">
            <thead>
            <tr>
                <th>ID</th>
                <th>登录名</th>
                <th>邮箱</th>
                <th>角色</th>
                <th>加入时间</th>
                <th width="15%">操作</th>
            </thead>
            <tbody>
            @if(count($admins) > 0)
                @foreach($admins as $admin)
                    <tr>
                        <td>{{$admin->adminId}}</td>
                        <td>{{$admin->name}}</td>
                        <td>{{$admin->email}}</td>
                        <td>
                            @foreach ($admin->roles()->pluck('name') as $role)
                                {{ $role }}
                            @endforeach
                        </td>
                        <td>{{$admin->createdTime}}</td>
                        <td class="td-manage">
                            <button class="layui-btn layui-btn layui-btn-xs" onclick="window.location.href='{{route('manage.admin.edit',[$admin->adminId])}}'">
                                <i class="layui-icon">&#xe642;</i>编辑
                            </button>
                            {!! Form::open(array('method'=>'DELETE','onsubmit'=>"return confirm('确认删除?');",'route'=>['manage.admin.destroy',$admin->adminId],'style'=>'display:inline')) !!}
                            <button class="layui-btn-danger layui-btn layui-btn-xs" href="javascript:;"><i class="layui-icon"></i>删除</button>
                            {!! Form::close() !!}
                        </td>
                    </tr>
                @endforeach
            @endif
            </tbody>
        </table>
        {{$admins->links()}}

    </div>
@endsection