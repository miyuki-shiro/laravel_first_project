<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    //protected $table = 'users';

    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $cast = [
        'is_admin' => 'boolean'
    ];

    public static function findByEmail($email)
    {
        //return User::where(compact('email'))->first(); lo mismo que el de abajo
        return static::where(compact('email'))->first();
    }

    public function profession()
    {
        return $this->belongsTo(Profession::class);
    }
    
    public function isAdmin()
    {
        return $this->is_admin;
    }
}
