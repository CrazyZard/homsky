<?php

namespace App\Http\Middleware;
use Closure;
use Spatie\Permission\Models\Role;

/**
 * Description of PermissionMiddleware
 * Date 2018/9/17
 * @author xiaoyukarl
 */

class PermissionMiddleware
{

    public function handle($request, Closure $next)
    {
        if(auth('admin')->user()){
            if (!auth('admin')->user()->hasAnyRole(Role::all())) {
                abort('401','没有权限');
            }
            $this->_checkPermission($request);
            return $next($request);
        }else{
            return redirect()->guest('manage/login');
        }
    }


    protected function _checkPermission($request)
    {
        //错误日志
        if ($request->is('manage/log-viewer') && $request->method()=='GET' && !auth('admin')->user()->hasPermissionTo('logviewer')){
            abort('401','没有权限');
        }

        //管理员管理权限
        if ($request->is('manage/admin') && $request->method()=='GET' && !auth('admin')->user()->hasPermissionTo('admin_index')){
            abort('401','没有权限');
        }
        if (($request->is('manage/adimn/create') || ($request->is('manage/adimn') && $request->method()=='POST')) && !auth('admin')->user()->hasPermissionTo('admin_create')){
            abort('401','没有权限');
        }
        if (($request->is('manage/admin/*/edit') || ($request->is('manage/admin/*') && $request->method()=='PUT'))  && !auth('admin')->user()->hasPermissionTo('admin_edit')){
            abort('401','没有权限');
        }
        if ($request->is('manage/admin/*') && $request->method()=='DELETE' && !auth('admin')->user()->hasPermissionTo('admin_delete')){
            abort('401','没有权限');
        }

        //角色管理权限
        if ($request->is('manage/roles') && $request->method()=='GET' && !auth('admin')->user()->hasPermissionTo('roles_index')){
            abort('401','没有权限');
        }
        if (($request->is('manage/roles/create') || ($request->is('manage/roles') && $request->method()=='POST')) && !auth('admin')->user()->hasPermissionTo('roles_create')){
            abort('401','没有权限');
        }
        if (($request->is('manage/roles/*/edit') || ($request->is('manage/roles/*') && $request->method()=='PUT')) && !auth('admin')->user()->hasPermissionTo('roles_edit')){
            abort('401','没有权限');
        }
        if ($request->is('manage/roles/*') && $request->method()=='DELETE' && !auth('admin')->user()->hasPermissionTo('roles_delete')){
            abort('401','没有权限');
        }

        //权限管理权限
        if ($request->is('manage/permissions') && $request->method()=='GET' && !auth('admin')->user()->hasPermissionTo('permissions_index')){
            abort('401','没有权限');
        }
        if (($request->is('manage/permissions/create') || ($request->is('manage/permissions') && $request->method()=='POST')) && !auth('admin')->user()->hasPermissionTo('permissions_create')){
            abort('401','没有权限');
        }
        if (($request->is('manage/permissions/*/edit') || ($request->is('manage/permissions/*') && $request->method()=='PUT')) && !auth('admin')->user()->hasPermissionTo('permissions_edit')){
            abort('401','没有权限');
        }
        if ($request->is('manage/permissions/*') && $request->method()=='DELETE' && !auth('admin')->user()->hasPermissionTo('permissions_delete')){
            abort('401','没有权限');
        }
    }
}