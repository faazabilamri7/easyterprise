<?php

namespace App\Http\Controllers\Admin;

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
use Yajra\DataTables\Facades\DataTables;

class DocumentsVendorController extends Controller
{
    use MediaUploadingTrait;
    use CsvImportTrait;

    public function index(Request $request)
    {
        abort_if(Gate::denies('documents_vendor_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = DocumentsVendor::with(['vendor'])->select(sprintf('%s.*', (new DocumentsVendor())->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate = 'documents_vendor_show';
                $editGate = 'documents_vendor_edit';
                $deleteGate = 'documents_vendor_delete';
                $crudRoutePart = 'documents-vendors';

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
            $table->editColumn('document_file', function ($row) {
                return $row->document_file ? '<a href="' . $row->document_file->getUrl() . '" target="_blank">' . trans('global.downloadFile') . '</a>' : '';
            });
            $table->addColumn('vendor_nama_vendor', function ($row) {
                return $row->vendor ? $row->vendor->nama_vendor : '';
            });

            $table->editColumn('name', function ($row) {
                return $row->name ? $row->name : '';
            });
            $table->editColumn('description', function ($row) {
                return $row->description ? $row->description : '';
            });

            $table->rawColumns(['actions', 'placeholder', 'document_file', 'vendor']);

            return $table->make(true);
        }

        return view('admin.documentsVendors.index');
    }

    public function create()
    {
        abort_if(Gate::denies('documents_vendor_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $vendors = Vendor::pluck('nama_vendor', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.documentsVendors.create', compact('vendors'));
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

        return redirect()->route('admin.documents-vendors.index');
    }

    public function edit(DocumentsVendor $documentsVendor)
    {
        abort_if(Gate::denies('documents_vendor_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $vendors = Vendor::pluck('nama_vendor', 'id')->prepend(trans('global.pleaseSelect'), '');

        $documentsVendor->load('vendor');

        return view('admin.documentsVendors.edit', compact('documentsVendor', 'vendors'));
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

        return redirect()->route('admin.documents-vendors.index');
    }

    public function show(DocumentsVendor $documentsVendor)
    {
        abort_if(Gate::denies('documents_vendor_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $documentsVendor->load('vendor');

        return view('admin.documentsVendors.show', compact('documentsVendor'));
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
