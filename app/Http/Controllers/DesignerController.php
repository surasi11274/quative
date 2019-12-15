<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Designer;
use App\Tags;
use App\User;


use DB;


class DesignerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //        return view('auth.registerDesigner');
        

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $designer = Auth::user()->designer();
        if ($designer){ // เคยสร้างโปรไฟล์ไปแล้ว เด้งไปหน้าแก้ไข
            return redirect(route('designer.edit'));
        }
        $tags = Tags::all();
        return view('designer.designer',[
            'tags'=>$tags
            ]);
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
        $designer = Auth::user()->designer();
        if ($designer){ // เคยสร้างโปรไฟล์ไปแล้ว เด้งไปหน้าแก้ไข
            return view('designer.edit');
        }
        // $designer = Designer::find($id);
            //    dd($request->all());

        // $isDesigner = Auth::user()->designer();
        // if ($isDesigner){ // เคยสร้างโปรไฟล์ไปแล้ว เด้งไปหน้าแก้ไข
        //     return redirect('route('actors.edit''));
        // }

        $filenameWithExt = $request->file('profilepic')->getClientOriginalName();
        $filenameWithExt = $request->file('selfieID')->getClientOriginalName();
        $filenameWithExt = $request->file('pictureIDCard')->getClientOriginalName();

        //get file name

        $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);

        $extension = $request->file('profilepic')->getClientOriginalExtension();
        $extension = $request->file('selfieID')->getClientOriginalExtension();
        $extension = $request->file('pictureIDCard')->getClientOriginalExtension();

        //create new file name
//        $filenameTostore = $filename.'_'.time().'.'.$extension;

        $filenameTostore = date('YmdHis').'_'.$filename.'.'.$extension;

           //upload img
        $request->file('profilepic')->move('uploads/profilepic',$filenameTostore);
        $request->file('selfieID')->move('uploads/selfieID',$filenameTostore);
        $request->file('pictureIDCard')->move('uploads/pictureIDCard',$filenameTostore);

        DB::table('designers')->insert([
            'description'=>$request->input('description'),
            'phonenumber'=>$request->input('phonenumber'),
            'tag'=>json_encode($request->input('tag')),
            'personalID'=>$request->input('personalID'),
            'titlename'=>$request->input('titlename'),
            'name'=>$request->input('name'),
            'surname'=>$request->input('surname'),
            'birthdate'=>$request->input('birthdate'),
            'address'=>$request->input('address'),
            'zipcode'=>$request->input('zipcode'),
            'pricerate'=>$request->input('pricerate'),
            'bankname'=>$request->input('bankname'),
            'bankaccount'=>$request->input('bankaccount'),
            'profilepic'=>$request->file('profilepic')->getClientOriginalName(),
            'selfieID'=>$request->file('selfieID')->getClientOriginalName(),
            'pictureIDCard'=>$request->file('pictureIDCard')->getClientOriginalName(),
            'hasjob'=>'0',
            'rating'=>'0',
            'user_id'=>Auth::user()->id,
            'token'=> str_random(16)

            




        ]);

       

        try{
            // สำเร็จแล้ว
            $designer->save();
            // เด้งไปหน้าโชว์ของใครของมันเลย
            return redirect(route('designer.show',['token'=>$designer->token]));
        }catch (\Exception $x){
            // save Actor ไม่ได้ มีบางอย่างผิดพลาด คืนค่ากลับหน้าเดิม
            return back()->withInput();
        }
        // return redirect('/',['token'=>$designer->token]);

      


        // tags เก็บยาวเป็น String แล้วไป split ทีหลัง
        // รูปแบบ : id|id|id
      
        exit();    
        $this->validate($request,[
            'description'=>'required',
            'phonenumber'=>'required',
            'tag'=>'required',


            // 'tagStyle'=>'required',
            'personalID'=>'required',
            'titleName'=>'required',
            'name'=>'required',
            'surname'=>'required',
            'birthdate'=>'required',
            'address'=>'required',
            'zipcode'=>'required',

            'pricerate'=>'required',
            'bankname'=>'required',
            'bankaccount'=>'required',



//            'due'=>'required',
            'selfie_ID'=>'image|max:1999',
            'picture_IDCard'=>'image|max:1999',
            'profilepic'=>'image|max:1999'

        ]);

        //get file extension

        $filenameWithExt = $request->file('selfie_ID')->getClientOriginalName();
        $filenameWithExt = $request->file('picture_IDCard')->getClientOriginalName();
      //  $filenameWithExt = $request->file('profilepic')->getClientOriginalName();

        //get file name

        $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);

        $extension = $request->file('selfie_ID')->getClientOriginalExtension();
        $extension = $request->file('picture_IDCard')->getClientOriginalExtension();
       // $extension = $request->file('profilepic')->getClientOriginalExtension();

        //create new file name
//        $filenameTostore = $filename.'_'.time().'.'.$extension;

        $filenameTostore = date('YmdHis').'_'.$filename.'.'.$extension;


//        $due = $request->input('due');
//        $due = date('Y-m-d',strtotime($due));

        //upload img
        $request->file('selfie_ID')->move('uploads/selfie_ID',$filenameTostore);
        $request->file('picture_IDCard')->move('uploads/picture_IDCard',$filenameTostore);
       // $request->file('profilepic')->move('uploads/profilepic',$filenameTostore);

        $designer = new Designer;
        $designer->description = $request->input('description');
        $designer->phonenumber = $request->input('phonenumber');
        // $designer->tagStyle = $request->input('tagStyle');
        $designer->tag = $request->input('tag');
        $designer->personalID = $request->input('personalID');
        $designer->titleName = $request->input('titleName');
        $designer->name = $request->input('name');
        $designer->surname = $request->input('surname');
        $designer->birthdate = $request->input('birthdate');
        $designer->address = $request->input('address');
        $designer->zipcode = $request->input('zipcode');
        $designer->pricerate = $request->input('pricerate');
        $designer->bankname = $request->input('bankname');
        $designer->bankaccount = $request->input('bankaccount');

        

//        $album->due  = $due;
        $designer->selfie_ID = $filenameTostore;
        $designer->picture_IDCard = $filenameTostore;
     //   $designer->profilepic = $filenameTostore;

     

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Designer  $designer
     * @return \Illuminate\Http\Response
     */
    public function show($token)
    {
        //
        $designer = Designer::where('token',$token)->get();
        return view('designer.show',['designer'=>$designer->first()]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Designer  $designer
     * @return \Illuminate\Http\Response
     */
    public function edit(Designer $designer)
    {
        //

        $designer = Auth::user()->designer();
        if (!$designer){ // ยังเคยสร้างโปรไฟล์ เด้งไปหน้าสร้าง
            return redirect('/designer');
        }
        return view('designer.edit');;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Designer  $designer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Designer $designer)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Designer  $designer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Designer $designer)
    {
        //
    }
}
