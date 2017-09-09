@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-sm-8 col-sm-push-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-heading">{{$event->title}}</h3>
                </div>
                <div class="panel-body content">
                    <p><strong>Description:</strong></p>
                    {!! $event->description !!}
                </div>

                <div id="map"></div>
                <gmap-map
                    :center="{{ json_encode([ 'lat' => $event->lat, 'lng' => $event->long ]) }}"
                    :zoom="6"
                    style="width: 100%; height: 300px">
                </gmap-map>

                <table class="table table-bordered table-hover table-striped">
                    <tbody>
                    <tr>
                        <td><strong>Start date:</strong></td>
                        <td>{{$event->start_date}}</td>
                    </tr>
                    <tr>
                        <td><strong>End date:</strong></td>
                        <td>{{$event->end_date}}</td>
                    </tr>
                    <tr>
                        <td><strong>Address:</strong></td>
                        <td>{{$event->address}}</td>
                    </tr>
                    <tr>
                        <td><strong>Created by:</strong></td>
                        <td><a href="#">{{$event->creator->name}}</a></td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
