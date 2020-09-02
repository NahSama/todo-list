@extends('layouts.default')

@section('title', 'Home page')

@section('content')
<link rel="stylesheet" href="{{ asset('css/index.css') }}">
<div class="container">
    <div class="row justify-content-center my-5">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">Dashboard
                <a class="float-right btn btn-secondary" href="{{ route('listing.create')}}">Create Listing</a>
                </div>
                <div class="card-body">
                    <div class="content">
                        <div class="content__container">
                          <p class="content__container__text">
                            This is
                          </p>
                          <ul class="content__container__list">
                            <li class="content__container__list__item">Company 1</li>
                            <li class="content__container__list__item">Company 2</li>
                            <li class="content__container__list__item">Company 3</li>
                            <li class="content__container__list__item">Company 4</li>
                          </ul>
                        </div>
                    </div>
                    <h3 style="color: transparent">Welcome to our Website</h3>
                </div>
            </div>
        </div>
        <div class="col-md-6 ">
            <div class="card">
                <div class="card-header">Todos
                    <a class="float-right btn btn-secondary" href="{{ route('Todo_create')}}">Create Todo</a>
                </div>
                <div class="card-body">
                    <div class="content">
                        <div class="content__container">
                          <p class="content__container__text">
                            This is
                          </p>
                          <ul class="content__container__list">
                            <li class="content__container__list__item">Todo 1</li>
                            <li class="content__container__list__item">Todo 2</li>
                            <li class="content__container__list__item">Todo 3</li>
                            <li class="content__container__list__item">Todo 4</li>
                          </ul>
                        </div>
                    </div>
                    <h3 style="color: transparent">Welcome to our Website</h3>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
