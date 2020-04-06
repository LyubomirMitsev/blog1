@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10 col-md-offset-1">
            <img src="/uploads/avatars/{{ $user->avatar }}" id="profile_image">
            <h2>{{ $user->name }}</h2>
            <form enctype="multipart/form-data" action="{{ route('profile.avatar') }}" method="POST">
                @csrf
                <label>Update profile image</label>
                <input type="file" name="avatar" />
                <input type="submit" class="button btn-primary" />
            </form>
        </div>
    </div>
</div>
@endsection