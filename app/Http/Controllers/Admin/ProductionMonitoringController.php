<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Requests\MassDestroyProductionMonitoringRequest;
use App\Http\Requests\StoreProductionMonitoringRequest;
use App\Http\Requests\UpdateProductionMonitoringRequest;
use App\Models\ListOfMaterial;
use App\Models\ProductionMonitoring;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class ProductionMonitoringController extends Controller
{
    use CsvImportTrait;

    public function index(Request $request)
    {
        abort_if(Gate::denies('production_monitoring_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = ProductionMonitoring::with(['id_list_of_material'])->select(sprintf('%s.*', (new ProductionMonitoring())->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate = 'production_monitoring_show';
                $editGate = 'production_monitoring_edit';
                $deleteGate = 'production_monitoring_delete';
                $crudRoutePart = 'production-monitorings';

                return view('partials.datatablesActions', compact(
                'viewGate',
                'editGate',
                'deleteGate',
                'crudRoutePart',
                'row'
            ));
            });

            $table->editColumn('id_production_monitoring', function ($row) {
                return $row->id_production_monitoring ? $row->id_production_monitoring : '';
            });
            $table->addColumn('id_list_of_material_id_list_of_material', function ($row) {
                return $row->id_list_of_material ? $row->id_list_of_material->id_list_of_material : '';
            });

            $table->editColumn('id_list_of_material.id_list_of_material', function ($row) {
                return $row->id_list_of_material ? (is_string($row->id_list_of_material) ? $row->id_list_of_material : $row->id_list_of_material->id_list_of_material) : '';
            });
            $table->editColumn('status', function ($row) {
                return $row->status ? ProductionMonitoring::STATUS_SELECT[$row->status] : '';
            });

            $table->rawColumns(['actions', 'placeholder', 'id_list_of_material']);

            return $table->make(true);
        }

        return view('admin.productionMonitorings.index');
    }

    public function create()
    {
        abort_if(Gate::denies('production_monitoring_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $id_list_of_materials = ListOfMaterial::pluck('id_list_of_material', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.productionMonitorings.create', compact('id_list_of_materials'));
    }

    public function store(StoreProductionMonitoringRequest $request)
    {
        $productionMonitoring = ProductionMonitoring::create($request->all());

        return redirect()->route('admin.production-monitorings.index');
    }

    public function edit(ProductionMonitoring $productionMonitoring)
    {
        abort_if(Gate::denies('production_monitoring_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $id_list_of_materials = ListOfMaterial::pluck('id_list_of_material', 'id')->prepend(trans('global.pleaseSelect'), '');

        $productionMonitoring->load('id_list_of_material');

        return view('admin.productionMonitorings.edit', compact('id_list_of_materials', 'productionMonitoring'));
    }

    public function update(UpdateProductionMonitoringRequest $request, ProductionMonitoring $productionMonitoring)
    {
        $productionMonitoring->update($request->all());

        return redirect()->route('admin.production-monitorings.index');
    }

    public function show(ProductionMonitoring $productionMonitoring)
    {
        abort_if(Gate::denies('production_monitoring_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $productionMonitoring->load('id_list_of_material', 'idProductionMonitoringQualityControls');

        return view('admin.productionMonitorings.show', compact('productionMonitoring'));
    }

    public function destroy(ProductionMonitoring $productionMonitoring)
    {
        abort_if(Gate::denies('production_monitoring_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $productionMonitoring->delete();

        return back();
    }

    public function massDestroy(MassDestroyProductionMonitoringRequest $request)
    {
        ProductionMonitoring::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
