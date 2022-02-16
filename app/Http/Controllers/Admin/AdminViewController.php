<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Customer;
use App\Models\User;
use App\Repositories\AdminRepository;
use Carbon\Carbon;
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

    public function login(): View
    {
        return view('admin.login');
    }
}
