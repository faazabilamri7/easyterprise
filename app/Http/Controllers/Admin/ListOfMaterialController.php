<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Requests\MassDestroyListOfMaterialRequest;
use App\Http\Requests\StoreListOfMaterialRequest;
use App\Http\Requests\UpdateListOfMaterialRequest;
use App\Models\ListOfMaterial;
use App\Models\Task;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class ListOfMaterialController extends Controller
{
    use CsvImportTrait;

    public function index(Request $request)
    {
        abort_if(Gate::denies('list_of_material_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = ListOfMaterial::with(['id_production_plan'])->select(sprintf('%s.*', (new ListOfMaterial())->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate = 'list_of_material_show';
                $editGate = 'list_of_material_edit';
                $deleteGate = 'list_of_material_delete';
                $crudRoutePart = 'list-of-materials';

                return view('partials.datatablesActions', compact(
                'viewGate',
                'editGate',
                'deleteGate',
                'crudRoutePart',
                'row'
            ));
            });

            $table->editColumn('id_list_of_material', function ($row) {
                return $row->id_list_of_material ? $row->id_list_of_material : '';
            });
            $table->addColumn('id_production_plan_id_production_plan', function ($row) {
                return $row->id_production_plan ? $row->id_production_plan->id_production_plan : '';
            });

            $table->editColumn('request_air', function ($row) {
                return $row->request_air ? $row->request_air : '';
            });
            $table->editColumn('request_sukrosa', function ($row) {
                return $row->request_sukrosa ? $row->request_sukrosa : '';
            });
            $table->editColumn('request_dektrose', function ($row) {
                return $row->request_dektrose ? $row->request_dektrose : '';
            });
            $table->editColumn('request_perisa_yakult', function ($row) {
                return $row->request_perisa_yakult ? $row->request_perisa_yakult : '';
            });
            $table->editColumn('request_susu_bubuk_krim', function ($row) {
                return $row->request_susu_bubuk_krim ? $row->request_susu_bubuk_krim : '';
            });
            $table->editColumn('request_polietilena_tereftalat', function ($row) {
                return $row->request_polietilena_tereftalat ? $row->request_polietilena_tereftalat : '';
            });
            $table->editColumn('status', function ($row) {
                return $row->status ? ListOfMaterial::STATUS_SELECT[$row->status] : '';
            });

            $table->rawColumns(['actions', 'placeholder', 'id_production_plan']);

            return $table->make(true);
        }

        return view('admin.listOfMaterials.index');
    }

    public function create()
    {
        abort_if(Gate::denies('list_of_material_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $id_production_plans = Task::pluck('id_production_plan', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.listOfMaterials.create', compact('id_production_plans'));
    }

    public function store(StoreListOfMaterialRequest $request)
    {
        $listOfMaterial = ListOfMaterial::create($request->all());

        return redirect()->route('admin.list-of-materials.index');
    }

    public function edit(ListOfMaterial $listOfMaterial)
    {
        abort_if(Gate::denies('list_of_material_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $id_production_plans = Task::pluck('id_production_plan', 'id')->prepend(trans('global.pleaseSelect'), '');

        $listOfMaterial->load('id_production_plan');

        return view('admin.listOfMaterials.edit', compact('id_production_plans', 'listOfMaterial'));
    }

    public function update(UpdateListOfMaterialRequest $request, ListOfMaterial $listOfMaterial)
    {
        $listOfMaterial->update($request->all());

        return redirect()->route('admin.list-of-materials.index');
    }

    public function show(ListOfMaterial $listOfMaterial)
    {
        abort_if(Gate::denies('list_of_material_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $listOfMaterial->load('id_production_plan', 'idListOfMaterialPurchaseRequitions', 'idListOfMaterialProductionMonitorings', 'idListOfMaterialTransferMaterials');

        return view('admin.listOfMaterials.show', compact('listOfMaterial'));
    }

    public function destroy(ListOfMaterial $listOfMaterial)
    {
        abort_if(Gate::denies('list_of_material_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $listOfMaterial->delete();

        return back();
    }

    public function massDestroy(MassDestroyListOfMaterialRequest $request)
    {
        ListOfMaterial::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
