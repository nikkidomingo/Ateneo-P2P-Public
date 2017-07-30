@extends('layouts.app')

@section('content')
<div class="container" id="reservations-content">

  <div class="panel-main" id="reservations-input" style="margin:50px">
    <div class="row"> 
      <div class="col-sm-8 col-sm-offset-2">
        <div class="alert alert-danger">
          No reservations for this date.
        </div>
      </div>
    </div>
    <form class="form-horizontal" role="form" method="get" action="">
      {{ csrf_field() }}

      <div class="form-group">
        <div class="row">
          <label for="date" class="col-sm-4 control-label">Date</label>
          <div class="col-sm-4">
            <input id="date" class="form-control date hint" name="date" onchange="loadDate()" value="" required autofocus>
          </div>

          <div class="col-sm-4 print-btn">
            <button class="btn btn-primary-yellow" id="export-btn" onclick="printTable()"> Print </button>
          </div>
        </div>
      </div>
    </form>
  </div>

  <table class="table" id="reservations-table">
    <thead class= "panel-head-one">
      <tr>
        <!-- <th style="text-align: center;">Date</th> -->
        <th style="text-align: center;">Location</th>
        <th style="text-align: center;">Time</th>
        <th style="text-align: center;">Name</th>
        <th style="text-align: center;">Contact</th>
        <th style="text-align: center;">Action</th>
      </tr>
    </thead>
    <tbody class ="panel-body-one" id="table-body" style="text-align: center; vertical-align: middle;">
    </tbody>
  </table>
</div>

<div id="printable"></div>

<script src="https://code.jquery.com/jquery-3.1.1.min.js" integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8=" crossorigin="anonymous"></script>
<script src="/js/bootstrap-datepicker.js"></script>
<script type="text/javascript" src="//cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>

<script type="text/javascript">

    $('#date').datepicker({
        multidate: false,
        daysOfWeekDisabled: "0,6",
        format: "yyyy-mm-dd",
    });

    function loadDate(){
        var date = $('#date').val();
        console.log(date);
        $.ajax({
            type: "get",
            url: "/admin/reservations/" + date,
            data: date,
            cache: false,
            success: function(data){
                console.log("done");
                console.log(data.slots);
                $('#table-body').empty();
                for ( var i in data.slots ){
                  var location = (data.slots)[i].location;
                  var time_slot = (data.slots)[i].time_slot;
                  var user = (data.slots)[i].first_name + " " + (data.slots)[i].last_name;
                  var mobile_number = (data.slots)[i].mobile_number;
                  var reservation_id = (data.slots)[i].reservation_id;

                  var td_location = "<td>" + location + "</td>";
                  var td_time = "<td>" + time_slot + "</td>";
                  var td_user = "<td>" + user + "</td>";
                  var td_number = "<td>" + mobile_number + "</td>";
                  var td_delete_button = '<td> <form method="get" action="/admin/reservations/delete/' + reservation_id + '" ><div class="form-group"><button type="submit" class="btn btn-primary-yellow">Delete</button></div></form> </td>'; 


                  $('#table-body').append("<tr>" + td_location + td_time + td_user + td_number + td_delete_button + "</tr>");
                }

                isTableEmpty();
            }

        });
    }

    function printTable(){
      var str = "<h1><strong>Ateneo P2P+ Trips</strong></h1><h4><strong>Date: " + $('#date').val() + "</strong></h4>"
      $('#printable').empty();
      $('#printable').append(str);
      $('#printable').append( $('#reservations-table').clone());
      $('#printable #reservations-table th:last-child, #printable #reservations-table td:last-child').remove();
      window.print();
    }

    function isTableEmpty(){
      if($('#date').val() == ''){}

      var rowCount = $('#table-body tr').length;
      if(rowCount < 1 && $('#date').val() == ''){
        $('#export-btn').attr('disabled','disabled');
        $('.alert-danger').css("display", "none");
      } else if (rowCount < 1 && $('#date').val() != '') {
        $('#export-btn').attr('disabled','disabled');
        $('.alert-danger').css("display", "block");
      } else {
          $('#export-btn').removeAttr('disabled');
          $('.alert-danger').css("display", "none");
      }
    }

    function goBack() {
        window.history.back();
    }
</script>
@endsection