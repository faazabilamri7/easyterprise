<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Requests\MassDestroyPurchaseQuotationRequest;
use App\Http\Requests\StorePurchaseQuotationRequest;
use App\Http\Requests\UpdatePurchaseQuotationRequest;
use App\Models\PurchaseInq;
use App\Models\PurchaseQuotation;
use App\Models\Vendor;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class PurchaseQuotationController extends Controller
{
    use CsvImportTrait;

    public function index(Request $request)
    {
        abort_if(Gate::denies('purchase_quotation_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = PurchaseQuotation::with(['id_purchase_inquiry', 'id_vendor'])->select(sprintf('%s.*', (new PurchaseQuotation())->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate = 'purchase_quotation_show';
                $editGate = 'purchase_quotation_edit';
                $deleteGate = 'purchase_quotation_delete';
                $crudRoutePart = 'purchase-quotations';

                return view('partials.datatablesActions', compact(
                'viewGate',
                'editGate',
                'deleteGate',
                'crudRoutePart',
                'row'
            ));
            });

            $table->editColumn('id_purchase_quotation', function ($row) {
                return $row->id_purchase_quotation ? $row->id_purchase_quotation : '';
            });
            $table->addColumn('id_purchase_inquiry_id_purchase_inquiry', function ($row) {
                return $row->id_purchase_inquiry ? $row->id_purchase_inquiry->id_purchase_inquiry : '';
            });

            $table->addColumn('id_vendor_nama_vendor', function ($row) {
                return $row->id_vendor ? $row->id_vendor->nama_vendor : '';
            });

            $table->editColumn('material_name', function ($row) {
                return $row->material_name ? PurchaseQuotation::MATERIAL_NAME_SELECT[$row->material_name] : '';
            });
            $table->editColumn('unit_price', function ($row) {
                return $row->unit_price ? $row->unit_price : '';
            });
            $table->editColumn('total_price', function ($row) {
                return $row->total_price ? $row->total_price : '';
            });
            $table->editColumn('payment_method', function ($row) {
                return $row->payment_method ? PurchaseQuotation::PAYMENT_METHOD_SELECT[$row->payment_method] : '';
            });
            $table->editColumn('status', function ($row) {
                return $row->status ? PurchaseQuotation::STATUS_SELECT[$row->status] : '';
            });

            $table->rawColumns(['actions', 'placeholder', 'id_purchase_inquiry', 'id_vendor']);

            return $table->make(true);
        }

        return view('admin.purchaseQuotations.index');
    }

    public function create()
    {
        abort_if(Gate::denies('purchase_quotation_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $id_purchase_inquiries = PurchaseInq::pluck('id_purchase_inquiry', 'id')->prepend(trans('global.pleaseSelect'), '');

        $id_vendors = Vendor::pluck('nama_vendor', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.purchaseQuotations.create', compact('id_purchase_inquiries', 'id_vendors'));
    }

    public function store(StorePurchaseQuotationRequest $request)
    {
        $purchaseQuotation = PurchaseQuotation::create($request->all());

        return redirect()->route('admin.purchase-quotations.index');
    }

    public function edit(PurchaseQuotation $purchaseQuotation)
    {
        abort_if(Gate::denies('purchase_quotation_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $id_purchase_inquiries = PurchaseInq::pluck('id_purchase_inquiry', 'id')->prepend(trans('global.pleaseSelect'), '');

        $id_vendors = Vendor::pluck('nama_vendor', 'id')->prepend(trans('global.pleaseSelect'), '');

        $purchaseQuotation->load('id_purchase_inquiry', 'id_vendor');

        return view('admin.purchaseQuotations.edit', compact('id_purchase_inquiries', 'id_vendors', 'purchaseQuotation'));
    }

    public function update(UpdatePurchaseQuotationRequest $request, PurchaseQuotation $purchaseQuotation)
    {
        $purchaseQuotation->update($request->all());

        return redirect()->route('admin.purchase-quotations.index');
    }

    public function show(PurchaseQuotation $purchaseQuotation)
    {
        abort_if(Gate::denies('purchase_quotation_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $purchaseQuotation->load('id_purchase_inquiry', 'id_vendor', 'idPurchaseQuotationPurchaseOrders');

        return view('admin.purchaseQuotations.show', compact('purchaseQuotation'));
    }

    public function destroy(PurchaseQuotation $purchaseQuotation)
    {
        abort_if(Gate::denies('purchase_quotation_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $purchaseQuotation->delete();

        return back();
    }

    public function massDestroy(MassDestroyPurchaseQuotationRequest $request)
    {
        PurchaseQuotation::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
