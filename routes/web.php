<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Products;
use App\Http\Controllers\Users;

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
Route::get('/list', [Products::class, 'productList']);
// Route::post('users', [Users::class, 'getData']);

Route::view("users", "users");
// Route::view("users", "users")->middleware('protectedPage');
Route::view('home', 'home');
Route::view('noaccess', 'noaccess');

// Route::group(['middleware'=>['protectedPage']], function(){
//     Route::view("users", "users");
// });