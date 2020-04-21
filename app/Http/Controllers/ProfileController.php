<?php

namespace App\Http\Controllers;

use App\Jobs;
use App\Profile;
use App\Tags;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    //
    public function create()
    {
        //
        $profile = Auth::user()->profile();
        if ($profile){ // เคยสร้างโปรไฟล์ไปแล้ว เด้งไปหน้าแก้ไข
            return redirect(route('profile.show',['token'=>$profile->token]));
        }
        return view('auth.profile.profile',[
            ]);
    }
    public function store(Request $request)
    {
        // $filenameWithExt = $request->file('profilepic')->getClientOriginalName();
      

        //get file name

        // $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);

        // $extension = $request->file('profilepic')->getClientOriginalExtension();
      

        //create new file name
//        $filenameTostore = $filename.'_'.time().'.'.$extension;

        // $filenameTostore = date('YmdHis').'_'.$filename.'.'.$extension;

           //upload img
        // $request->file('profilepic')->move('uploads/profilepic',$filenameTostore);
        // $request->file('selfieID')->move('uploads/selfieID',$filenameTostore);
        // $request->file('pictureIDCard')->move('uploads/pictureIDCard',$filenameTostore);

        $profiles = Profile::create([
            'phonenumber'=>$request->input('phonenumber'),
            'titleName'=>$request->input('titleName'),
            'name'=>$request->input('name'),
            'surname'=>$request->input('surname'),
            'birthdate'=>$request->input('birthdate'),
           
            // 'profilepic'=>$request->file('profilepic')->move('uploads/profilepic',$filenameTostore),

        
            // 'hasjob'=>'0',
            // 'rating'=>'0',
            'user_id'=>Auth::user()->id,
            'token'=> str_random(16)


        ]);
        if($request->hasfile('profilepic')){
            $filenameWithExt = $request->file('profilepic')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('profilepic')->getClientOriginalExtension();
            $filenameTostore = date('YmdHis').'_'.$filename.'.'.$extension;

            $profiles->profilepic = $request->file('profilepic')->move('uploads/profilepic',$filenameTostore);

        }      
        
        
      

      
        try{
            // สำเร็จแล้ว
            // $designer->save();
            // เด้งไปหน้าโชว์ของใครของมันเลย
            return redirect(route('profile.show',['token'=>$profiles->token]));
        }catch (\Exception $x){
            return back()->withInput();
        }
    }
    public function show($token)
    {
        //

        $profiles = Profile::where('token',$token)->get();
        $users = Auth::user()->profile();
        $jobs = Jobs::where('user_id', Auth::user()->id)->where('jobstatus_id',9)->get();

        $works = Jobs::where('user_id', Auth::user()->id)->get();

        if ($profiles->count() == 0){
            return "หาไม่เจอ ทำอะไรดี";
        }
        return view('auth.profile.show',[
            'profiles'=>$profiles->first(),
            'jobs'=>$jobs,
            'works'=>$works,

            ]);

    }
    public function edit($token)
    {
        //

        $profiles = Profile::where('token',$token)->get();

        return view('auth.profile.edit',[
            'profiles'=>$profiles->first(),

        ]);
    }
    public function update(Request $request,$token)
    {
        $profile = Profile::where('token',$token)->first();
        $profile->phonenumber = $request->input('phonenumber');
        $profile->titleName = $request->input('titleName');
        $profile->name = $request->input('name');
        $profile->surname = $request->input('surname');
        $profile->birthdate = $request->input('birthdate');
           
        if($request->hasfile('profilepic')){
            $filenameWithExt = $request->file('profilepic')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('profilepic')->getClientOriginalExtension();
            $filenameTostore = date('YmdHis').'_'.$filename.'.'.$extension;

            $profile->profilepic = $request->file('profilepic')->move('uploads/profilepic',$filenameTostore);

        }        
        $profile->save();

            // 'hasjob'=>'0',
            // 'rating'=>'0',


        return redirect(route('profile.show',['token'=>$profile->token]));

        
    }
}
