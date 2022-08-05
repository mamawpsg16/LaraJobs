<?php

// use Illuminate\Http\Request;
// use App\Models\Listing;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ListingController;
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

// Get all Jobs
Route::get('/',[ListingController::class,'index']);

//Show Create Form
Route::get('/jobs/create',[ListingController::class,'create'])->middleware('auth');

//Save Data
Route::post('/jobs',[ListingController::class,'store'])->middleware('auth');

//Show Edit Form
Route::get('/jobs/{job}/edit',[ListingController::class,'edit'])->middleware('auth');

// Update Data
Route::put('/jobs/{job}',[ListingController::class,'update'])->middleware('auth');

// Delete Data
Route::delete('/jobs/{job}',[ListingController::class,'destroy'])->middleware('auth');

//Manage jobs
Route::get('/jobs/manage',[ListingController::class,'manage'])->middleware('auth');

// Single Job
Route::get('/jobs/{job}',[ListingController::class,'show']);



//Show Register form
Route::get('/register',[UserController::class,'create'])->middleware('guest');

//Save Register form
Route::post('/users',[UserController::class,'store']);

//Logout
Route::post('/logout',[UserController::class,'logout'])->middleware('auth');


//Show Login form
Route::get('/login',[UserController::class,'login'])->name('login')->middleware('guest');

//Login User
Route::post('/users/authenticate',[UserController::class,'authenticate']);


// Route::get('/posts/{id}',function($id){
//     return $id;
// });

// Route::get('/posts',function(Request $request){
//     return $request;
// });
