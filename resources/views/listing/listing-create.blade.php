@extends('layouts.default')

@section('title', 'Create Listing')

@section('content')
<div class="container">
    <div class="row justify-content-center my-5">
        <div class="col-md-8">
            <div class="card">
                <div class="card card-header">Create Listing
                </div>
                <div class="card card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    
                    <form method="post" action="/todo/public/listing">
                        @csrf
                        <div class="form-group">
                          <label for="name">Name</label>
                          <input type="text" class="form-control" name="name" id="name" placeholder="Enter name">
                        </div>
                        <div class="form-group">
                          <label for="address">Address</label>
                          <input type="text" class="form-control" name="address" id="address" placeholder="Enter address ">
                        </div>
                        <div class="form-group">
                            <label for="website">Website</label>
                            <input type="text" class="form-control" name="website" id="website" placeholder="Enter website">
                        </div>
                        <div class="form-group">
                          <label for="email">Email address</label>
                          <input type="email" class="form-control" name="email" id="email" placeholder="Enter email ">
                        </div>
                        <div class="form-group">
                          <label for="phone">Phone</label>
                          <input type="tel" class="form-control" name="phone" id="phone" placeholder="Enter phone number ">
                        </div>
                        <div class="form-group">
                          <label for="bio">Biography</label>
                          <input type="text" class="form-control" name="bio" id="bio" placeholder="Enter biography">
                        </div>

                        <button type="submit" class="btn btn-primary">Submit</button>
                      </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection