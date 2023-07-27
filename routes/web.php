<?php

use App\Http\Controllers\AdminController;
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
Route::get('/',[Controller::class,'index']);

Route::get('/contactUs',[Controller::class,'showContactUs']);
Route::post('/contactUs',[Controller::class,'storeContactUs']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/dashboard', [Controller::class,'showDash']);

// 'prefix' => 'admin',

Route::group(['prefix' => 'admin','middleware'=>['web','isAdmin']],function(){
    Route::get('/panel', [AdminController::class,'AdminPanel'])->name('admin');
    Route::get('/showContactUsData', [AdminController::class,'ContactUsData']);
    Route::get('/showUpdateData/{id}', [AdminController::class,'UpdateData']);
    Route::get('/showUpdateCards', [AdminController::class,'UpdateCards']);
    Route::get('/createCard', [AdminController::class,'createCard']);
    Route::get('/updateLogo', [AdminController::class,'updateLogo']);

    Route::put('/storeUpdateData', [AdminController::class,'storeUpdateData']);
    Route::put('/storeUpdateLogo', [AdminController::class,'storeUpdateLogo']);
    Route::post('/storeCardData', [AdminController::class,'storeCardData']);
    Route::delete('/deleteCardData/{card}', [AdminController::class,'deleteCardData']);
});

