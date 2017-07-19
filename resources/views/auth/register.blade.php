@extends('layouts.intro')

@section('content')
<p class="text-center"><strong>Complete</strong> your registration.</p>
<div class="panel-body">
    <form class="form-horizontal" role="form" method="POST" action="{{ url('/register') }}">
        {{ csrf_field() }}

        <input type="hidden" name="user_type" value="{{$user_type}}">

        <div class="form-group{{ $errors->has('first_name') ? ' has-error' : '' }}">
            <label for="first_name" class="col-md-4 control-label">First Name</label>

            <div class="col-md-6">
                <input id="first_name" type="text" class="form-control" name="first_name" value="{{ old('first_name') }}" required autofocus>

                @if ($errors->has('first_name'))
                <span class="help-block">
                    <strong>{{ $errors->first('first_name') }}</strong>
                </span>
                @endif
            </div>
        </div>

        <div class="form-group{{ $errors->has('last_name') ? ' has-error' : '' }}">
            <label for="last_name" class="col-md-4 control-label">Last Name</label>

            <div class="col-md-6">
                <input id="last_name" type="text" class="form-control" name="last_name" value="{{ old('last_name') }}" required autofocus>

                @if ($errors->has('last_name'))
                <span class="help-block">
                    <strong>{{ $errors->first('last_name') }}</strong>
                </span>
                @endif
            </div>
        </div>

        <div class="form-group{{ $errors->has('middle_initial') ? ' has-error' : '' }}">
            <label for="middle_initial" class="col-md-4 control-label">Middle Initial</label>

            <div class="col-md-6">
                <input id="middle_initial" type="text" class="form-control" name="middle_initial" value="{{ old('middle_initial') }}">

                @if ($errors->has('middle_initial'))
                <span class="help-block">
                    <strong>{{ $errors->first('middle_initial') }}</strong>
                </span>
                @endif
            </div>
        </div>

        <div class="form-group{{ $errors->has('mobile_number') ? ' has-error' : '' }}">
            <label for="mobile_number" class="col-md-4 control-label">Mobile Number</label>

            <div class="col-md-6">
                <input id="mobile_number" type="text" class="form-control" name="mobile_number" value="{{ old('mobile_number') }}" required autofocus>

                @if ($errors->has('mobile_number'))
                <span class="help-block">
                    <strong>{{ $errors->first('mobile_number') }}</strong>
                </span>
                @endif
            </div>
        </div>

        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

            <div class="col-md-6">
                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                @if ($errors->has('email'))
                <span class="help-block">
                    <strong>{{ $errors->first('email') }}</strong>
                </span>
                @endif
            </div>
        </div>

        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
            <label for="password" class="col-md-4 control-label">Password</label>

            <div class="col-md-6">
                <input id="password" type="password" class="form-control" name="password" required>

                @if ($errors->has('password'))
                <span class="help-block">
                    <strong>{{ $errors->first('password') }}</strong>
                </span>
                @endif
            </div>
        </div>

        <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
            <label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>

            <div class="col-md-6">
                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>

                @if ($errors->has('password_confirmation'))
                <span class="help-block">
                    <strong>{{ $errors->first('password_confirmation') }}</strong>
                </span>
                @endif
            </div>
        </div>

        <div class="form-group" style="margin-top: 50px;">
            <div class="col-md-6 col-md-offset-3">
            <button type="submit" class="btn btn-primary-yellow">
                    <strong> Register </strong>
                </button>

                <button onclick="goBack()" class="btn btn-primary-blue">
                    <strong> Back </strong>
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