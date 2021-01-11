<?php

use App\Http\Controllers\SluzbyController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
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

Route::get('/', function () {
    return view('home');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(["middleware" => ["auth"]],function () {
    Route::resource("user", UserController::class);
    Route::get("/user/{user}/delete",[UserController::class,"destroy"])->name("user.delete");

    });



Route::get("/sluzby/add",[SluzbyController::class, "create"])->name("sluzby.add");
Route::get("/sluzby/delete/{id}",[SluzbyController::class, "destroy"])->name("sluzby.delete");
Route::get("/sluzby/edit/{sluzby}",[SluzbyController::class, "edit"])->name("sluzby.edit.update");


Route::get("/sluzby/skiservis",function (){
   return view("sluzby/skiservis");
});
Route::get("/sluzby/snowpark",function (){
   return view("sluzby/snowpark");
});

Route::resource("sluzby",SluzbyController::class);

