@extends('html')

@section('content')
    <div class="row">
        <div class="col-sm-8 col-sm-push-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-heading">{{$event->title}}</h3>
                </div>
                <div class="panel-body">
                    <p><strong>Description:</strong></p>
                    {{$event->description}}
                </div>

                <div id="map"></div>

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

@section('footer-script')
    <script>
      function initMap() {
        var uluru = {lat: {{$event->lat}}, lng: {{$event->long}} };
        var map = new google.maps.Map(document.getElementById('map'), {
          zoom: 4,
          center: uluru
        });
        var marker = new google.maps.Marker({
          position: uluru,
          map: map
        });
      }
    </script>
    <script async defer
            src="https://maps.googleapis.com/maps/api/js?key={{env('GOOGLE_MAP_API_KEY')}}&callback=initMap">
    </script>
@endsection

@section('header-styles')
    <style>
        #map {
            height: 400px;
            width: 100%;
        }
    </style>
@endsection