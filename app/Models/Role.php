<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $table = 'tbrole';

    protected $fillable = [
        'idrole',
        'role_name',
        'created_at',
        'updated_at',
    ];

    protected $primaryKey = 'idrole';
    public $incrementing = true;
}