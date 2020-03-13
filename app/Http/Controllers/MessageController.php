<?php

namespace App\Http\Controllers;

use App\Message;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Pusher\Pusher;

class MessageController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function message() {
        //select all user except logged in user
       // $users = User::where('id','!=',Auth::id())->get();

        //count how many message are unread from the selected user
        $users = DB::select("select users.id, users.name, users.avatar, users.email, count(is_read) as unread
        from users LEFT  JOIN  messages ON users.id = messages.from and is_read = 0 and messages.to = " . Auth::id() . "
        where users.id != " . Auth::id() . "
        group by users.id, users.name, users.avatar, users.email");

        return view('message.message',['users'=>$users]);
    }


    public function getMessage($user_id) {
        $my_id = Auth::id();
        //when click to see message selected user's message will be read, update
        Message::where(['from' =>  $user_id, 'to' => $my_id])->update(['is_read' => 1]);

        //getting all message for selected user
        //getting those message which is from = Auth::id() and to = user_id and from = user_id and to = Auth::id();
        $messages = Message::where(function ($query) use ($user_id ,$my_id) {
            $query->where('from',$user_id)->where('to',$my_id);
        })->orWhere(function($query) use ($user_id ,$my_id) {
            $query->where('from',$my_id)->where('to',$user_id);
        })->get();

        return view('message.messagedetail', ['messages'=>$messages]);
    }
    public function sendMessage(Request $request) {
        $from = Auth::id();
        $to = $request->receiver_id;
        $message = $request->message;

        $data = new Message();
        $data->from = $from;
        $data->to = $to;
        $data->message = $message;
        $data->is_read = 0; //message will be unread when sending message
        $data->save();

         // pusher
         $options = array(
            'cluster' => 'ap1',
            'useTLS' => true
        );

        $pusher = new Pusher(
            env('PUSHER_APP_KEY'),
            env('PUSHER_APP_SECRET'),
            env('PUSHER_APP_ID'),
            $options
        );

        $data = ['from' => $from, 'to' => $to]; // sending from and to user id when pressed enter
        $pusher->trigger('my-channel', 'my-event', $data);
    }

}
