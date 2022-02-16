<?php

namespace App\Http\Controllers\Admin\Reports;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Customer;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

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

        return redirect('/admin/relatorios/categorias')->with(["message" => "Categoria atualizada para '$request->title' com sucesso!"]);
    }

    public function postCustomerReport(Request $request, int $id)
    {
        $request->merge(["id" => $id]);
        $this->validate($request, [
            'id' => 'required|exists:customers,id',
            'full_name' => 'required',
            'category_id' => 'required|exists:categories,id',
            'profile' => 'required'
        ]);

        $category = Customer::find($request->id);
        $category->update($request->only('full_name', 'category_id', 'profile'));

        return redirect('/admin/relatorios/clientes')->with(["message" => "Cliente '$request->full_name' atualizado(a) com sucesso!"]);
    }

    public function postUserReport(Request $request, int $id)
    {
        $request->merge(["id" => $id]);
        $this->validate($request, [
            'id' => 'required|exists:users,id',
            'full_name' => 'required',
            'username' => 'required|unique:users,username'
        ]);

        $category = User::find($request->id);
        $category->update($request->only('full_name', 'username' , 'profile'));

        return redirect('/admin/relatorios/usuarios')->with(["message" => "Usuário '$request->full_name' atualizado(a) com sucesso!"]);
    }

    public function deleteCategoryReport(Request $request, int $id)
    {
        $request->merge(["id" => $id]);
        $this->validate($request, [
            'id' => 'required|exists:categories,id'
        ]);

        Category::destroy($id);

        return back()->with('message', 'Categoria deletada som sucesso!');
    }

    public function deleteCustomerReport(Request $request, int $id)
    {
        $request->merge(["id" => $id]);
        $this->validate($request, [
            'id' => 'required|exists:customers,id'
        ]);

        Customer::destroy($id);

        return back()->with('message', 'Cliente deletado som sucesso!');
    }

    public function deleteUserReport(Request $request, int $id)
    {
        $request->merge(["id" => $id]);
        $this->validate($request, [
            'id' => 'required|exists:users,id'
        ]);

        User::destroy($id);

        return back()->with('message', 'Usuário(a) deletado(a) som sucesso!');
    }

    public function postUserPassReport(Request $request, int $id)
    {
        $request->merge(["id" => $id]);
        $this->validate($request, [
            'id' => 'required|exists:users,id',
            'new_password' => 'required',
            'repeat_new_password' => 'required'
        ]);

        if($request->input('new_password') != $request->input('repeat_new_password')){
            return back()->withErrors('As senhas não conferem');
        }

        $user = User::find($id);
        $user->password = Hash::make($request->input('new_password'));
        $user->save();

        return back()->with('message', 'As senhas foi atualizada com sucesso');
    }
}
