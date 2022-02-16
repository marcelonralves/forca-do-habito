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
        Route::get('cadastrar/cliente', 'showCustomerForm')->name('admin.form.customer.register');
        Route::get('cadastrar/usuario', 'showUserForm')->name('admin.form.user.register');
        Route::get('cadastrar/categoria', 'showCategoryForm')->name('admin.form.category.register');
    });

    /*
     * REGISTER ROUTES - POSTS
     */
    Route::controller(RegisterController::class)->group(function () {
        Route::post('cadastrar/cliente', 'postCustomerForm')->name('admin.post.customer.register');
        Route::post('cadastrar/usuario', 'postUserForm')->name('admin.post.user.register');
        Route::post('cadastrar/categoria', 'postCategoryForm')->name('admin.post.category.register');
    });

    /*
     * REPORTS ROUTES - VIEWS
     */
    Route::controller(ReportViewController::class)->group(function () {
        Route::get('relatorios/clientes/{id}/edit', 'editCustomerReport');
        Route::get('relatorios/usuarios/{id}/edit', 'editUserReport');
        Route::get('relatorios/categorias/{id}/edit', 'editCategoryReport');
        Route::get('relatorios/clientes', 'showCustomerReport')->name('admin.show.customer.report');
        Route::get('relatorios/usuarios', 'showUserReport')->name('admin.show.user.report');
        Route::get('relatorios/categorias', 'showCategoryReport')->name('admin.show.category.report');
    });

    /*
    * REPORTS ROUTES - POSTS
    */
    Route::controller(ReportController::class)->group(function () {
        //ACTION - EDIT
        Route::post('relatorios/clientes/{id}/edit', 'postCustomerReport')->name('admin.post.customer.report');
        Route::post('relatorios/usuarios/{id}/edit', 'postUserReport')->name('admin.post.user.report');
        Route::post('relatorios/categorias/{id}/edit', 'postCategoryReport')->name('admin.post.category.report');
        Route::post('relatorios/usuarios/{id}/pass', 'postUserPassReport')->name('admin.post.password');

        //ACTION - DELETE
        Route::get('relatorios/clientes/{id}/del', 'deleteCustomerReport');
        Route::get('relatorios/usuarios/{id}/del', 'deleteUserReport');
        Route::get('relatorios/categorias/{id}/del', 'deleteCategoryReport');
    });
});
