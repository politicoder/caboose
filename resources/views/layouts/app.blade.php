<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="https://fonts.googleapis.com/css?family=Indie+Flower|Josefin+Sans:300,300i,700" rel="stylesheet">
    <link href="/css/app.css" rel="stylesheet">

    <!-- Scripts -->
    <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
            ]); ?>
        </script>
    </head>
    <body>

        <header>
            <div class="container">
                <div class="row">
                    <div class="col-sm-2">
                        <img src="{{ asset('img/logo.png') }}" alt="Caboose" class="logo">
                    </div>
                </div>
            </div>
            @if (Auth::check())
            <div class="header-stripe">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-6">
                            <span>You are <strong>{{ Auth::user()->name }}</strong> <a href="{{ url('/logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">(No I'm not!)</a>
                                <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                @endif
            </header>

            <div class="page-content">
                @yield('content')
            </div>

            <footer>
                <h3>This is Caboose.</h3>
            </footer>


            <!-- Scripts -->
            <script src="/js/app.js"></script>
            @yield('js')
        </body>
        </html>
