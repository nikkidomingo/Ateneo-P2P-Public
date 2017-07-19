@extends('layouts.intro')

@section('content')
<p class="text-center"><strong>Fill in the details</strong> to register.</p>
<div class="panel-body">
    <form class="form-horizontal" role="form" method="GET" action="/register/validate">
        {{ csrf_field() }}

        <div class="form-group{{ $errors->has('user_type') ? ' has-error' : '' }}">
            <label for="user_type" class="col-md-4 control-label">Faculty/School</label>

            <div class="col-md-6 radio" style="text-align: left;">
                <label><input id="user_type" type="radio" value="0" name="user_type" required autofocus>Ateneo High School</label> <br>
                <label><input id="user_type" type="radio" value="1" name="user_type" required autofocus>Loyola Schools (Undergraduate) </label> <br>
                <label><input id="user_type" type="radio" value="2" name="user_type" required autofocus>Employee</label> <br>
            </div>
        </div>

        <div class="form-group" style="text-align: left; margin-top: 50px;">
            <div class="col-md-6 col-md-offset-4">
                <button type="submit" class="btn btn-primary-yellow">
                    <strong> Next </strong>
                </button>

                <button onclick="goBack()" class="btn btn-primary-blue">
                    <strong> Cancel </strong>
                </button>
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
