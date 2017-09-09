@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-4 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    You are logged in!
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Clock  <span><i class="fa fa-clock-o"></i></span>
                </div>

                <div class="panel-body">
                    <clock></clock>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
