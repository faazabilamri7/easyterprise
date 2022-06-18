<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyMaterialRequest;
use App\Http\Requests\StoreMaterialRequest;
use App\Http\Requests\UpdateMaterialRequest;
use App\Models\Material;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class MaterialsController extends Controller
{
    use MediaUploadingTrait;
    use CsvImportTrait;

    public function index(Request $request)
    {
        abort_if(Gate::denies('material_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = Material::query()->select(sprintf('%s.*', (new Material())->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate = 'material_show';
                $editGate = 'material_edit';
                $deleteGate = 'material_delete';
                $crudRoutePart = 'materials';

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
            $table->editColumn('name_material', function ($row) {
                return $row->name_material ? $row->name_material : '';
            });
            $table->editColumn('descriptive', function ($row) {
                return $row->descriptive ? $row->descriptive : '';
            });
            $table->editColumn('photo', function ($row) {
                if (!$row->photo) {
                    return '';
                }
                $links = [];
                foreach ($row->photo as $media) {
                    $links[] = '<a href="' . $media->getUrl() . '" target="_blank"><img src="' . $media->getUrl('thumb') . '" width="50px" height="50px"></a>';
                }

                return implode(' ', $links);
            });
            $table->editColumn('stock', function ($row) {
                return $row->stock ? $row->stock : '';
            });

            $table->rawColumns(['actions', 'placeholder', 'photo']);

            return $table->make(true);
        }

        return view('admin.materials.index');
    }

    public function create()
    {
        abort_if(Gate::denies('material_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.materials.create');
    }

    public function store(StoreMaterialRequest $request)
    {
        $material = Material::create($request->all());

        foreach ($request->input('photo', []) as $file) {
            $material->addMedia(storage_path('tmp/uploads/' . basename($file)))->toMediaCollection('photo');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $material->id]);
        }

        return redirect()->route('admin.materials.index');
    }

    public function edit(Material $material)
    {
        abort_if(Gate::denies('material_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.materials.edit', compact('material'));
    }

    public function update(UpdateMaterialRequest $request, Material $material)
    {
        $material->update($request->all());

        if (count($material->photo) > 0) {
            foreach ($material->photo as $media) {
                if (!in_array($media->file_name, $request->input('photo', []))) {
                    $media->delete();
                }
            }
        }
        $media = $material->photo->pluck('file_name')->toArray();
        foreach ($request->input('photo', []) as $file) {
            if (count($media) === 0 || !in_array($file, $media)) {
                $material->addMedia(storage_path('tmp/uploads/' . basename($file)))->toMediaCollection('photo');
            }
        }

        return redirect()->route('admin.materials.index');
    }

    public function show(Material $material)
    {
        abort_if(Gate::denies('material_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $material->load('material1PurchaseRequitions', 'material2PurchaseRequitions', 'material3PurchaseRequitions', 'material4PurchaseRequitions', 'material5PurchaseRequitions', 'material6PurchaseRequitions', 'materialNamePurchaseOrders', 'materialNamePurchaseInqs');

        return view('admin.materials.show', compact('material'));
    }

    public function destroy(Material $material)
    {
        abort_if(Gate::denies('material_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $material->delete();

        return back();
    }

    public function massDestroy(MassDestroyMaterialRequest $request)
    {
        Material::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('material_create') && Gate::denies('material_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new Material();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
