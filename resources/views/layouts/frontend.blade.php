<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" rel="stylesheet" />
    <link href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" rel="stylesheet" />
    <link href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css" rel="stylesheet" />
    <link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" rel="stylesheet" />
    <link href="https://cdn.datatables.net/buttons/1.2.4/css/buttons.dataTables.min.css" rel="stylesheet" />
    <link href="https://cdn.datatables.net/select/1.3.0/css/select.dataTables.min.css" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.5/css/select2.min.css" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/css/bootstrap-datetimepicker.min.css" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/min/dropzone.min.css" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/jquery.perfect-scrollbar/1.5.0/css/perfect-scrollbar.min.css" rel="stylesheet" />
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet" />
    @yield('styles')
</head>

<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">
                        @guest
                        @else
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('frontend.home') }}">
                                    {{ __('Dashboard') }}
                                </a>
                            </li>
                        @endguest
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if(Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">

                                    <a class="dropdown-item" href="{{ route('frontend.profile.index') }}">{{ __('My profile') }}</a>

                                    @can('sales_marketing_access')
                                        <a class="dropdown-item disabled" href="#">
                                            {{ trans('cruds.salesMarketing.title') }}
                                        </a>
                                    @endcan
                                    @can('sales_inquiry_access')
                                        <a class="dropdown-item ml-3" href="{{ route('frontend.sales-inquiries.index') }}">
                                            {{ trans('cruds.salesInquiry.title') }}
                                        </a>
                                    @endcan
                                    @can('sales_quotation_access')
                                        <a class="dropdown-item ml-3" href="{{ route('frontend.sales-quotations.index') }}">
                                            {{ trans('cruds.salesQuotation.title') }}
                                        </a>
                                    @endcan
                                    @can('sales_order_access')
                                        <a class="dropdown-item ml-3" href="{{ route('frontend.sales-orders.index') }}">
                                            {{ trans('cruds.salesOrder.title') }}
                                        </a>
                                    @endcan
                                    @can('product_management_access')
                                        <a class="dropdown-item disabled" href="#">
                                            {{ trans('cruds.productManagement.title') }}
                                        </a>
                                    @endcan
                                    @can('product_access')
                                        <a class="dropdown-item ml-3" href="{{ route('frontend.products.index') }}">
                                            {{ trans('cruds.product.title') }}
                                        </a>
                                    @endcan
                                    @can('request_stock_product_access')
                                        <a class="dropdown-item ml-3" href="{{ route('frontend.request-stock-products.index') }}">
                                            {{ trans('cruds.requestStockProduct.title') }}
                                        </a>
                                    @endcan
                                    @can('material_access')
                                        <a class="dropdown-item ml-3" href="{{ route('frontend.materials.index') }}">
                                            {{ trans('cruds.material.title') }}
                                        </a>
                                    @endcan
                                    @can('purchase_requition_access')
                                        <a class="dropdown-item ml-3" href="{{ route('frontend.purchase-requitions.index') }}">
                                            {{ trans('cruds.purchaseRequition.title') }}
                                        </a>
                                    @endcan
                                    @can('product_category_access')
                                        <a class="dropdown-item ml-3" href="{{ route('frontend.product-categories.index') }}">
                                            {{ trans('cruds.productCategory.title') }}
                                        </a>
                                    @endcan
                                    @can('product_tag_access')
                                        <a class="dropdown-item ml-3" href="{{ route('frontend.product-tags.index') }}">
                                            {{ trans('cruds.productTag.title') }}
                                        </a>
                                    @endcan
                                    @can('basic_c_r_m_access')
                                        <a class="dropdown-item disabled" href="#">
                                            {{ trans('cruds.basicCRM.title') }}
                                        </a>
                                    @endcan
                                    @can('crm_customer_access')
                                        <a class="dropdown-item ml-3" href="{{ route('frontend.crm-customers.index') }}">
                                            {{ trans('cruds.crmCustomer.title') }}
                                        </a>
                                    @endcan
                                    @can('crm_status_access')
                                        <a class="dropdown-item ml-3" href="{{ route('frontend.crm-statuses.index') }}">
                                            {{ trans('cruds.crmStatus.title') }}
                                        </a>
                                    @endcan
                                    @can('crm_note_access')
                                        <a class="dropdown-item ml-3" href="{{ route('frontend.crm-notes.index') }}">
                                            {{ trans('cruds.crmNote.title') }}
                                        </a>
                                    @endcan
                                    @can('crm_document_access')
                                        <a class="dropdown-item ml-3" href="{{ route('frontend.crm-documents.index') }}">
                                            {{ trans('cruds.crmDocument.title') }}
                                        </a>
                                    @endcan
                                    @can('warehouse_access')
                                        <a class="dropdown-item disabled" href="#">
                                            {{ trans('cruds.warehouse.title') }}
                                        </a>
                                    @endcan
                                    @can('material_entry_access')
                                        <a class="dropdown-item ml-3" href="{{ route('frontend.material-entries.index') }}">
                                            {{ trans('cruds.materialEntry.title') }}
                                        </a>
                                    @endcan
                                    @can('transfer_produk_access')
                                        <a class="dropdown-item ml-3" href="{{ route('frontend.transfer-produks.index') }}">
                                            {{ trans('cruds.transferProduk.title') }}
                                        </a>
                                    @endcan
                                    @can('transfer_material_access')
                                        <a class="dropdown-item ml-3" href="{{ route('frontend.transfer-materials.index') }}">
                                            {{ trans('cruds.transferMaterial.title') }}
                                        </a>
                                    @endcan
                                    @can('pengiriman_access')
                                        <a class="dropdown-item ml-3" href="{{ route('frontend.pengirimen.index') }}">
                                            {{ trans('cruds.pengiriman.title') }}
                                        </a>
                                    @endcan
                                    @can('task_management_access')
                                        <a class="dropdown-item disabled" href="#">
                                            {{ trans('cruds.taskManagement.title') }}
                                        </a>
                                    @endcan
                                    @can('task_access')
                                        <a class="dropdown-item ml-3" href="{{ route('frontend.tasks.index') }}">
                                            {{ trans('cruds.task.title') }}
                                        </a>
                                    @endcan
                                    @can('list_of_material_access')
                                        <a class="dropdown-item ml-3" href="{{ route('frontend.list-of-materials.index') }}">
                                            {{ trans('cruds.listOfMaterial.title') }}
                                        </a>
                                    @endcan
                                    @can('production_monitoring_access')
                                        <a class="dropdown-item ml-3" href="{{ route('frontend.production-monitorings.index') }}">
                                            {{ trans('cruds.productionMonitoring.title') }}
                                        </a>
                                    @endcan
                                    @can('quality_control_access')
                                        <a class="dropdown-item ml-3" href="{{ route('frontend.quality-controls.index') }}">
                                            {{ trans('cruds.qualityControl.title') }}
                                        </a>
                                    @endcan
                                    @can('machine_report_access')
                                        <a class="dropdown-item ml-3" href="{{ route('frontend.machine-reports.index') }}">
                                            {{ trans('cruds.machineReport.title') }}
                                        </a>
                                    @endcan
                                    @can('task_status_access')
                                        <a class="dropdown-item ml-3" href="{{ route('frontend.task-statuses.index') }}">
                                            {{ trans('cruds.taskStatus.title') }}
                                        </a>
                                    @endcan
                                    @can('task_tag_access')
                                        <a class="dropdown-item ml-3" href="{{ route('frontend.task-tags.index') }}">
                                            {{ trans('cruds.taskTag.title') }}
                                        </a>
                                    @endcan
                                    @can('procurement_access')
                                        <a class="dropdown-item disabled" href="#">
                                            {{ trans('cruds.procurement.title') }}
                                        </a>
                                    @endcan
                                    @can('request_for_quotation_access')
                                        <a class="dropdown-item ml-3" href="{{ route('frontend.request-for-quotations.index') }}">
                                            {{ trans('cruds.requestForQuotation.title') }}
                                        </a>
                                    @endcan
                                    @can('purchase_inq_access')
                                        <a class="dropdown-item ml-3" href="{{ route('frontend.purchase-inqs.index') }}">
                                            {{ trans('cruds.purchaseInq.title') }}
                                        </a>
                                    @endcan
                                    @can('purchase_order_access')
                                        <a class="dropdown-item ml-3" href="{{ route('frontend.purchase-orders.index') }}">
                                            {{ trans('cruds.purchaseOrder.title') }}
                                        </a>
                                    @endcan
                                    @can('purchase_return_access')
                                        <a class="dropdown-item ml-3" href="{{ route('frontend.purchase-returns.index') }}">
                                            {{ trans('cruds.purchaseReturn.title') }}
                                        </a>
                                    @endcan
                                    @can('data_vendor_access')
                                        <a class="dropdown-item disabled" href="#">
                                            {{ trans('cruds.dataVendor.title') }}
                                        </a>
                                    @endcan
                                    @can('vendor_access')
                                        <a class="dropdown-item ml-3" href="{{ route('frontend.vendors.index') }}">
                                            {{ trans('cruds.vendor.title') }}
                                        </a>
                                    @endcan
                                    @can('purchase_quotation_access')
                                        <a class="dropdown-item ml-3" href="{{ route('frontend.purchase-quotations.index') }}">
                                            {{ trans('cruds.purchaseQuotation.title') }}
                                        </a>
                                    @endcan
                                    @can('vendor_status_access')
                                        <a class="dropdown-item ml-3" href="{{ route('frontend.vendor-statuses.index') }}">
                                            {{ trans('cruds.vendorStatus.title') }}
                                        </a>
                                    @endcan
                                    @can('notes_vendor_access')
                                        <a class="dropdown-item ml-3" href="{{ route('frontend.notes-vendors.index') }}">
                                            {{ trans('cruds.notesVendor.title') }}
                                        </a>
                                    @endcan
                                    @can('documents_vendor_access')
                                        <a class="dropdown-item ml-3" href="{{ route('frontend.documents-vendors.index') }}">
                                            {{ trans('cruds.documentsVendor.title') }}
                                        </a>
                                    @endcan
                                    @can('finance_access')
                                        <a class="dropdown-item disabled" href="#">
                                            {{ trans('cruds.finance.title') }}
                                        </a>
                                    @endcan
                                    @can('chart_of_account_access')
                                        <a class="dropdown-item ml-3" href="{{ route('frontend.chart-of-accounts.index') }}">
                                            {{ trans('cruds.chartOfAccount.title') }}
                                        </a>
                                    @endcan
                                    @can('sales_invoice_access')
                                        <a class="dropdown-item ml-3" href="{{ route('frontend.sales-invoices.index') }}">
                                            {{ trans('cruds.salesInvoice.title') }}
                                        </a>
                                    @endcan
                                    @can('purchase_invoice_access')
                                        <a class="dropdown-item ml-3" href="{{ route('frontend.purchase-invoices.index') }}">
                                            {{ trans('cruds.purchaseInvoice.title') }}
                                        </a>
                                    @endcan
                                    @can('akun_access')
                                        <a class="dropdown-item ml-3" href="{{ route('frontend.akuns.index') }}">
                                            {{ trans('cruds.akun.title') }}
                                        </a>
                                    @endcan
                                    @can('buku_besar_access')
                                        <a class="dropdown-item ml-3" href="{{ route('frontend.buku-besars.index') }}">
                                            {{ trans('cruds.bukuBesar.title') }}
                                        </a>
                                    @endcan
                                    @can('jurnal_umum_access')
                                        <a class="dropdown-item ml-3" href="{{ route('frontend.jurnal-umums.index') }}">
                                            {{ trans('cruds.jurnalUmum.title') }}
                                        </a>
                                    @endcan
                                    @can('necara_saldo_access')
                                        <a class="dropdown-item ml-3" href="{{ route('frontend.necara-saldos.index') }}">
                                            {{ trans('cruds.necaraSaldo.title') }}
                                        </a>
                                    @endcan
                                    @can('jurnal_penyelesaian_access')
                                        <a class="dropdown-item ml-3" href="{{ route('frontend.jurnal-penyelesaians.index') }}">
                                            {{ trans('cruds.jurnalPenyelesaian.title') }}
                                        </a>
                                    @endcan
                                    @can('biaya_produksi_access')
                                        <a class="dropdown-item ml-3" href="{{ route('frontend.biaya-produksis.index') }}">
                                            {{ trans('cruds.biayaProduksi.title') }}
                                        </a>
                                    @endcan
                                    @can('kas_bank_access')
                                        <a class="dropdown-item ml-3" href="{{ route('frontend.kas-banks.index') }}">
                                            {{ trans('cruds.kasBank.title') }}
                                        </a>
                                    @endcan
                                    @can('transaksi_keuangan_access')
                                        <a class="dropdown-item ml-3" href="{{ route('frontend.transaksi-keuangans.index') }}">
                                            {{ trans('cruds.transaksiKeuangan.title') }}
                                        </a>
                                    @endcan
                                    @can('invoice_pembelian_access')
                                        <a class="dropdown-item ml-3" href="{{ route('frontend.invoice-pembelians.index') }}">
                                            {{ trans('cruds.invoicePembelian.title') }}
                                        </a>
                                    @endcan
                                    @can('expense_management_access')
                                        <a class="dropdown-item disabled" href="#">
                                            {{ trans('cruds.expenseManagement.title') }}
                                        </a>
                                    @endcan
                                    @can('expense_category_access')
                                        <a class="dropdown-item ml-3" href="{{ route('frontend.expense-categories.index') }}">
                                            {{ trans('cruds.expenseCategory.title') }}
                                        </a>
                                    @endcan
                                    @can('income_category_access')
                                        <a class="dropdown-item ml-3" href="{{ route('frontend.income-categories.index') }}">
                                            {{ trans('cruds.incomeCategory.title') }}
                                        </a>
                                    @endcan
                                    @can('expense_access')
                                        <a class="dropdown-item ml-3" href="{{ route('frontend.expenses.index') }}">
                                            {{ trans('cruds.expense.title') }}
                                        </a>
                                    @endcan
                                    @can('income_access')
                                        <a class="dropdown-item ml-3" href="{{ route('frontend.incomes.index') }}">
                                            {{ trans('cruds.income.title') }}
                                        </a>
                                    @endcan
                                    @can('user_management_access')
                                        <a class="dropdown-item disabled" href="#">
                                            {{ trans('cruds.userManagement.title') }}
                                        </a>
                                    @endcan
                                    @can('permission_access')
                                        <a class="dropdown-item ml-3" href="{{ route('frontend.permissions.index') }}">
                                            {{ trans('cruds.permission.title') }}
                                        </a>
                                    @endcan
                                    @can('role_access')
                                        <a class="dropdown-item ml-3" href="{{ route('frontend.roles.index') }}">
                                            {{ trans('cruds.role.title') }}
                                        </a>
                                    @endcan
                                    @can('user_access')
                                        <a class="dropdown-item ml-3" href="{{ route('frontend.users.index') }}">
                                            {{ trans('cruds.user.title') }}
                                        </a>
                                    @endcan
                                    @can('asset_management_access')
                                        <a class="dropdown-item disabled" href="#">
                                            {{ trans('cruds.assetManagement.title') }}
                                        </a>
                                    @endcan
                                    @can('asset_category_access')
                                        <a class="dropdown-item ml-3" href="{{ route('frontend.asset-categories.index') }}">
                                            {{ trans('cruds.assetCategory.title') }}
                                        </a>
                                    @endcan
                                    @can('asset_location_access')
                                        <a class="dropdown-item ml-3" href="{{ route('frontend.asset-locations.index') }}">
                                            {{ trans('cruds.assetLocation.title') }}
                                        </a>
                                    @endcan
                                    @can('asset_status_access')
                                        <a class="dropdown-item ml-3" href="{{ route('frontend.asset-statuses.index') }}">
                                            {{ trans('cruds.assetStatus.title') }}
                                        </a>
                                    @endcan
                                    @can('asset_access')
                                        <a class="dropdown-item ml-3" href="{{ route('frontend.assets.index') }}">
                                            {{ trans('cruds.asset.title') }}
                                        </a>
                                    @endcan
                                    @can('assets_history_access')
                                        <a class="dropdown-item ml-3" href="{{ route('frontend.assets-histories.index') }}">
                                            {{ trans('cruds.assetsHistory.title') }}
                                        </a>
                                    @endcan
                                    @can('user_alert_access')
                                        <a class="dropdown-item" href="{{ route('frontend.user-alerts.index') }}">
                                            {{ trans('cruds.userAlert.title') }}
                                        </a>
                                    @endcan
                                    @can('faq_management_access')
                                        <a class="dropdown-item disabled" href="#">
                                            {{ trans('cruds.faqManagement.title') }}
                                        </a>
                                    @endcan
                                    @can('faq_category_access')
                                        <a class="dropdown-item ml-3" href="{{ route('frontend.faq-categories.index') }}">
                                            {{ trans('cruds.faqCategory.title') }}
                                        </a>
                                    @endcan
                                    @can('faq_question_access')
                                        <a class="dropdown-item ml-3" href="{{ route('frontend.faq-questions.index') }}">
                                            {{ trans('cruds.faqQuestion.title') }}
                                        </a>
                                    @endcan

                                    <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @if(session('message'))
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="alert alert-success" role="alert">{{ session('message') }}</div>
                        </div>
                    </div>
                </div>
            @endif
            @if($errors->count() > 0)
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="alert alert-danger">
                                <ul class="list-unstyled mb-0">
                                    @foreach($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
            @yield('content')
        </main>
    </div>
</body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.perfect-scrollbar/1.5.0/perfect-scrollbar.min.js"></script>
<script src="//cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
<script src="//cdn.datatables.net/buttons/1.2.4/js/dataTables.buttons.min.js"></script>
<script src="//cdn.datatables.net/buttons/1.2.4/js/buttons.flash.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.2.4/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.2.4/js/buttons.print.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.2.4/js/buttons.colVis.min.js"></script>
<script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/pdfmake.min.js"></script>
<script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/vfs_fonts.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js"></script>
<script src="https://cdn.datatables.net/select/1.3.0/js/dataTables.select.min.js"></script>
<script src="https://cdn.ckeditor.com/ckeditor5/16.0.0/classic/ckeditor.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.22.2/moment.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/js/bootstrap-datetimepicker.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.5/js/select2.full.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/min/dropzone.min.js"></script>
<script src="{{ asset('js/main.js') }}"></script>
@yield('scripts')

</html>