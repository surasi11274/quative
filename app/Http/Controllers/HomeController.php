<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;



use App\Designer;
use App\Categories;
use App\References;
use App\Tags;
use App\Jobs;

use App\User;

use mysql_xdevapi\Session;
use Symfony\Component\Process\Process;
use Symfony\Component\Process\Exception\ProcessFailedException;
use DB;



class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function index()
    {
        $designers = Designer::all();
        $cats = Categories::all();  
        return view('home',[
            'designers'=>$designers
            ]);
    }
    public function createSearchStep1()
    {
        //
        $users = Auth::user(); 
        $cats = Categories::all();             
             
        $tags = Tags::all();
        return view('search',[
            'cats'=>$cats,
            'tags'=>$tags,
            'users'=>$users
            ]);
    }
    public function storeSearchStep1(Request $request)
    {
        //
        $users = Auth::user();
        $jobs = Jobs::all();

        $cats = Categories::all();             

        // if ($designer){ // เคยสร้างโปรไฟล์ไปแล้ว เด้งไปหน้าแก้ไข
        //     return view('designer.edit');
        // }
    

        DB::table('jobs')->insert([
            'categories'=>$request->input('categories'),
            'categories_id'=>$request->input('categories_id'),

            'tags'=>json_encode($request->input('tags')),
            'finishdate'=>$request->input('finishdate'),

            'email'=>$request->input('email'),
            'phone'=>$request->input('phone'),
            'requirement'=>$request->input('requirement'),
            'pricerate'=>$request->input('pricerate'),
            // 'reference'=>$request->input('reference'),

           
            'file'=>'0',
            'designer_id'=>NULL,
            'user_id'=>Auth::user()->id,
            // 'token'=> str_random(16)

            

        ]);


       

        try{
            // สำเร็จแล้ว ส่งไป step2
            // $users->save();
            return redirect(route('search.create.step2'))->with('id', $jobs->id);
        }catch (\Exception $x){
            // สร้าง Actor ไม่ได้ มีบางอย่างผิดพลาด คืนค่ากลับหน้าเดิม
            return back()->withInput();
        }
        // return redirect('/',['token'=>$designer->token]);

      




    }
        // เอาไอดีจาก create มาสร้าง insertรูปภาพRefต่อ

    public function createSearchStep2()
    {
        $id = \Illuminate\Support\Facades\Session::get('id'); // รับ id มาจาก step
        // $users = Auth::user()->job(); 
        $jobs = Jobs::find($id);
        // $ref = References::all();
        // $jobs->first()->categories_id = json_decode($jobs->first()->categories_id);

        // $cats = Categories::all();
        // $jobs->first()->categories_id = json_decode($jobs->first()->categories_id);
      

        // $ref = DB::table('jobs')
        //     ->join('references', 'jobs.categories_id', '=', 'references.categories_id')
        //     ->select('references.id','references.img')
        //     ->limit(9)
        //     ->get();

        if($jobs == null){
            return "ERROR หา id ไม่เจอ เพราะเข้าลิงค์ตรง เด้งกลับไปหน้าไหนก็ได้";
        }
        return view('select',[
            'id'=>$jobs->id,
            // 'jobs'=>$jobs,
            
            // 'ref'=>$ref,
            // 'cats'=>$cats

            ]);
        // return view('search');
    }
    public function storeSearchStep2(Request $request)
    {

        $users = Auth::user()->job();
        $jobs = Jobs::find($id);
        $cats = Categories::all();     
        $ref = References::all();
     

        DB::table('jobs')->insert([
  
            'reference'=>$request->input('reference'),

        
            

        ]);

        try{
            // สำเร็จแล้ว ส่งไป step2
            $users->save();
            return redirect(route('search.create.step3',['token'=>$users->token]));
        }catch (\Exception $x){
            // สร้าง Actor ไม่ได้ มีบางอย่างผิดพลาด คืนค่ากลับหน้าเดิม
            return back()->withInput();
        }
        // return view('search');
    }
    // เอาไอดีจาก create มาสร้าง insert Designer ที่เลือก

    public function createSearchStep3()
    
    {
        return view('search');
    }
    public function storeSearchStep3(Request $request)
    {
        return view('search');
    }
    
    public function search()
    {
        return view('search');
    }
}
