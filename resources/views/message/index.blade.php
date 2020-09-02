@extends('layouts.default')

@section('title', 'Inbox')

@section('content')
<div class="container">
    <div class="row justify-content-center my-5">
        <div class="col-md-8">
            <div class="card card-inbox" >
                <div class="card-header">Inbox
                    <button class="btn btn-secondary float-right" id="sent">Sent</button>
                </div>
                <div id ="get">
                    @if (count($messagesGet))
                        <table class="table ">
                            <tr class="thead-light">
                                <th class="w-25">From</th>
                                <th class="w-25">Subject</th>
                                <th class="w-25"></th>
                            </tr>
                            @foreach ($messagesGet as $message)
                                <tr class="{{ ($message->read)?"":"table-active"}}">
                                    <td>{{ $message->userSend->name }}</td>        
                                    <td>{{ $message->subject}}</td>           
                                    <td> 
                                        {{-- <form class="float-right ml-2" method="post" action="{{ route('listing.destroy', ['listing'=>$listing->id]) }}">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">Delete</button>
                                        </form> --}}
                                        {{-- <a class="btn btn-primary float-right"href="{{ route('listing.edit', ['listing'=>$listing->id]) }}">Edit</a> --}}
                                        {{-- <a class="btn btn-info mx-2 float-right" href="{{ route('listing.show', ['listing'=>$listing->id]) }}">View</a>           --}}
                                        <form class="float-right ml-2" method="post" action="{{ route('message.destroy', ['message'=>$message->id]) }}">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">Delete</button>
                                        </form>
                                        <a class="btn btn-info mx-2 float-right" href="{{ route('message.show', ['message'=>$message->id]) }}">Read</a>          
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                        {{ $messagesGet->links() }} 
                    @else
                    <div class="card card-body">
                        <h3>You don't get any messages</h3>
                    </div>
                    @endif
                </div>
            </div>
            <div class="card card-sent" style="display:none">
                <div class="card-header">Sent
                    <button class="btn btn-secondary float-right" id="inbox">Inbox</button>
                </div>
                <div id ="send">
                    @if (count($messagesSend))
                        <table class="table ">
                            <tr class="thead-light">
                                <th class="w-25">To</th>
                                <th class="w-25">Subject</th>
                                <th class="w-25"></th>
                            </tr>
                            @foreach ($messagesSend as $message) 
                                <tr class="{{ ($message->read)?"":"table-active"}}">
                                    <td>{{ $message->userGet->name }}</td>        
                                    <td>{{ $message->subject}}</td>           
                                    <td> 
                                        <form class="float-right ml-2" method="post" action="{{ route('message.destroy', ['message'=>$message->id]) }}">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">Delete</button>
                                        </form>
                                        <a class="btn btn-info mx-2 float-right" href="{{ route('message.show', ['message'=>$message->id]) }}">Read</a>          
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                        {{ $messagesSend->links() }} 
                    @else
                    <div class="card card-body">
                        <h3>You haven't sent any messages</h3>
                    </div>
                    @endif
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
                <div class="card card-header">Send Message
                </div>
                <div class="card card-body">
                    <form method="post" action="{{ route('message.store') }}">
                        @csrf
                        <div class="form-group">
                          <label for="email">Email address</label>
                          <input type="email" class="form-control" name="email" id="email" placeholder="Enter email">
                        </div>
                        <div class="form-group">
                          <label for="subject">Subject</label>
                          <input type="text" class="form-control" name="subject" id="subject" placeholder="Enter subject">
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

@section('script')
<script type="text/javascript">
    $(function(){
        $('#sent').on('click', function(e){
            $('.card-inbox').css('display', 'none');
            $('.card-sent').css('display', '');
            e.preventDefault();
        });
    });
    $(function(){
        $('#inbox').on('click', function(e){
            $('.card-inbox').css('display', '');
            $('.card-sent').css('display', 'none');
            e.preventDefault();
        });
    });
    console.log("alo");
</script>
@endsection