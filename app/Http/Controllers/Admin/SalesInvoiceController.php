<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroySalesInvoiceRequest;
use App\Http\Requests\StoreSalesInvoiceRequest;
use App\Http\Requests\UpdateSalesInvoiceRequest;
use App\Models\SalesInvoice;
use App\Models\SalesOrder;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class SalesInvoiceController extends Controller
{
    use MediaUploadingTrait;
    use CsvImportTrait;

    public function index(Request $request)
    {
        abort_if(Gate::denies('sales_invoice_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = SalesInvoice::with(['sales_order'])->select(sprintf('%s.*', (new SalesInvoice())->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate = 'sales_invoice_show';
                $editGate = 'sales_invoice_edit';
                $deleteGate = 'sales_invoice_delete';
                $crudRoutePart = 'sales-invoices';

                return view('partials.datatablesActions', compact(
                'viewGate',
                'editGate',
                'deleteGate',
                'crudRoutePart',
                'row'
            ));
            });

            $table->editColumn('no_sales_invoice', function ($row) {
                return $row->no_sales_invoice ? $row->no_sales_invoice : '';
            });
            $table->editColumn('sales_invoice', function ($row) {
                return $row->sales_invoice ? '<a href="' . $row->sales_invoice->getUrl() . '" target="_blank">' . trans('global.downloadFile') . '</a>' : '';
            });
            $table->addColumn('sales_order_no_sales_order', function ($row) {
                return $row->sales_order ? $row->sales_order->no_sales_order : '';
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
                return $row->status ? SalesInvoice::STATUS_RADIO[$row->status] : '';
            });

            $table->rawColumns(['actions', 'placeholder', 'sales_invoice', 'sales_order', 'bukti_pembayaran']);

            return $table->make(true);
        }

        return view('admin.salesInvoices.index');
    }

    public function create()
    {
        abort_if(Gate::denies('sales_invoice_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $sales_orders = SalesOrder::pluck('no_sales_order', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.salesInvoices.create', compact('sales_orders'));
    }

    public function store(StoreSalesInvoiceRequest $request)
    {
        $salesInvoice = SalesInvoice::create($request->all());

        if ($request->input('sales_invoice', false)) {
            $salesInvoice->addMedia(storage_path('tmp/uploads/' . basename($request->input('sales_invoice'))))->toMediaCollection('sales_invoice');
        }

        if ($request->input('bukti_pembayaran', false)) {
            $salesInvoice->addMedia(storage_path('tmp/uploads/' . basename($request->input('bukti_pembayaran'))))->toMediaCollection('bukti_pembayaran');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $salesInvoice->id]);
        }

        return redirect()->route('admin.sales-invoices.index');
    }

    public function edit(SalesInvoice $salesInvoice)
    {
        abort_if(Gate::denies('sales_invoice_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $sales_orders = SalesOrder::pluck('no_sales_order', 'id')->prepend(trans('global.pleaseSelect'), '');

        $salesInvoice->load('sales_order');

        return view('admin.salesInvoices.edit', compact('salesInvoice', 'sales_orders'));
    }

    public function update(UpdateSalesInvoiceRequest $request, SalesInvoice $salesInvoice)
    {
        $salesInvoice->update($request->all());

        if ($request->input('sales_invoice', false)) {
            if (!$salesInvoice->sales_invoice || $request->input('sales_invoice') !== $salesInvoice->sales_invoice->file_name) {
                if ($salesInvoice->sales_invoice) {
                    $salesInvoice->sales_invoice->delete();
                }
                $salesInvoice->addMedia(storage_path('tmp/uploads/' . basename($request->input('sales_invoice'))))->toMediaCollection('sales_invoice');
            }
        } elseif ($salesInvoice->sales_invoice) {
            $salesInvoice->sales_invoice->delete();
        }

        if ($request->input('bukti_pembayaran', false)) {
            if (!$salesInvoice->bukti_pembayaran || $request->input('bukti_pembayaran') !== $salesInvoice->bukti_pembayaran->file_name) {
                if ($salesInvoice->bukti_pembayaran) {
                    $salesInvoice->bukti_pembayaran->delete();
                }
                $salesInvoice->addMedia(storage_path('tmp/uploads/' . basename($request->input('bukti_pembayaran'))))->toMediaCollection('bukti_pembayaran');
            }
        } elseif ($salesInvoice->bukti_pembayaran) {
            $salesInvoice->bukti_pembayaran->delete();
        }

        return redirect()->route('admin.sales-invoices.index');
    }

    public function show(SalesInvoice $salesInvoice)
    {
        abort_if(Gate::denies('sales_invoice_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $salesInvoice->load('sales_order');

        return view('admin.salesInvoices.show', compact('salesInvoice'));
    }

    public function destroy(SalesInvoice $salesInvoice)
    {
        abort_if(Gate::denies('sales_invoice_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $salesInvoice->delete();

        return back();
    }

    public function massDestroy(MassDestroySalesInvoiceRequest $request)
    {
        SalesInvoice::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('sales_invoice_create') && Gate::denies('sales_invoice_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new SalesInvoice();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
