<?php

namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Foundation\Auth\Access\Authorizable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
use Bican\Roles\Traits\HasRoleAndPermission;
use Bican\Roles\Contracts\HasRoleAndPermission as HasRoleAndPermissionContract;

class User extends Model implements AuthenticatableContract,
                                    AuthorizableContract,
                                    CanResetPasswordContract,HasRoleAndPermissionContract
{
    use Authenticatable, Authorizable, CanResetPassword, HasRoleAndPermission
    {
        HasRoleAndPermission ::can insteadof Authorizable;
    }

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'email', 'password', 'intro', 'number'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = ['password', 'remember_token'];

    /*
     * Eloquent ORM
     * Relationships : 多对多关系，用于 user 和 book 多表
     */
    public function book(){
        return $this->belongsToMany('App\Book', 'user_book')
                ->withPivot('status')->withTimestamps();
    }

    /*
     * Eloquent ORM
     * Relationships : 多对多关系，用于 user 和 comment 多表
     */
    public function comment(){
        return $this->belongsToMany('App\Comment', 'user_comment');
    }
}
