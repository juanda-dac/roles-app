<?php

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Str;

Route::get('/', function () {
    return response()->json([
        'message' => 'Welcome to the API',
        'status' => 200,
    ]);
});

Route::prefix('users')->group(function(){
    
    Route::get('/', function (){
        $users = User::all();
        return view('users', ['roles' => Role::all(), 'users' => $users]);
    });

    Route::post('/add', function (Request $request){
        
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

        $user->save();

        return redirect('/users')->with('success', 'User added successfully');
    });

});
