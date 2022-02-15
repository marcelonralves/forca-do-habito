<?php

use App\Http\Controllers\Admin\AdminViewController;
use App\Http\Controllers\Admin\Registers\RegisterController;
use App\Http\Controllers\Admin\Registers\RegisterViewController;
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

Route::get('/admin', [AdminViewController::class, 'dashboard']);
Route::get('/admin/cadastrar/cliente', [RegisterViewController::class, 'showCustomerForm'])->name('showCustomerForm');
Route::post('/admin/cadastrar/cliente', [RegisterController::class, 'postCustomerForm'])->name('customerPostForm');

Route::get('/admin/cadastrar/usuario', [RegisterViewController::class, 'showUserForm'])->name('showUserForm');
Route::post('/admin/cadastrar/usuario', [RegisterController::class, 'postUserForm'])->name('userPostForm');

Route::get('/admin/cadastrar/categoria', [RegisterViewController::class, 'showCategoryForm'])->name('showCategoryForm');
Route::post('/admin/cadastrar/categoria', [RegisterController::class, 'postCategoryForm'])->name('categoryPostForm');


Route::get('/admin/relatorio/{provider}', [AdminViewController::class, 'dashboard']);

Route::resource('cadastrar','CustomerRegister');
