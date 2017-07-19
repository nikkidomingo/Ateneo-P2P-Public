@extends('layouts.intro')

@section('content')

@if (count($errors) > 0)
<div class="alert alert-danger" style="margin-top: 50px;">
    @if($user_type == 0)
        Your ID Number, Grade Level, or Section is invalid.
    @elseif ($user_type == 1)
        Your ID Number or OBF E-mail is invalid.
    @elseif ($user_type == 2)
        Your Employee ID or Ateneo E-mail is invalid.
    @endif
</div>
@endif

<p class="text-center"><strong>Fill in the details</strong> to register.</p>
<div class="panel-body">
    @if($user_type == 0)  <!-- FOR HIGH SCHOOL -->
    <form class="form-horizontal" role="form" method="POST" action="/register/{{$user_type}}">
        {{ csrf_field() }}

        <input type="hidden" name="user_type" value="{{$user_type}}">

        <div class="form-group">
            <label for="hs_id_number" class="col-md-4 control-label">High School ID Number</label>

            <div class="col-md-6">
                <input id="hs_id_number" type="text" class="form-control" name="hs_id_number" value="{{ old('hs_id_number') }}" required autofocus>
            </div>
        </div>

        <div class="form-group">
            <label for="grade_level" class="col-md-4 control-label">Grade Level</label>

            <div class="col-md-6">
                <input id="grade_level" type="text" class="form-control" name="grade_level" value="{{ old('grade_level') }}" required autofocus>
            </div>
        </div>

        <div class="form-group">
            <label for="section" class="col-md-4 control-label">Section</label>

            <div class="col-md-6">
                <input id="section" type="text" class="form-control" name="section" value="{{ old('section') }}" required autofocus>

            </div>
        </div>

        <hr>
        <center> <b> Parent/Guardian Information </b><center><br>

            <div class="form-group">
                <label for="guardian_name" class="col-md-4 control-label">Name</label>

                <div class="col-md-6">
                    <input id="guardian_name" type="text" class="form-control" name="guardian_name" value="{{ old('guardian_name') }}" required autofocus>
                </div>
            </div>

            <div class="form-group">
                <label for="guardian_mobile_number" class="col-md-4 control-label">Mobile Number</label>

                <div class="col-md-6">
                    <input id="guardian_mobile_number" type="text" class="form-control" name="guardian_mobile_number" value="{{ old('guardian_mobile_number') }}" required autofocus>
                </div>
            </div>

            <div class="form-group">
                <label for="guardian_email" class="col-md-4 control-label">E-mail Address</label>

                <div class="col-md-6">
                    <input id="guardian_email" type="text" class="form-control" name="guardian_email" value="{{ old('guardian_email') }}" required autofocus>
                </div>
            </div>

            <div class="form-group" style="margin-top: 50px;">
                <div class="col-md-6 col-md-offset-3">
                    <button type="submit" class="btn btn-primary-yellow">
                        Next
                    </button>

                    <button onclick="goBack()" class="btn btn-primary-blue">
                        <strong> Back </strong>
                    </button>
                </div>
            </div>
        </form>

        @elseif ($user_type == 1)
        <form class="form-horizontal" role="form" method="POST" action="/register/{{$user_type}}">
            {{ csrf_field() }}

            <input type="hidden" name="user_type" value="{{$user_type}}">

            <div class="form-group">
                <label for="ls_id_number" class="col-md-4 control-label">Loyola Schools ID</label>

                <div class="col-md-6">
                    <input id="ls_id_number" type="text" class="form-control" name="ls_id_number" value="{{ old('ls_id_number') }}" required autofocus>
                </div>
            </div>

            <div class="form-group">
                <label for="obf_email" class="col-md-4 control-label">OBF E-mail Address</label>

                <div class="col-md-6">
                    <input id="obf_email" type="text" class="form-control" name="obf_email" value="{{ old('obf_email') }}" required autofocus>
                </div>
            </div>

            <div class="form-group" style="margin-top: 50px;">
                <div class="col-md-6 col-md-offset-3">
                    <button type="submit" class="btn btn-primary-yellow">
                        Next
                    </button>

                    <button onclick="goBack()" class="btn btn-primary-blue">
                        <strong> Back </strong>
                    </button>
                </div>
            </div>
        </form>

        @elseif ($user_type == 2)

        <form class="form-horizontal" role="form" method="POST" action="/register/{{$user_type}}">
            {{ csrf_field() }}

            <input type="hidden" name="user_type" value="{{$user_type}}">

            <div class="form-group">
                <label for="staff_id_number" class="col-md-4 control-label">Employee ID</label>

                <div class="col-md-6">
                    <input id="staff_id_number" type="text" class="form-control" name="staff_id_number" value="{{ old('staff_id_number') }}" required autofocus>
                </div>
            </div>

            <div class="form-group">
                <label for="ateneo_email" class="col-md-4 control-label">Ateneo E-mail Address</label>

                <div class="col-md-6">
                    <input id="ateneo_email" type="text" class="form-control" name="ateneo_email" value="{{ old('ateneo_email') }}" required autofocus>
                </div>
            </div>

            <div class="form-group">
                <label for="unit" class="col-md-4 control-label">Unit</label>

                <div class="col-md-6 radio" style="text-align: left;">
                    <label><input id="unit" type="radio" value="AGS" name="unit" required autofocus>AGS</label> <br>
                    <label><input id="unit" type="radio" value="AJHS" name="unit" required autofocus>AJHS</label> <br>
                    <label><input id="unit" type="radio" value="ASHS" name="unit" required autofocus>ASHS</label> <br>
                    <label><input id="unit" type="radio" value="BEU (Admin)" name="unit" required autofocus>BEU (Admin)</label> <br>
                    <label><input id="unit" type="radio" value="LS" name="unit" required autofocus>LS</label> <br>
                    <label><input id="unit" type="radio" value="Central Admin" name="unit" required autofocus>Central Admin</label> <br>
                    <label><input id="unit" type="radio" value="Affiliate" name="unit" required autofocus>Affiliate</label> <br>
                </div>
            </div>

            <div class="form-group">
                <label for="department" class="col-md-4 control-label">Department</label>

                <div class="col-md-6">
                   <input id="department" type="department" class="form-control" name="department" value="{{ old('department') }}" required>
               </div>
           </div>

           <div class="form-group"  style="margin-top: 50px;">
            <div class="col-md-6 col-md-offset-3">
                <button type="submit" class="btn btn-primary-yellow">
                    Next
                </button>

                <button onclick="goBack()" class="btn btn-primary-blue">
                    <strong> Back </strong>
                </button>
            </div>
        </div>
    </form>
    @endif
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