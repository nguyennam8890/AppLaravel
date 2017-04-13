<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Information extends Model
{
    protected $table = 'information';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id', 'name', 'keyword', 'register_time'
    ];
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    // protected $hidden = [
    //     'password', 'remember_token',
    // ];
}
