<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct() {
        
        $this->middleware('auth');

    }

    
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);

        return view('user.index')->with(['user'=>$user]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = Auth::user();

        if($user->id != $id){
            return redirect()->route('user.show', ['user'=> $user->id])->with(['danger'=>'You are not allowed to access this link!']);
        }

        return view('user.user-edit')->with(['user'=>$user]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user = Auth::user();
        
        if($user->id != $id){
            return redirect()->route('home')->with(['danger'=>'You are not allowed to access this link!']);
        }

        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->save();

        return redirect()->route('user.show', ['user'=>$user->id])->with(['success'=>'Your profile updated successfully!']);
    }

    public function photo(Request $request, $id)
    {
        $this->validate($request, [
            'photo' => 'required|image']
        );

        $user = Auth::user();
        
        if($user->id != $id){
            return redirect()->route('home')->with(['danger'=>'You are not allowed to access this link!']);
        }

        $filenameWithExtension = $request->file('photo')->getClientOriginalName(); 
        
        $filename = pathinfo($filenameWithExtension, PATHINFO_FILENAME); //Get file name only

        $extension = $request->file('photo')->getClientOriginalExtension(); //Get extension only

        $filenameToStore = $filename.'_'.time().'.'.$extension; //Generate filename with timestamp  

        $request->file('photo')->storeAs('public/img/profile_photos', $filenameToStore); //Store file into folder public

        $user->photo = $filenameToStore;
        $user->save();

        return redirect()->route('user.show', ['user'=> $user->id])->with(['success'=>'You has changed your photo successfully!']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
