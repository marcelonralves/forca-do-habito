<?php

namespace App\Http\Controllers\Admin\Registers;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\View\View;

class RegisterViewController extends Controller
{
    public function showCustomerForm(): View
    {
        $categories = Category::all();
        return view('admin.form.customer', compact('categories'));
    }

    public function showUserForm(): View
    {
        $categories = Category::all();
        return view('admin.form.user', compact('categories'));
    }

    public function showCategoryForm(): View
    {
        return view('admin.form.category');
    }
}
