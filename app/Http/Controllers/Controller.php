<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Traits\HasRoles;


class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests, HasRoles;
    public function index(){
        $role= Role::findById(1);
        $permission= Permission::findById(1);
        $role->givePermissionTo($permission);
    }
}
