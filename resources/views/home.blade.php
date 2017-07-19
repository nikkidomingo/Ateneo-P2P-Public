@extends('layouts.app')

@section('content')
<div class="fullsize">
        <div class="col-md-6">
            <div class="panel-main">
                <div class="panel-head-one"><h2>Announcements</h2></div>
 
                <div class="panel-body">
                    @foreach ($announcements as $announcement)
                        <div class="panel-head-two">
                            <h4> {{ $announcement->title }} </h4>
                        </div>
                        <i> 
                            {{ Carbon\Carbon::parse($announcement->created_at)->format('d F Y') }}
                        </i>
                        <div class="panel-body-one">
                            {{ $announcement->content }} <br>
                        </div>
                        <hr>
                    @endforeach
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="panel-main">
                <div class="panel-head-one"><h2>Schedules</h2></div>

                <div class="panel-body col-md-6">

                    <div class="panel-head-two">
                        <h4>To Ateneo</h4>
                    </div>
                    @foreach($locations as $location)
                        @if ($location -> trip_type  == 0)

                            <div class="panel-head-three">
                                {{ $location -> name }}<br>
                            </div>
                            
                            @foreach ($location -> schedules as $schedule)
                                <div class="panel-body-one"> 
                                    {{ Carbon\Carbon::parse($schedule -> timeslot -> time_slot )->format('h:i A') }}<br>
                                </div>
                            @endforeach
                            <br>

                        @endif
                    @endforeach

                </div>

                <div class="panel-body col-md-6">
                    
                   <div class="panel-head-two">
                        <h4>From Ateneo</h4>
                    </div>
                    @foreach($locations as $location)
                        @if ($location -> trip_type == 1)

                        <div class="panel-head-three">
                            {{ $location -> name }}<br>
                        </div>
                            
                            @foreach ($location -> schedules as $schedule)

                            <div class="panel-body-one"> 
                                {{ Carbon\Carbon::parse($schedule -> timeslot -> time_slot )->format('h:i A') }}<br>
                            </div>

                            @endforeach
                            <br>

                        @endif

                    @endforeach
                    </div>
                </div>
            </div>

        </div>
</div>
@endsection