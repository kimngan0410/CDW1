@extends('layouts.app')

@section('title', 'Page Title')

@section('sidebar')
@parent
@endsection

@section('content')
<section>
    <h2>
        @foreach ($citylists as $city )
        @if ($city->city_id == $_GET['from'])
        {{$city->city_name . " (". $city->city_code . ")" }}
        @endif
        @endforeach
        <i class="glyphicon glyphicon-arrow-right"></i>
        @foreach ($citylists as $city )
        @if ($city->city_id == $_GET['to'])
        {{$city->city_name. " (". $city->city_code . ")" }}
        @endif
        @endforeach
    </h2>
    @foreach ($flightlists as $flightlist)
    @endforeach
    <article>
        <div class="panel panel-default">
            <div class="panel-body">
                <div class="row">
                    <div class="col-md-12">
                        <h4><strong><a href="{{ route('flight-detail', ['fl_id'=>$flightlist->fl_id]) }}">{{$flightlist->airline_name}}</a></strong></h4>
                        <div class="row">
                            <div class="col-sm-3">
                                @foreach($citylists as $citylist)
                                @if($citylist->city_id == $flightlist->fl_city_from_id)
                                <label class="control-label">From:</label>
                                <div><big class="time">{{date("H:i", strtotime($flightlist->fl_departure_day)) }}</big></div>
                                <div><span class="place">{{$citylist->city_name}}</span></div>
                                @endif
                                @endforeach
                            </div>
                            <div class="col-sm-3">
                                @foreach($citylists as $citylist)
                                @if($citylist->city_id == $flightlist->fl_city_to_id)
                                <label class="control-label">To:</label>
                                <div><big class="time">{{date("H:i", strtotime($flightlist->fl_return_day))}}</big></div>
                                <div><span class="place">{{$citylist->city_name}}</span></div>
                                @endif
                                @endforeach
                            </div>
                            <div class="col-sm-3">
                                @foreach($transits as $transit)
                                @if($transit->transit_fl_id == $flightlist->fl_id)
                                <label class="control-label">Duration:</label>
                                <div><big class="time">{{ date("H:i", strtotime($flightlist->fl_return_day) - strtotime($flightlist->fl_departure_day) ) }}</big></div>
                                <div><strong class="text-danger">{{$transit->count}} Transit</strong></div>
                                @endif
                                @endforeach
                            </div>
                            <div class="col-sm-3 text-right">
                                <h3 class="price text-danger"><strong>IDR <?php echo $cal ?> </strong></h3>

                                <div>
                                    <a href="{{ route('flight-detail', ['fl_id'=>$flightlist->fl_id]) }}" class="btn btn-link">See Detail</a>
                                    <a href="{{ route('flight-book') }}" id="checkReturn" class="btn btn-primary">Choose</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </article>

    <div class="text-center">
        <ul class="pagination">
            <li><a href="#">&laquo;</a></li>
            <li><a href="#">&lsaquo;</a></li>
            <li class="active"><a href="#">1</a></li>
            <li><a href="#">2</a></li>
            <li><a href="#">3</a></li>
            <li><a href="#">4</a></li>
            <li><a href="#">&rsaquo;</a></li>
            <li><a href="#">&raquo;</a></li>
        </ul>
    </div>
</section>

@endsection