

@inject('request', 'Illuminate\Http\Request')
@extends('manage.layout.frame')
@section('content')
    <div class="x-body">
        <xblock>
            <button class="layui-btn" onclick="window.location.href='{{route('manage.roles.create')}}'"><i class="layui-icon"></i>添加</button>
            <span class="x-right" style="line-height:40px">共有数据：{{$roles->total()}} 条</span>
        </xblock>
        <table class="layui-table">
            <thead>
            <tr>
                <th width="5%" style="text-align:center;">ID</th>
                <th width="10%">角色名称</th>
                <th width="70%">拥有权限</th>
                <th width="15%">&nbsp;</th>
            </thead>
            <tbody>
            @if(count($roles) > 0)
                @foreach($roles as $role)
                    <tr>
                        <td>{{ $role->id }}</td>
                        <td>{{ $role->name }}</td>
                        <td>
                            @foreach ($role->permissions()->pluck('permission_name') as $permission)
                                <span class="label label-info label-many">{{ $permission }},</span>
                            @endforeach
                        </td>
                        <td>
                            <button class="layui-btn layui-btn layui-btn-xs" onclick="window.location.href='{{ route('manage.roles.edit',[$role->id]) }}'">
                                <i class="layui-icon">&#xe642;</i>编辑
                            </button>
                            {!! Form::open(array('method'=>'DELETE','onsubmit'=>"return confirm('确认删除?');",'route'=>['manage.roles.destroy',$role->id],'style'=>'display:inline')) !!}
                            <button class="layui-btn-danger layui-btn layui-btn-xs" href="javascript:;"><i class="layui-icon"></i>删除</button>
                            {!! Form::close() !!}
                        </td>
                    </tr>
                @endforeach
            @endif
            </tbody>
        </table>

    </div>
@endsection