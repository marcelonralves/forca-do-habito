<?php

namespace App\Http\Controllers\Admin\Reports;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Customer;
use App\Models\User;
use Illuminate\Http\Request;

class ReportViewController extends Controller
{

    public function showCustomerReport(Request $request)
    {
        $customers = Customer::paginate(10);

        return view('admin.reports.customer', compact('customers'));
    }

    public function showUserReport(Request $request)
    {
        $users = User::paginate(10);

        return view('admin.reports.user', compact('users'));
    }

    public function showCategoryReport(Request $request)
    {
        $categories = Category::paginate(10);

        return view('admin.reports.category', compact('categories'));
    }

    public function editUserReport(Request $request, int $id)
    {
        $request->merge(['id' => $id]);
        $this->validate($request, [
            'id' => 'required|exists:users,id'
        ]);

        $user = User::find($request->input('id'));

        $categories = Category::all();

        return view('admin.form.user', compact('user', 'categories'));
    }

    public function editCustomerReport(Request $request, int $id)
    {
        $request->merge(['id' => $id]);
        $this->validate($request, [
            'id' => 'required|exists:customers,id'
        ]);

        $customer = Customer::find($request->input('id'));

        $categories = Category::all();

        return view('admin.form.customer', compact('customer', 'categories'));
    }

    public function editCategoryReport(Request $request, int $id)
    {
        $request->merge(['id' => $id]);
        $this->validate($request, [
            'id' => 'required|exists:categories,id'
        ]);

        $category = Category::find($request->input('id'));

        return view('admin.form.category', compact('category'));
    }
}
