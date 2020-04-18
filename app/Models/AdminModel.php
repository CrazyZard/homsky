<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;

class AdminModel extends User
{
    use Notifiable;
    use HasRoles;

    protected $guard_name = 'admin';
    protected $table = 'admins';
    protected $primaryKey = 'adminId';

    const CREATED_AT = 'createTime';
    const UPDATED_AT = 'updateTime';

    protected $guarded = [];

    protected $hidden = [
        'password', 'remember_token',
    ];

    public function setPasswordAttribute($password)
    {
        $this->attributes['password'] = bcrypt($password);
    }
}
