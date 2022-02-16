<?php

namespace App\Repositories;

use App\Models\Category;
use App\Models\Customer;
use App\Models\User;

class RegisterRepository
{

    public function createUser(array $data)
    {
        User::create($data);
    }

    public function createCustomer(array $data)
    {
        Customer::create($data);
    }

    public function createCategory(array $data)
    {
        Category::create($data);
    }
}
