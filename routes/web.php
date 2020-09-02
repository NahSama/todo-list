<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function() {
    return view('index');
})->name('index');

// Route::get('todo', ['as' => 'Todo_list', 'uses' => 'TodoController@showTodoList']);

Route::get('todo/{todoID}', ['as' => 'Todo_detail', 'uses' => 'TodoController@showTodo']);

Route::get('todo_create', ['as' => 'Todo_create', 'uses' => 'TodoController@createTodo']);

Route::post('todo_create', ['as' => 'Todo_store', 'uses' => 'TodoController@storeTodo']);

Route::get('todo/{todoID}/todo_edit', ['as' => 'Todo_edit', 'uses' => 'TodoController@editTodo']);

Route::post('todo/todo_update', ['as' => 'Todo_update', 'uses' => 'TodoController@updateTodo']);

Route::get('todo/{todoID}/todo_delete', ['as' => 'Todo_delete', 'uses' => 'TodoController@deleteTodo']);

Route::get('todo/{todoID}/todo_complete', ['as' => 'Todo_complete', 'uses' => 'TodoController@completeTodo']);

Auth::routes(['verify' => true]);

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('listing', 'ListingController');

Route::resource('message', 'MessageController');

Route::put('user/{user}/photo', 'UserController@photo')->name('user.photo');

Route::resource('user', 'UserController');

Route::resource('admin', 'AdminController');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
