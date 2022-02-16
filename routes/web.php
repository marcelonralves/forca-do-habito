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

Route::get('admin/login', [AdminViewController::class, 'login'])->name('login');
Route::post('admin/login', [AuthController::class, 'postLogin'])->name('postLogin');

Route::prefix('admin')->middleware('auth')->group(function () {

    Route::get('/', [AdminViewController::class, 'dashboard']);


    /*
     * REGISTER ROUTES - VIEWS
     */
    Route::controller(RegisterViewController::class)->group(function () {
        Route::get('cadastrar/cliente', 'showCustomerForm')->name('showCustomerForm');
        Route::get('cadastrar/usuario', 'showUserForm')->name('showUserForm');
        Route::get('cadastrar/categoria', 'showCategoryForm')->name('showCategoryForm');
    });

    /*
     * REGISTER ROUTES - POSTS
     */
    Route::controller(RegisterController::class)->group(function () {
        Route::post('cadastrar/cliente', 'postCustomerForm')->name('customerPostForm');
        Route::post('cadastrar/usuario', 'postUserForm')->name('userPostForm');
        Route::post('cadastrar/categoria', 'postCategoryForm')->name('categoryPostForm');
    });

    /*
     * REPORTS ROUTES - VIEWS
     */
    Route::controller(ReportViewController::class)->group(function () {
        Route::get('relatorios/clientes/{id}/edit', 'editCustomerReport');
        Route::get('relatorios/usuarios/{id}/edit', 'editUserReport');
        Route::get('relatorios/categorias/{id}/edit', 'editCategoryReport');
        Route::get('relatorios/clientes', 'showCustomerReport')->name('showCustomerReport');
        Route::get('relatorios/usuarios', 'showUserReport')->name('showUserReport');
        Route::get('relatorios/categorias', 'showCategoryReport')->name('showCategoryReport');
    });

    /*
    * REPORTS ROUTES - POSTS
    */
    Route::controller(ReportController::class)->group(function () {
        //ACTION - EDIT
        Route::post('relatorios/clientes/{id}/edit', 'postCustomerReport')->name('CustomerPostReport');
        Route::post('relatorios/usuarios/{id}/edit', 'postUserReport')->name('UserPostReport');
        Route::post('relatorios/categorias/{id}/edit', 'postCategoryReport')->name('CategoryPostReport');

        //ACTION - DELETE
        Route::get('relatorios/clientes/{id}/del', 'deleteCustomerReport');
        Route::get('relatorios/usuarios/{id}/del', 'deleteUserReport');
        Route::get('relatorios/categorias/{id}/del', 'deleteCategoryReport');
    });
});
