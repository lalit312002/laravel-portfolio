<?php

namespace App\Http\Controllers;

use DB;
use App\Models\card;
use App\Models\logo;
use App\Models\contactUs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public function show(){

        // try {
        //     DB::connection()->getPDO();
        //     dd(\DB::connection()->getDatabaseName());
        //     } catch (\Exception $e) {
        //     echo 'None';
        //     dd($e);
        // }
        return view('index',['cards'=>card::get(),
        'logo'=>[
            'logo'=>logo::where('name','logo')->first(),
            'favicon'=>logo::where('name','favicon')->first()
            ]
        ]);

    }

    public function showContactUs(){
        return view('contactUs');
    }

    public function storeContactUs(Request $request){
        $formfields=$request->validate([
            "name"=>"required",
            "email"=>"required|email",
            "mobile"=>"",
            "message"=>"required",
        ]);
        // dd($formfields);

        contactUs::create($formfields);

        return redirect('/')->with('message','success');
        
    }

    public function showDash() {
        if(Auth::user()){
            $route = $this->redirectDash();
            return redirect($route);
        }
        return view('/');
    }

    public function redirectDash()
    {
        $redirect = '';

        if(Auth::user() && Auth::user()->role == 1){
            $redirect = '/admin-panel';
        }
        else if(Auth::user() && Auth::user()->role == 0){
            $redirect = '/home';
        }
        else{
            $redirect = '/index';
        }

        return $redirect;
    }


    // admin controller

    public function showAdminPanel(){
        return view('admin.admin-panel');
    }

    public function showUpdateData(){
        return view('admin.updateData');
    }

    public function showContactUsData(){

        return view('admin.contactUsData',['data'=>contactUs::get()]);
    }

    public function storeUpdateData(Request $request){
        $formFields=$request->validate([
            "id"=>"",
            "title"=>"",
            "description"=>"",
        ]);

        if($request->has('id')&& $request['id']!=""){

            $card=card::find($request['id']);

            if($request->has('title')&& $request['title']!=""){
                $card->title=$formFields['title'];
            }
            if($request->has('description') && $request['description']!=""){
                $card->description=$request['description'];
            }
            // $card->update($formFields);
            // dd($card);
            
            
            if($request->has('cardImg')){
                $filename="";
                $filename=$request->getSchemeAndHttpHost() . '/assets/img/' . time() . '.' .$request->cardImg->extension(); 
                $request->cardImg->move(public_path('/assets/img/'),$filename);
                
                $card->img=$filename;
                // dd($filename);
            }
            $card->save();
        }

        if($request->has('logo')){
            $filename="";
            $filename=$request->getSchemeAndHttpHost() . '/assets/img/' . time() . '.' .$request->logo->extension(); 
            $request->logo->move(public_path('/assets/img/'),$filename);

            $logo=logo::where('name','logo')->first();
            $logo->src=$filename;
            
            $logo->save();
            // dd($filename);
        }
        if($request->has('favicon')){
            $file="";
            $file=$request->getSchemeAndHttpHost() . '/assets/img/' . time() . '.' .$request->favicon->extension(); 
            $request->favicon->move(public_path('/assets/img/'),$file);

            $favicon=logo::where('name','favicon')->first();
            $favicon->src=$file;
            
            $favicon->save();
            // dd($filename);
        }

        // if($request->has('favicon')){
        //     $favicon=logo::where('name','favicon')->first();
        //     $favicon->src=$request['favicon'];
        //     $favicon->save();
        // }


        return redirect('/')->with('message','success');
    }
}
