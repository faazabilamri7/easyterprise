<?php

namespace App\Http\Controllers\Frontend;

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

class NotesVendorController extends Controller
{
    use CsvImportTrait;

    public function index()
    {
        abort_if(Gate::denies('notes_vendor_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $notesVendors = NotesVendor::with(['vendor'])->get();

        return view('frontend.notesVendors.index', compact('notesVendors'));
    }

    public function create()
    {
        abort_if(Gate::denies('notes_vendor_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $vendors = Vendor::pluck('nama_vendor', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('frontend.notesVendors.create', compact('vendors'));
    }

    public function store(StoreNotesVendorRequest $request)
    {
        $notesVendor = NotesVendor::create($request->all());

        return redirect()->route('frontend.notes-vendors.index');
    }

    public function edit(NotesVendor $notesVendor)
    {
        abort_if(Gate::denies('notes_vendor_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $vendors = Vendor::pluck('nama_vendor', 'id')->prepend(trans('global.pleaseSelect'), '');

        $notesVendor->load('vendor');

        return view('frontend.notesVendors.edit', compact('notesVendor', 'vendors'));
    }

    public function update(UpdateNotesVendorRequest $request, NotesVendor $notesVendor)
    {
        $notesVendor->update($request->all());

        return redirect()->route('frontend.notes-vendors.index');
    }

    public function show(NotesVendor $notesVendor)
    {
        abort_if(Gate::denies('notes_vendor_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $notesVendor->load('vendor');

        return view('frontend.notesVendors.show', compact('notesVendor'));
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
