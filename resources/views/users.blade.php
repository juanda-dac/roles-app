<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Users Management</title>
    @vite('resources/css/app.css')
</head>
<body>
    <header>
        <div class="flex items-center justify-between bg-gray-700 p-4">
            <div class="">
                <h2 class="text-white font-bold text-2xl">User {{ auth()->user()->name }}</h2>
                <h4 class="text-white text-sm font-thin">{{ strtoupper(auth()->user()->role->name) }}</h4>
            </div>
            <a class="text-white underline" href="/auth/logout">Salir</a>
        </div>
    </header>

    @hasPermissionOnProcess('Usuarios', 'create')
    <div class="border border-gray-300 p-6 bg-white rounded shadow-md w-[30%] mx-auto mt-4">
        @if ($errors->any())
            <div>
                <ul>
                    @foreach ($errors->all() as $err)
                        <li class="border border-red-300 bg-red-100 p-2 rounded mb-1 text-red-700">{{ $err }}</li>
                    @endforeach
                </ul>
            </div>
        
        @endif
        <h2 class="font-bold text-xl text-center">Nuevo usuario</h2>
        <form action="/users/add" method="POST">
            @csrf
            <div class="flex items-center mb-1 py-2">
                <label for="username" class="w-[30%]">Usuario:</label>
                <input type="text" id="username" name="username" autocomplete="off" class="ml-2 p-2 w-full border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-300">
            </div>
    
            <div class="flex items-center mb-1 py-2">
                <label for="name" class="w-[30%]">Nombre:</label>
                <input type="text" id="name" name="name" autocomplete="off" class="ml-2 p-2 w-full border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-300">
            </div>
    
            <div class="flex items-center mb-1 py-2">
                <label for="password" class="w-[30%]">Contraseña</label>
                <input type="password" id="password" name="password" autocomplete="off" class="ml-2 p-2 w-full border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-300">
            </div>
    
            <div class="flex items-center mb-1 py-2">
                <label for="role" class="w-[30%]">Rol</label>
                <select id="role" name="role" class="ml-2 p-2 w-full border border-gray-300 focus:outline-none">
                    @foreach($roles as $role)
                        <option value="{{ $role->id }}">{{ strtoupper($role->name) }}</option>
                    @endforeach
                </select>
            </div>
            
            <button type="submit" class="bg-gray-700 w-full text-white py-2 hover:bg-gray-700/90 hover:cursor-pointer">Crear</button>
        </form>
    </div>
    @endhasPermissionOnProcess

    <div class="w-full flex justify-center" id="table">
        <table class="table-auto border-collapse border border-gray-300 mt-4 w-[80%]">
            <thead>
                <tr class="bg-gray-700 text-white">
                    <th class="border border-gray-300 text-center py-2">ID</th>
                    <th class="border border-gray-300 text-center py-2">Username</th>
                    <th class="border border-gray-300 text-center py-2">Name</th>
                    <th class="border border-gray-300 text-center py-2">Role</th>
                    <th class="border border-gray-300 text-center py-2">Password</th>
                    <th class="border border-gray-300 text-center py-2">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $key => $user)
                    @if ($user->id != auth()->user()->id)    
                        <tr>
                            <td class="border border-gray-300 text-center py-2">{{ $key }}</td>
                            <td class="border border-gray-300 text-center py-2">{{ $user->username }}</td>
                            <td class="border border-gray-300 text-center py-2">{{ $user->name }}</td>
                            <td class="border border-gray-300 text-center py-2">{{ strtoupper($user->role->name) }}</td>
                            <td class="border border-gray-300 text-center py-2">{{ $user->password }}</td>
                            <td class="border border-gray-300 text-center py-2">
                                <span>
                                    @hasPermissionOnProcess('Usuarios', 'update')
                                        <a href="/users/edit/{{ $user->id }}" class="py-1 px-3 bg-yellow-500">Edit</a>
                                    @endhasPermissionOnProcess
                                    @hasPermissionOnProcess('Usuarios', 'delete')
                                        <a href="/users/delete/{{ $user->id }}" class="py-1 px-3 bg-red-500 text-white">Delete</a>
                                    @endhasPermissionOnProcess
                                </span>
                            </td>
                        </tr>
                    @endif
                @endforeach
            </tbody>
        </table>
    </div>

</body>
</html>