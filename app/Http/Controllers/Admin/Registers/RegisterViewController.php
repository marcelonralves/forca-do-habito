<?php

namespace App\Http\Controllers\Admin\Registers;

use App\Http\Controllers\Controller;
use Illuminate\View\View;

class RegisterViewController extends Controller
{
    public function showCustomerForm(): View
    {
        return view('admin.form.customer');
    }

    public function showUserForm(): View
    {
        return view('admin.form.user');
    }

    public function showCategoryForm(): View
    {
        return view('admin.form.category');
    }
}
