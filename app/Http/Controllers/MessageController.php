<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Message;
use App\User;

use Illuminate\Support\Collection;
use Illuminate\Pagination\Paginator;
use Illuminate\Pagination\LengthAwarePaginator;

class MessageController extends Controller
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
        $messagesGet = Auth::user()->messagesGet->sortByDesc('created_at')->paginate(5);
        $messagesSend = Auth::user()->messagesSend->sortByDesc('created_at')->paginate(5);

        return view('message.index')->with(['messagesGet'=>$messagesGet, 'messagesSend'=>$messagesSend]);
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
        $this->validate($request, [
            'email' => 'required|email',
            'subject' => 'required',
            'body' => 'required',
        ]);

        $userTo  = User::where([
            ['email', $request->input('email')],
            ['email', '!=', Auth::user()->email],
        ])->first();
 

        if(!$userTo){
            return redirect()->route('message.index')->with(['danger'=> 'Invalid email!!!']);
        }

        $message = new Message();
        $message->user_id_from = Auth::user()->id;
        $message->user_id_to = $userTo->id;
        $message->subject = $request->input('subject');
        $message->body = $request->input('body');
        $message->read = false;
        $message->deleted = false;
        $message->save();
        
        return redirect()->route('message.index')->with(['success'=>'Message sent successfully!']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $auth = false;
        $message = Message::find($id);
        if($message->user_id_from == Auth::id()){
            $auth = true;
        }

        if($message->user_id_to == Auth::id()){
            $message->read = true;
            $message->save();
            $auth = true;
        }
        
        if($auth == false){
            return redirect()->route('message.index')->with(['danger'=>'You are not allowed to access this link!']);
        }
        
        return view('message.message-detail')->with(['message'=>$message]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $message = Message::find($id);
        $message->deleted = true;

        return redirect()->route('message.index')->with(['success'=>'Delete message successfully!']);
    }
}
