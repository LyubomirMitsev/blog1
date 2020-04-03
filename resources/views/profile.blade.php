@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10 col-md-offset-1">
            <img src="/uploads/avatars/{{ $user->avatar }}" class="profile_image">
            <h2>{{ $user->name }}</h2>
        </div>
    </div>
</div>
@endsection