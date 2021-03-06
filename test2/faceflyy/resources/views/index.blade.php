@extends('layouts.app')

@section('title', 'Page Title')

@section('sidebar')
@parent
@endsection

@section('content')

<section>
    <h3>Flight Booking</h3>
    <div class="panel panel-default">
        <div class="panel-body">
            <form role="form" name="form_a" action="{{route('flight-list')}}" id="search">
                <div class="row">
                    <div class="col-sm-4">
                        <h4 class="form-heading">1. Flight Destination</h4>
                        <div class="form-group">
                            <label class="control-label">From: </label>
                            <select class="form-control" name="from" id="from">
                                <option value="" selected disabled>Select</option>
                                <?php foreach ($cities as $city): ?>
                                    <option value="{{$city->city_id}}">{{$city->city_name}} ({{$city->city_code}})</option>
                                <?php endforeach; ?>
                            </select>                                       
                        </div>
                        <div class="form-group">
                            <label class="control-label">To: </label>
                            <select class="form-control" name="to" id="to">
                                <option value="" selected disabled>Select</option>
                                <?php foreach ($cities as $city): ?>
                                    <option value="{{$city->city_id}}">{{$city->city_name}} ({{$city->city_code}})</option>
                                <?php endforeach; ?>
                            </select>       
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <h4 class="form-heading">2. Date of Flight</h4>
                        <div class="form-group">
                            <label class="control-label">Departure: </label>
                            <input type="date" name="departure" id="departure" class="form-control" placeholder="Choose Departure Date">
                        </div>
                        <div class="form-group">
                            <div class="radio">
                                <label><input type="radio" id="one_way" name="flight_type"  value="one-way">One Way</label>
                                <label><input type="radio" id="Return" name="flight_type" checked value="return">Return</label>
                            </div>
                        </div>
                        <div id="returnn_day" class="form-group">
                            <label class="control-label">Return: </label>
                            <input type="date" name="return_day" id="return_day" class="form-control" placeholder="Choose Return Date">
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <h4 class="form-heading">3. Search Flights</h4>
                        <div class="form-group">
                            <label class="control-label">Total Person: </label>
                            <select id="total_person" name="total_person" class="form-control">
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                                <option value="6">6</option>
                                <option value="7">7</option>
                                <option value="8">8</option>
                                <option value="9">9</option>
                                <option value="10">10</option>
                            </select>
                            @if($errors->has('errorTotal'))
                            <p style="color:red">{{$errors->first('errorTotal')}}</p>
                            @endif
                        </div>
                        <div class="form-group">
                            <label class="control-label">Flight Class: </label>
                            <select class="form-control" name="flight_class" id="flight_class">
                                @foreach ($flight_classes as $flight_class)
                                <option value="<?php echo $flight_class['fc_id']; ?>"><?php echo $flight_class['fc_name']; ?></option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <button id="btnSearch" type="submit" class="btn btn-primary btn-block ">Search Flights</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>
@endsection