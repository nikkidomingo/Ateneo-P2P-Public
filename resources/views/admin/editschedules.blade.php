@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
        <h1>Edit Schedules</h1>
            <div class="panel panel-default">
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="/admin/schedules/edit">
                    {{ csrf_field() }}

                        <h4>To Ateneo</h4>

                        @foreach($locations as $location)
                            @if ($location -> trip_type  == 0)

                                <div class="form-group row">
                                    <label for="schedule" class="col-md-4 control-label">{{ $location -> name }}</label>
                                    <div class="col-md-6 radio">
                                        @foreach ($location -> schedules as $schedule)

                                            <input class="form-control" type="text" name="schedule" id="schedule" value="{{$schedule -> timeslot -> time_slot }}" required> </input>

                                        @endforeach
                                    </div>
                                </div>
                            @endif
                        @endforeach

                        <hr>
                        
                        <h4>From Ateneo</h4>
                        @foreach($locations as $location)
                            @if ($location -> trip_type == 1)

                               <div class="form-group row">
                                    <label for="schedule" class="col-md-4 control-label">{{ $location -> name }}</label>
                                    <div class="col-md-6 radio">
                                        @foreach ($location -> schedules as $schedule)

                                            <input class="form-control" type="text" name="schedule" id="schedule" value="{{$schedule -> timeslot -> time_slot }}" required> </input>

                                        @endforeach
                                    </div>
                                </div>

                            @endif

                        @endforeach

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary"> Submit </button>
                                <button onclick="goBack()" class="btn btn-primary" > Cancel </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script
    src="https://code.jquery.com/jquery-3.1.1.min.js"
    integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8="
    crossorigin="anonymous">
</script>
<script src="/js/bootstrap-datepicker.js"></script>
<script type="text/javascript" src="//cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>

<script type="text/javascript">

    function goBack() {
        window.history.back();
    }
</script>
@endsectio
@endsection
