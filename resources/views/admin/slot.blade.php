@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">

            <h1>Schedule Trips</h1>
            <form method="get" action="/admin/slots/add">
                <button type="submit" class="btn btn-primary"> Schedule New Trip </button>
            </form>

            <div class="panel panel-default">
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="get" action="/admin/slots">
                    {{ csrf_field() }}
                        <div class="col-md-6" id="scheduled_dates" ></div>

                        Here it should display the scheduled trips according to selected date <br>

                        <button type="submit" class="btn btn-primary"> Edit </button>
                        <button type="submit" class="btn btn-primary"> Delete </button>
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

    $('#date_slots').datepicker({
        multidate: true,
        daysOfWeekDisabled: "0,6",
        startDate:"0",
        clearBtn: "true",
        format: "yyyy-mm-dd",
    });

    $('#scheduled_dates').datepicker({
        daysOfWeekDisabled: "0,6",
        startDate:"0",
        format: "yyyy-mm-dd",
    });
</script>
@endsection
