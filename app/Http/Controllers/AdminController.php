<?php

namespace App\Http\Controllers;

use App\Models\card;
use App\Models\logo;
use App\Models\contactUs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class AdminController extends Controller
{
    //
    
    // admin controller

    public function AdminPanel(){
        return view('admin.admin-panel');
    }

    
    public function UpdateCards(){
        return view('admin.showUpdateCards',['cards'=>card::get(),
        'logo'=>[
            'logo'=>logo::where('name','logo')->first(),
            'favicon'=>logo::where('name','favicon')->first()
            ]
        ]);
    }
    
    public function UpdateData(card $id){
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


    public function ContactUsData(){

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
            $filename=$request->cardImg->getFilename();
            $filename=explode('.',$filename);
            // dd($filename);
            $filename= 'assets/img/' . $filename['0'] . time() . '.' .$request->cardImg->extension(); 
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


            if( $request['title']!=""){
                $card->title=$formFields['title'];
            }
            if( $request['description']!=""){
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
     
        $destination=$card->img;
        if(File::exists($destination)){
            File::delete($destination);
        }
        $card->delete();

        return back()->with('message','success');

    }
}
