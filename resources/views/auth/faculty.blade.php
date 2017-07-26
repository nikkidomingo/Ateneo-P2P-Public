@extends('layouts.intro')

@section('content')
<p class="text-center"><strong>Fill in the details</strong> to register.</p>
<div class="panel-body" id="validate">
    <form class="form-horizontal" role="form" method="GET" action="/register/validate">
        {{ csrf_field() }}

        <div class="form-group{{ $errors->has('user_type') ? ' has-error' : '' }}">
            <div class="row">
                <label for="user_type" class="col-sm-4">Faculty/School</label>

                <center>
                    <div class="col-sm-6 radio" style="text-align: left;">
                        <label><input id="user_type" type="radio" value="0" name="user_type" required autofocus>Ateneo High School</label> <br>
                        <label><input id="user_type" type="radio" value="1" name="user_type" required autofocus>Loyola Schools (Undergraduate) </label> <br>
                        <label><input id="user_type" type="radio" value="2" name="user_type" required autofocus>Employee</label> <br>
                    </div>
                </center>
            </div>
        </div>

        <div>Just trying out the website? <a class="btn btn-link" href="{{ url('/register/3') }}"> Sign up as a guest.</a></div>

        <div class="form-group" style="text-align: left; margin-top: 50px;">
            <div class="col-sm-6 col-sm-offset-3">
                <center>
                    <button type="submit" class="btn btn-primary-yellow"><strong> Next </strong></button>
                    <button onclick="goBack()" class="btn btn-primary-blue"><strong> Cancel </strong></button>
                </center>
            </div>
        </div>

    </form>

</div>
@endsection

<script
    src="https://code.jquery.com/jquery-3.1.1.min.js"
    integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8="
    crossorigin="anonymous">
</script>

<script type="text/javascript">

    function goBack() {
        window.history.back();
    }

</script>
