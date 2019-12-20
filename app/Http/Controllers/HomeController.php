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

use Illuminate\Support\Facades\Session;
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
        $jobs = Auth::user()->job();
        if ($jobs){ // เคยสร้างโปรไฟล์ไปแล้ว เด้งไปหน้าแก้ไข
            // return redirect(route('designer.show',['token'=>$jobs->token]));
            return redirect(route('search.show',['token'=>$jobs->token]));

        }

        $users = Auth::user(); 
        $cats = Categories::all();    
        $refs = References::inRandomOrder()->limit(9)->get();             
         
             
        $tags = Tags::all();
        return view('search',[
            'cats'=>$cats,
            'tags'=>$tags,
            'refs'=>$refs,
            'users'=>$users
            ]);
    }
    public function storeSearchStep1(Request $request)
    {
        //$jobs = Auth::user()->job();
        $users = Auth::user()->job();
        // $jobs = Jobs::all();

        $cats = Categories::all();             

        // if ($designer){ // เคยสร้างโปรไฟล์ไปแล้ว เด้งไปหน้าแก้ไข
        //     return view('designer.edit');
        // }
    

        $jobs = DB::table('jobs')->insert([
            'categories'=>$request->input('categories'),
            'categories_id'=>$request->input('categories_id'),

            'tags'=>json_encode($request->input('tags')),
            'finishdate'=>$request->input('finishdate'),

            'email'=>$request->input('email'),
            'phone'=>$request->input('phone'),
            'requirement'=>$request->input('requirement'),
            'pricerate'=>$request->input('pricerate'),
            'reference'=>json_encode($request->input('reference')),

           
            'file'=>'0',
            'designer_id'=>NULL,
            'user_id'=>Auth::user()->id,
            'token'=> str_random(16)

            

        ]);



       

        try{
            // สำเร็จแล้ว ส่งไป step2
            // $jobs->save();
            // return redirect(route('search.create.step2'))->with('id', $jobs->id);
            return redirect(route('search.create.step2',['token'=>$users->token]));

        }catch (\Exception $x){
            return back()->withInput();
        }
        // return redirect('/',['token'=>$designer->token]);

      




    }
        // เอาไอดีจาก create มาสร้าง insertรูปภาพRefต่อ

    public function createSearchStep2($token)
    {
        // $id = \Illuminate\Support\Facades\Session::get('id'); // รับ id มาจาก step
        // // $users = Auth::user()->job(); 
        // $jobs = Jobs::find($id);

        $jobs = Jobs::where('token',$token)->get();

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
        return view('showmatch',[
            'jobs'=>$jobs->first()]
        );
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

    // public function createSearchStep3()
    
    // {
    //     return view('search');
    // }
    // public function storeSearchStep3(Request $request)
    // {
    //     return view('search');
    // }
    
    public function search()
    {
        return view('search');
    }

    public function show($token)
    {
        //
        $jobs = Jobs::where('token',$token)->get();
        // $designers = Designer::where('tag',$jobstags)->get();

        // $jobstags = Jobs::where('tags',$token->tags)->pluck('tags');
        // $designers = Designer::where('tag',$jobs->tags)->get();
        // return $designers;        
        // $designers = Designer::where('tag',Jobs::where('token',$token))->get();;


        // $jobtag = $jobs->select('tags');
        // $jobd = Designer::where('tag');

        // $designers = Designer::where($jobtag = $jobd);
        // $jobtag->first()->tags = json_decode($jobtag->first()->tags);
        // $dtag->first()->tag = json_decode($dtag->first()->tag);

        // $designers = DB::table('designers')
        // ->whereExists(function ($query) {
        //     $query->select(DB::raw(1))
        //           ->from('jobs')
        //           ->whereRaw('designers.tag = jobs.tags');
        // })
        // ->get();



    // $jobtags = Jobs::where('tags',$jobs->tags)->get();
    foreach($jobs as $record){
        $tags = $record->tags;
        // ....
        }
 
    $designers = DB::table('designers')
                ->when($tags, function ($query) use ($tags) {
                    return $query->where('designers.tag', $tags);
                })
                ->get();
        
        
        $tags = Tags::all();

        // $designers = Designer::where('tag' ,'==', $jobs->tag);

        // $designers = DB::table('designers')
        //     ->select('id')
        //     ->where('tag',$jobs)
        //     ->limit(1)
        //     ->get();

        // $jobs->first()->tag = json_decode($designer->first()->tag);


        if ($jobs->count() == 0){
            return "หาไม่เจอ ทำอะไรดี";
        }
        return view('showmatch',[
            'jobs'=>$jobs->first(),
            'tags'=>$tags,
            'designers'=>$designers
            ]);

    }
}
