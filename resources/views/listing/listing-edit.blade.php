@extends('layouts.default')

@section('title', 'Edit Listing')

@section('content')
<div class="container">
    <div class="row justify-content-center my-5">
        <div class="col-md-8">
            <div class="card">
                <div class="card card-header">Edit Listing
                </div>
                <div class="card card-body">
                    @if (session('status'))
                      <div class="alert alert-success" role="alert">
                          {{ session('status') }}
                      </div>
                    @endif
                    <form method="post" action="{{ route('listing.update', ['listing'=> $listing->id])}}">
                      @csrf
                      @method('PUT')
                      <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" name="name" id="name" placeholder="Enter name" value="{{  $listing->name }}">
                      </div>
                      <div class="form-group">
                        <label for="address">Address</label>
                        <input type="text" class="form-control" name="address" id="address" placeholder="Enter address" value="{{  $listing->address }}">
                      </div>
                      <div class="form-group">
                          <label for="website">Website</label>
                          <input type="text" class="form-control" name="website" id="website" placeholder="Enter website" value="{{  $listing->website }}">
                      </div>
                      <div class="form-group">
                        <label for="email">Email address</label>
                        <input type="email" class="form-control" name="email" id="email" placeholder="Enter email " value="{{  $listing->email }}">
                      </div>
                      <div class="form-group">
                        <label for="phone">Phone</label>
                        <input type="tel" class="form-control" name="phone" id="phone" placeholder="Enter phone number" value="{{  $listing->phone }}">
                      </div>
                      <div class="form-group">
                        <label for="bio">Biography</label>
                        <input type="text" class="form-control" name="bio" id="bio" placeholder="Enter biography" value="{{  $listing->bio }}">
                      </div>

                      <button type="submit" class="btn btn-primary">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection