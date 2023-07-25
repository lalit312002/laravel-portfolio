<?php

namespace App\Http\Controllers;

use App\Models\card;
use App\Models\contactUs;
use App\Models\logo;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public function show(){
        return view('index',['cards'=>card::get(),
        'logo'=>logo::where('id','1')->first()]);

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
        dd($formfields);



        contactUs::create($formfields);

        return redirect('/')->with('message','success');
        
    }
}
