@extends('html')

@section('content')
    <div class="row">
        <div class="col-sm-8 col-sm-push-2">
            <h1>
                My profile
                <span class="pull-right"><a href="#" class="btn btn-success">Add Event</a></span>
            </h1>
            <hr>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-8 col-sm-push-2">
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

                <google-map></google-map>

                <button class="btn btn-primary">
                    Save <i class="fa fa-upload"></i>
                </button>

            </form>
        </div>
    </div>
@endsection
