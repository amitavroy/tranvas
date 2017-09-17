@extends('html')

@section('content')
    <div class="row">
        <div class="col-md-7 col-sm-12">
            <h1>Upcoming events
                <span class="pull-right"><a href="{{route('event-add')}}" class="btn btn-primary">Add Event</a></span>
            </h1>

            <hr>

            @foreach($upcomingEvents as $upcomingEvent)
                <div class="panel panel-default event-panel">
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
                                <event-registration text="Register"
                                                    mode="btn-primary"
                                                    event-id="{{$upcomingEvent->id}}"></event-registration>
                            @else
                                <event-registration text="De-register"
                                                    mode="btn-warning"
                                                    event-id="{{$upcomingEvent->id}}"></event-registration>
                            @endif
                        </div>
                    </div>
                </div>
            @endforeach

            <h1>Past events</h1>

            @foreach($pastEvents as $pastEvent)
                <div class="panel panel-default event-panel">
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

        <div class="col-md-4 col-md-push-1 col-sm-12">
            <h3>Events near me</h3>

            @if($eventsNearBy != null)
                <div class="list-group">
                    @foreach($eventsNearBy as $event)
                        <a href="{{route('event-view', $event->slug)}}" class="list-group-item">
                            <h4 class="list-group-item-heading">{{$event->title}}</h4>
                            <p class="list-group-item-text">
                                <strong>Address:</strong> {{$event->address}}
                                <br>
                                <strong>Start date:</strong> {{$event->start_date}}
                                <br>
                                <strong>End date:</strong> {{$event->end_date}}
                                <br>
                                <strong>Distance from home:</strong> {{round($event->distance, 2)}}
                            </p>
                        </a>
                    @endforeach
                </div>
            @endif
        </div>
    </div>
@endsection