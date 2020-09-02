@extends('layouts.default')

@section('title')
    {{$user->name}}
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">Profile Picture</div>
                @if (empty($user->photo))
                    <img style="width: 100%"src="{{ asset('img/default_photo.png') }}" alt="">
                @else
                    <img style="width: 100%"src="{{ asset('storage/img/profile_photos/'.$user->photo) }}" alt="">
                @endif
                <a href="{{ route('user.edit', ['user'=>$user->id]) }}" class="btn btn-dark">Change your profile photo</a>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">Profile
                    <a href="{{ route('user.edit', ['user'=>$user->id]) }}" class="float-right btn btn-secondary">Edit</a>
                </div>
                <div class="card-body">
                    <div class="list-group">
                        <div class="form-group">
                            <label for="">Name</label>
                            <input disabled type="text" class="form-control" name="name" value="{{ $user->name }}">
                        </div>
                        <div class="form-group">
                            <label for="">Email</label>
                            <input disabled type="text" class="form-control" name="name" value="{{ $user->email }}">
                        </div>
                        <div class="form-group">
                            <label for="">Joint</label>
                            <input disabled type="text" class="form-control" name="name" value="{{ $user->created_at }}">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection