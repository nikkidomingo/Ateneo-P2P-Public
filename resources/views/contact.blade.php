@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row" style="margin-top: 80px">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel-head-one">
                <h3>Contact Us</h3>
            </div>
            <div class="panel-body" style="text-align: center;">
                <div class="panel-head-two">
                    <h4>For AJHS/ASHS</h4>
                </div>

                <div class="panel-body-one">
                    @foreach( $contacts as $contact)
                    @if( $contact -> contact_faculty == 'AJHS/ASHS' )
                    {{ $contact -> contact_number }} <br>
                    @endif
                    @endforeach
                </div>

                <hr>

                <div class="panel-head-two">
                    <h4>For LS/Employees/University Affiliates</h4>
                </div>

                <div class="panel-body-one">
                    @foreach( $contacts as $contact)
                    @if( $contact -> contact_faculty == 'LS/Employees/University Affiliates' )
                    {{ $contact -> contact_number }} <br>
                    @endif
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
