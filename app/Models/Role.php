<?php

namespace App\Models\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Models\Permission as SpatiePermission;

class Permission extends SpatiePermission
{
    protected $fillable = [
        'name',
        'guard_name',
        'group_name',
        'nombre',
        'description',
        'estado'
    ];
}
