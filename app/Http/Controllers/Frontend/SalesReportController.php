<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroySalesReportRequest;
use App\Http\Requests\StoreSalesReportRequest;
use App\Http\Requests\UpdateSalesReportRequest;
use App\Models\SalesReport;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SalesReportController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('sales_report_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $salesReports = SalesReport::all();

        return view('frontend.salesReports.index', compact('salesReports'));
    }

    public function create()
    {
        abort_if(Gate::denies('sales_report_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('frontend.salesReports.create');
    }

    public function store(StoreSalesReportRequest $request)
    {
        $salesReport = SalesReport::create($request->all());

        return redirect()->route('frontend.sales-reports.index');
    }

    public function edit(SalesReport $salesReport)
    {
        abort_if(Gate::denies('sales_report_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('frontend.salesReports.edit', compact('salesReport'));
    }

    public function update(UpdateSalesReportRequest $request, SalesReport $salesReport)
    {
        $salesReport->update($request->all());

        return redirect()->route('frontend.sales-reports.index');
    }

    public function show(SalesReport $salesReport)
    {
        abort_if(Gate::denies('sales_report_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('frontend.salesReports.show', compact('salesReport'));
    }

    public function destroy(SalesReport $salesReport)
    {
        abort_if(Gate::denies('sales_report_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $salesReport->delete();

        return back();
    }

    public function massDestroy(MassDestroySalesReportRequest $request)
    {
        SalesReport::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
