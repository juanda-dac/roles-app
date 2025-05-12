<?php

namespace App\Helpers;

use App\Service\PermissionService;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Blade;

class PermissionDirectives{

    public static function register(){
        
        Blade::if('hasPermissionOnProcess', function (string $processor, string $role) {
            return PermissionService::has($processor, $role);
        });
    
    }


}