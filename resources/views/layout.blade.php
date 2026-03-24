<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Activity 9</title>
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
</head>
<body>
    
    <nav>
        @guest
            <a href="/">Home</a>
            <a href="/login">Login</a>
            <a href="/register">Register</a>
        @endguest

        @auth
            <a href="/dashboard">Dashboard</a>
            <form action="/logout" method="POST" style="display:inline;">
                @csrf
                <button type="submit">Logout</button>
            </form>
        @endauth
    </nav>

    <hr>

    @yield('content')
    
</body>
</html>