<?php

namespace App\Http\Controllers\Admin\Reports;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Reports\DeleteCategoryReportRequest;
use App\Http\Requests\Admin\Reports\DeleteCustomerReportRequest;
use App\Http\Requests\Admin\Reports\DeleteUserReportRequest;
use App\Http\Requests\Admin\Reports\PostCategoryReportRequest;
use App\Http\Requests\Admin\Reports\PostCustomerReportRequest;
use App\Http\Requests\Admin\Reports\PostPasswordUserReportRequest;
use App\Http\Requests\Admin\Reports\PostUserReportRequest;
use App\Repositories\ReportRepository;

class ReportController extends Controller
{
    private ReportRepository $repository;

    public function __construct(ReportRepository $repository)
    {
        $this->repository = $repository;
    }

    public function postCategoryReport(PostCategoryReportRequest $request)
    {
        $this->repository->updateCategory($request->validated());

        return redirect()->route('admin.show.category.report')->with(["message" => "Categoria atualizada para '$request->title' com sucesso!"]);
    }

    public function postCustomerReport(PostCustomerReportRequest $request)
    {
        $this->repository->updateCustomer($request->validated());

        return redirect()->route('admin.show.customer.report')->with(["message" => "Cliente '$request->full_name' atualizado(a) com sucesso!"]);
    }

    public function postUserReport(PostUserReportRequest $request)
    {
        $this->repository->updateUser($request->validated());

        return redirect()->route('admin.show.user.report')->with(["message" => "Usuário '$request->full_name' atualizado(a) com sucesso!"]);
    }

    public function deleteCategoryReport(DeleteCategoryReportRequest $request)
    {
        $this->repository->deleteCategory($request->validated());

        return back()->with('message', 'Categoria deletada som sucesso!');
    }

    public function deleteCustomerReport(DeleteCustomerReportRequest $request)
    {
        $this->repository->deleteCustomer($request->validated());

        return back()->with('message', 'Cliente deletado som sucesso!');
    }

    public function deleteUserReport(DeleteUserReportRequest $request)
    {
        $this->repository->deleteUser($request->validated());

        return back()->with('message', 'Usuário(a) deletado(a) com sucesso!');
    }

    public function postUserPassReport(PostPasswordUserReportRequest $request)
    {
        $this->repository->updatePassword($request->validated());

        return back()->with('message', 'A senha foi atualizada com sucesso');
    }
}
