<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Posty</title>
        <script src="https://kit.fontawesome.com/a076d05399.js"></script>
      
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        <link rel="stylesheet" href="{{ asset('sass/app.scss') }}">
    </head>
    <body class="bg-gray-200">
        <nav class="p-6 bg-white flex justify-between mb-6">
            <ul class="flex items-center">
                <li>
                    <a href="{{ route('home') }}" class="p-3"><i class="fas fa-home"></i> Home</a>
                </li>
                <li>
                    <a href="{{ route('dashboard') }}" class="p-3">Dashboard</a>
                </li>
                <li>
                    <a href="{{ route('posts') }}" class="p-3">Posts</a>
                </li>

                <li>
                    <a href="{{ route('users.all') }}" class="p-3">Users</a>
                </li>

            </ul>

            <ul class="flex items-center">
                @auth
                    <li> 
                        <a href="{{ route('messages') }} " class="p-3"><i class="far fa-envelope"></i></a>
                    </li>
                    <li> 
                        <a href="{{ route('users.posts',  auth()->user()  ) }}" class="p-3">{{ auth()->user()->name }}</a>
                    </li>
                    <li>
                    <form action="{{ route('logout') }}" method="post" class="p-3 inline">
                            @csrf
                            <button type="submit">Logout <i class="fas fa-sign-out-alt"></i></button>
                        </form>
                    </li>
                @endauth

                @guest
                    <li>
                        <a href="{{ route('login') }}" class="p-3"><i class="fas fa-sign-in-alt"></i> Login</a>
                    </li>
                    <li>
                        <a href="{{ route('register') }}" class="p-3">Register</a>
                    </li>
                @endguest
            </ul>
        </nav>
        @yield('content')
    </body>
</html>