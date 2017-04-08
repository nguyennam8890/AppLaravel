<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Sinhvien extends Model
{
    protected $table = 'sinhvien';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id', 'name', 'age', 'email', 'phone'
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
