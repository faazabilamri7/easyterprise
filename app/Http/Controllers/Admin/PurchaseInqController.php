<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Requests\MassDestroyPurchaseInqRequest;
use App\Http\Requests\StorePurchaseInqRequest;
use App\Http\Requests\UpdatePurchaseInqRequest;
use App\Models\Material;
use App\Models\PurchaseInq;
use App\Models\RequestForQuotation;
use App\Models\Vendor;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class PurchaseInqController extends Controller
{
    use CsvImportTrait;

    public function index(Request $request)
    {
        abort_if(Gate::denies('purchase_inq_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = PurchaseInq::with(['id_request_for_quotation', 'vendor_name', 'material_name'])->select(sprintf('%s.*', (new PurchaseInq())->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate = 'purchase_inq_show';
                $editGate = 'purchase_inq_edit';
                $deleteGate = 'purchase_inq_delete';
                $crudRoutePart = 'purchase-inqs';

                return view('partials.datatablesActions', compact(
                'viewGate',
                'editGate',
                'deleteGate',
                'crudRoutePart',
                'row'
            ));
            });

            $table->editColumn('id_purchase_inquiry', function ($row) {
                return $row->id_purchase_inquiry ? $row->id_purchase_inquiry : '';
            });
            $table->addColumn('id_request_for_quotation_id_request_for_quotation', function ($row) {
                return $row->id_request_for_quotation ? $row->id_request_for_quotation->id_request_for_quotation : '';
            });

            $table->addColumn('vendor_name_nama_vendor', function ($row) {
                return $row->vendor_name ? $row->vendor_name->nama_vendor : '';
            });

            $table->addColumn('material_name_name_material', function ($row) {
                return $row->material_name ? $row->material_name->name_material : '';
            });

            $table->editColumn('qty', function ($row) {
                return $row->qty ? $row->qty : '';
            });

            $table->rawColumns(['actions', 'placeholder', 'id_request_for_quotation', 'vendor_name', 'material_name']);

            return $table->make(true);
        }

        return view('admin.purchaseInqs.index');
    }

    public function create()
    {
        abort_if(Gate::denies('purchase_inq_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $id_request_for_quotations = RequestForQuotation::pluck('id_request_for_quotation', 'id')->prepend(trans('global.pleaseSelect'), '');

        $vendor_names = Vendor::pluck('nama_vendor', 'id')->prepend(trans('global.pleaseSelect'), '');

        $material_names = Material::pluck('name_material', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.purchaseInqs.create', compact('id_request_for_quotations', 'material_names', 'vendor_names'));
    }

    public function store(StorePurchaseInqRequest $request)
    {
        $purchaseInq = PurchaseInq::create($request->all());

        return redirect()->route('admin.purchase-inqs.index');
    }

    public function edit(PurchaseInq $purchaseInq)
    {
        abort_if(Gate::denies('purchase_inq_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $id_request_for_quotations = RequestForQuotation::pluck('id_request_for_quotation', 'id')->prepend(trans('global.pleaseSelect'), '');

        $vendor_names = Vendor::pluck('nama_vendor', 'id')->prepend(trans('global.pleaseSelect'), '');

        $material_names = Material::pluck('name_material', 'id')->prepend(trans('global.pleaseSelect'), '');

        $purchaseInq->load('id_request_for_quotation', 'vendor_name', 'material_name');

        return view('admin.purchaseInqs.edit', compact('id_request_for_quotations', 'material_names', 'purchaseInq', 'vendor_names'));
    }

    public function update(UpdatePurchaseInqRequest $request, PurchaseInq $purchaseInq)
    {
        $purchaseInq->update($request->all());

        return redirect()->route('admin.purchase-inqs.index');
    }

    public function show(PurchaseInq $purchaseInq)
    {
        abort_if(Gate::denies('purchase_inq_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $purchaseInq->load('id_request_for_quotation', 'vendor_name', 'material_name', 'idPurchaseInquiryPurchaseQuotations');

        return view('admin.purchaseInqs.show', compact('purchaseInq'));
    }

    public function destroy(PurchaseInq $purchaseInq)
    {
        abort_if(Gate::denies('purchase_inq_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $purchaseInq->delete();

        return back();
    }

    public function massDestroy(MassDestroyPurchaseInqRequest $request)
    {
        PurchaseInq::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
