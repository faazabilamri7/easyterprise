<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Requests\MassDestroyTransferMaterialRequest;
use App\Http\Requests\StoreTransferMaterialRequest;
use App\Http\Requests\UpdateTransferMaterialRequest;
use App\Models\ListOfMaterial;
use App\Models\TransferMaterial;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class TransferMaterialController extends Controller
{
    use CsvImportTrait;

    public function index(Request $request)
    {
        abort_if(Gate::denies('transfer_material_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = TransferMaterial::with(['id_list_of_material'])->select(sprintf('%s.*', (new TransferMaterial())->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate = 'transfer_material_show';
                $editGate = 'transfer_material_edit';
                $deleteGate = 'transfer_material_delete';
                $crudRoutePart = 'transfer-materials';

                return view('partials.datatablesActions', compact(
                'viewGate',
                'editGate',
                'deleteGate',
                'crudRoutePart',
                'row'
            ));
            });

            $table->editColumn('id_transfer_material', function ($row) {
                return $row->id_transfer_material ? $row->id_transfer_material : '';
            });
            $table->addColumn('id_list_of_material_id_list_of_material', function ($row) {
                return $row->id_list_of_material ? $row->id_list_of_material->id_list_of_material : '';
            });

            $table->editColumn('status', function ($row) {
                return $row->status ? TransferMaterial::STATUS_SELECT[$row->status] : '';
            });

            $table->rawColumns(['actions', 'placeholder', 'id_list_of_material']);

            return $table->make(true);
        }

        return view('admin.transferMaterials.index');
    }

    public function create()
    {
        abort_if(Gate::denies('transfer_material_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $id_list_of_materials = ListOfMaterial::pluck('id_list_of_material', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.transferMaterials.create', compact('id_list_of_materials'));
    }

    public function store(StoreTransferMaterialRequest $request)
    {
        $transferMaterial = TransferMaterial::create($request->all());

        return redirect()->route('admin.transfer-materials.index');
    }

    public function edit(TransferMaterial $transferMaterial)
    {
        abort_if(Gate::denies('transfer_material_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $id_list_of_materials = ListOfMaterial::pluck('id_list_of_material', 'id')->prepend(trans('global.pleaseSelect'), '');

        $transferMaterial->load('id_list_of_material');

        return view('admin.transferMaterials.edit', compact('id_list_of_materials', 'transferMaterial'));
    }

    public function update(UpdateTransferMaterialRequest $request, TransferMaterial $transferMaterial)
    {
        $transferMaterial->update($request->all());

        return redirect()->route('admin.transfer-materials.index');
    }

    public function show(TransferMaterial $transferMaterial)
    {
        abort_if(Gate::denies('transfer_material_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $transferMaterial->load('id_list_of_material');

        return view('admin.transferMaterials.show', compact('transferMaterial'));
    }

    public function destroy(TransferMaterial $transferMaterial)
    {
        abort_if(Gate::denies('transfer_material_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $transferMaterial->delete();

        return back();
    }

    public function massDestroy(MassDestroyTransferMaterialRequest $request)
    {
        TransferMaterial::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
