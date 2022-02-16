<?php

namespace App\Http\Controllers\Admin\Registers;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Registers\PostCustomerRegisterRequest;
use App\Http\Requests\Admin\Registers\PostCategoryRegisterRequest;
use App\Http\Requests\Admin\Registers\PostUserRegisterRequest;
use App\Repositories\RegisterRepository;
use Illuminate\Http\RedirectResponse;

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
