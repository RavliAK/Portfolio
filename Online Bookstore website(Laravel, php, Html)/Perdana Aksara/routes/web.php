<?php

use App\Models\Book;
use App\Models\Author;
use App\Models\Category;
use App\Mail\WelcomeMail;
use App\Mail\PasswordMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\MailController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\AdminOrderController;
use App\Http\Controllers\AdminAuthorController;
use App\Http\Controllers\AdminCategoryController;
use App\Http\Controllers\DashboardPostController;
use App\Http\Controllers\DashboardUserController;

ini_set('memory_limit', '2048M');
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
    return view('home',[
        "title"=>"Home",
        "active"=>"home",
    ]);
});

Route::get('/history', [OrderController::class,'index']);
Route::get('/history/{order:id}', [OrderController::class,'invoice']);



Route::get('/welcome', function () {
    return view('welcome',[
        "title"=>"Welcome",
        "active"=>"welcome"
    ]);
});

Route::get('/about', function () {
    return view('about',[
        "title"=>"About",
        "active"=>"about",
        // "name" => "NOD",
        // "email"=> "itsm3@yahoo.com",
        // "image"=> "AcprSxaKCEzTAAAAAElFTkSuQmCC.png"
    ]);
});
Route::get('/aboutpnd', function () {
    return view('aboutpnd',[
        "title"=>"AboutPrenada",
        "active"=>"aboutpnd",
        
    ]);
});

Route::get('/faq', function () {
    return view('faq',[
        "title"=>"FAQ",
        "active"=>"faq",
        
    ]);
});

Route::get('/help', function () {
    return view('help',[
        "title"=>"Help",
        "active"=>"help",
        
    ]);
});


Route::get('/belanja', [BookController::class,'index']);


//isi udah dipindahin kedalem postcontroller
// 'index' itu nama method yg ada di postcontroller


//halaman single post
Route::get('belanja/{book:slug}',[BookController::class,'show']);
//klo gk tambahin :slug defaultnya bakal cari ID


Route::get('/categories',function(){
    return view('categories',[
        'title'=>'Post Categories',
        "active"=>'categories',
        'categories'=>Category::all()
        //untuk tampilin semua category -> sama kyk yg di PostController
    ]);
});

Route::get('/login',[LoginController::class, 'index'])->name('login')->middleware('guest');
//name('login') wajib biar gk error klo blom login
Route::post('/login',[LoginController::class, 'authenticate']);
Route::post('/logout',[LoginController::class, 'logout']);

Route::get('/register',[RegisterController::class, 'index'])->middleware('guest');
Route::post('/register',[RegisterController::class, 'store']);//untuk simpen data yg diregister




Route::get('/cart', [CartController::class,'index'])->middleware('auth')->name('cart');
Route::delete('/cart/{transaction:id}', [CartController::class,'destroy'])->middleware('auth');

Route::put('/cart/quantity/{transaction:id}',[CartController::class,'checkQuantity'])->middleware('auth');

Route::post('/belanja/{book:slug}',[CartController::class, 'add'])->middleware('auth');
Route::post('/belanja/{book:slug}/reply',[ReviewController::class, 'store'])->middleware('auth');




Route::get('/dashboard',function(){
    return view('dashboard.index');
})->middleware('auth');
// middleware('auth') biar cuma bisa dibuka untuk org yg udh login

Route::get('/dashboard/posts/checkSlug',[DashboardPostController::class,'checkSlug'])->middleware('auth');
Route::get('/dashboard/posts/create',[DashboardPostController::class,'create'])->middleware('auth');
Route::get('/dashboard/posts/{book:slug}',[DashboardPostController::class,'show'])->middleware('auth');
Route::get('/dashboard/posts/{book:slug}/edit',[DashboardPostController::class,'edit'])->middleware('auth');
Route::resource('/dashboard/posts',DashboardPostController::class)->middleware('auth');
Route::delete('/dashboard/posts/index/{book:id}', [DashboardPostController::class,'destroy'])->middleware('auth');
Route::put('/dashboard/posts/edit/{book:slug}', [DashboardPostController::class,'update'])->middleware('auth');

Route::get('/dashboard/users/checkSlug',[DashboardUserController::class,'checkSlug'])->middleware('auth');
Route::get('/dashboard/users/create',[DashboardUserController::class,'create'])->middleware('auth');
Route::resource('/dashboard/users',DashboardUserController::class)->middleware('auth');
Route::delete('/dashboard/users/index/{user:id}', [DashboardUserController::class,'destroy'])->middleware('auth');







Route::resource('/dashboard/categories', AdminCategoryController::class)->except('show')->middleware('admin');
Route::get('/dashboard/categories/create',[AdminCategoryController::class,'create'])->middleware('auth');
Route::get('/dashboard/categories/checkSlug',[AdminCategoryController::class,'checkSlug'])->middleware('auth');
Route::delete('/dashboard/categories/index/{category:slug}', [AdminCategoryController::class,'destroy'])->middleware('auth');


Route::resource('/dashboard/authors', AdminAuthorController::class)->except('show')->middleware('admin');
Route::get('/dashboard/authors/create',[AdminAuthorController::class,'create'])->middleware('auth');
Route::get('/dashboard/authors/checkSlug',[AdminAuthorController::class,'checkSlug'])->middleware('auth');
Route::delete('/dashboard/authors/index/{author:slug}', [AdminAuthorController::class,'destroy'])->middleware('auth');

Route::resource('/dashboard/orders', AdminOrderController::class)->except('show')->middleware('admin');
Route::delete('/dashboard/orders/index/{order:id}', [AdminOrderController::class,'destroy'])->middleware('auth');
Route::get('/dashboard/order/{order:id}',[AdminOrderController::class,'show'])->middleware('auth');
Route::put('/dashboard/order/{order:id}',[AdminOrderController::class,'statusUpdate'])->middleware('auth');
Route::post('/order',[OrderController::class, 'store']);
Route::delete('/order/{order:id}',[OrderController::class, 'destroy'])->middleware('auth');//untuk simpen data 
Route::get('/dashboard/reports',[CartController::class, 'report']);


Route::get('/order/delivery/{order:id}', [orderController::class,'latestD'])->middleware('auth');
 Route::get('/order/pickup/{order:id}', [orderController::class,'latestP'])->middleware('auth');

 Route::put('/order/paid/{order:id}', [orderController::class,'update'])->middleware('auth');
 

//  Route::get('/email/{order:id}',function(){
//     $order=\App\Models\Order::latest();
//     Mail::to('ravli.kahfi@gmail.com')->send(new WelcomeMail($order));
// return new WelcomeMail($order);
// });
Route::get('/email/{order:id}', [MailController::class,'sendWelcome']);

Route::get('/reset',function(){
    return view('reset',[
        'title'=>'reset',
    ]);});
Route::post('/reset',[MailController::class,'sendReset']);
Route::get('/resetpassword/{user:id}',[MailController::class,'indexReset']);
Route::put('/resetpassword/{user:id}',[RegisterController::class,'update']);