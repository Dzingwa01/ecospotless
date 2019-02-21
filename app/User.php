<?php

namespace App;

use App\Traits\Uuids;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable  implements MustVerifyEmail
{
    use Notifiable;
    use Uuids;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $keyType = 'string';
    protected $guard_name = 'web';
    public $incrementing = false;

    protected $fillable = [
        'name','surname', 'email','contact_number','password'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function roles()
    {
        return $this->belongsToMany(Role::class, 'role_users','user_id');
    }

    public function requests(){
        return $this->hasMany(WashRequest::class,'valet_id','id');
    }

    public function client_requests(){
        return $this->hasMany(WashRequest::class,'client_id');
    }

    public function ratings(){
        return $this->hasMany(Rating::class,'valet_id');
    }
    /**
     * Checks if User has access to $permissions.
     */
    public function hasAccess(array $permissions) : bool
    {
        // check if the permission is available in any role
        foreach ($this->roles as $role) {
            if($role->hasAccess($permissions)) {
                return true;
            }
        }
        return false;
    }

    /**
     * Checks if the user belongs to role.
     */
    public function inRole(string $roleSlug)
    {
        return $this->roles()->where('slug', $roleSlug)->count() == 1;
    }
}
