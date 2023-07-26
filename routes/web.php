<?php

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/welcome', function () {
    return view('welcome');
});

// Route::get('/', function () {
//     return view('index');
// });
Route::get('/',[Controller::class,'show']);

Route::get('/contactUs',[Controller::class,'showContactUs']);
Route::post('/contactUs',[Controller::class,'storeContactUs']);



Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/dashboard', [Controller::class,'showDash']);


Route::group(['middleware'=>['isAdmin']],function(){
    Route::get('/admin-panel', [Controller::class,'showAdminPanel'])->name('admin');
});

