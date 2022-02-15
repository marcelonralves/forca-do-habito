<?php

namespace App\Http\Controllers\Reports;

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
}
