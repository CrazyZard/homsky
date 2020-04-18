@extends('manage.layout.frame')
@section('content')

    <div class="layui-layer-title" style="cursor: move;">添加角色</div>
    <div class="x-body">
        {!! Form::open(['method' => 'POST', 'route' => ['manage.roles.store'],'class'=>'layui-form']) !!}
        <div class="layui-form-item">
            <label for="username" class="layui-form-label">
                <span class="x-red">*</span>角色名称
            </label>
            <div class="layui-input-inline">
                <input value="" type="text" id="name" name="name" required="" lay-verify="required" autocomplete="off" class="layui-input">
            </div>
            <div class="layui-form-mid layui-word-aux">
                <span class="x-red">*</span>
            </div>
        </div>


        <div class="layui-form-item">
            <label class="layui-form-label"><span class="x-red">*</span>拥有权限</label>
            <div class="layui-input-block">
                @foreach($permissions as $permission)
                    <input id="checkbox{{$permission->id}}" type="checkbox" name="permissions[]" lay-skin="primary" value="{{$permission->id}}" style="display: none" title="{{$permission->permission_name}}" >
                @endforeach
            </div>
        </div>

        <div class="layui-form-item">
            <label for="L_repass" class="layui-form-label"> </label>
            <button type="submit"  class="layui-btn" lay-filter="add" lay-submit="">修改</button>
            <button type="button"  class="layui-btn" onclick="window.history.go(-1);">返回</button>
        </div>
    </div>
@endsection