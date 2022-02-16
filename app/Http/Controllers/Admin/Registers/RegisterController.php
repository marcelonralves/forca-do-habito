<?php

namespace App\Http\Controllers\Admin\Registers;

use App\Http\Controllers\Controller;
use App\Http\Requests\PostCategoryRegisterRequest;
use App\Http\Requests\PostCustomerRegisterRequest;
use App\Http\Requests\PostUserRegisterRequest;
use App\Models\Category;
use App\Models\Customer;
use App\Models\User;
use App\Repositories\RegisterRepository;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    private RegisterRepository $repository;

    public function __construct(RegisterRepository $repository)
    {
        $this->repository = $repository;
    }

    public function postCustomerForm(PostCustomerRegisterRequest $request): RedirectResponse
    {
        $this->repository->createCustomer($request->validated());

        return back()->with("message", "O cliente '{$request->full_name}' foi criado com sucesso");
    }

    public function postUserForm(PostUserRegisterRequest $request): RedirectResponse
    {
        $this->repository->createUser($request->validated());

        return back()->with("message", "O usuário '{$request->username}' foi criado com sucesso");
    }

    public function postCategoryForm(PostCategoryRegisterRequest $request): RedirectResponse
    {
        $this->repository->createCategory($request->validated());

        return back()->with("message", "A categoria '{$request->title}' foi criada com sucesso!");
    }
}
