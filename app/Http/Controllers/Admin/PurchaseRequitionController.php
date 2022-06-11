<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Requests\MassDestroyPurchaseRequitionRequest;
use App\Http\Requests\StorePurchaseRequitionRequest;
use App\Http\Requests\UpdatePurchaseRequitionRequest;
use App\Models\ListOfMaterial;
use App\Models\Material;
use App\Models\PurchaseRequition;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class PurchaseRequitionController extends Controller
{
    use CsvImportTrait;

    public function index(Request $request)
    {
        abort_if(Gate::denies('purchase_requition_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = PurchaseRequition::with(['id_list_of_material', 'material_1', 'material_2', 'material_3', 'material_4', 'material_5', 'material_6'])->select(sprintf('%s.*', (new PurchaseRequition())->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate = 'purchase_requition_show';
                $editGate = 'purchase_requition_edit';
                $deleteGate = 'purchase_requition_delete';
                $crudRoutePart = 'purchase-requitions';

                return view('partials.datatablesActions', compact(
                'viewGate',
                'editGate',
                'deleteGate',
                'crudRoutePart',
                'row'
            ));
            });

            $table->editColumn('id_purchase_requition', function ($row) {
                return $row->id_purchase_requition ? $row->id_purchase_requition : '';
            });
            $table->addColumn('id_list_of_material_id_list_of_material', function ($row) {
                return $row->id_list_of_material ? $row->id_list_of_material->id_list_of_material : '';
            });

            $table->editColumn('status', function ($row) {
                return $row->status ? PurchaseRequition::STATUS_SELECT[$row->status] : '';
            });
            $table->addColumn('material_1_name_material', function ($row) {
                return $row->material_1 ? $row->material_1->name_material : '';
            });

            $table->editColumn('qty_1', function ($row) {
                return $row->qty_1 ? $row->qty_1 : '';
            });
            $table->addColumn('material_2_name_material', function ($row) {
                return $row->material_2 ? $row->material_2->name_material : '';
            });

            $table->editColumn('qty_2', function ($row) {
                return $row->qty_2 ? $row->qty_2 : '';
            });
            $table->addColumn('material_3_name_material', function ($row) {
                return $row->material_3 ? $row->material_3->name_material : '';
            });

            $table->editColumn('qty_3', function ($row) {
                return $row->qty_3 ? $row->qty_3 : '';
            });
            $table->addColumn('material_4_name_material', function ($row) {
                return $row->material_4 ? $row->material_4->name_material : '';
            });

            $table->editColumn('qty_4', function ($row) {
                return $row->qty_4 ? $row->qty_4 : '';
            });
            $table->addColumn('material_5_name_material', function ($row) {
                return $row->material_5 ? $row->material_5->name_material : '';
            });

            $table->editColumn('qty_5', function ($row) {
                return $row->qty_5 ? $row->qty_5 : '';
            });
            $table->addColumn('material_6_name_material', function ($row) {
                return $row->material_6 ? $row->material_6->name_material : '';
            });

            $table->editColumn('qty_6', function ($row) {
                return $row->qty_6 ? $row->qty_6 : '';
            });

            $table->rawColumns(['actions', 'placeholder', 'id_list_of_material', 'material_1', 'material_2', 'material_3', 'material_4', 'material_5', 'material_6']);

            return $table->make(true);
        }

        return view('admin.purchaseRequitions.index');
    }

    public function create()
    {
        abort_if(Gate::denies('purchase_requition_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $id_list_of_materials = ListOfMaterial::pluck('id_list_of_material', 'id')->prepend(trans('global.pleaseSelect'), '');

        $material_1s = Material::pluck('name_material', 'id')->prepend(trans('global.pleaseSelect'), '');

        $material_2s = Material::pluck('name_material', 'id')->prepend(trans('global.pleaseSelect'), '');

        $material_3s = Material::pluck('name_material', 'id')->prepend(trans('global.pleaseSelect'), '');

        $material_4s = Material::pluck('name_material', 'id')->prepend(trans('global.pleaseSelect'), '');

        $material_5s = Material::pluck('name_material', 'id')->prepend(trans('global.pleaseSelect'), '');

        $material_6s = Material::pluck('name_material', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.purchaseRequitions.create', compact('id_list_of_materials', 'material_1s', 'material_2s', 'material_3s', 'material_4s', 'material_5s', 'material_6s'));
    }

    public function store(StorePurchaseRequitionRequest $request)
    {
        $purchaseRequition = PurchaseRequition::create($request->all());

        return redirect()->route('admin.purchase-requitions.index');
    }

    public function edit(PurchaseRequition $purchaseRequition)
    {
        abort_if(Gate::denies('purchase_requition_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $id_list_of_materials = ListOfMaterial::pluck('id_list_of_material', 'id')->prepend(trans('global.pleaseSelect'), '');

        $material_1s = Material::pluck('name_material', 'id')->prepend(trans('global.pleaseSelect'), '');

        $material_2s = Material::pluck('name_material', 'id')->prepend(trans('global.pleaseSelect'), '');

        $material_3s = Material::pluck('name_material', 'id')->prepend(trans('global.pleaseSelect'), '');

        $material_4s = Material::pluck('name_material', 'id')->prepend(trans('global.pleaseSelect'), '');

        $material_5s = Material::pluck('name_material', 'id')->prepend(trans('global.pleaseSelect'), '');

        $material_6s = Material::pluck('name_material', 'id')->prepend(trans('global.pleaseSelect'), '');

        $purchaseRequition->load('id_list_of_material', 'material_1', 'material_2', 'material_3', 'material_4', 'material_5', 'material_6');

        return view('admin.purchaseRequitions.edit', compact('id_list_of_materials', 'material_1s', 'material_2s', 'material_3s', 'material_4s', 'material_5s', 'material_6s', 'purchaseRequition'));
    }

    public function update(UpdatePurchaseRequitionRequest $request, PurchaseRequition $purchaseRequition)
    {
        $purchaseRequition->update($request->all());

        return redirect()->route('admin.purchase-requitions.index');
    }

    public function show(PurchaseRequition $purchaseRequition)
    {
        abort_if(Gate::denies('purchase_requition_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $purchaseRequition->load('id_list_of_material', 'material_1', 'material_2', 'material_3', 'material_4', 'material_5', 'material_6', 'idPurchaseRequisitionRequestForQuotations');

        return view('admin.purchaseRequitions.show', compact('purchaseRequition'));
    }

    public function destroy(PurchaseRequition $purchaseRequition)
    {
        abort_if(Gate::denies('purchase_requition_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $purchaseRequition->delete();

        return back();
    }

    public function massDestroy(MassDestroyPurchaseRequitionRequest $request)
    {
        PurchaseRequition::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
