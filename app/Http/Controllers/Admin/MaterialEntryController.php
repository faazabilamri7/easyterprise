<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Requests\MassDestroyMaterialEntryRequest;
use App\Http\Requests\StoreMaterialEntryRequest;
use App\Http\Requests\UpdateMaterialEntryRequest;
use App\Models\MaterialEntry;
use App\Models\PurchaseOrder;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class MaterialEntryController extends Controller
{
    use CsvImportTrait;

    public function index(Request $request)
    {
        abort_if(Gate::denies('material_entry_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = MaterialEntry::with(['id_purchase_order'])->select(sprintf('%s.*', (new MaterialEntry())->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate = 'material_entry_show';
                $editGate = 'material_entry_edit';
                $deleteGate = 'material_entry_delete';
                $crudRoutePart = 'material-entries';

                return view('partials.datatablesActions', compact(
                'viewGate',
                'editGate',
                'deleteGate',
                'crudRoutePart',
                'row'
            ));
            });

            $table->editColumn('id_material_entry', function ($row) {
                return $row->id_material_entry ? $row->id_material_entry : '';
            });
            $table->addColumn('id_purchase_order_id_purchase_order', function ($row) {
                return $row->id_purchase_order ? $row->id_purchase_order->id_purchase_order : '';
            });

            $table->editColumn('material_name', function ($row) {
                return $row->material_name ? $row->material_name : '';
            });
            $table->editColumn('qty', function ($row) {
                return $row->qty ? $row->qty : '';
            });
            $table->editColumn('status', function ($row) {
                return $row->status ? MaterialEntry::STATUS_SELECT[$row->status] : '';
            });

            $table->rawColumns(['actions', 'placeholder', 'id_purchase_order']);

            return $table->make(true);
        }

        return view('admin.materialEntries.index');
    }

    public function create()
    {
        abort_if(Gate::denies('material_entry_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $id_purchase_orders = PurchaseOrder::pluck('id_purchase_order', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.materialEntries.create', compact('id_purchase_orders'));
    }

    public function store(StoreMaterialEntryRequest $request)
    {
        $materialEntry = MaterialEntry::create($request->all());

        return redirect()->route('admin.material-entries.index');
    }

    public function edit(MaterialEntry $materialEntry)
    {
        abort_if(Gate::denies('material_entry_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $id_purchase_orders = PurchaseOrder::pluck('id_purchase_order', 'id')->prepend(trans('global.pleaseSelect'), '');

        $materialEntry->load('id_purchase_order');

        return view('admin.materialEntries.edit', compact('id_purchase_orders', 'materialEntry'));
    }

    public function update(UpdateMaterialEntryRequest $request, MaterialEntry $materialEntry)
    {
        $materialEntry->update($request->all());

        return redirect()->route('admin.material-entries.index');
    }

    public function show(MaterialEntry $materialEntry)
    {
        abort_if(Gate::denies('material_entry_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $materialEntry->load('id_purchase_order');

        return view('admin.materialEntries.show', compact('materialEntry'));
    }

    public function destroy(MaterialEntry $materialEntry)
    {
        abort_if(Gate::denies('material_entry_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $materialEntry->delete();

        return back();
    }

    public function massDestroy(MassDestroyMaterialEntryRequest $request)
    {
        MaterialEntry::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
