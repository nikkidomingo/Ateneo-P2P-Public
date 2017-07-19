@extends('layouts.intro')

<!-- Main Content -->
@section('content')

<p class="text-center"><strong>Enter your e-mail address</strong> to reset your password.</p>
<div class="panel-body">
    @if (session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
    @endif

    <form class="form-horizontal" role="form" method="POST" action="{{ url('/password/email') }}">
        {{ csrf_field() }}

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

        <div class="form-group" style="margin-top: 30px;">
            <div class="col-md-6 col-md-offset-3">
                <button type="submit" class="btn btn-primary-yellow">
                    Send Password Reset Link
                </button>
            </div>
        </div>
    </form>
</div>
@endsection
