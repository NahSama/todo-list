@extends('layouts.default')

@section('title', 'Home page')

@section('content')
<div class="container">
    <div class="row justify-content-center my-5">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">Dashboard
                <a class="float-right btn btn-secondary" href="{{ route('listing.create')}}">Create Listing</a>
                </div>

                <div class="card-body">
                    {{-- @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif --}}

                    
                    @if (count($listings))
                        <h3>Your Business Listings</h3>
                        <table class="table table-striped">
                            <tr>
                                <th>Company</th>
                                <th></th>
                            </tr>
                            @foreach ($listings as $listing) 
                                <tr>
                                    <td>{{ $listing->name}}</td>                   
                                    <td> 
                                        <form class="float-right ml-2" method="post" action="{{ route('listing.destroy', ['listing'=>$listing->id]) }}">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">Delete</button>
                                        </form>
                                        <a class="btn btn-primary float-right"href="{{ route('listing.edit', ['listing'=>$listing->id]) }}">Edit</a>
                                        <a class="btn btn-info mx-2 float-right" href="{{ route('listing.show', ['listing'=>$listing->id]) }}">View</a>          
                                    </td>
                                </tr>
                            @endforeach 
                        </table>
                    @else
                        <h3>Welcome to our Website</h3>
                    @endif
                </div>
            </div>
        </div>
        <div class="col-md-6 ">

            {{-- @if(session()->has('success'))
                <div class="alert alert-success">
                    {{ session()->get('success') }}
                </div>
            @endif --}}

            <div class="card card-default">
                <div class="card-header">Todos
                    <a class="float-right btn btn-secondary" href="{{ route('Todo_create')}}">Create Todo</a>
                </div>
                <div class="card-body">
                    @if(count($todos))
                        <h3>Your Todos</h3>
                        <ul class="list-group">
                            @foreach( $todos as $todo)
                                <li class = "list-group-item">
                                    <p>{{$todo->name}}</p>
                                    
                                    <div class="float-right">
                                        <a class="btn btn-primary btn-sm mx-1" href="{!! route('Todo_detail',['todoID'=> $todo->id])!!}">View</a>
                                        
                                        @if(!$todo->completed)
                                            <a class="btn btn-success btn-sm " href="{!! route('Todo_complete',['todoID'=> $todo->id])!!}">Complete</a>
                                        @endif
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    @else
                        <h3>Welcome to our Website</h3>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
