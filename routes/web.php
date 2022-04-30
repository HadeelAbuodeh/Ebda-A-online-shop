<?php
use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserLoginController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\OrderController;
use Illuminate\Support\Facades\Route;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

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
//Admain
Route::get('/', [LoginController::class,'index'])->name('login');
Route::post('/',[LoginController::class,'login']);

Route::get('/logup', [RegistrationController::class,'index'])->name('logup');
Route::post('/logup',[RegistrationController::class,'logup']);

Route::get('/dashboard',[DashboardController::class,'index'])->name('dash')->middleware('login');
Route::get('/logout',[LoginController::class,'logout'])->name('logout');

Route::get('/category',[CategoryController::class,'index'])->name('category')->middleware('login');

Route::get('/add-category',function(){return view('Admain.addcategory');})->name('showadd')->middleware('login');
Route::post('/add-category',function(){return view('Admain.addcategory');})->name('showadd');

Route::post('/added', [CategoryController::class,'add'])->name('addCategory');
Route::get('/added', [CategoryController::class,'add'])->name('addCategory');
Route::delete('/delete-category/{category}', [CategoryController::class,'destroy'])->name('destroy');

//Route::post('/update-category', [CategoryController::class,'update'])->name('update');
Route::post('/update-category/{category}',[CategoryController::class,'update'])->name('showupdate');
Route::get('/update-category/{category}',[CategoryController::class,'update'])->name('showupdate')->middleware('login');
Route ::post('/update/{data}',[CategoryController::class,'updateCategory'])->name('updatecategory');

Route::get('/product',[ProductController::class,'index'])->name('product')->middleware('login');
Route::get('/add-product',[ProductController::class,'category'])->name('showaddproduct')->middleware('login');
Route::post('add-product',[ProductController::class,'category'])->name('showaddproduct');
Route::get('/product-added',[ProductController::class,'add'])->name('addproduct');
Route::post('/product-added',[ProductController::class,'add'])->name('addproduct');
Route::delete('/delete-product/{product}', [ProductController::class,'delete'])->name('delete');
Route::post('/update-product/{product}',[ProductController::class,'update'])->name('updateshow');
Route::get('/update-product/{product}',[ProductController::class,'update'])->name('updateshow')->middleware('login');

Route::post('/updated/{data}',[ProductController::class,'updateProduct'])->name('updateproduct');
Route::get('/done-orders',[OrderController::class,'done'])->name('done')->middleware('login');
Route::get('/not_done-orders',[OrderController::class,'notDone'])->name('not-done')->middleware('login');
Route::get('/done/{id}',[OrderController::class,'makeDone'])->name('make-done')->middleware('login');


//User
Route::get('/user-signin', [UserLoginController::class,'index'])->name('user-login');
Route::get('/user-logout', [UserLoginController::class,'logout'])->name('user-logout');
Route::post('/user-signin',[UserLoginController::class,'login']);
Route::get('/home', [HomeController::class,'home'])->name('home-page');
Route::get('/catego/{category}', [HomeController::class,'element'])->name('eache');
Route::get('/categopr/{category}', [ProductController::class,'showproducts'])->name('shp');
Route::post('/categopr/{category}', [ProductController::class,'showproducts'])->name('shp');
Route::get('/user-signup', [UserLoginController::class,'signUpShow'])->name('user-signup');
Route::post('/user-signup', [UserLoginController::class,'signUp']);
Route::get('/productshow/{id}', [UserController::class,'product'])->name('productshow');
Route::get('/add-to-cart/{id}', [CartController::class,'add'])->name('add-to-cart');
Route::get('/show-cart', [CartController::class,'showCart'])->name('show-cart');
Route::post('/search', [UserController::class,'search'])->name('search');
Route::get('/search', [UserController::class,'search'])->name('search');
Route::get('/delete-cart/{id}', [CartController::class,'delete'])->name('delete-from-cart');
Route::get('/order', [CartController::class,'order'])->name('order');
Route::post('/order', [UserController::class,'order']);
Route::get('/history', [UserController::class,'history'])->name('history');
Route::post('/payment', [orderController::class,'payment'])->name('payment');
Route::get('/payment', [orderController::class,'payment'])->name('payment');









