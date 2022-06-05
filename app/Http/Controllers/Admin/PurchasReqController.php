<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyPurchasReqRequest;
use App\Http\Requests\StorePurchasReqRequest;
use App\Http\Requests\UpdatePurchasReqRequest;
use App\Models\PurchasReq;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class PurchasReqController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('purchas_req_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $purchasReqs = PurchasReq::all();

        return view('admin.purchasReqs.index', compact('purchasReqs'));
    }

    public function create()
    {
        abort_if(Gate::denies('purchas_req_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.purchasReqs.create');
    }

    public function store(StorePurchasReqRequest $request)
    {
        $purchasReq = PurchasReq::create($request->all());

        return redirect()->route('admin.purchas-reqs.index');
    }

    public function edit(PurchasReq $purchasReq)
    {
        abort_if(Gate::denies('purchas_req_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.purchasReqs.edit', compact('purchasReq'));
    }

    public function update(UpdatePurchasReqRequest $request, PurchasReq $purchasReq)
    {
        $purchasReq->update($request->all());

        return redirect()->route('admin.purchas-reqs.index');
    }

    public function show(PurchasReq $purchasReq)
    {
        abort_if(Gate::denies('purchas_req_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.purchasReqs.show', compact('purchasReq'));
    }

    public function destroy(PurchasReq $purchasReq)
    {
        abort_if(Gate::denies('purchas_req_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $purchasReq->delete();

        return back();
    }

    public function massDestroy(MassDestroyPurchasReqRequest $request)
    {
        PurchasReq::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
