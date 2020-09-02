<?php

namespace App\Http\Controllers;

use App\Todo;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){

    }

    // public function showTodoList(){

    //     $todos = Todo::all();
          
    //     return view('todo.todo')->with(['todos' => $todos]);
    // }

    public function showTodo($todoId) {

        return view('todo.todo-detail')->with(['todo' =>Todo::find($todoId)]);
    }

    public function createTodo() {

        return view('todo.todo-create');
    }

    public function storeTodo(Request $request) {

        $this->validate($request, [
            'name' => 'required|min:5|max:20',
            'description' => 'required',
        ]);

        $data = $request->all();
       
        $todo = new Todo();

        $todo->user_id = Auth::id();

        $todo->name =  $data['name'];  

        $todo->description = $data['description'];
        $todo->completed = false;
        $todo->save();

        session()->flash('success', 'Todo created successfully');
        
        return view('todo.todo-create');
    }

    public function editTodo($todoId) {

        $todo = Todo::find($todoId);

        return view('todo.todo-edit')->with(['todo' =>Todo::find($todoId)]);
    }

    public function updateTodo(Request $request)  {
        
        $this->validate($request, [
            'name' => 'required|min:5|max:20',
            'description' => 'required',
        ]);

        $data = $request->all();

        $todo = Todo::find($data['id']);
        $todo->name =  $data['name'];       
        $todo->description = $data['description'];
        $todo->save();

        session()->flash('success', 'Todo updated successfully');

        return view('todo.todo-detail')->with(['todo' => $todo]);      
    }

    public function deleteTodo($todoId) {

        $todo = Todo::find($todoId);

        $todo->delete();

        session()->flash('success', 'Todo deleted');

        return redirect()->route('home');
    }

    public function completeTodo($todoId) {

        $todo = Todo::find($todoId);

        $todo->completed = true;

        $todo->save();

        session()->flash('success', 'Good Job');

        return redirect()->route('home');
    }
}
