<?php

namespace App\Http\Controllers\Admin\Reports;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Customer;
use App\Models\User;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function postCategoryReport(Request $request, int $id)
    {
        $request->merge(["id" => $id]);
        $this->validate($request, [
            'id' => 'required|exists:categories,id',
            'title' => 'required'
        ]);

        $category = Category::find($request->id);
        $category->update($request->only('title'));

        return redirect('/admin/relatorios/categorias')->with(["message" => "Categoria '$request->title' atualizada com sucesso!"]);
    }

    public function postCustomerReport(Request $request, int $id)
    {
        $request->merge(["id" => $id]);
        $this->validate($request, [
            'id' => 'required|exists:categories,id',
            'title' => 'required'
        ]);

        $category = Customer::find($request->id);
        $category->update($request->only('title'));

        return back()->with(["message" => "Categoria atualizada com sucesso!"]);
    }
}
