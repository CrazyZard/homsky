<?php

namespace App\Http\Controllers\Manage;

use Illuminate\Http\Request;
use Illuminate\Session;
use App\Models\AdminModel;

//Importing laravel-permission models
use Illuminate\Support\Facades\Validator;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;


class AdminController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $admins = AdminModel::paginate($this->pageNum);
        return view('manage.admin.index')->with('admins', $admins);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        //Get all roles and pass it to the view
        $roles = Role::get();
        return view('manage.admin.create', ['roles'=>$roles]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        //Validate name, email and password fields
        $rule = [
            'name'=>'required|max:120',
            'email'=>'required|email|unique:admins',
            'password'=>'required|min:6'
        ];
        $validator = Validator::make($request->post(),$rule);
        if($validator->fails()){
            return back() ->withErrors($validator);
        }
        $input = $request->only('name','email', 'password');
        $admin = AdminModel::create($input); //Retrieving only the email and password data

        $roles = $request['roles']; //Retrieving the roles field
        //Checking if a role was selected
        if (isset($roles)) {
            foreach ($roles as $role) {
                $role_r = Role::where('id', '=', $role)->firstOrFail();
                $admin->assignRole($role_r); //Assigning role to user
            }
        }

        //Redirect to the users.index view and display message
        return redirect()->route('manage.admin.index')
            ->with('flash_message','User successfully added.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        return redirect('manage/admin');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        $admin = AdminModel::findOrFail($id); //Get user with specified id
        $roles = Role::get(); //Get all roles

        return view('manage.admin.edit', compact('admin', 'roles')); //pass user and roles data to view

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {
        $user = AdminModel::findOrFail($id); //Get role specified by id

        $input = $request->only(['name', 'email', 'password']); //Retreive the name, email and password fields

        if(empty($input['password'])){
            unset($input['password']);
        }
        $roles = $request['roles']; //Retreive all roles
        $user->update($input);

        if (isset($roles)) {
            $user->roles()->sync($roles);  //If one or more role is selected associate user to roles
        }else {
            $user->roles()->detach(); //If no role is selected remove exisiting role associated to a user
        }
        return redirect()->route('manage.admin.index')->with('flash_message', '管理员修改成功');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        //Find a user with a given id and delete
        $user = AdminModel::findOrFail($id);
        $user->delete();

        return redirect()->route('manage.admin.index')
            ->with('flash_message',
                'User successfully deleted.');
    }
}
