<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory, HasUuids;
    //
    protected $fillable = [
        'name',
        'description',
    ];

    protected $keyType = 'string';
    public $timestamps = false;

    public function users()
    {
        return $this->hasMany(User::class);
    }

    public function permissionsRole()
    {
        return $this->hasMany(PermissionRole::class);
    }

}
