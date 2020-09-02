@extends('layouts.default')

@section('title', 'Admin Page')

@section('content')
<div class="container">
    <div class="row">
        <div class="card">
            <div class="card-header"><strong>User Table</strong></div>
            <div class="card-body">
                <table class="table table-striped">
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Created_at</th>
                        <th>Profile Picture</th>
                        <th>Role</th>
                    </tr>
                    @foreach ($users as $user)
                    <tr>
                        <td>{{$user->name}}</td>
                        <td>{{$user->email}}</td>
                        <td>{{$user->created_at}}</td>
                        <td>
                            @if (!empty($user->photo))
                                <img style="height: 30px; width: 35px; margin-right: 10px "src="{{ asset('storage/img/profile_photos/'.$user->photo) }}" class="float-left rounded-circle">
                            @else
                                <span>None</span>
                            @endif
                        </td>
                        <td>
                            @if($user->level == 0)
                            <span>User</span>
                            @elseif ($user->level ==1)
                            <span>Admin</span>
                            @endif
                        </td>
                    </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
</div>

@endsection