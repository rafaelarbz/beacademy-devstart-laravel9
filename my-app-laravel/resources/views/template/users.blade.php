<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

</head>
<body>
    <nav class="navbar navbar-expand-lg navbar navbar-dark bg-dark">
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <div class="container">
                <div class="row">
                    <div class="col-6">
                        <ul class="navbar-nav mr-auto">
                            <li class="nav-item">
                                <a class="nav-link text-white" href="/users">Usuários</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-white" href="/posts">Posts</a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-6">
                        <ul class="navbar-nav mr-auto">
                            @if (Auth::user())
                                <li class="nav-item">
                                    <a class="nav-link text-white" href="#">{{Auth::user()->name}}</a>
                                </li>
                                @if (Auth::user()->is_admin == 1)
                                    <li class="nav-item">
                                        <a class="nav-link text-white" href="{{ route('admin') }}">Dashboard</a>
                                    </li>
                                @endif
                                <li class="nav-item">
                                    <form action="{{ route('logout') }}" method="POST">
                                        @csrf
                                        <x-responsive-nav-link : class="nav-link text-white" href="route('logout')"
                                            onclick="event.preventDefault();
                                            this.closest('form').submit();">
                                        {{ __('Sair') }}
                                        </x-responsive-nav-link>
                                    </form>
                                </li>
                            @else
                                <li class="nav-item">
                                    <a class="nav-link text-white" href="{{ route('login') }}">Login</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link text-white" href="{{ route('register') }}">Registre-se</a>
                                </li>
                            @endif
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </nav>
    <div class="container w-75 p-3">
        @yield('body')
    </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</html>