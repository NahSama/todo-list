@extends('layouts.default')

@section('title', 'Listing detail')

@section('content')
<div class="container">
    <div class="row justify-content-center my-5">
        <div class="col-md-8">
            <div class="card">
                <div class="card card-header">Listing Detail
                </div>
                <div class="card card-body">
                    <div class="list-group">
                        <div class="list-group-item">
                            Name: {{ $listing->name}}
                        </div>
                        <div class="list-group-item">
                            Address: {{ $listing->address}}
                        </div>
                        <div class="list-group-item">
                            Website: <a href="{{ $listing->website}}">{{ $listing->website}}</a>
                        </div>
                        <div class="list-group-item">
                            Email: <a href="mailto:{{ $listing->email}}">{{ $listing->email}}</a>
                        </div>
                        <div class="list-group-item">
                            Phone: {{ $listing->hone}}
                        </div>
                        <div class="list-group-item">
                            Bio: {{ $listing->bio}}
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

@endsection