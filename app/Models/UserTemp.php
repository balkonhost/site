<?php

namespace App\Models;

class UserTemp extends User
{
    protected $table = 'users_temp';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'created_at',
        'remember_token',
    ];
}
