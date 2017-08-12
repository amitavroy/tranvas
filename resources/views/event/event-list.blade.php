@extends('html')

@section('content')
    <div class="row">
        <div class="col-sm-8 col-sm-push-2">
            <h1>Upcoming events
                <span class="pull-right"><a href="{{route('event-add')}}" class="btn btn-success">Add Event</a></span>
            </h1>

            @foreach($upcomingEvents as $upcomingEvent)
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-heading">
                            <a href="{{route('event-view', $upcomingEvent->slug)}}">
                                #{{$upcomingEvent->id}} {{$upcomingEvent->title}}
                            </a>
                        </h3>
                        <small class="padding-left-10">{{$upcomingEvent->address}}</small>
                    </div>
                    <div class="panel-body">
                        <div class="meta-data margin-bottom-20">
                            <strong>Start date: </strong>{{$upcomingEvent->start_date}}
                            <br>
                            <strong>End date: </strong>{{$upcomingEvent->end_date}}
                            <br>
                            <strong>Created by: </strong><a href="#">{{$upcomingEvent->creator->name}}</a>
                        </div>
                        <div class="description margin-bottom-20">
                            {!! limit_words($upcomingEvent->description, 50) !!}
                        </div>
                        <div class="register-button-container">
                            @if($upcomingEvent->user === null)
                                <button class="btn btn-primary">Register</button>
                            @else
                                <button class="btn btn-warning">De-register</button>
                            @endif
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <div class="row">
        <div class="col-sm-8 col-sm-push-2">
            <h1>Past events</h1>

            @foreach($pastEvents as $pastEvent)
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-heading">
                            <a href="{{route('event-view', $pastEvent->slug)}}">
                                #{{$pastEvent->id}} {{$pastEvent->title}}
                            </a>
                        </h3>
                        <small>{{$pastEvent->address}}</small>
                    </div>
                    <div class="panel-body">
                        <div class="meta-data">
                            <strong>Start date: </strong>{{$pastEvent->start_date}}
                            <br>
                            <strong>End date: </strong>{{$pastEvent->end_date}}
                            <br>
                            <strong>Created by: </strong><a href="#">{{$pastEvent->creator->name}}</a>
                        </div>
                        <div class="description">
                            <p>{!! limit_words($pastEvent->description, 50) !!}</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection