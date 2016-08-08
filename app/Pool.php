<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pool extends Model
{
    //
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'api', 'name', 'status'
    ];

}
