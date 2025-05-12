<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <title>Login</title>
</head>
<body>
    <div class="w-full h-screen flex items-center justify-center bg-gray-100">
        
        <div class="border border-gray-300 p-6 bg-white rounded shadow-md w-96">
            @if ($errors->any())
                <div class="absolute top-0 right-0 mt-4 mr-4">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>
                                <div class="bg-red-100 border border-red-400 rounded relative mb-1" role="alert">
                                    <button class="absolute right-2 top-0 text-red-700 close" data-item="close">
                                        x
                                    </button>
                                    <div class="text-red-700 px-4 py-3">
                                        {{ $error }}
                                    </div>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                </div>
                
            @endif
            <h2 class="font-bold text-2xl text-center">Ingresar</h2>
            <form action="/auth/login" method="POST">
                @csrf
                <div class="flex flex-col mb-4">
                    <label for="username">Usuario:</label>
                    <input type="text" id="username" name="username" autocomplete="off" class="p-2 border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-300">
                </div>
        
                <div class="flex flex-col mb-4">
                    <label for="password">Contraseña:</label>
                    <input type="password" id="password" name="password" class="p-2 border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-300">
                </div>
        
                <button type="submit" class="text-center p-2 bg-gray-700 text-white w-full hover:bg-gray-700/90 hover:cursor-pointer">Login</button>
            </form>
        </div>
    </div>
</body>
</html>