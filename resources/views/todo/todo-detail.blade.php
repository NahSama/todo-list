@extends('layouts.default')

@section('title', 'Todo-detail page')

@section('content')


<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6 ">
            <h1 class="text-center my-5">{{$todo->name}}</h1>
            <div class="card card-default">
                <div class="card-header">
                    Details
                </div>
                <input hidden type="text" value="{{$todo->id}}">
                <div class="card-body">
                    {{$todo->description}}
                </div>
            </div>
            <a href="{!! route('Todo_edit', ['todoID' => $todo->id]) !!}" class="btn btn-info">Edit</a>
            <a href="{!! route('Todo_delete', ['todoID' => $todo->id]) !!}" class="btn btn-danger">Delete</a>
        </div>
    </div>
</div>
@endsection