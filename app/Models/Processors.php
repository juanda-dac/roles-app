<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Processors extends Model
{

    use HasFactory, HasUuids;

    public function permissionRole()
    {
        return $this->hasMany(PermissionRole::class);
    }
}
