<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Processors extends Model
{
    public function permissionRole()
    {
        return $this->hasMany(PermissionRole::class);
    }
}
