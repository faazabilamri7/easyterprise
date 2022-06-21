<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyPurchaseInvoiceRequest;
use App\Http\Requests\StorePurchaseInvoiceRequest;
use App\Http\Requests\UpdatePurchaseInvoiceRequest;
use App\Models\PurchaseInvoice;
use App\Models\PurchaseOrder;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class PurchaseInvoiceController extends Controller
{
    use MediaUploadingTrait;
    use CsvImportTrait;

    public function index(Request $request)
    {
        abort_if(Gate::denies('purchase_invoice_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = PurchaseInvoice::with(['purchase_order'])->select(sprintf('%s.*', (new PurchaseInvoice())->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate = 'purchase_invoice_show';
                $editGate = 'purchase_invoice_edit';
                $deleteGate = 'purchase_invoice_delete';
                $crudRoutePart = 'purchase-invoices';

                return view('partials.datatablesActions', compact(
                'viewGate',
                'editGate',
                'deleteGate',
                'crudRoutePart',
                'row'
            ));
            });

            $table->editColumn('no_purchase_invoice', function ($row) {
                return $row->no_purchase_invoice ? $row->no_purchase_invoice : '';
            });
            $table->editColumn('purchase_invoice', function ($row) {
                return $row->purchase_invoice ? '<a href="' . $row->purchase_invoice->getUrl() . '" target="_blank">' . trans('global.downloadFile') . '</a>' : '';
            });
            $table->addColumn('purchase_order_date_purchase_order', function ($row) {
                return $row->purchase_order ? $row->purchase_order->date_purchase_order : '';
            });

            $table->editColumn('bukti_pembayaran', function ($row) {
                if ($photo = $row->bukti_pembayaran) {
                    return sprintf(
        '<a href="%s" target="_blank"><img src="%s" width="50px" height="50px"></a>',
        $photo->url,
        $photo->thumbnail
    );
                }

                return '';
            });
            $table->editColumn('status', function ($row) {
                return $row->status ? PurchaseInvoice::STATUS_RADIO[$row->status] : '';
            });

            $table->rawColumns(['actions', 'placeholder', 'purchase_invoice', 'purchase_order', 'bukti_pembayaran']);

            return $table->make(true);
        }

        return view('admin.purchaseInvoices.index');
    }

    public function create()
    {
        abort_if(Gate::denies('purchase_invoice_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $purchase_orders = PurchaseOrder::pluck('date_purchase_order', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.purchaseInvoices.create', compact('purchase_orders'));
    }

    public function store(StorePurchaseInvoiceRequest $request)
    {
        $purchaseInvoice = PurchaseInvoice::create($request->all());

        if ($request->input('purchase_invoice', false)) {
            $purchaseInvoice->addMedia(storage_path('tmp/uploads/' . basename($request->input('purchase_invoice'))))->toMediaCollection('purchase_invoice');
        }

        if ($request->input('bukti_pembayaran', false)) {
            $purchaseInvoice->addMedia(storage_path('tmp/uploads/' . basename($request->input('bukti_pembayaran'))))->toMediaCollection('bukti_pembayaran');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $purchaseInvoice->id]);
        }

        return redirect()->route('admin.purchase-invoices.index');
    }

    public function edit(PurchaseInvoice $purchaseInvoice)
    {
        abort_if(Gate::denies('purchase_invoice_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $purchase_orders = PurchaseOrder::pluck('date_purchase_order', 'id')->prepend(trans('global.pleaseSelect'), '');

        $purchaseInvoice->load('purchase_order');

        return view('admin.purchaseInvoices.edit', compact('purchaseInvoice', 'purchase_orders'));
    }

    public function update(UpdatePurchaseInvoiceRequest $request, PurchaseInvoice $purchaseInvoice)
    {
        $purchaseInvoice->update($request->all());

        if ($request->input('purchase_invoice', false)) {
            if (!$purchaseInvoice->purchase_invoice || $request->input('purchase_invoice') !== $purchaseInvoice->purchase_invoice->file_name) {
                if ($purchaseInvoice->purchase_invoice) {
                    $purchaseInvoice->purchase_invoice->delete();
                }
                $purchaseInvoice->addMedia(storage_path('tmp/uploads/' . basename($request->input('purchase_invoice'))))->toMediaCollection('purchase_invoice');
            }
        } elseif ($purchaseInvoice->purchase_invoice) {
            $purchaseInvoice->purchase_invoice->delete();
        }

        if ($request->input('bukti_pembayaran', false)) {
            if (!$purchaseInvoice->bukti_pembayaran || $request->input('bukti_pembayaran') !== $purchaseInvoice->bukti_pembayaran->file_name) {
                if ($purchaseInvoice->bukti_pembayaran) {
                    $purchaseInvoice->bukti_pembayaran->delete();
                }
                $purchaseInvoice->addMedia(storage_path('tmp/uploads/' . basename($request->input('bukti_pembayaran'))))->toMediaCollection('bukti_pembayaran');
            }
        } elseif ($purchaseInvoice->bukti_pembayaran) {
            $purchaseInvoice->bukti_pembayaran->delete();
        }

        return redirect()->route('admin.purchase-invoices.index');
    }

    public function show(PurchaseInvoice $purchaseInvoice)
    {
        abort_if(Gate::denies('purchase_invoice_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $purchaseInvoice->load('purchase_order');

        return view('admin.purchaseInvoices.show', compact('purchaseInvoice'));
    }

    public function destroy(PurchaseInvoice $purchaseInvoice)
    {
        abort_if(Gate::denies('purchase_invoice_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $purchaseInvoice->delete();

        return back();
    }

    public function massDestroy(MassDestroyPurchaseInvoiceRequest $request)
    {
        PurchaseInvoice::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('purchase_invoice_create') && Gate::denies('purchase_invoice_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new PurchaseInvoice();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
