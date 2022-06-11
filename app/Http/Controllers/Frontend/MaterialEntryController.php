<?php

namespace App\Http\Controllers\Frontend;

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

class MaterialEntryController extends Controller
{
    use CsvImportTrait;

    public function index()
    {
        abort_if(Gate::denies('material_entry_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $materialEntries = MaterialEntry::with(['id_purchase_order'])->get();

        return view('frontend.materialEntries.index', compact('materialEntries'));
    }

    public function create()
    {
        abort_if(Gate::denies('material_entry_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $id_purchase_orders = PurchaseOrder::pluck('id_purchase_order', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('frontend.materialEntries.create', compact('id_purchase_orders'));
    }

    public function store(StoreMaterialEntryRequest $request)
    {
        $materialEntry = MaterialEntry::create($request->all());

        return redirect()->route('frontend.material-entries.index');
    }

    public function edit(MaterialEntry $materialEntry)
    {
        abort_if(Gate::denies('material_entry_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $id_purchase_orders = PurchaseOrder::pluck('id_purchase_order', 'id')->prepend(trans('global.pleaseSelect'), '');

        $materialEntry->load('id_purchase_order');

        return view('frontend.materialEntries.edit', compact('id_purchase_orders', 'materialEntry'));
    }

    public function update(UpdateMaterialEntryRequest $request, MaterialEntry $materialEntry)
    {
        $materialEntry->update($request->all());

        return redirect()->route('frontend.material-entries.index');
    }

    public function show(MaterialEntry $materialEntry)
    {
        abort_if(Gate::denies('material_entry_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $materialEntry->load('id_purchase_order');

        return view('frontend.materialEntries.show', compact('materialEntry'));
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
