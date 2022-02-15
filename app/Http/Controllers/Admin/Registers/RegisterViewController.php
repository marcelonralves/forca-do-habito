<?php

namespace App\Http\Controllers\Admin\Registers;

use App\Http\Controllers\Controller;

class RegisterViewController extends Controller
{
    public function showForm()
    {
        return view('admin.form.customer');
    }
}
