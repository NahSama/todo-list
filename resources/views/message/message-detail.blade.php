@extends('layouts.default')

@section('title', 'Message')

@section('content')
<div class="container">
    <div class="row justify-content-center my-5">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><strong>{{ $message->subject }}</strong>
                </div>
                <div class="card-body">  
                    <span>From: <strong>{{ $message->userSend->name }}</strong> 
                    <span aria-hidden="true"><</span>{{ $message->userSend->email }}<span aria-hidden="true">></span>
                    </span>
                    <small class="float-right">{{ $message->created_at }}</small><br><br>
                    {{ $message->body }}
                </div>
            </div>
        </div>
        {{-- <div class="col-md-6 ">
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
        </div> --}}
        <div class="col-md-4">
            <div class="card">
                <div class="card card-header">Reply Message
                </div>
                <div class="card card-body">
                    <form method="post" action="{{ route('message.store') }}">
                        @csrf
                        <input type="hidden" class="form-control" name="email" id="email" placeholder="Enter email" value="{{ $message->userSend->email }}">
                        <div class="form-group">
                          <label for="subject">Subject</label>
                          <input type="text" class="form-control" name="subject" id="subject" placeholder="Enter subject" value="Re: {{ $message->subject }}">
                        </div>
                        <div class="form-group">
                            <textarea type="text" class="form-control" name="body" id="body" placeholder="Enter body" rows="4"></textarea>
                          </div>
                        <button type="submit" class="btn btn-primary float-right">Sent</button>
                      </form>
                </div>
            </div>
        </div>
    </div>
    </div>
</div>
@endsection

