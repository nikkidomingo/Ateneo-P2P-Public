<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="/css/welcome.css" rel="stylesheet">

        <title>Ateneo P2P</title>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            <div class="content">
                <img src='/images/homelogo-1.png'>
    
                <div class="links">
                    @if (Auth::check())
                        <a href="{{ url('/home') }}" role="button" class="btn btn-primary-yellow">Home</a>
                    @else
                        <div class="links">
                            <a href="{{ url('/login') }}" role="button" class="btn btn-primary-yellow">
                                <strong> LOGIN </strong>
                            </a>
                        </div>
                        <div class="links" style="margin-top: 25px">
                            <a href="{{ url('/register/faculty') }}" role="button" class="btn btn-primary-blue">
                                <strong> REGISTER </strong>
                            </a>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </body>
</html>


<!-- base64:G1CZZKADtQ0OP5yA5LNz4djYU+gyS5PvgrNlMlxNsoE= -->