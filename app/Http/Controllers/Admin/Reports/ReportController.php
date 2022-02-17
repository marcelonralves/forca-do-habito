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
use Illuminate\Http\RedirectResponse;

class ReportController extends Controller
{
    private ReportRepository $repository;

    public function __construct(ReportRepository $repository)
    {
        $this->repository = $repository;
    }

    public function postCategoryReport(PostCategoryReportRequest $request): RedirectResponse
    {
        $this->repository->updateCategory($request->validated());

        return redirect()->route('admin.show.category.report')->with(["message" => "Categoria atualizada para '$request->title' com sucesso!"]);
    }

    public function postCustomerReport(PostCustomerReportRequest $request): RedirectResponse
    {
        $this->repository->updateCustomer($request->validated());

        return redirect()->route('admin.show.customer.report')->with(["message" => "Cliente '$request->full_name' atualizado(a) com sucesso!"]);
    }

    public function postUserReport(PostUserReportRequest $request): RedirectResponse
    {
        $this->repository->updateUser($request->validated());

        return redirect()->route('admin.show.user.report')->with(["message" => "Usuário '$request->full_name' atualizado(a) com sucesso!"]);
    }

    public function deleteCategoryReport(DeleteCategoryReportRequest $request): RedirectResponse
    {
        $this->repository->deleteCategory($request->validated());

        return redirect()->route('admin.show.category.report')->with('message', 'Categoria deletada com sucesso!');
    }

    public function deleteCustomerReport(DeleteCustomerReportRequest $request): RedirectResponse
    {
        $this->repository->deleteCustomer($request->validated());

        return redirect()->route('admin.show.customer.report')->with('message', 'Cliente deletado com sucesso!');
    }

    public function deleteUserReport(DeleteUserReportRequest $request): RedirectResponse
    {
        $this->repository->deleteUser($request->validated());

        return redirect()->route('admin.show.user.report')->with('message', 'Usuário(a) deletado(a) com sucesso!');
    }

    public function postUserPassReport(PostPasswordUserReportRequest $request): RedirectResponse
    {
        $this->repository->updatePassword($request->validated());

        return redirect()->route('admin.show.user.report')->with('message', 'A senha foi atualizada com sucesso');
    }
}
