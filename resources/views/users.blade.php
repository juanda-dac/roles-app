<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Users Management</title>
</head>
<body>
    
    <h1>Users Management</h1>

    <h2>Create New User</h2>
    <form action="/users/add" method="POST">
        @csrf
        <div class="">
            <label for="username">username:</label>
            <input type="text" id="username" name="username" required>
        </div>

        <div class="">
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" required>
        </div>

        <div class="">
            <label for="password">Password</label>
            <input type="password" id="password" name="password" required>
        </div>

        <div class="">
            <label for="role">Role</label>
            <select id="role" name="role">
                @foreach($roles as $role)
                    <option value="{{ $role->id }}">{{ $role->name }}</option>
                @endforeach
            </select>
        </div>
        
        <button type="submit">Create User</button>
    </form>

    <div class="" id="table">
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Username</th>
                    <th>Name</th>
                    <th>Password</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $user)
                    <tr>
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->username }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->password }}</td>
                        <td></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

</body>
</html>