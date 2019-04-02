@extends('layouts.app')

@section('title', 'Page Title')

@section('sidebar')
@parent
@endsection

@section('content')

<section>
    @foreach ($flightdetails as $flightdetail)
    <h2>
        @foreach ($citylists as $city )
        @if ($city->city_id == $flightdetail->fl_city_from_id)
        {{$city->city_name . " (". $city->city_code . ")" }}
        @endif
        @endforeach
        <i class="glyphicon glyphicon-arrow-right"></i>
        @foreach ($citylists as $city )
        @if ($city->city_id == $flightdetail->fl_city_to_id)
        {{$city->city_name. " (". $city->city_code . ")" }}
        @endif
        @endforeach
    </h2>
    <article>
        <div class="panel panel-default">
            <div class="panel-body">
                <div class="row">
                    <div class="col-md-12">
                        <h4><strong>{{$flightdetail->airline_name}}</strong></h4>
                        <div class="row">
                            <div class="col-sm-3">
                                <label class="control-label">From:</label>
                                <div><big class="time">{{date("H:i", strtotime($flightdetail->fl_departure_date))}}</big></div>
                                <div><span class="place">
                                        @foreach ($citylists as $city )
                                        @if ($city->city_id == $flightdetail->fl_city_from_id)
                                        {{$city->city_name . " (". $city->city_code . ")" }}
                                        @endif
                                        @endforeach
                                    </span></div>
                            </div>
                            <div class="col-sm-3">
                                <label class="control-label">To:</label>
                                <div><big class="time">{{date("H:i", strtotime($flightdetail->fl_landing_date))}}</big></div>
                                <div><span class="place">
                                        @foreach ($citylists as $city )
                                        @if ($city->city_id == $flightdetail->fl_city_to_id)
                                        {{$city->city_name. " (". $city->city_code . ")" }}
                                        @endif
                                        @endforeach
                                    </span></div>
                            </div>
                            <div class="col-sm-3">
                                <label class="control-label">Duration:</label>
                                <div><big class="time">{{date("H:i", strtotime($flightdetail->fl_landing_date) - strtotime($flightdetail->fl_departure_date) )}}</big></div>
                                <div><strong class="text-danger">1 Transit</strong></div>
                            </div>
                            <div class="col-sm-3 text-right">
                                <h3 class="price text-danger"><strong>IDR{{$flightdetail->fl_cost}}</strong></h3>
                                <div>
                                    <a href="{{route('flight-book')}}" class="btn btn-primary">Choose</a>
                                </div>
                            </div>
                        </div>
                        <ul class="nav nav-tabs">
                            <li class="active"><a data-toggle="tab" href="#flight-detail-tab">Flight Details</a></li>
                            <li><a data-toggle="tab" href="#flight-price-tab">Price Details</a></li>
                        </ul>
                        <div class="tab-content">
                            <div id="flight-detail-tab" class="tab-pane fade in active">
                                <ul class="list-group">
                                    <li class="list-group-item">
                                        <h5>
                                            <strong class="airline">{{$flightdetail->airline_name . " " . $flightdetail->fl_code}}</strong>
                                            <p><span class="flight-class">{{Session::get('fc_id')}}</span></p>
                                        </h5>
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <div class="row">
                                                    <div class="col-sm-4">
                                                        <div><big class="time">{{date("H:i", strtotime($flightdetail->fl_departure_date))}}</big></div>
                                                        <div><small class="date">{{date("d:m:y", strtotime($flightdetail->fl_departure_date))}}</small></div>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        @foreach ($citylists as $city )
                                                        @if ($city->city_id == $flightdetail->fl_city_from_id)
                                                        <div><span class="place">{{$city->city_name. " (". $city->city_code . ")" }}</span></div>
                                                        <div><small class="airport">{{$city->airport_name}}</small></div>
                                                        @endif
                                                        @endforeach
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-1">
                                                <i class="glyphicon glyphicon-arrow-right"></i>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="row">
                                                    <div class="col-sm-4">
                                                        <div><big class="time">23:20</big></div>
                                                        <div><small class="date">29 Apr 2017</small></div>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <div><span class="place">Doha (DOH)</span></div>
                                                        <div><small class="airport">Doha Hamad International Airport</small></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-3 text-right">
                                                <label class="control-label">Duration:</label>
                                                <div><strong class="time">7h 35m</strong></div>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="list-group-item list-group-item-warning">
                                        <ul>
                                            <li>Transit for 1h 30m in Doha (DOH)</li>
                                        </ul>
                                    </li>
                                    <li class="list-group-item">
                                        <h5>
                                            <strong class="airline">Qatar Airways QR-1052</strong>
                                            <p><span class="flight-class">Economy</span></p>
                                        </h5>
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <div class="row">
                                                    <div class="col-sm-4">
                                                        <div><big class="time">00:50</big></div>
                                                        <div><small class="date">30 Apr 2017</small></div>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <div><span class="place">Doha (DOH)</span></div>
                                                        <div><small class="airport">Doha Hamad International Airport</small></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-1">
                                                <i class="glyphicon glyphicon-arrow-right"></i>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="row">
                                                    <div class="col-sm-4">
                                                        <div><big class="time">02:55</big></div>
                                                        <div><small class="date">30 Apr 2017</small></div>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <div><span class="place">Abu Dhabi (AUH)</span></div>
                                                        <div><small class="airport">Abu Dhabi Intl</small></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-3 text-right">
                                                <label class="control-label">Duration:</label>
                                                <div><strong class="time">2h 5m</strong></div>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                            <div id="flight-price-tab" class="tab-pane fade">
                                <h5>
                                    <strong class="airline">Qatar Airways</strong>
                                    <p><span class="flight-class">Economy</span></p>
                                </h5>
                                <ul class="list-group">
                                    <li class="list-group-item">
                                        <div class="pull-left">
                                            <strong>Passengers Fare (x3)</strong>
                                        </div>
                                        <div class="pull-right">
                                            <strong>IDR24.796.650,00</strong>
                                        </div>
                                        <div class="clearfix"></div>
                                    </li>
                                    <li class="list-group-item">
                                        <div class="pull-left">
                                            <span>Tax</span>
                                        </div>
                                        <div class="pull-right">
                                            <span>Included</span>
                                        </div>
                                        <div class="clearfix"></div>
                                    </li>
                                    <li class="list-group-item list-group-item-info">
                                        <div class="pull-left">
                                            <strong>You Pay</strong>
                                        </div>
                                        <div class="pull-right">
                                            <strong>IDR24.796.650,00</strong>
                                        </div>
                                        <div class="clearfix"></div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </article>
    @endforeach
</section>
@endsection