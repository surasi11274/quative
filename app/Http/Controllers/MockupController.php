<?php

namespace App\Http\Controllers;

use App\Mockup;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class MockupController extends Controller
{
    //
    public function mockupindex(){
        return view('preview.preview');
    }

    public function createmockupstore(Request $request) {
        $mockups = Mockup::create([
           
           
            // 'file'=>'0',
            
            // 'designer_id'=>NULL,
            'user_id'=>Auth::user()->id,
            'token'=> str_random(16),
            

            

        ]);
        if($request->hasfile('logo')){
            $filenameWithExt = $request->file('logo')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // $extension = $request->file('logo')->getClientOriginalExtension();
            $filenameTostore = 'logomock'.'.'.'jpg';

            // $file = storage_path('model/bottle/bottle.bin');
            // $destination = public_path('logomockupload/bottle/bottle.bin');
            Storage::copy('/model/bottle/bottle.bin', 'logomockupload/'.$mockups->token.'/bottle/bottle.bin');
            Storage::copy('/model/bottle/bottle.gltf','logomockupload/'.$mockups->token.'/bottle/bottle.gltf');  
            
            Storage::copy('/model/chipspotatobag/chips.bin', 'logomockupload/'.$mockups->token.'/chipspotatobag/chips.bin');
            Storage::copy('/model/chipspotatobag/chips.gltf','logomockupload/'.$mockups->token.'/chipspotatobag/chips.gltf');  

            Storage::copy('/model/coffeecup/coffee.bin', 'logomockupload/'.$mockups->token.'/coffeecup/coffee.bin');
            Storage::copy('/model/coffeecup/coffee.gltf','logomockupload/'.$mockups->token.'/coffeecup/coffee.gltf');  

            Storage::copy('/model/CreamKapook/creamkapook.bin', 'logomockupload/'.$mockups->token.'/CreamKapook/creamkapook.bin');
            Storage::copy('/model/CreamKapook/creamkapook.gltf','logomockupload/'.$mockups->token.'/CreamKapook/creamkapook.gltf');  

            Storage::copy('/model/cup/cup.bin', 'logomockupload/'.$mockups->token.'/cup/cup.bin');
            Storage::copy('/model/cup/cup.gltf','logomockupload/'.$mockups->token.'/cup/cup.gltf');  

            Storage::copy('/model/foodcan/canfood.bin', 'logomockupload/'.$mockups->token.'/foodcan/canfood.bin');
            Storage::copy('/model/foodcan/canfood.gltf','logomockupload/'.$mockups->token.'/foodcan/canfood.gltf');  

            Storage::copy('/model/Lotion/lotion.bin', 'logomockupload/'.$mockups->token.'/Lotion/lotion.bin');
            Storage::copy('/model/Lotion/lotion.gltf','logomockupload/'.$mockups->token.'/Lotion/lotion.gltf');  

            Storage::copy('/model/paperbag/paperbag.bin', 'logomockupload/'.$mockups->token.'/paperbag/paperbag.bin');
            Storage::copy('/model/paperbag/paperbag.gltf','logomockupload/'.$mockups->token.'/paperbag/paperbag.gltf');  

            Storage::copy('/model/sodacan/can.bin', 'logomockupload/'.$mockups->token.'/sodacan/can.bin');
            Storage::copy('/model/sodacan/can.gltf','logomockupload/'.$mockups->token.'/sodacan/can.gltf');  

            Storage::copy('/model/waterbottle/waterbottle.bin', 'logomockupload/'.$mockups->token.'/waterbottle/waterbottle.bin');
            Storage::copy('/model/waterbottle/waterbottle.gltf','logomockupload/'.$mockups->token.'/waterbottle/waterbottle.gltf');  

            $mockups->logo = $request->file('logo')->move('logomockupload/'.$mockups->token.'/logoup',$filenameTostore);


            Storage::copy('logomockupload/'.$mockups->token.'/logoup/logomock.jpg', 'logomockupload/'.$mockups->token.'/bottle/textures/logomock.jpg');
            Storage::copy('logomockupload/'.$mockups->token.'/logoup/logomock.jpg', 'logomockupload/'.$mockups->token.'/chipspotatobag/textures/logomock.jpg');
            Storage::copy('logomockupload/'.$mockups->token.'/logoup/logomock.jpg', 'logomockupload/'.$mockups->token.'/coffeecup/textures/logomock.jpg');
            Storage::copy('logomockupload/'.$mockups->token.'/logoup/logomock.jpg', 'logomockupload/'.$mockups->token.'/CreamKapook/textures/logomock.jpg');
            Storage::copy('logomockupload/'.$mockups->token.'/logoup/logomock.jpg', 'logomockupload/'.$mockups->token.'/cup/textures/logomock.jpg');
            Storage::copy('logomockupload/'.$mockups->token.'/logoup/logomock.jpg', 'logomockupload/'.$mockups->token.'/foodcan/textures/logomock.jpg');
            Storage::copy('logomockupload/'.$mockups->token.'/logoup/logomock.jpg', 'logomockupload/'.$mockups->token.'/Lotion/textures/logomock.jpg');
            Storage::copy('logomockupload/'.$mockups->token.'/logoup/logomock.jpg', 'logomockupload/'.$mockups->token.'/paperbag/textures/logomock.jpg');
            Storage::copy('logomockupload/'.$mockups->token.'/logoup/logomock.jpg', 'logomockupload/'.$mockups->token.'/sodacan/textures/logomock.jpg');
            Storage::copy('logomockupload/'.$mockups->token.'/logoup/logomock.jpg', 'logomockupload/'.$mockups->token.'/waterbottle/textures/logomock.jpg');


        }
        $mockups->save();

        return redirect(route('mock.user',
        [
            'mockups'=>$mockups->token,
            
        ]));
    }
    public function mockbyuser($token){
        
        $mockup = Mockup::where('token',$token)->get();

        // Storage::deleteDirectory('logomockupload/'.$mockup->first()->token)->where('created_at', '>=', Carbon::now()->subMinutes(12)->toDateTimeString());
        return view('preview.mockupbyuser.preview',[
            'mockup'=>$mockup->first(),

        ]);
    }public function mockcosmetic($token){
        
        $mockup = Mockup::where('token',$token)->get();

        return view('preview.mockupbyuser.cosmetic',[
            'mockup'=>$mockup->first(),

        ]);
    }public function mockcosmetic2($token){
        
        $mockup = Mockup::where('token',$token)->get();

        return view('preview.mockupbyuser.cosmetic2',[
            'mockup'=>$mockup->first(),

        ]);
    }public function mockbag($token){
        
        $mockup = Mockup::where('token',$token)->get();

        return view('preview.mockupbyuser.bag',[
            'mockup'=>$mockup->first(),

        ]);
    }public function mockbag2($token){
        
        $mockup = Mockup::where('token',$token)->get();

        return view('preview.mockupbyuser.bag2',[
            'mockup'=>$mockup->first(),

        ]);
    }public function mockcup($token){
        
        $mockup = Mockup::where('token',$token)->get();

        return view('preview.mockupbyuser.cup',[
            'mockup'=>$mockup->first(),

        ]);
    }public function mockcup2($token){
        
        $mockup = Mockup::where('token',$token)->get();

        return view('preview.mockupbyuser.cup2',[
            'mockup'=>$mockup->first(),

        ]);
    }public function mockcan($token){
        
        $mockup = Mockup::where('token',$token)->get();

        return view('preview.mockupbyuser.can',[
            'mockup'=>$mockup->first(),

        ]);
    }public function mockcan2($token){
        
        $mockup = Mockup::where('token',$token)->get();

        return view('preview.mockupbyuser.can2',[
            'mockup'=>$mockup->first(),

        ]);
    }public function mockbottle($token){
        
        $mockup = Mockup::where('token',$token)->get();

        return view('preview.mockupbyuser.bottle',[
            'mockup'=>$mockup->first(),

        ]);
    }
    public function mockbottle2($token){
        
        $mockup = Mockup::where('token',$token)->get();

        return view('preview.mockupbyuser.bottle2',[
            'mockup'=>$mockup->first(),

        ]);
    }
}
