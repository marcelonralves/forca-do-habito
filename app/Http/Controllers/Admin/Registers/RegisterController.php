<?php

namespace App\Http\Controllers\Admin\Registers;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Customer;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function postCustomerForm(Request $request)
    {
        $this->validate($request, [
            'full_name' => 'required',
            'category_id' => 'required',
            'profile' => 'required'
        ]);

        $customer = Customer::create($request->only(['full_name', 'category_id', 'profile']));

        return back()->with(["message" => "O cliente <b>{$customer->fullname}</b> foi criado com sucesso"]);
    }

    public function postUserForm(Request $request)
    {
        $this->validate($request, [
            'full_name' => 'required',
            'username' => 'required|unique:users',
            'password' => 'required',
            'profile' => 'required'
        ]);

        $request->merge(["password" => Hash::make($request->password)]);
        $user = User::create($request->only(['full_name', 'username', 'password', 'profile']));

        return back()->with(["message" => "Usuário <b>{$user->login}</b> criado com sucesso!"]);
    }

    public function postCategoryForm(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|unique:categories'
        ]);

        $category = Category::create($request->only('title'));


        return back()->with(["message" => "A categoria <b>{$category->title}</b> foi criada com sucesso!"]);
    }
}
