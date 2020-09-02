@extends('layouts.default')

@section('title', 'Edit a Todo')

@section('content')
<div class="container">
    <h3 class="text-center my-5">Edit a Todo</h1>
    
    <div class="row justify-content-center">
        <div class="col-md-8">

            {{-- @if(session()->has('success'))
                <div class="alert alert-success">
                    {{ session()->get('success') }}
                </div>
            @endif --}}

            {{-- @if ($errors ->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif --}}

            <div class="card card-default">
                <div class="card card-body">
                    <form action="{{ route('Todo_update') }}" method="POST">
                        @csrf
                        <input type="hidden" name="id" value="{{ $todo->id }}">
                        <div class="form-group">
                            <label for="">Name</label>
                        <input name="name" type="text" class="form-control"  placeholder="Name" value="{{ $todo->name }}">
                        </div>
                        <div class="form-group">
                            <label for="">Description</label>
                            <textarea name="description" id="" placeholder="Description" cols="30" rows="5" class="form-control">{{ $todo->description }}</textarea>
                        </div>
                        <div class="form-group text-right">
                            <button type="submit" class="btn btn-success" >Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection