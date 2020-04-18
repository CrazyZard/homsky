@inject('request', 'Illuminate\Http\Request')
@extends('manage.layout.frame')
@section('content')
    <div class="x-body">
        <xblock>
            <button class="layui-btn" onclick="window.location.href='{{route('manage.permissions.create')}}'"><i class="layui-icon"></i>添加</button>
            <span class="x-right" style="line-height:40px">共有数据：{{$permissions->total()}} 条</span>
        </xblock>
        <table class="layui-table">
            <thead>
            <tr>
                <th>ID</th>
                <th>权限名称</th>
                <th>权限英文名称</th>
                <th>操作</th>
            </thead>
            <tbody>
            @if(count($permissions) > 0)
                @foreach($permissions as $permission)
                    <tr>
                        <td>{{ $permission->id }}</td>
                        <td>{{ $permission->permission_name }}</td>
                        <td>{{ $permission->name }}</td>
                        <td>
                            <button class="layui-btn layui-btn layui-btn-xs" onclick="window.location.href='{{ route('manage.permissions.edit',[$permission->id]) }}'">
                                <i class="layui-icon">&#xe642;</i>编辑
                            </button>
                            {!! Form::open(array('method'=>'DELETE','onsubmit'=>"return confirm('确认删除?');",'route'=>['manage.permissions.destroy',$permission->id],'style'=>'display:inline')) !!}
                            <button class="layui-btn-danger layui-btn layui-btn-xs" href="javascript:;"><i class="layui-icon"></i>删除</button>
                            {!! Form::close() !!}
                        </td>
                    </tr>
                @endforeach
            @endif
            </tbody>
        </table>
        {{$permissions->links()}}

    </div>
@endsection