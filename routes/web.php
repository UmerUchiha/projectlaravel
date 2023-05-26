<?php

use Illuminate\Support\Facades\Route;
use App\http\Controllers\HomeController;
use App\http\Controllers\AdminController;

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

// Route::get('/', function () {
//     return view('welcome');
// });



Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});


Route::get('/redirect',[HomeController::class,'redirect'])->middleware('auth','verified');
Route::get('/',[HomeController::class,'index']);
Route::get('/category_view',[AdminController::class,'category_view']);
Route::post('/add_category',[AdminController::class,'add_category']);
Route::get('/delete_category/{id}',[AdminController::class,'delete_category']);
Route::get('/viewproduct',[AdminController::class,'viewproduct']);
Route::post('/addProduct',[AdminController::class,'addProduct']);
Route::get('/showproduct',[AdminController::class,'showproduct']);
Route::get('/deleteproduct/{id}',[AdminController::class,'deleteproduct']);
Route::get('/updateproduct/{id}',[AdminController::class,'updateproduct']);
Route::put('/updateproduct/{id}',[AdminController::class,'edit']);
Route::get('/product_details/{id}',[HomeController::class,'product_details']);
Route::post('/addcart/{id}',[HomeController::class,'addcart']);
Route::get('/showcart',[HomeController::class,'showcart']);
Route::get('/deletecart/{id}',[HomeController::class,'deletecart']);
Route::get('/cash_order',[HomeController::class,'cash_order']);
Route::get('/order',[AdminController::class,'order']);
Route::get('/delivered/{id}',[AdminController::class,'delivered']);
Route::get('/print/{id}',[AdminController::class,'print']);
Route::get('/email/{id}',[AdminController::class,'send_email']);
Route::post('/sent_mail/{id}',[AdminController::class,'sent_mail']);
Route::get('/search',[AdminController::class,'search']);
Route::get('/showorder',[HomeController::class,'showorder']);
Route::get('/deleteorder/{id}',[HomeController::class,'deleteorder']);
Route::get('/product_search',[HomeController::class,'searchpro']);


Route::get('/products',[HomeController::class,'products']);
Route::get('/search_product',[HomeController::class,'search_product']);


















