<?php
use App\Http\Controllers\Homecontroller;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminhomeController;
 

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

route::get('/',[Homecontroller::class,'index']);


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

route::get('/redirect',[Homecontroller::class,'redirect']);
route::get('/view_catagory',[AdminhomeController::class,'view_catagory']);
route::post('/add_catagory',[AdminhomeController::class,'add_catagory']);
route::get('/delete_catagory/{id}',[AdminhomeController::class,'delete_catagory']);
route::get('/view_prodect',[AdminhomeController::class,'view_prodect'])->name('view_product');
route::Post('/add_product',[AdminhomeController::class,'add_product']);
route::get('/show_product',[AdminhomeController::class,'show_product']);
route::get('/delete_product/{id}',[AdminhomeController::class,'delete_product']);
route::get('/update_product/{id}',[AdminhomeController::class,'update_product']);
route::post('/confirm_update_product/{id}',[AdminhomeController::class,'confirm_update_product']);
route::get('/product_details/{id}',[Homecontroller::class,'product_details']);
route::post('/add_cart/{id}',[Homecontroller::class,'add_cart']);
route::get('/show_cart',[Homecontroller::class,'show_cart']);
route::get('/remove_cart/{id}',[Homecontroller::class,'remove_cart']);
route::get('/cash_order',[Homecontroller::class,'cash_order']);
route::get('/stripe/{total_price}',[Homecontroller::class,'stripe']);

Route::post('stripe',[Homecontroller::class, 'stripePost'])->name('stripe.post');

route::get('/view_order',[AdminhomeController::class,'view_order']);

route::get('/update_order/{id}',[AdminhomeController::class,'update_order']);

route::get('/print_pdf/{id}',[AdminhomeController::class,'print_pdf']);

route::get('/search',[AdminhomeController::class,'search']);

route::get('/show_order',[Homecontroller::class,'show_order']);

route::get('/remove_order/{id}',[Homecontroller::class,'remove_order']);