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

    public function showAdminPanel(){
        return view('admin.admin-panel');
    }
}
