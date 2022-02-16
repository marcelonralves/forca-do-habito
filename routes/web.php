<?php

use App\Http\Controllers\Admin\AdminViewController;
use App\Http\Controllers\Admin\Registers\RegisterController;
use App\Http\Controllers\Admin\Registers\RegisterViewController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Admin\Reports\ReportController;
use App\Http\Controllers\Admin\Reports\ReportViewController;
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

Route::get('/admin/login', [AdminViewController::class, 'login']);
Route::post('/admin/login', [AuthController::class, 'postLogin'])->name('postLogin');
Route::get('/admin', [AdminViewController::class, 'dashboard']);


Route::get('/admin/cadastrar/cliente', [RegisterViewController::class, 'showCustomerForm'])->name('showCustomerForm');
Route::post('/admin/cadastrar/cliente', [RegisterController::class, 'postCustomerForm'])->name('customerPostForm');
Route::get('/admin/cadastrar/usuario', [RegisterViewController::class, 'showUserForm'])->name('showUserForm');
Route::post('/admin/cadastrar/usuario', [RegisterController::class, 'postUserForm'])->name('userPostForm');
Route::get('/admin/cadastrar/categoria', [RegisterViewController::class, 'showCategoryForm'])->name('showCategoryForm');
Route::post('/admin/cadastrar/categoria', [RegisterController::class, 'postCategoryForm'])->name('categoryPostForm');


Route::get('/admin/relatorios/clientes/{id?}/edit', [ReportViewController::class, 'editCustomerReport']);
Route::get('/admin/relatorios/usuarios/{id?}/edit', [ReportViewController::class, 'editUserReport']);
Route::get('/admin/relatorios/categorias/{id?}/edit', [ReportViewController::class, 'editCategoryReport']);

Route::post('/admin/relatorios/clientes/{id?}/edit', [ReportController::class, 'postCustomerReport'])->name('CustomerPostReport');
Route::post('/admin/relatorios/usuarios/{id?}/edit', [ReportController::class, 'postUserReport'])->name('UserPostReport');
Route::post('/admin/relatorios/categorias/{id?}/edit', [ReportController::class, 'postCategoryReport'])->name('CategoryPostReport');



Route::get('/admin/relatorios/clientes', [ReportViewController::class, 'showCustomerReport'])->name('showCustomerReport');
Route::post('/admin/relatorios/clientes', [ReportController::class, 'postCustomerReport']);
Route::get('/admin/relatorios/usuarios', [ReportViewController::class, 'showUserReport'])->name('showUserReport');
Route::post('/admin/relatorios/usuarios', [ReportController::class, 'postUserReport']);

Route::get('/admin/relatorios/categorias', [ReportViewController::class, 'showCategoryReport'])->name('showCategoryReport');
Route::post('/admin/relatorios/categorias', [ReportController::class, 'postCategoryReport']);
