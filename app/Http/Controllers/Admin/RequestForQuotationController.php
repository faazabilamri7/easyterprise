<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Requests\MassDestroyRequestForQuotationRequest;
use App\Http\Requests\StoreRequestForQuotationRequest;
use App\Http\Requests\UpdateRequestForQuotationRequest;
use App\Models\Material;
use App\Models\PurchaseRequition;
use App\Models\RequestForQuotation;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class RequestForQuotationController extends Controller
{
    use CsvImportTrait;

    public function index(Request $request)
    {
        abort_if(Gate::denies('request_for_quotation_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = RequestForQuotation::with(['id_purchase_requisition', 'material_name'])->select(sprintf('%s.*', (new RequestForQuotation())->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate = 'request_for_quotation_show';
                $editGate = 'request_for_quotation_edit';
                $deleteGate = 'request_for_quotation_delete';
                $crudRoutePart = 'request-for-quotations';

                return view('partials.datatablesActions', compact(
                'viewGate',
                'editGate',
                'deleteGate',
                'crudRoutePart',
                'row'
            ));
            });

            $table->editColumn('id_request_for_quotation', function ($row) {
                return $row->id_request_for_quotation ? $row->id_request_for_quotation : '';
            });
            $table->addColumn('id_purchase_requisition_id_purchase_requition', function ($row) {
                return $row->id_purchase_requisition ? $row->id_purchase_requisition->id_purchase_requition : '';
            });

            $table->addColumn('material_name_name_material', function ($row) {
                return $row->material_name ? $row->material_name->name_material : '';
            });

            $table->editColumn('qty', function ($row) {
                return $row->qty ? $row->qty : '';
            });
            $table->editColumn('unit_price', function ($row) {
                return $row->unit_price ? $row->unit_price : '';
            });
            $table->editColumn('total_price', function ($row) {
                return $row->total_price ? $row->total_price : '';
            });
            $table->editColumn('description', function ($row) {
                return $row->description ? $row->description : '';
            });
            $table->editColumn('status', function ($row) {
                return $row->status ? RequestForQuotation::STATUS_SELECT[$row->status] : '';
            });

            $table->rawColumns(['actions', 'placeholder', 'id_purchase_requisition', 'material_name']);

            return $table->make(true);
        }

        return view('admin.requestForQuotations.index');
    }

    public function create()
    {
        abort_if(Gate::denies('request_for_quotation_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $id_purchase_requisitions = PurchaseRequition::pluck('id_purchase_requition', 'id')->prepend(trans('global.pleaseSelect'), '');

        $material_names = Material::pluck('name_material', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.requestForQuotations.create', compact('id_purchase_requisitions', 'material_names'));
    }

    public function store(StoreRequestForQuotationRequest $request)
    {
        $requestForQuotation = RequestForQuotation::create($request->all());

        return redirect()->route('admin.request-for-quotations.index');
    }

    public function edit(RequestForQuotation $requestForQuotation)
    {
        abort_if(Gate::denies('request_for_quotation_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $id_purchase_requisitions = PurchaseRequition::pluck('id_purchase_requition', 'id')->prepend(trans('global.pleaseSelect'), '');

        $material_names = Material::pluck('name_material', 'id')->prepend(trans('global.pleaseSelect'), '');

        $requestForQuotation->load('id_purchase_requisition', 'material_name');

        return view('admin.requestForQuotations.edit', compact('id_purchase_requisitions', 'material_names', 'requestForQuotation'));
    }

    public function update(UpdateRequestForQuotationRequest $request, RequestForQuotation $requestForQuotation)
    {
        $requestForQuotation->update($request->all());

        return redirect()->route('admin.request-for-quotations.index');
    }

    public function show(RequestForQuotation $requestForQuotation)
    {
        abort_if(Gate::denies('request_for_quotation_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $requestForQuotation->load('id_purchase_requisition', 'material_name', 'idRequestForQuotationPurchaseInqs');

        return view('admin.requestForQuotations.show', compact('requestForQuotation'));
    }

    public function destroy(RequestForQuotation $requestForQuotation)
    {
        abort_if(Gate::denies('request_for_quotation_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $requestForQuotation->delete();

        return back();
    }

    public function massDestroy(MassDestroyRequestForQuotationRequest $request)
    {
        RequestForQuotation::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
