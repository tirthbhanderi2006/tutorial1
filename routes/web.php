<?php

use App\Http\Controllers\MainController;
use App\Http\Controllers\QuizController;
use App\Http\Middleware\checkLogin;
use App\Models\Register;
use Illuminate\Support\Facades\Mail;
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

Route::get('/', function () {
    return view('login');
})->name('/');
Route::middleware(checkLogin::class)->group(function(){

Route::get('home',function(){
    $data=Register::where('userEmail',session('user_email'))->first();
    return view('home',compact('data'));
})->name('home');
// t1.1
Route::view('/registration_form','registration');
Route::post('registration',[MainController::class,'registration_data']);

//t1.2
Route::get('quiz',[QuizController::class,'index']);
Route::post('quiz_score',[QuizController::class,'QuizCheck'])->name('quiz_score');

// t1.3
Route::get('prime_number',[MainController::class,'printPrime']);

// t1.4
Route::view('/moduls','moduls');
Route::post('route_modulus',[MainController::class,'calculateMod']);

//t1.5
Route::view('/MultiplicationTable','MultiplicationTable');
Route::post('Route_MultiplicationTable',[MainController::class,'multiplicationTable']);


// t2.1
Route::get('dynamic_textbox',[MainController::class,'dynamic_textbox']);
Route::get('sorted_dynamic_textbox',[MainController::class,'print_sorted_value']);

//t2.2
Route::view('upload','upload_pdf');
Route::post('upload_pdf',[MainController::class,'upload']);

// t2.3
Route::view('sum_of_digit','sum_of_digit');
Route::post('call_sum_of_digit',[MainController::class,'sum_of_digit']);

//t2.4
Route::get('maximum',[MainController::class,'maximum']);
Route::get('sorted_maximum_textbox',[MainController::class,'print_sorted_maximum']);


// t2.5
Route::get('right_angle_triangle',[MainController::class,'right_angle_triangle']);

// t3.1
Route::get('files',[MainController::class,'files']);
Route::post('upload_file',[MainController::class,'upload_file']);
Route::get('download_file/{file_name}',[MainController::class,'download_file'])->name('download_file');
Route::get('delete_file/{file_name}',[MainController::class,'delete_file'])->name('delete_file');


// t4
Route::get('product_form',[MainController::class,'show_product_form']);
Route::post('product_insert',[MainController::class,'product_insert']);
Route::get('/product/update/{id}', [MainController::class,'product_update'])->name('product_update');
Route::get('/product/delete/{id}', [MainController::class,'product_delete'])->name('product_delete');
Route::get('update_form/{id}',[MainController::class,'update_form']);
Route::post('product_update_details/{id}',[MainController::class,'product_update_details'])->name('product_update_details');



// t6
Route::get('profile',[MainController::class,'profile_view'])->name('profile_view');
Route::post('profile_update/{id}',[MainController::class,'updateProfile'])->name('profile.update');
Route::post('change_password_view',[MainController::class,'changePasswordview'])->name('changePasswordview');
Route::post('update_password',[MainController::class,'update_password'])->name('update_password');
Route::post('delete_profile',[MainController::class,'delete_profile'])->name('delete_profile');


});
// t5

// t7
Route::get('t7_1',[MainController::class,'t7_1'])->name("t7_1");
Route::post('cal_area',[MainController::class,'cal_area'])->name('cal_area');
Route::get('t7_2',[MainController::class,'t7_2'])->name('t7_2');
Route::post('manageAccount',[MainController::class,'manageAccount'])->name('manageAccount');
Route::get('t7_3',[MainController::class,'t7_3'])->name('t7_3');
Route::post('calculateShapes',[MainController::class,'calculateShapes'])->name('calculateShapes');
Route::get('t7_4',[MainController::class,'t7_4'])->name('t7_4');
Route::post('handleClick',[MainController::class,'handleClick'])->name('handleClick');
Route::get('/t7_5', [MainController::class, 'demonstrateInheritance'])->name('t7_5');
Route::get('/t7_6', [MainController::class, 'demonstrateOverloading'])->name('t7_6');




Route::get('register',[MainController::class,'register_view'])->name('register');
Route::post('register_user',[MainController::class,'register_user'])->name('register_user');
Route::post('/check_login', [MainController::class, 'check_login'])->name('check_login');
Route::get('/logout', [MainController::class, 'logout'])->name('logout');



