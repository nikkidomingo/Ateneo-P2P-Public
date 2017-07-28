@extends('layouts.app')

@section('content')

<div class="container">
	<div class="row">
		<div class="col-sm-8 col-sm-offset-2">
			<p class="text-center" style="margin-top: 40px; margin-bottom: 30px;"><strong>Reserve</strong> a shuttle slot.</p>
			<div class="panel-main">
				<form class="form-horizontal" role="form" method="POST" action="/reserve">
					{{ csrf_field() }}
					
					<div class="form-group row">
						<label for="date_slots" class="col-sm-4 control-label">Date</label>
						<div class="col-sm-6">
							<input id="date_slots" class="form-control date hint" name="date_slots" value="You can select multiple dates." required autofocus>
						</div>
					</div>

					<div class="form-group row"> 
						<label for="morning_schedule" class="col-sm-4 control-label">Morning Schedules</label>
						<div class="col-sm-6 radio">
							<select class="form-control" name="morning_schedule" id="morning_schedule">
							</select>   
						</div>
					</div>

					<div class="form-group row">
						<label for="afternoon_schedule" class="col-sm-4 control-label">Afternoon Schedules</label>
						<div class="col-sm-6 radio">
							<select class="form-control" name="afternoon_schedule" id="afternoon_schedule">
							</select>	
						</div>
					</div>

					<div class="form-group row">
						<label for="comment" class="col-sm-4 control-label">Special Comments</label>
						<div class="col-sm-6 radio">
							<textarea class="form-control" id="comment" name="comment" rows="3"></textarea>
						</div>
					</div>

					<div class="form-group">
						<center><button type="submit" class="btn btn-primary-blue">Submit</button></center>
					</div>
				</form>
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

	$('#date_slots').datepicker({
		multidate: true,
		daysOfWeekDisabled: "0,6",
		// startDate:"0",
		// endDate: "+7d",
		clearBtn: "true",
		format: "yyyy-mm-dd"
	}).on('hide', function (e){
		var date_slots = $('#date_slots').val();
		$.ajax({
			type: "get",
			url: "/reserve/dateselect/" + date_slots,
			data: date_slots,
			cache: false,
			success: function(data){
				$('#morning_schedule').empty();
				$('#afternoon_schedule').empty();
				console.log("success")
				console.log(data.slots)
				console.log(data.schedule_ids)
				for ( var i in data.slots ){
					var schedule = (data.slots)[i];
					console.log(schedule)
					for (var j in schedule){
						var slot = schedule[j];
						var option = $('<option></option').attr("value", slot.schedule_id).text(slot.location + " || " + slot.time_slot);

						if (slot.trip_type == 0) {
							$("#morning_schedule").append(option);
						} else {
							$("#afternoon_schedule").append(option);
						}
					}
				}
			},
		});
	});
</script>

@endsection
