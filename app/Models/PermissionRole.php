<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PermissionRole extends Model
{
    
    protected $table = 'permissions_role';

    public static function getPermissionsByRole(string $roleId, string $processorId)
    {
        return self::where('role_id', '=', $roleId)
            ->where('processor_id', '=', $processorId)
            ->get();
    }

    public function role()
    {
        return $this->belongsTo(Role::class);
    }

    public function permission()
    {
        return $this->belongsTo(Permission::class);
    }

    public function processors()
    {
        return $this->belongsTo(Processors::class);
    }

}
