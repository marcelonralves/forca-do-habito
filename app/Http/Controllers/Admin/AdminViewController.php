<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Repositories\AdminRepository;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class AdminViewController extends Controller
{
    private AdminRepository $repository;

    public function __construct(AdminRepository $repository)
    {
        $this->repository = $repository;
    }

    public function dashboard(): View
    {
        $countCards = $this->repository->countTables();
        $pizzaCustomer = $this->repository->listCount();
        $countRegs = $this->repository->countCustomersRegister();

        return view('admin.dashboard', compact('countCards', 'pizzaCustomer', 'countRegs'));
    }

    public function login(): View|RedirectResponse
    {
        if(Auth::check()) {
            return redirect()->route("admin.dashboard");
        }

        return view('admin.login');
    }
}
