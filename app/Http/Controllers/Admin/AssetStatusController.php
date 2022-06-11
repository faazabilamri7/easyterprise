<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Requests\MassDestroyAssetStatusRequest;
use App\Http\Requests\StoreAssetStatusRequest;
use App\Http\Requests\UpdateAssetStatusRequest;
use App\Models\AssetStatus;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class AssetStatusController extends Controller
{
    use CsvImportTrait;

    public function index(Request $request)
    {
        abort_if(Gate::denies('asset_status_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = AssetStatus::query()->select(sprintf('%s.*', (new AssetStatus())->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate = 'asset_status_show';
                $editGate = 'asset_status_edit';
                $deleteGate = 'asset_status_delete';
                $crudRoutePart = 'asset-statuses';

                return view('partials.datatablesActions', compact(
                'viewGate',
                'editGate',
                'deleteGate',
                'crudRoutePart',
                'row'
            ));
            });

            $table->editColumn('id', function ($row) {
                return $row->id ? $row->id : '';
            });
            $table->editColumn('name', function ($row) {
                return $row->name ? $row->name : '';
            });

            $table->rawColumns(['actions', 'placeholder']);

            return $table->make(true);
        }

        return view('admin.assetStatuses.index');
    }

    public function create()
    {
        abort_if(Gate::denies('asset_status_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.assetStatuses.create');
    }

    public function store(StoreAssetStatusRequest $request)
    {
        $assetStatus = AssetStatus::create($request->all());

        return redirect()->route('admin.asset-statuses.index');
    }

    public function edit(AssetStatus $assetStatus)
    {
        abort_if(Gate::denies('asset_status_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.assetStatuses.edit', compact('assetStatus'));
    }

    public function update(UpdateAssetStatusRequest $request, AssetStatus $assetStatus)
    {
        $assetStatus->update($request->all());

        return redirect()->route('admin.asset-statuses.index');
    }

    public function show(AssetStatus $assetStatus)
    {
        abort_if(Gate::denies('asset_status_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $assetStatus->load('statusAssets', 'statusAssetsHistories');

        return view('admin.assetStatuses.show', compact('assetStatus'));
    }

    public function destroy(AssetStatus $assetStatus)
    {
        abort_if(Gate::denies('asset_status_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $assetStatus->delete();

        return back();
    }

    public function massDestroy(MassDestroyAssetStatusRequest $request)
    {
        AssetStatus::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
