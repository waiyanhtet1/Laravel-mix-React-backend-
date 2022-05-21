<?php


use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\WatchController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/admin/login',[AuthController::class,'login']);
Route::post('/admin/login',[AuthController::class,'login_post']);
Route::get('/admin/logout',[AuthController::class,'logout']);

Route::group(['prefix'=>'/admin', 'middleware'=>['authUser']],function(){

    Route::get('/',[AdminController::class,'home']);
    Route::resource('/categories',CategoryController::class);
    Route::resource('/watches',WatchController::class);
});

