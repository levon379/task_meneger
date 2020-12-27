<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>
        <!-- Styles -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

    </head>
    <body>
        <div id="app">
            <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
                <div class="container">

                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                        <?php if(isset(Auth::user()->isAdmin) && Auth::user()->isAdmin == 'admin') { ?>
                    <a class="btn {{ (request()->is('users')) ? 'btn-light' : '' }}" href="{{ url('users') }}">
                            Users
                    </a>
                      <?php  }  
                      if(isset(Auth::user()->isAdmin) && Auth::user()->isAdmin == 'admin') { ?>
                    <a class="btn {{ (request()->is('register')) ? 'btn-light' : '' }}" href="{{ url('register') }}">
                            Registration
                    </a>
                    <?php    } 
                     if(isset(Auth::user()->isAdmin) && Auth::user()->isAdmin == 'user') { ?>
                    <a class="btn {{ (request()->is('myGroup')) ? 'btn-light' : '' }}" href="{{ url('myGroup') }}">
                        My Group
                    </a>
                     <?php  }  
                     if(isset(Auth::user()->isAdmin) && Auth::user()->isAdmin == 'admin') { ?>
                    <a class="btn {{ (request()->is('allGroup')) ? 'btn-light' : '' }}" href="{{ url('allGroup') }}">
                            All Groups
                    </a>
                    <?php    } 
                    if(isset(Auth::user()->isAdmin) && Auth::user()->isAdmin == 'admin') { ?>
                    <a class="btn {{ (request()->is('tasks')) ? 'btn-light' : '' }}" href="{{ url('tasks') }}">
                            All Tasks
                    </a>
                       <?php } 
                       if(isset(Auth::user()->isAdmin) ) { ?>
                    <a class="btn {{ (request()->is('showeditTask')) ? 'btn-light' : '' }}" href="{{ url('showeditTask') }}">
                            My task
                    </a>
                      <?php  } ?>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <!-- Left Side Of Navbar -->
                        <ul class="navbar-nav mr-auto">

                        </ul>

                        <!-- Right Side Of Navbar -->
                        <ul class="navbar-nav ml-auto">
                            <!-- Authentication Links -->
                            @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                            </li>
                            @endif
                            @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"> <a class="dropdown-item" href="{{ route('logout') }}">
                                            {{ __('Logout') }}
                                        </a></span>
                                </a>


                            </li>
                            @endguest
                        </ul>
                    </div>
                </div>
            </nav>

            <main class="py-4">
                @yield('content')
            </main>
        </div>

    </body>
</html>