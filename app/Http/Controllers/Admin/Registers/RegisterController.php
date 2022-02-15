<?php

namespace App\Http\Controllers\Admin\Registers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function postCustomerForm(Request $request)
    {
        $this->validate($request, [
            'fullname' => 'required',
            'category' => 'required'
        ]);

    }

    public function postUserForm(Request $request)
    {
        $this->validate($request, [
            'fullname' => 'required',
            'login' => 'required',
            'password' => 'required',
            'profile' => 'required'
        ]);
    }

    public function postCategoryForm(Request $request)
    {
        $this->validate($request, [
            'category' => 'required'
        ]);
    }
}
