@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-sm-8 col-sm-push-2">
            <h1>My profile</h1>
            <hr>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-8 col-sm-push-2">
            <div class="panel panel-default">
                <div class="panel-heading">Edit my profile</div>
                <div class="panel-body">
                    <form action="{{route('profile-save')}}" method="post">
                        {{csrf_field()}}

                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" name="name" id="name" class="form-control" value="{{old('name', $user->name)}}">
                        </div>

                        <div class="form-group">
                            <label for="email">Email address</label>
                            <input type="text" id="email" class="form-control" value="{{$user->email}}" disabled>
                        </div>

                        <event-location
                            lat="{{$user->lat}}"
                            long="{{$user->long}}"
                            zoom-level="15">
                        </event-location>

                        <div class="form-group">
                            <br>
                            <button class="btn btn-primary">
                                Save <i class="fa fa-upload"></i>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
