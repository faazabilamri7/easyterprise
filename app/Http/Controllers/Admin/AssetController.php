<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyAssetRequest;
use App\Http\Requests\StoreAssetRequest;
use App\Http\Requests\UpdateAssetRequest;
use App\Models\Asset;
use App\Models\AssetCategory;
use App\Models\AssetLocation;
use App\Models\AssetStatus;
use App\Models\User;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class AssetController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('asset_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $assets = Asset::with(['category', 'status', 'location', 'assigned_to', 'media'])->get();

        return view('admin.assets.index', compact('assets'));
    }

    public function create()
    {
        abort_if(Gate::denies('asset_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $categories = AssetCategory::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $statuses = AssetStatus::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $locations = AssetLocation::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $assigned_tos = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.assets.create', compact('assigned_tos', 'categories', 'locations', 'statuses'));
    }

    public function store(StoreAssetRequest $request)
    {
        $asset = Asset::create($request->all());

        foreach ($request->input('photos', []) as $file) {
            $asset->addMedia(storage_path('tmp/uploads/' . basename($file)))->toMediaCollection('photos');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $asset->id]);
        }

        return redirect()->route('admin.assets.index');
    }

    public function edit(Asset $asset)
    {
        abort_if(Gate::denies('asset_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $categories = AssetCategory::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $statuses = AssetStatus::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $locations = AssetLocation::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $assigned_tos = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $asset->load('category', 'status', 'location', 'assigned_to');

        return view('admin.assets.edit', compact('asset', 'assigned_tos', 'categories', 'locations', 'statuses'));
    }

    public function update(UpdateAssetRequest $request, Asset $asset)
    {
        $asset->update($request->all());

        if (count($asset->photos) > 0) {
            foreach ($asset->photos as $media) {
                if (!in_array($media->file_name, $request->input('photos', []))) {
                    $media->delete();
                }
            }
        }
        $media = $asset->photos->pluck('file_name')->toArray();
        foreach ($request->input('photos', []) as $file) {
            if (count($media) === 0 || !in_array($file, $media)) {
                $asset->addMedia(storage_path('tmp/uploads/' . basename($file)))->toMediaCollection('photos');
            }
        }

        return redirect()->route('admin.assets.index');
    }

    public function show(Asset $asset)
    {
        abort_if(Gate::denies('asset_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $asset->load('category', 'status', 'location', 'assigned_to');

        return view('admin.assets.show', compact('asset'));
    }

    public function destroy(Asset $asset)
    {
        abort_if(Gate::denies('asset_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $asset->delete();

        return back();
    }

    public function massDestroy(MassDestroyAssetRequest $request)
    {
        Asset::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('asset_create') && Gate::denies('asset_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new Asset();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
