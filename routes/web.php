<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\loginController;
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

Route::post('save_signup_details',[loginController::class,'save_signup_details']);
Route::post('check_login_details',[loginController::class,'check_login_details']);
Route::get('dashboard',[loginController::class,'view_dashboard']);
Route::get('dashboard1',[loginController::class,'view_dashboard1']);
Route::post('create_new_project',[loginController::class,'create_new_project']);
Route::get('load_project_table',[loginController::class,'load_project_table']);
Route::post('get_id_data',[loginController::class,'get_id_data']);
Route::post('add_task',[loginController::class,'add_task']);
Route::post('load_task_table',[loginController::class,'load_task_table']);
Route::post('delete_project',[loginController::class,'delete_project']);
Route::post('get_task_details_on_id',[loginController::class,'get_task_details_on_id']);

Route::post('save_ceo_personal_infos',[loginController::class,'save_ceo_personal_infos']);
Route::post('company_infos',[loginController::class,'company_infos']);
Route::get('log_out',[loginController::class,'log_out']);
Route::post('company_designation_infos',[loginController::class,'company_designation_infos']);
Route::get('cto_page',[loginController::class,'cto_page']);

Route::get('/ceo_information/{ceo_name}/{company_name}',[loginController::class,'ceo_information'])->middleware('checkStatus');
Route::get('get_news',[loginController::class,'get._news']);