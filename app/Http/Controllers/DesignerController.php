<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Designer;


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
        return view('auth.registerDesigner');
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
            //    dd($request->all());

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
          //  'profilepic'=>'image|max:1999'

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

        $designer->save();
        return redirect('/')->with('success','Album created');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Designer  $designer
     * @return \Illuminate\Http\Response
     */
    public function show(Designer $designer)
    {
        //
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
