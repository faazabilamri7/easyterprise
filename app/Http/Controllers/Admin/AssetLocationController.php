<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyAssetLocationRequest;
use App\Http\Requests\StoreAssetLocationRequest;
use App\Http\Requests\UpdateAssetLocationRequest;
use App\Models\AssetLocation;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AssetLocationController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('asset_location_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $assetLocations = AssetLocation::all();

        return view('admin.assetLocations.index', compact('assetLocations'));
    }

    public function create()
    {
        abort_if(Gate::denies('asset_location_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.assetLocations.create');
    }

    public function store(StoreAssetLocationRequest $request)
    {
        $assetLocation = AssetLocation::create($request->all());

        return redirect()->route('admin.asset-locations.index');
    }

    public function edit(AssetLocation $assetLocation)
    {
        abort_if(Gate::denies('asset_location_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.assetLocations.edit', compact('assetLocation'));
    }

    public function update(UpdateAssetLocationRequest $request, AssetLocation $assetLocation)
    {
        $assetLocation->update($request->all());

        return redirect()->route('admin.asset-locations.index');
    }

    public function show(AssetLocation $assetLocation)
    {
        abort_if(Gate::denies('asset_location_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.assetLocations.show', compact('assetLocation'));
    }

    public function destroy(AssetLocation $assetLocation)
    {
        abort_if(Gate::denies('asset_location_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $assetLocation->delete();

        return back();
    }

    public function massDestroy(MassDestroyAssetLocationRequest $request)
    {
        AssetLocation::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
