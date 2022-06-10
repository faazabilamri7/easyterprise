<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Requests\MassDestroySalesReportRequest;
use App\Http\Requests\StoreSalesReportRequest;
use App\Http\Requests\UpdateSalesReportRequest;
use App\Models\SalesOrder;
use App\Models\SalesReport;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SalesReportController extends Controller
{
    use CsvImportTrait;

    public function index()
    {
        abort_if(Gate::denies('sales_report_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $salesReports = SalesReport::with(['status', 'tgl_sales_order', 'no_sales_order'])->get();

        return view('frontend.salesReports.index', compact('salesReports'));
    }

    public function create()
    {
        abort_if(Gate::denies('sales_report_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $statuses = SalesOrder::pluck('status', 'id')->prepend(trans('global.pleaseSelect'), '');

        $tgl_sales_orders = SalesOrder::pluck('tanggal', 'id')->prepend(trans('global.pleaseSelect'), '');

        $no_sales_orders = SalesOrder::pluck('no_sales_order', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('frontend.salesReports.create', compact('no_sales_orders', 'statuses', 'tgl_sales_orders'));
    }

    public function store(StoreSalesReportRequest $request)
    {
        $salesReport = SalesReport::create($request->all());

        return redirect()->route('frontend.sales-reports.index');
    }

    public function edit(SalesReport $salesReport)
    {
        abort_if(Gate::denies('sales_report_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $statuses = SalesOrder::pluck('status', 'id')->prepend(trans('global.pleaseSelect'), '');

        $tgl_sales_orders = SalesOrder::pluck('tanggal', 'id')->prepend(trans('global.pleaseSelect'), '');

        $no_sales_orders = SalesOrder::pluck('no_sales_order', 'id')->prepend(trans('global.pleaseSelect'), '');

        $salesReport->load('status', 'tgl_sales_order', 'no_sales_order');

        return view('frontend.salesReports.edit', compact('no_sales_orders', 'salesReport', 'statuses', 'tgl_sales_orders'));
    }

    public function update(UpdateSalesReportRequest $request, SalesReport $salesReport)
    {
        $salesReport->update($request->all());

        return redirect()->route('frontend.sales-reports.index');
    }

    public function show(SalesReport $salesReport)
    {
        abort_if(Gate::denies('sales_report_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $salesReport->load('status', 'tgl_sales_order', 'no_sales_order');

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
