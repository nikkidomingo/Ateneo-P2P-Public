@extends('layouts.app')

@section('content')
<div class="fullsize">
    <div class="col-md-2"></div>
    <div class="col-md-8">
        <div class="row" style="margin-top:20px;">
            <div class="col-sm-8 col-md-offset-2">
                @if (Auth::user()->user_type == 3)
                    <div class="alert alert-info">
                        <p>Welcome to the demo version of <strong>Ateneo P2P+</strong>! Ateneo P2P+ is the university's point to point shuttle service, where users can reserve slots to shuttle trips to and from Ateneo.</p>
                        <p> As a <strong>User</strong>, you can:
                            <ul>
                                <li>View current announcements and shuttle schedules on the <strong> Home</strong> tab</li>
                                <li>Reserve slots on shuttle trips on the <strong>Reserve</strong> tab</li>
                                <li>View/edit your currently reserved trips  on the <strong> Profile</strong> tab</li>
                            </ul>
                        </p>
                    </div>
                @endif
            </div>
        </div>
        <div class="col-md-8">
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

        <div class="col-md-4">
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
        <div class="col-md-2"></div>
    </div>
</div>
@endsection