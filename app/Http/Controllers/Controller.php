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
use Illuminate\Support\Facades\File;

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

    
    public function showUpdateCards(){
        return view('admin.showUpdateCards',['cards'=>card::get(),
        'logo'=>[
            'logo'=>logo::where('name','logo')->first(),
            'favicon'=>logo::where('name','favicon')->first()
            ]
        ]);
    }
    
    public function showUpdateData(card $id){
        // dd($id);
        return view('admin.updateData',[
            'card'=>$id,
        ]);
    }

    public function createCard() {
        return view('admin.createCard');
    }

    public function updateLogo() {
        return view('admin.updateLogo');
    }


    public function showContactUsData(){

        return view('admin.contactUsData',['data'=>contactUs::get()]);
    }

    public function storeCardData(Request $request){
        // dd($request->all());
        $formFields=$request->validate([
            "title"=>"required",
            "subtitle"=>"required",
            "description"=>"required",
            // "cardImg"=>"required"
        ]);

         
        if($request->has('cardImg')){
            $filename= 'assets/img/' . time() . '.' .$request->cardImg->extension(); 
            $request->cardImg->move(public_path('assets/img/'),$filename);
            
            $formFields['img']=$filename;
            // dd($filename);
        }
        card::create($formFields);

        return redirect('/admin/showUpdateCards');
    }

    public function storeUpdateData(Request $request){
        $formFields=$request->validate([
            "id"=>"",
            "title"=>"",
            "description"=>"",
        ]);

        // dd($request->all());

        if($request->has('id')&& $request['id']!="" ){

            $card=card::find($request['id']);

            // $card->update($formFields);


            if($request->has('title')&& $request['title']!=""){
                $card->title=$formFields['title'];
            }
            if($request->has('description') && $request['description']!=""){
                $card->description=$request['description'];
            }
            // $card->update($formFields);
            // dd($card);
            
            
            if($request->has('cardImg')){
                $filename=$request->cardImg->getFilename();
                $filename=explode('.',$filename);
                $filename='assets/img/' . $filename['0'] . time() . '.' .$request->cardImg->extension(); 
                $request->cardImg->move(public_path('assets/img/'),$filename);

                $destination=$card->img;
                if(File::exists($destination)){
                    File::delete($destination);
                }
                $card->img=$filename;
                // dd($filename);
            }
            $card->save();
        }



        return redirect('/admin/showUpdateCards')->with('message','success');
    }

    public function storeUpdateLogo(Request $request){
        if($request->has('logo')){
            
            $logo=logo::where('name','logo')->first();
            
            $destination=$logo->src;
            if(File::exists($destination)){
                File::delete($destination);
            }
        
            $filename= 'assets/img/' . 'logo' . '.' . $request->favicon->extension(); 
            $request->logo->move(public_path('assets/img/'),$filename);
            $logo->src=$filename;
            
            $logo->save();
        }

        if($request->has('favicon')){
            
            
            $favicon=logo::where('name','favicon')->first();
            $destination=$favicon->src;
            if(File::exists($destination)){
                File::delete($destination);
            }
            
            $filename='assets/img/' .'favicon' . '.' . $request->favicon->extension(); 
            $request->favicon->move('assets/img/',$filename);
            $favicon->src=$filename;
            
            $favicon->save();
        }

        return redirect('/admin/showUpdateCards')->with('message','success');
    }

    public function deleteCardData(card $card){
        // $destination=explode('img/',$card->img);
        // $destination=end($destination);
        $destination=$card->img;
        if(File::exists($destination)){
            File::delete($destination);
        }
        $card->delete();

        return back()->with('message','success');

    }
}
