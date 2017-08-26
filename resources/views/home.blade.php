@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-4">
            <tweet-card :init-tweets="{{ json_encode($initTweets) }}"></tweet-card>
        </div>
    </div>

</div>
@endsection
