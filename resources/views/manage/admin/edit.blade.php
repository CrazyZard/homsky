@extends('manage.layout.frame')
@section('content')

    <div class="layui-layer-title" style="cursor: move;">编辑管理员</div>

    <div class="x-body">
        {!! Form::model($admin, ['method' => 'PUT', 'route' => ['manage.admin.update', $admin->adminId]]) !!}
        <div class="layui-form-item">
            <label for="username" class="layui-form-label">
                <span class="x-red">*</span>登录名
            </label>
            <div class="layui-input-inline">
                <input value="{{$admin->name}}" type="text" id="name" name="name" required="" lay-verify="required" autocomplete="off" class="layui-input">
            </div>
            <div class="layui-form-mid layui-word-aux">
                <span class="x-red">*</span>将会成为您唯一的登入名
            </div>
        </div>
        <div class="layui-form-item">
            <label for="L_email" class="layui-form-label">
                <span class="x-red">*</span>邮箱
            </label>
            <div class="layui-input-inline">
                <input value="{{$admin->email}}" type="text" id="L_email" name="email" required="" lay-verify="email" autocomplete="off" class="layui-input">
            </div>
            <div class="layui-form-mid layui-word-aux">
                <span class="x-red">*</span>
            </div>
        </div>
        <div class="layui-form-item">
            <label for="L_pass" class="layui-form-label">
                <span class="x-red">*</span>密码
            </label>
            <div class="layui-input-inline">
                <input type="password" id="L_pass" name="password" lay-verify="pass" autocomplete="off" class="layui-input">
            </div>
            <div class="layui-form-mid layui-word-aux">
                6到16个字符
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label"><span class="x-red">*</span>角色</label>
            <div class="layui-input-block">
                @foreach($roles as $role)
                    <input id="checkbox{{$role->id}}" {{in_array($role->name,$admin->getRoleNames()->toArray()) ? 'checked="checked"' : ''}} type="checkbox" name="roles[]" lay-skin="primary" value="{{$role->id}}" title="{{$role->name}}" style="display: none;">
                    <div attr="{{$role->id}}" class="layui-unselect layui-form-checkbox {{in_array($role->name,$admin->getRoleNames()->toArray()) ? 'layui-form-checked' : ''}}" lay-skin="primary"><span>{{$role->name}}</span><i class="layui-icon"></i></div>
                @endforeach
            </div>
        </div>
        <div class="layui-form-item">
            <label for="L_repass" class="layui-form-label"> </label>
            <button type="submit"  class="layui-btn" lay-filter="add" lay-submit="">修改</button>
            <button type="button"  class="layui-btn" onclick="window.history.go(-1);">返回</button>
        </div>
        {!! Form::close() !!}
    </div>
@endsection