<?php

namespace App\Service;

use App\Models\Permission;
use App\Models\PermissionRole;
use App\Models\Processors;
use Illuminate\Support\Facades\Auth;

class PermissionService
{
    public static function has($processorname, $permissionname): bool
    {
        $user = Auth::user();
        $roleId = $user->role_id;
        
        $processor = Processors::where('name', '=', $processorname)->first();
        $permission = Permission::where('name', '=', $permissionname)->first();
        if ($processor->id != null && $permission->id != null) {
            return PermissionRole::where('role_id', '=', $roleId)
                ->where('processor_id', '=', $processor->id)
                ->where('permission_id', '=', $permission->id)
                ->exists();
        }
        return false;
        
    }
    
}

