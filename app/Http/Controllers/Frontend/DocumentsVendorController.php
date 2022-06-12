<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyDocumentsVendorRequest;
use App\Http\Requests\StoreDocumentsVendorRequest;
use App\Http\Requests\UpdateDocumentsVendorRequest;
use App\Models\DocumentsVendor;
use App\Models\Vendor;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class DocumentsVendorController extends Controller
{
    use MediaUploadingTrait;
    use CsvImportTrait;

    public function index()
    {
        abort_if(Gate::denies('documents_vendor_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $documentsVendors = DocumentsVendor::with(['vendor', 'media'])->get();

        return view('frontend.documentsVendors.index', compact('documentsVendors'));
    }

    public function create()
    {
        abort_if(Gate::denies('documents_vendor_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $vendors = Vendor::pluck('nama_vendor', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('frontend.documentsVendors.create', compact('vendors'));
    }

    public function store(StoreDocumentsVendorRequest $request)
    {
        $documentsVendor = DocumentsVendor::create($request->all());

        if ($request->input('document_file', false)) {
            $documentsVendor->addMedia(storage_path('tmp/uploads/' . basename($request->input('document_file'))))->toMediaCollection('document_file');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $documentsVendor->id]);
        }

        return redirect()->route('frontend.documents-vendors.index');
    }

    public function edit(DocumentsVendor $documentsVendor)
    {
        abort_if(Gate::denies('documents_vendor_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $vendors = Vendor::pluck('nama_vendor', 'id')->prepend(trans('global.pleaseSelect'), '');

        $documentsVendor->load('vendor');

        return view('frontend.documentsVendors.edit', compact('documentsVendor', 'vendors'));
    }

    public function update(UpdateDocumentsVendorRequest $request, DocumentsVendor $documentsVendor)
    {
        $documentsVendor->update($request->all());

        if ($request->input('document_file', false)) {
            if (!$documentsVendor->document_file || $request->input('document_file') !== $documentsVendor->document_file->file_name) {
                if ($documentsVendor->document_file) {
                    $documentsVendor->document_file->delete();
                }
                $documentsVendor->addMedia(storage_path('tmp/uploads/' . basename($request->input('document_file'))))->toMediaCollection('document_file');
            }
        } elseif ($documentsVendor->document_file) {
            $documentsVendor->document_file->delete();
        }

        return redirect()->route('frontend.documents-vendors.index');
    }

    public function show(DocumentsVendor $documentsVendor)
    {
        abort_if(Gate::denies('documents_vendor_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $documentsVendor->load('vendor');

        return view('frontend.documentsVendors.show', compact('documentsVendor'));
    }

    public function destroy(DocumentsVendor $documentsVendor)
    {
        abort_if(Gate::denies('documents_vendor_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $documentsVendor->delete();

        return back();
    }

    public function massDestroy(MassDestroyDocumentsVendorRequest $request)
    {
        DocumentsVendor::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('documents_vendor_create') && Gate::denies('documents_vendor_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new DocumentsVendor();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
