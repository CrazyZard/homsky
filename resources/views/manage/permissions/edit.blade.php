@extends('manage.layout.frame')
@section('content')

<div class="layui-layer-title" style="cursor: move;">编辑权限</div>
<div class="x-body">
    {!! Form::model($permission, ['method' => 'PUT', 'route' => ['manage.permissions.update', $permission->id],'class'=>'layui-form']) !!}
    <div class="layui-form-item">
        <label for="username" class="layui-form-label">
            <span class="x-red">*</span>权限名称
        </label>
        <div class="layui-input-inline">
            <input value="{{$permission->permission_name}}" type="text" id="permission_name" name="permission_name" required="" lay-verify="required" autocomplete="off" class="layui-input">
        </div>
        <div class="layui-form-mid layui-word-aux">
            <span class="x-red">*</span>
        </div>
    </div>

    <div class="layui-form-item">
        <label for="username" class="layui-form-label">
            <span class="x-red">*</span>英文名称
        </label>
        <div class="layui-input-inline">
            <input value="{{$permission->name}}" type="text" id="name" name="name" required="" lay-verify="required" autocomplete="off" class="layui-input">
        </div>
        <div class="layui-form-mid layui-word-aux">
            <span class="x-red">*</span>
        </div>
    </div>

    <div class="layui-form-item">
        <label for="L_repass" class="layui-form-label"> </label>
        <button type="submit"  class="layui-btn" lay-filter="add" lay-submit="">修改</button>
        <button type="button"  class="layui-btn" onclick="window.history.go(-1);">返回</button>
    </div>
</div>
@endsection