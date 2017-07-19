<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Ateneo P2P+') }}</title>

    <!-- Styles -->
    <link href="/css/bootstrap.min.css" rel="stylesheet">
    <link href="/css/main-home.css" rel="stylesheet">
    <link href="/css/logo-nav.css" rel="stylesheet">
    <link href="/css/app.css" rel="stylesheet">
    <link href="/css/bootstrap-datepicker3.css" rel="stylesheet">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css">

    <!-- Scripts -->
    <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
    </script>
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation" style="background-color: #0B3C5D; border:none">
            <div class="container">
                <div class="navbar-header" style="height: 60px; "">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Branding Image -->
                    <a class="navbar-brand" href="{{ url('/') }}">
                        <img src="/images/navlogo.png" style="height: 60px; margin-right:40px; margin-top:-5px">
                    </a>
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                <div class="nav-style">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        @if(Auth::check())
                            @if (Auth::user()->is_admin == 1)
                                <li><a href="/admin/home"  style="color: #F2F2F2"> HOME </a></li>
                                <li><a href="/admin/reservations"  style=" color: #F2F2F2" > RESERVATIONS </a></li>
                                <li><a href="/admin/slots"  style=" color: #F2F2F2"> SCHEDULES </a></li>
                                <!-- <li><a href="/admin/editcontacts" > Contact </a></li> -->
                            @else

                                <li><a href="/home" style=" color: #F2F2F2"> HOME </a></li>
                                <li><a href="/reserve" style=" color: #F2F2F2"> RESERVE </a></li>
                                <li><a href="/profile" style=" color: #F2F2F2"> PROFILE </a></li>
                                <li><a href="/contactus" style=" color: #F2F2F2"> CONTACT US </a></li>
                            @endif
                        @endif
                    </ul>
                    </div>
                    <div class="nav-style">
                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @if (Auth::check())
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    {{ Auth::user()->first_name }} {{Auth::user()->last_name}} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">
                                    <li>
                                        <a href="{{ url('/logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @endif
                    </ul>
                    </div>
                </div>
            </div>
        </nav>

        @yield('content')
    </div>

    <!-- Scripts -->
    <script src="/js/app.js"></script>
    <script
        src="https://code.jquery.com/jquery-3.1.1.min.js"
        integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8="
        crossorigin="anonymous">
    </script>
    <script src="/js/bootstrap-datepicker.js"></script>
    <script src="//code.jquery.com/ui/1.11.2/jquery-ui.js"></script>

    @yield('script')
</body>
</html>
