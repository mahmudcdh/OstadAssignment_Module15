<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CustomAuthController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

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

Route::get('/home', function () {
    return redirect('/dashboard');
});


Route::get('/login', [CustomAuthController::class, 'Login'])->name('login');
Route::post('/custom-login', [CustomAuthController::class, 'customLogin'])->name('custom.login');
Route::get('/register', [CustomAuthController::class, 'Register'])->name('register');
Route::post('/custom-register', [CustomAuthController::class, 'customRegister'])->name('custom.register');
Route::get('/dashboard',[CustomAuthController::class, 'dashboard'])->name('dashboard');
Route::get('/logout',[CustomAuthController::class, 'logOut'])->name('logout');

Route::middleware('auth')->group(function(){
    Route::get('/profile',[ProfileController::class,'showProfile'])->name('profile.show');
    Route::get('/settings',[SettingsController::class,'index'])->name('settings');
});

Route::resource('product', ProductController::class)->names([
    'create' => 'product.create',
    'store' => 'product.store',
    'edit' => 'product.edit',
    'update' => 'product.update',
    'destroy' => 'product.delete',

]);

Route::resource('category',CategoryController::class)->names([
    'create' => 'category.create',
    'store' => 'category.store',
    'edit' => 'category.edit',
    'update' => 'category.update',
    'destroy' => 'category.delete',

]);
