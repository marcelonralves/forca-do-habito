<?php

namespace App\Repositories;

use App\Models\Category;
use App\Models\Customer;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class ReportRepository
{
    public function updateCategory(array $data)
    {
        $category = Category::find($data['id']);
        $category->update($data);
    }

    public function updateCustomer(array $data)
    {
        $customer = Customer::find($data['id']);
        $customer->update($data);
    }
    public function updateUser(array $data)
    {
        $user = User::find($data['id']);
        $user->update($data);
    }

    public function deleteCategory(array $data)
    {
        $category = Category::find($data['id']);
        $category->destroy($data['id']);
    }

    public function deleteCustomer(array $data)
    {
        $customer = Customer::find($data['id']);
        $customer->destroy($data['id']);
    }

    public function deleteUser(array $data)
    {
        $user = User::find($data['id']);
        $user->destroy($data['id']);
    }

    public function updatePassword(array $data)
    {
        $user = User::find($data['id']);
        $user->password = Hash::make($data['password']);
        $user->save();
    }
}
