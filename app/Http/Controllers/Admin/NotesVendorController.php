<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Requests\MassDestroyNotesVendorRequest;
use App\Http\Requests\StoreNotesVendorRequest;
use App\Http\Requests\UpdateNotesVendorRequest;
use App\Models\NotesVendor;
use App\Models\Vendor;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class NotesVendorController extends Controller
{
    use CsvImportTrait;

    public function index(Request $request)
    {
        abort_if(Gate::denies('notes_vendor_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = NotesVendor::with(['vendor'])->select(sprintf('%s.*', (new NotesVendor())->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate = 'notes_vendor_show';
                $editGate = 'notes_vendor_edit';
                $deleteGate = 'notes_vendor_delete';
                $crudRoutePart = 'notes-vendors';

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
            $table->addColumn('vendor_nama_vendor', function ($row) {
                return $row->vendor ? $row->vendor->nama_vendor : '';
            });

            $table->editColumn('note', function ($row) {
                return $row->note ? $row->note : '';
            });

            $table->rawColumns(['actions', 'placeholder', 'vendor']);

            return $table->make(true);
        }

        return view('admin.notesVendors.index');
    }

    public function create()
    {
        abort_if(Gate::denies('notes_vendor_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $vendors = Vendor::pluck('nama_vendor', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.notesVendors.create', compact('vendors'));
    }

    public function store(StoreNotesVendorRequest $request)
    {
        $notesVendor = NotesVendor::create($request->all());

        return redirect()->route('admin.notes-vendors.index');
    }

    public function edit(NotesVendor $notesVendor)
    {
        abort_if(Gate::denies('notes_vendor_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $vendors = Vendor::pluck('nama_vendor', 'id')->prepend(trans('global.pleaseSelect'), '');

        $notesVendor->load('vendor');

        return view('admin.notesVendors.edit', compact('notesVendor', 'vendors'));
    }

    public function update(UpdateNotesVendorRequest $request, NotesVendor $notesVendor)
    {
        $notesVendor->update($request->all());

        return redirect()->route('admin.notes-vendors.index');
    }

    public function show(NotesVendor $notesVendor)
    {
        abort_if(Gate::denies('notes_vendor_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $notesVendor->load('vendor');

        return view('admin.notesVendors.show', compact('notesVendor'));
    }

    public function destroy(NotesVendor $notesVendor)
    {
        abort_if(Gate::denies('notes_vendor_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $notesVendor->delete();

        return back();
    }

    public function massDestroy(MassDestroyNotesVendorRequest $request)
    {
        NotesVendor::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
