@extends('layouts.default')

@section('title', 'Create a new Todo')

@section('content')
<div class="container">
    <h3 class="text-center my-5">Create a new Todo</h1>
    
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
                    <form action="{!! route('Todo_store') !!}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="">Name</label>
                            <input name="name" type="text" class="form-control"  placeholder="Name">
                        </div>
                        <div class="form-group">
                            <label for="">Description</label>
                            <textarea name="description" id="" placeholder="Description" cols="30" rows="5" class="form-control"></textarea>
                        </div>
                        <div class="form-group text-right">
                            <button type="submit" class="btn btn-success" >Create</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection