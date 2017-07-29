@extends('layouts.app')

@section('content')
<div class="fullsize">
    <div class="col-md-2"></div>
    <div class="col-md-8">
        <div class="row" style="margin-top: 20px;">
            <div class="col-sm-8 col-md-offset-2">
                @if (Auth::user()->user_type == 3)
                    <div class="alert alert-info">
                        <p>Welcome to the demo version of <strong>Ateneo P2P+</strong>! Ateneo P2P+ is the university's point to point shuttle service, where users can reserve slots to shuttle trips to and from Ateneo.</p>
                        <p> As an <strong>Admin</strong>, you can:
                            <ul>
                                <li>Add/edit announcements on the <strong>Home</strong> tab</li>
                                <li>View and print a list of all riders for the day's shuttle trips on the <strong>Reservations</strong> tab</li>
                                <li>Add shuttle trips per day on the <strong>Schedules</strong> tab</li>
                            </ul>
                        </p>
                    </div>
                @endif
            </div>
        </div>
        <div class="col-md-8">
            <div class="panel-main">
                    <div class="panel-head-one">
                            <h2>Announcements</h2>
                            <div class="form-group">
                            <button type="submit" class="btn btn-primary-yellow" data-toggle="collapse" data-target="#add_announcement">Add Announcement</button>
                            </div>
                    </div>

                    <form class="form-horizontal" role="form" method="get" action="/admin/home/announcement">
                    {{ csrf_field() }}

                        <div class="collapse" id="add_announcement" style="margin-top:50px; margin-bottom: 50px;">
                            <div class="form-group row">
                                <label for="announcement_title" class="col-md-4 control-label">Title</label>
                                <div class="col-md-6 radio">
                                     <input id="announcement_title" type="text" class="form-control" name="announcement_title" required>
                                </div>                                
                            </div>
                            <div class="form-group row">
                                <label for="announcement_content" class="col-md-4 control-label">Content</label>
                                <div class="col-md-6 radio">
                                    <textarea class="form-control" id="announcement_content" rows="3"  name="announcement_content"  required></textarea>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-5">
                                    <button type="submit" class="btn btn-primary-blue"> Add </button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
 
                <div class="panel-body">
                    @foreach ($announcements as $announcement)
                        <div class="panel-head-two">

                            <!-- Delete Button -->
                            <form method="get" action="/admin/home/{{$announcement->id}}">
                                <button type="submit" class="btn btn-primary-yellow pull-right">Delete</button>
                            </form>
                            <h4> {{ $announcement->title }} </h4>

                        </div>

                        <i>{{ Carbon\Carbon::parse($announcement->created_at)->format('d F Y') }} </i><br>

                        <div class="panel-body-one">
                            {{ $announcement-> content }} <br>
                        </div>
                       <hr>
                    @endforeach
                </div>
            </div>

            <div class="col-md-4">
            <div class="panel-main">
                <div class="panel-head-one"><h2>Schedules</h2>
                    <!-- <form method="get" action="/admin/home/schedules/edit">
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary-yellow" >Edit Schedules</button>
                            </div>
                    </form> -->
                </div>
                

                <div class="panel-body  col-md-6">

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
    <div class="col-md-2"></div>
</div>
@endsection
