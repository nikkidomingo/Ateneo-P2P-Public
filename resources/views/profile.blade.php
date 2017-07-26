@extends('layouts.app')

@section('content')
<div class="container">
    <div class="col-md-8 col-md-offset-2">
        <h1><strong> {{ $user -> first_name }} {{ $user->last_name }}</strong></h1>

        <div class="panel-head-two">
            @if ($user -> user_type == 0)
            <h4> Ateneo High School Student </h4>
            @elseif ($user -> user_type == 1)
            <h4> Loyola Schools Student </h4>
            @elseif ($user -> user_type == 2)
            <h4> Ateneo Employee </h4>
            @elseif ($user -> user_type == 3)
            <h4> Guest User </h4>
            @endif
        </div>

        <!-- Lists all the reservations of a user -->

        <table class="table" style="margin-top:50px;" >
          <thead class= "panel-head-one">
            <tr>
              <th style="text-align: center;">Date</th>
              <th style="text-align: center;">Location and Time</th>
              <th style="text-align: center;">Action</th>
          </tr>
      </thead>
      <tbody class ="panel-body-one" style="text-align: center; vertical-align: middle;">

        @foreach ($user->reservations as $reservation)
        <?php $slot = $reservation->slot ?>

        <tr>
            <td class="panel-head-two" style="vertical-align: middle;">
                {{ Carbon\Carbon::parse($slot->date_slots)->format('d F Y') }}    
            </td>

            <td style="vertical-align: middle;"> 
                {{$slot->schedule->location->name}} <br>

                {{ Carbon\Carbon::parse($slot->schedule->timeslot->time_slot)->format('h:i A') }}
            </td>

            <td>
                <!-- Delete Button -->
                <form method="get" action="profile/{{$reservation->id}}" >
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary-yellow">Delete</button>
                    </div>
                </form>     
            </td>
            @endforeach
        </tr>
    </tbody>
</table>
</div>
</div>
@endsection