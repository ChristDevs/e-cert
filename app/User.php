<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Zizaco\Entrust\Traits\EntrustUserTrait;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable, EntrustUserTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'phone_number',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * Attribute casting
     *
     * @var array
     **/
    protected $casts = [
        'blocked' => 'boolean'
    ];

    /**
     * Encrypt the password attribute.
     *
     * @param string $password Raw password string
     **/
    public function setPasswordAttribute($password)
    {
        $this->attributes['password'] = bcrypt($password);
    }

    /**
     * Return certificate applications applied by user.
     *
     * @return HasManyRelation
     **/
    public function certs(): HasMany
    {
        return $this->hasMany('App\Entities\Certificate', 'created_by');
    }
    /**
     * undocumented function
     *
     * @return void
     * @author
     **/
    public function getUserRolesAttribute()
    {
        return implode(', ', $this->roles->map(function ($role) {
            return $role->name;
        })->all());
    }
}
