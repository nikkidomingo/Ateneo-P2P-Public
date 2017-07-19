<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Ateneo P2P</title>

        <!-- Styles -->
        <style>
            html, body {
                background-color: #0B3C5D;
                color: #636b6f;
                font-family: "gotham-rounded-medium";
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                border: none;
                color: #636b6f;
                padding: 10px; 
                font-size: 14px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
                padding-right: 100px;
                padding-left: 100px;
                border-radius: 5px
            }

            .m-b-md {
                margin-bottom: 30px;
            }

            @font-face {
                font-family:"gotham-rounded-medium";
                src: url('/fonts/gotham-rounded-medium.ttf');
            }

            @font-face {
                font-family:"lato-light";
                src: url('/fonts/lato-light.ttf');
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
           <!--  @if (Route::has('login'))
                <div class="top-right links">
                    @if (Auth::check())
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ url('/login') }}">Login</a>
                        <a href="{{ url('/register') }}">Register</a>
                    @endif
                </div>
            @endif -->

            <div class="content">
                <img src='/images/homelogo.png' style="max-width: 400px">
                

                <div class="links">
                    @if (Auth::check())
                        <a href="{{ url('/home') }}" role="button" class="btn btn-primary" style="background-color: #D9B310; color: #0B3C5D;">Home</a>
                    @else
                        <div class="links">
                            <a href="{{ url('/login') }}" role="button" class="btn btn-primary" style="background-color: #D9B310; color: #0B3C5D;">
                                <strong> LOGIN </strong>
                            </a>
                        </div>
                        <div class="links" style="margin-top: 25px">
                            <a href="{{ url('/register/faculty') }}" role="button" class="btn btn-primary" style="background-color: #0B3C5D; color: #D9B310;">
                                <strong> REGISTER </strong>
                            </a>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </body>
</html>
