<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyStokProdukRequest;
use App\Http\Requests\StoreStokProdukRequest;
use App\Http\Requests\UpdateStokProdukRequest;
use App\Models\StokProduk;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class StokProdukController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('stok_produk_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $stokProduks = StokProduk::with(['media'])->get();

        return view('admin.stokProduks.index', compact('stokProduks'));
    }

    public function create()
    {
        abort_if(Gate::denies('stok_produk_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.stokProduks.create');
    }

    public function store(StoreStokProdukRequest $request)
    {
        $stokProduk = StokProduk::create($request->all());

        if ($request->input('fotoproduk', false)) {
            $stokProduk->addMedia(storage_path('tmp/uploads/' . basename($request->input('fotoproduk'))))->toMediaCollection('fotoproduk');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $stokProduk->id]);
        }

        return redirect()->route('admin.stok-produks.index');
    }

    public function edit(StokProduk $stokProduk)
    {
        abort_if(Gate::denies('stok_produk_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.stokProduks.edit', compact('stokProduk'));
    }

    public function update(UpdateStokProdukRequest $request, StokProduk $stokProduk)
    {
        $stokProduk->update($request->all());

        if ($request->input('fotoproduk', false)) {
            if (!$stokProduk->fotoproduk || $request->input('fotoproduk') !== $stokProduk->fotoproduk->file_name) {
                if ($stokProduk->fotoproduk) {
                    $stokProduk->fotoproduk->delete();
                }
                $stokProduk->addMedia(storage_path('tmp/uploads/' . basename($request->input('fotoproduk'))))->toMediaCollection('fotoproduk');
            }
        } elseif ($stokProduk->fotoproduk) {
            $stokProduk->fotoproduk->delete();
        }

        return redirect()->route('admin.stok-produks.index');
    }

    public function show(StokProduk $stokProduk)
    {
        abort_if(Gate::denies('stok_produk_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.stokProduks.show', compact('stokProduk'));
    }

    public function destroy(StokProduk $stokProduk)
    {
        abort_if(Gate::denies('stok_produk_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $stokProduk->delete();

        return back();
    }

    public function massDestroy(MassDestroyStokProdukRequest $request)
    {
        StokProduk::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('stok_produk_create') && Gate::denies('stok_produk_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new StokProduk();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
