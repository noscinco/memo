<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use jeremykenedy\LaravelRoles\Traits\HasRoleAndPermission;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasRoleAndPermission;
    use Notifiable;
    /*The attributes that are mass assignable.
     * @var array
     */
    protected $fillable = [
        'email', 'password',
    ];
    protected $guard=[
        'id',
    ];
    /* The attributes that should be hidden for arrays.
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /*The attributes that should be cast to native types.
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function userable(){
        return $this->morphTo();
    }
    
}
