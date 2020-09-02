@extends('layouts.default')

@section('title', 'Todo-list page')

@section('content')

<h1 class="text-center my-5">TODOS page</h1>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6 ">

            {{-- @if(session()->has('success'))
                <div class="alert alert-success">
                    {{ session()->get('success') }}
                </div>
            @endif --}}

            <div class="card card-default">
                <div class="card-header">
                    Todos
                </div>
                <div class="card-body">
                    <ul class="list-group">
                        @foreach( $todos as $todo)
                        <li class = "list-group-item">
                            <p>{{$todo->description}}</p>
                            
                            <div class="float-right">
                                <a class="btn btn-primary btn-sm mx-1" href="{!! route('Todo_detail',['todoID'=> $todo->id])!!}">View</a>
                                
                                @if(!$todo->completed)
                                    <a class="btn btn-success btn-sm " href="{!! route('Todo_complete',['todoID'=> $todo->id])!!}">Complete</a>
                                @endif
                            </div>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection