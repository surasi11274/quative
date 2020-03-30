<?php

namespace App\Http\Controllers;

use App\Designer;
use App\Jobs;
use App\Message;
use App\Notifications\SendMessages;
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
        
        $isdesigner = Auth::user()->designer();
        if(!$isdesigner) {
            // $jobs = Jobs::where('user_id', auth()->id())->get();
            // $jobs = Jobs::where('user_id',auth()->id())->get();

            // $designer = Designer::where('id',$jobs->designer_id)->get();


            // dd($designer);

            $users = DB::select("select users.id, users.name, users.avatar, users.email, users.role,
            designers.id as designerid, designers.profilepic as designerpic,designers.name as designername,designers.surname as designersurname,
            count(is_read) as unread
            from users LEFT  JOIN  messages ON users.id = messages.from and is_read = 0 and messages.to = " . Auth::id() . "
            JOIN designers ON users.id = designers.user_id
            JOIN jobs ON designers.id = jobs.designer_id
            where users.id != " . Auth::id() . " && users.role = 1  && " . Auth::id() . " = jobs.user_id
            group by users.id, users.name, users.avatar, users.email ,users.role ,designers.id,designers.profilepic,designers.name,designers.surname
            order by messages.created_at DESC
            "); 
        }
        else if($isdesigner) {
            // $jobs = Jobs::where('designer_id', Auth::user()->designer()->id)->get();

            // dd($jobs);
            // exit();

                $users = DB::select("select users.id, users.name, users.avatar, users.email,users.role, count(is_read) as unread
                from users LEFT  JOIN  messages ON users.id = messages.from and is_read = 0 and messages.to = " . Auth::id() . "
                JOIN jobs ON users.id = jobs.user_id
                where users.id != " . Auth::id() . " && users.role = 0  && jobs.jobstatus_id > 1 && " . Auth::user()->designer()->id . " = jobs.designer_id
                group by users.id, users.name, users.avatar, users.email,users.role
                order by messages.created_at desc
                ");
            
           
        }
        // $users = DB::select("select users.id, users.name, users.avatar, users.email, count(is_read) as unread
        // from users LEFT  JOIN  messages ON users.id = messages.from and is_read = 0 and messages.to = " . Auth::id() . "
        // where users.id != " . Auth::id() . "
        // group by users.id, users.name, users.avatar, users.email");
           

   
        return view('message.message',[
            'users'=>$users,
            // 'jobs'=>$jobs->first(),
            // 'messages'=>$messages
        ]);
    }


    public function getMessage($user_id) {
        $my_id = Auth::id();
        //when click to see message selected user's message will be read, update
        Message::where(['from' =>  $user_id, 'to' => $my_id])->update(['is_read' => 1]);

        $isnotdesigner = Designer::where('user_id',$user_id)->get();
        $isdesigner = User::where('id',$user_id)->get();
        //getting all message for selected user
        //getting those message which is from = Auth::id() and to = user_id and from = user_id and to = Auth::id();
        $messages = Message::where(function ($query) use ($user_id ,$my_id) {
            $query->where('from',$user_id)->where('to',$my_id);
        })->orWhere(function($query) use ($user_id ,$my_id) {
            $query->where('from',$my_id)->where('to',$user_id);
        })->get();

     
        return view('message.messagedetail', ['messages'=>$messages,'isnotdesigner'=>$isnotdesigner->first(),'isdesigner'=>$isdesigner->first()]);
    }
    public function sendMessage(Request $request,Message $data) {
        $from = Auth::id();
        $to = $request->receiver_id;
        $message = $request->message;
        $filemessage = $request->filemessage;


        $data = new Message();
        $data->from = $from;
        $data->to = $to;
        $data->message = $message;
        $data->is_read = 0; //message will be unread when sending message
        $data->save();

        auth()->user()->find($data->to)->notify(New SendMessages($data));

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

    public function jobMessage($token) {
        $jobs = Jobs::where('token',$token)->get();
        $designer = Designer::where('id',$jobs->first()->designer_id)->get();
        $jobuser = auth()->user()->where('id',$jobs->first()->user_id)->get();

     

        //select all user except logged in user
       // $users = User::where('id','!=',Auth::id())->get();


        //count how many message are unread from the selected user
        $isdesigner = Auth::user()->designer();
        if(!$isdesigner) {
            // $jobs = Jobs::where('user_id', auth()->id())->get();

            $users = DB::select("select users.id, users.name, users.avatar, users.email, users.role,
            designers.id as designerid, designers.profilepic as designerpic,designers.name as designername,designers.surname as designersurname,
            count(is_read) as unread
            from users LEFT  JOIN  messages ON users.id = messages.from and is_read = 0 and messages.to = " . Auth::id() . "
            JOIN designers ON users.id = designers.user_id
            where users.id != " . Auth::id() . " && users.role = 1  && users.id = " . $designer->first()->user_id . "
            group by users.id, users.name, users.avatar, users.email ,users.role ,designers.id,designers.profilepic,designers.name,designers.surname
            order by messages.created_at DESC
            "); 
        }
        else if($isdesigner) {
            $users = DB::select("select users.id, users.name, users.avatar, users.email,users.role, count(is_read) as unread
            from users LEFT  JOIN  messages ON users.id = messages.from and is_read = 0 and messages.to = " . Auth::id() . "
            where users.id != " . Auth::id() . " && users.role = 0 && users.id = " . $jobuser->first()->id . "
            group by users.id, users.name, users.avatar, users.email,users.role
            order by messages.created_at desc
            ");
        }
        // $users = DB::select("select users.id, users.name, users.avatar, users.email, count(is_read) as unread
        // from users LEFT  JOIN  messages ON users.id = messages.from and is_read = 0 and messages.to = " . Auth::id() . "
        // where users.id != " . Auth::id() . "
        // group by users.id, users.name, users.avatar, users.email");
           
   
        return view('jobs.messages',[
            'users'=>$users,
            'jobs'=>$jobs->first()
            // 'messages'=>$messages
        ]);
    }


    public function jobGetMessage($token,$user_id) {
        $jobs = Jobs::where('token',$token)->get();

        $my_id = Auth::id();
        //when click to see message selected user's message will be read, update
        Message::where(['from' =>  $user_id, 'to' => $my_id])->update(['is_read' => 1]);

        $isnotdesigner = Designer::where('user_id',$user_id)->get();
        $isdesigner = User::where('id',$user_id)->get();
        //getting all message for selected user
        //getting those message which is from = Auth::id() and to = user_id and from = user_id and to = Auth::id();
        $messages = Message::where(function ($query) use ($user_id ,$my_id) {
            $query->where('from',$user_id)->where('to',$my_id);
        })->orWhere(function($query) use ($user_id ,$my_id) {
            $query->where('from',$my_id)->where('to',$user_id);
        })->get();

        return view('jobs.messagedetail', ['messages'=>$messages,'jobs'=>$jobs->first(),'isnotdesigner'=>$isnotdesigner->first(),'isdesigner'=>$isdesigner->first()]);
    }
    public function jobSendMessage(Request $request, Message $data) {
        $from = Auth::id();
        $to = $request->receiver_id;
        $message = $request->message;

        $data = new Message();
        $data->from = $from;
        $data->to = $to;
        $data->message = $message;
        $data->is_read = 0; //message will be unread when sending message
        $data->save();

        auth()->user()->find($data->to)->notify(New SendMessages($data));

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
