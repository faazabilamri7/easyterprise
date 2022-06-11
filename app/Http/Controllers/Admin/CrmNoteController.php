<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Requests\MassDestroyCrmNoteRequest;
use App\Http\Requests\StoreCrmNoteRequest;
use App\Http\Requests\UpdateCrmNoteRequest;
use App\Models\CrmCustomer;
use App\Models\CrmNote;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class CrmNoteController extends Controller
{
    use CsvImportTrait;

    public function index(Request $request)
    {
        abort_if(Gate::denies('crm_note_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = CrmNote::with(['customer'])->select(sprintf('%s.*', (new CrmNote())->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate = 'crm_note_show';
                $editGate = 'crm_note_edit';
                $deleteGate = 'crm_note_delete';
                $crudRoutePart = 'crm-notes';

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
            $table->addColumn('customer_first_name', function ($row) {
                return $row->customer ? $row->customer->first_name : '';
            });

            $table->editColumn('keluhan', function ($row) {
                return $row->keluhan ? $row->keluhan : '';
            });
            $table->editColumn('kritik', function ($row) {
                return $row->kritik ? $row->kritik : '';
            });
            $table->editColumn('saran', function ($row) {
                return $row->saran ? $row->saran : '';
            });
            $table->editColumn('note', function ($row) {
                return $row->note ? $row->note : '';
            });

            $table->rawColumns(['actions', 'placeholder', 'customer']);

            return $table->make(true);
        }

        return view('admin.crmNotes.index');
    }

    public function create()
    {
        abort_if(Gate::denies('crm_note_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $customers = CrmCustomer::pluck('first_name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.crmNotes.create', compact('customers'));
    }

    public function store(StoreCrmNoteRequest $request)
    {
        $crmNote = CrmNote::create($request->all());

        return redirect()->route('admin.crm-notes.index');
    }

    public function edit(CrmNote $crmNote)
    {
        abort_if(Gate::denies('crm_note_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $customers = CrmCustomer::pluck('first_name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $crmNote->load('customer');

        return view('admin.crmNotes.edit', compact('crmNote', 'customers'));
    }

    public function update(UpdateCrmNoteRequest $request, CrmNote $crmNote)
    {
        $crmNote->update($request->all());

        return redirect()->route('admin.crm-notes.index');
    }

    public function show(CrmNote $crmNote)
    {
        abort_if(Gate::denies('crm_note_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $crmNote->load('customer');

        return view('admin.crmNotes.show', compact('crmNote'));
    }

    public function destroy(CrmNote $crmNote)
    {
        abort_if(Gate::denies('crm_note_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $crmNote->delete();

        return back();
    }

    public function massDestroy(MassDestroyCrmNoteRequest $request)
    {
        CrmNote::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
