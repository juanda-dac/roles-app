<?php

namespace App\Http\Controllers;

use App\Models\PermissionRole;
use App\Models\Processors;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $role = Role::where('id', '=', $user->role_id)->first();
        $processor = Processors::where('name', '=', 'Usuarios')->first();

        $permissions = PermissionRole::getPermissionsByRole($role->id, $processor->id);

        return view('users', [
            'users' => User::all(),
            'roles' => Role::all(),
            'role' => $role,
            'permissions' => $permissions,
        ]);
    }

    public function addUser(Request $request)
    {
        $request->validate([
            'username' => 'required|string|max:255',
            'name' => 'required|string|max:255',
            'password' => 'required|string|min:5',
            'role' => 'required|exists:roles,id',
        ]);

        $username = $request->input('username');
        $name = $request->input('name');
        $password = $request->input('password');
        $role = $request->input('role');

        $user = new User([
            'id' => Str::uuid(),
            'username' => $username,
            'name' => $name,
            'password' => $password,
            'role_id' => $role,
        ]);

        try {
            $user->save();
            return redirect('/users')->with('success', 'User added successfully');
        } catch (\Throwable $th) {
            session()->flash('errors', ['Usuario ya existe en la base de datos']);
            return redirect('/users')->withErrors(['Usuario ya existe en la base de datos']);
        }

    }
    
}
