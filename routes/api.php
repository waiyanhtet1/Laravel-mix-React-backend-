<?php

use App\Http\Controllers\ApiController;
use Illuminate\Support\Facades\Route;


Route::get('/category',[ApiController::class,'showCategory']);
Route::get('/product',[ApiController::class,'showProduct']);