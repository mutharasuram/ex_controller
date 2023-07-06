<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\voicecontroller;
use App\Http\Controllers\deancontroller;
use App\Http\Controllers\hodcontroller;
use App\Http\Controllers\accountcontroller;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;
session_start(); 
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
    return view('welcome');
});
Route::post('staff_auth',[UserController::class,'staff_auth']);
Route::get('dashboard',[UserController::class,'dashboard']);
Route::post('view_section',[UserController::class,'view_section']);
Route::post('fine',[UserController::class,'fine']);
Route::post('pay',[UserController::class,'pay']);
Route::post('insert_no',[UserController::class,'insert_no']);
Route::post('edit',[UserController::class,'edit']);
Route::post('delete',[UserController::class,'delete']);
Route::post('pdf',[UserController::class,'pdf']);
Route::post('excel',[UserController::class,'excel']);
Route::get('staff_alert',[UserController::class,'staff_alert']);
Route::post('ins_staff_alert',[UserController::class,'ins_staff_alert']);
Route::post('data_delete',[UserController::class,'data_delete']);
Route::post('attendancc',[UserController::class,'attendancc']);
Route::post('view_attt',[UserController::class,'view_attt']);
Route::get('insestaff/{module}/{value}',[UserController::class,'insestaff']);
Route::get('view_speal1',[UserController::class,'view_speal1']);
Route::post('spl_app',[UserController::class,'spl_app']);

Route::get('logout',[UserController::class,'logout']);


//voice 
Route::get('voicedashboard', 'App\Http\Controllers\voicecontroller@dashboard')->name('voice_dash');
Route::post('view_section1',[voicecontroller::class,'view_section']);
Route::post('insert_no1',[voicecontroller::class,'insert_no']);
Route::post('edit1',[voicecontroller::class,'edit']);
Route::post('delete1',[voicecontroller::class,'delete']);
Route::get('special',[voicecontroller::class,'special']);
Route::post('upload',[voicecontroller::class,'upload']);
Route::get('view_speal',[voicecontroller::class,'view_speal']);
Route::get('view_speal_pdf/{id}',[voicecontroller::class,'view_speal_pdf']);
Route::post('delete_spel',[voicecontroller::class,'delete_spel']);

//dean
Route::get('deandashboard',[deancontroller::class,'dashboard'])->name('dean_dash');
Route::post('view_section2',[deancontroller::class,'view_section']);
Route::post('insert_no2',[deancontroller::class,'insert_no']);
Route::post('edit2',[deancontroller::class,'edit']);
Route::post('delete2',[deancontroller::class,'delete']);

//hod
Route::get('hoddashboard',[hodcontroller::class,'dashboard'])->name('hod_dash');
Route::post('view_section3',[hodcontroller::class,'view_section']);
Route::post('insert_no3',[hodcontroller::class,'insert_no']);
Route::post('edit3',[hodcontroller::class,'edit']);
Route::post('delete3',[hodcontroller::class,'delete']);

//account
Route::get('accountdashboard',[accountcontroller::class,'dashboard'])->name('acc_dash');
Route::post('view_section4',[accountcontroller::class,'view_section']);
Route::post('insert_no4',[accountcontroller::class,'insert_no']);
Route::post('edit4',[accountcontroller::class,'edit']);
Route::post('delete4',[accountcontroller::class,'delete']);
