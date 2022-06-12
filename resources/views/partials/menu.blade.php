<div id="sidebar" class="c-sidebar c-sidebar-fixed c-sidebar-lg-show">

    <div class="c-sidebar-brand d-md-down-none">
        <a class="c-sidebar-brand-full h4" href="#">
            {{ trans('panel.site_title') }}
        </a>
    </div>

    <ul class="c-sidebar-nav">
        <li class="c-sidebar-nav-item">
            <a href="{{ route("admin.home") }}" class="c-sidebar-nav-link">
                <i class="c-sidebar-nav-icon fas fa-fw fa-tachometer-alt">

                </i>
                {{ trans('global.dashboard') }}
            </a>
        </li>
        @can('sales_marketing_access')
            <li class="c-sidebar-nav-dropdown {{ request()->is("admin/sales-inquiries*") ? "c-show" : "" }} {{ request()->is("admin/sales-quotations*") ? "c-show" : "" }} {{ request()->is("admin/sales-orders*") ? "c-show" : "" }}">
                <a class="c-sidebar-nav-dropdown-toggle" href="#">
                    <i class="fa-fw fas fa-shopping-cart c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.salesMarketing.title') }}
                </a>
                <ul class="c-sidebar-nav-dropdown-items">
                    @can('sales_inquiry_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.sales-inquiries.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/sales-inquiries") || request()->is("admin/sales-inquiries/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-file c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.salesInquiry.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('sales_quotation_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.sales-quotations.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/sales-quotations") || request()->is("admin/sales-quotations/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-quote-left c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.salesQuotation.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('sales_order_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.sales-orders.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/sales-orders") || request()->is("admin/sales-orders/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-file-alt c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.salesOrder.title') }}
                            </a>
                        </li>
                    @endcan
                </ul>
            </li>
        @endcan
        @can('product_management_access')
            <li class="c-sidebar-nav-dropdown {{ request()->is("admin/products*") ? "c-show" : "" }} {{ request()->is("admin/request-stock-products*") ? "c-show" : "" }} {{ request()->is("admin/materials*") ? "c-show" : "" }} {{ request()->is("admin/purchase-requitions*") ? "c-show" : "" }} {{ request()->is("admin/product-categories*") ? "c-show" : "" }} {{ request()->is("admin/product-tags*") ? "c-show" : "" }}">
                <a class="c-sidebar-nav-dropdown-toggle" href="#">
                    <i class="fa-fw fas fa-database c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.productManagement.title') }}
                </a>
                <ul class="c-sidebar-nav-dropdown-items">
                    @can('product_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.products.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/products") || request()->is("admin/products/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-shopping-cart c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.product.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('request_stock_product_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.request-stock-products.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/request-stock-products") || request()->is("admin/request-stock-products/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-clipboard-list c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.requestStockProduct.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('material_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.materials.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/materials") || request()->is("admin/materials/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-box-open c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.material.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('purchase_requition_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.purchase-requitions.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/purchase-requitions") || request()->is("admin/purchase-requitions/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-clipboard-list c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.purchaseRequition.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('product_category_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.product-categories.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/product-categories") || request()->is("admin/product-categories/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-folder c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.productCategory.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('product_tag_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.product-tags.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/product-tags") || request()->is("admin/product-tags/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-folder c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.productTag.title') }}
                            </a>
                        </li>
                    @endcan
                </ul>
            </li>
        @endcan
        @can('basic_c_r_m_access')
            <li class="c-sidebar-nav-dropdown {{ request()->is("admin/crm-customers*") ? "c-show" : "" }} {{ request()->is("admin/crm-statuses*") ? "c-show" : "" }} {{ request()->is("admin/crm-notes*") ? "c-show" : "" }} {{ request()->is("admin/crm-documents*") ? "c-show" : "" }}">
                <a class="c-sidebar-nav-dropdown-toggle" href="#">
                    <i class="fa-fw fas fa-database c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.basicCRM.title') }}
                </a>
                <ul class="c-sidebar-nav-dropdown-items">
                    @can('crm_customer_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.crm-customers.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/crm-customers") || request()->is("admin/crm-customers/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-user-plus c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.crmCustomer.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('crm_status_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.crm-statuses.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/crm-statuses") || request()->is("admin/crm-statuses/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-folder c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.crmStatus.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('crm_note_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.crm-notes.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/crm-notes") || request()->is("admin/crm-notes/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-sticky-note c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.crmNote.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('crm_document_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.crm-documents.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/crm-documents") || request()->is("admin/crm-documents/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-folder c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.crmDocument.title') }}
                            </a>
                        </li>
                    @endcan
                </ul>
            </li>
        @endcan
        @can('warehouse_access')
            <li class="c-sidebar-nav-dropdown {{ request()->is("admin/material-entries*") ? "c-show" : "" }} {{ request()->is("admin/transfer-produks*") ? "c-show" : "" }} {{ request()->is("admin/transfer-materials*") ? "c-show" : "" }} {{ request()->is("admin/pengirimen*") ? "c-show" : "" }}">
                <a class="c-sidebar-nav-dropdown-toggle" href="#">
                    <i class="fa-fw fas fa-warehouse c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.warehouse.title') }}
                </a>
                <ul class="c-sidebar-nav-dropdown-items">
                    @can('material_entry_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.material-entries.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/material-entries") || request()->is("admin/material-entries/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-cogs c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.materialEntry.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('transfer_produk_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.transfer-produks.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/transfer-produks") || request()->is("admin/transfer-produks/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-exchange-alt c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.transferProduk.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('transfer_material_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.transfer-materials.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/transfer-materials") || request()->is("admin/transfer-materials/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-exchange-alt c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.transferMaterial.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('pengiriman_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.pengirimen.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/pengirimen") || request()->is("admin/pengirimen/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-shipping-fast c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.pengiriman.title') }}
                            </a>
                        </li>
                    @endcan
                </ul>
            </li>
        @endcan
        @can('task_management_access')
            <li class="c-sidebar-nav-dropdown {{ request()->is("admin/tasks-calendars*") ? "c-show" : "" }} {{ request()->is("admin/tasks*") ? "c-show" : "" }} {{ request()->is("admin/list-of-materials*") ? "c-show" : "" }} {{ request()->is("admin/production-monitorings*") ? "c-show" : "" }} {{ request()->is("admin/quality-controls*") ? "c-show" : "" }} {{ request()->is("admin/machine-reports*") ? "c-show" : "" }} {{ request()->is("admin/task-statuses*") ? "c-show" : "" }} {{ request()->is("admin/task-tags*") ? "c-show" : "" }}">
                <a class="c-sidebar-nav-dropdown-toggle" href="#">
                    <i class="fa-fw fas fa-list c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.taskManagement.title') }}
                </a>
                <ul class="c-sidebar-nav-dropdown-items">
                    @can('tasks_calendar_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.tasks-calendars.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/tasks-calendars") || request()->is("admin/tasks-calendars/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-calendar c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.tasksCalendar.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('task_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.tasks.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/tasks") || request()->is("admin/tasks/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-briefcase c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.task.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('list_of_material_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.list-of-materials.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/list-of-materials") || request()->is("admin/list-of-materials/*") ? "c-active" : "" }}">
                                <i class="fa-fw far fa-list-alt c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.listOfMaterial.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('production_monitoring_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.production-monitorings.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/production-monitorings") || request()->is("admin/production-monitorings/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-cogs c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.productionMonitoring.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('quality_control_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.quality-controls.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/quality-controls") || request()->is("admin/quality-controls/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-cogs c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.qualityControl.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('machine_report_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.machine-reports.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/machine-reports") || request()->is("admin/machine-reports/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-hdd c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.machineReport.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('task_status_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.task-statuses.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/task-statuses") || request()->is("admin/task-statuses/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-server c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.taskStatus.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('task_tag_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.task-tags.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/task-tags") || request()->is("admin/task-tags/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-server c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.taskTag.title') }}
                            </a>
                        </li>
                    @endcan
                </ul>
            </li>
        @endcan
        @can('procurement_access')
            <li class="c-sidebar-nav-dropdown {{ request()->is("admin/request-for-quotations*") ? "c-show" : "" }} {{ request()->is("admin/purchase-inqs*") ? "c-show" : "" }} {{ request()->is("admin/purchase-orders*") ? "c-show" : "" }} {{ request()->is("admin/purchase-returns*") ? "c-show" : "" }}">
                <a class="c-sidebar-nav-dropdown-toggle" href="#">
                    <i class="fa-fw fas fa-box c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.procurement.title') }}
                </a>
                <ul class="c-sidebar-nav-dropdown-items">
                    @can('request_for_quotation_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.request-for-quotations.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/request-for-quotations") || request()->is("admin/request-for-quotations/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-braille c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.requestForQuotation.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('purchase_inq_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.purchase-inqs.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/purchase-inqs") || request()->is("admin/purchase-inqs/*") ? "c-active" : "" }}">
                                <i class="fa-fw far fa-list-alt c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.purchaseInq.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('purchase_order_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.purchase-orders.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/purchase-orders") || request()->is("admin/purchase-orders/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-shopping-basket c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.purchaseOrder.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('purchase_return_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.purchase-returns.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/purchase-returns") || request()->is("admin/purchase-returns/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-undo c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.purchaseReturn.title') }}
                            </a>
                        </li>
                    @endcan
                </ul>
            </li>
        @endcan
        @can('data_vendor_access')
            <li class="c-sidebar-nav-dropdown {{ request()->is("admin/vendors*") ? "c-show" : "" }} {{ request()->is("admin/purchase-quotations*") ? "c-show" : "" }} {{ request()->is("admin/vendor-statuses*") ? "c-show" : "" }} {{ request()->is("admin/notes-vendors*") ? "c-show" : "" }} {{ request()->is("admin/documents-vendors*") ? "c-show" : "" }}">
                <a class="c-sidebar-nav-dropdown-toggle" href="#">
                    <i class="fa-fw fas fa-gem c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.dataVendor.title') }}
                </a>
                <ul class="c-sidebar-nav-dropdown-items">
                    @can('vendor_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.vendors.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/vendors") || request()->is("admin/vendors/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-cogs c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.vendor.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('purchase_quotation_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.purchase-quotations.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/purchase-quotations") || request()->is("admin/purchase-quotations/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-quote-left c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.purchaseQuotation.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('vendor_status_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.vendor-statuses.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/vendor-statuses") || request()->is("admin/vendor-statuses/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-folder c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.vendorStatus.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('notes_vendor_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.notes-vendors.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/notes-vendors") || request()->is("admin/notes-vendors/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-sticky-note c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.notesVendor.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('documents_vendor_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.documents-vendors.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/documents-vendors") || request()->is("admin/documents-vendors/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-folder c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.documentsVendor.title') }}
                            </a>
                        </li>
                    @endcan
                </ul>
            </li>
        @endcan
        @can('finance_access')
            <li class="c-sidebar-nav-dropdown {{ request()->is("admin/chart-of-accounts*") ? "c-show" : "" }} {{ request()->is("admin/sales-invoices*") ? "c-show" : "" }} {{ request()->is("admin/purchase-invoices*") ? "c-show" : "" }} {{ request()->is("admin/akuns*") ? "c-show" : "" }} {{ request()->is("admin/buku-besars*") ? "c-show" : "" }} {{ request()->is("admin/jurnal-umums*") ? "c-show" : "" }} {{ request()->is("admin/necara-saldos*") ? "c-show" : "" }} {{ request()->is("admin/jurnal-penyelesaians*") ? "c-show" : "" }} {{ request()->is("admin/biaya-produksis*") ? "c-show" : "" }} {{ request()->is("admin/kas-banks*") ? "c-show" : "" }} {{ request()->is("admin/transaksi-keuangans*") ? "c-show" : "" }} {{ request()->is("admin/invoice-pembelians*") ? "c-show" : "" }}">
                <a class="c-sidebar-nav-dropdown-toggle" href="#">
                    <i class="fa-fw fas fa-hand-holding-usd c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.finance.title') }}
                </a>
                <ul class="c-sidebar-nav-dropdown-items">
                    @can('chart_of_account_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.chart-of-accounts.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/chart-of-accounts") || request()->is("admin/chart-of-accounts/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-cogs c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.chartOfAccount.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('sales_invoice_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.sales-invoices.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/sales-invoices") || request()->is("admin/sales-invoices/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-file-invoice-dollar c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.salesInvoice.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('purchase_invoice_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.purchase-invoices.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/purchase-invoices") || request()->is("admin/purchase-invoices/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-file-invoice c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.purchaseInvoice.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('akun_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.akuns.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/akuns") || request()->is("admin/akuns/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-address-book c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.akun.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('buku_besar_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.buku-besars.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/buku-besars") || request()->is("admin/buku-besars/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-book-open c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.bukuBesar.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('jurnal_umum_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.jurnal-umums.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/jurnal-umums") || request()->is("admin/jurnal-umums/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-cogs c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.jurnalUmum.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('necara_saldo_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.necara-saldos.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/necara-saldos") || request()->is("admin/necara-saldos/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-balance-scale c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.necaraSaldo.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('jurnal_penyelesaian_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.jurnal-penyelesaians.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/jurnal-penyelesaians") || request()->is("admin/jurnal-penyelesaians/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-cogs c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.jurnalPenyelesaian.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('biaya_produksi_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.biaya-produksis.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/biaya-produksis") || request()->is("admin/biaya-produksis/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-cogs c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.biayaProduksi.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('kas_bank_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.kas-banks.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/kas-banks") || request()->is("admin/kas-banks/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-cogs c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.kasBank.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('transaksi_keuangan_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.transaksi-keuangans.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/transaksi-keuangans") || request()->is("admin/transaksi-keuangans/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-dollar-sign c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.transaksiKeuangan.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('invoice_pembelian_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.invoice-pembelians.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/invoice-pembelians") || request()->is("admin/invoice-pembelians/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-envelope-square c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.invoicePembelian.title') }}
                            </a>
                        </li>
                    @endcan
                </ul>
            </li>
        @endcan
        @can('expense_management_access')
            <li class="c-sidebar-nav-dropdown {{ request()->is("admin/expense-categories*") ? "c-show" : "" }} {{ request()->is("admin/income-categories*") ? "c-show" : "" }} {{ request()->is("admin/expenses*") ? "c-show" : "" }} {{ request()->is("admin/incomes*") ? "c-show" : "" }} {{ request()->is("admin/expense-reports*") ? "c-show" : "" }}">
                <a class="c-sidebar-nav-dropdown-toggle" href="#">
                    <i class="fa-fw fas fa-money-check-alt c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.expenseManagement.title') }}
                </a>
                <ul class="c-sidebar-nav-dropdown-items">
                    @can('expense_category_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.expense-categories.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/expense-categories") || request()->is("admin/expense-categories/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-list c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.expenseCategory.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('income_category_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.income-categories.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/income-categories") || request()->is("admin/income-categories/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-list c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.incomeCategory.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('expense_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.expenses.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/expenses") || request()->is("admin/expenses/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-arrow-circle-right c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.expense.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('income_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.incomes.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/incomes") || request()->is("admin/incomes/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-arrow-circle-right c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.income.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('expense_report_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.expense-reports.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/expense-reports") || request()->is("admin/expense-reports/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-chart-line c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.expenseReport.title') }}
                            </a>
                        </li>
                    @endcan
                </ul>
            </li>
        @endcan
        @can('user_management_access')
            <li class="c-sidebar-nav-dropdown {{ request()->is("admin/permissions*") ? "c-show" : "" }} {{ request()->is("admin/roles*") ? "c-show" : "" }} {{ request()->is("admin/users*") ? "c-show" : "" }} {{ request()->is("admin/audit-logs*") ? "c-show" : "" }}">
                <a class="c-sidebar-nav-dropdown-toggle" href="#">
                    <i class="fa-fw fas fa-users c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.userManagement.title') }}
                </a>
                <ul class="c-sidebar-nav-dropdown-items">
                    @can('permission_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.permissions.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/permissions") || request()->is("admin/permissions/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-unlock-alt c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.permission.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('role_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.roles.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/roles") || request()->is("admin/roles/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-briefcase c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.role.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('user_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.users.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/users") || request()->is("admin/users/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-user c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.user.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('audit_log_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.audit-logs.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/audit-logs") || request()->is("admin/audit-logs/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-file-alt c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.auditLog.title') }}
                            </a>
                        </li>
                    @endcan
                </ul>
            </li>
        @endcan
        @can('asset_management_access')
            <li class="c-sidebar-nav-dropdown {{ request()->is("admin/asset-categories*") ? "c-show" : "" }} {{ request()->is("admin/asset-locations*") ? "c-show" : "" }} {{ request()->is("admin/asset-statuses*") ? "c-show" : "" }} {{ request()->is("admin/assets*") ? "c-show" : "" }} {{ request()->is("admin/assets-histories*") ? "c-show" : "" }}">
                <a class="c-sidebar-nav-dropdown-toggle" href="#">
                    <i class="fa-fw fas fa-book c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.assetManagement.title') }}
                </a>
                <ul class="c-sidebar-nav-dropdown-items">
                    @can('asset_category_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.asset-categories.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/asset-categories") || request()->is("admin/asset-categories/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-tags c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.assetCategory.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('asset_location_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.asset-locations.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/asset-locations") || request()->is("admin/asset-locations/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-map-marker c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.assetLocation.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('asset_status_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.asset-statuses.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/asset-statuses") || request()->is("admin/asset-statuses/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-server c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.assetStatus.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('asset_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.assets.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/assets") || request()->is("admin/assets/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-book c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.asset.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('assets_history_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.assets-histories.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/assets-histories") || request()->is("admin/assets-histories/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-th-list c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.assetsHistory.title') }}
                            </a>
                        </li>
                    @endcan
                </ul>
            </li>
        @endcan
        @can('user_alert_access')
            <li class="c-sidebar-nav-item">
                <a href="{{ route("admin.user-alerts.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/user-alerts") || request()->is("admin/user-alerts/*") ? "c-active" : "" }}">
                    <i class="fa-fw fas fa-bell c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.userAlert.title') }}
                </a>
            </li>
        @endcan
        @can('faq_management_access')
            <li class="c-sidebar-nav-dropdown {{ request()->is("admin/faq-categories*") ? "c-show" : "" }} {{ request()->is("admin/faq-questions*") ? "c-show" : "" }}">
                <a class="c-sidebar-nav-dropdown-toggle" href="#">
                    <i class="fa-fw fas fa-question c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.faqManagement.title') }}
                </a>
                <ul class="c-sidebar-nav-dropdown-items">
                    @can('faq_category_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.faq-categories.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/faq-categories") || request()->is("admin/faq-categories/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-briefcase c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.faqCategory.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('faq_question_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.faq-questions.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/faq-questions") || request()->is("admin/faq-questions/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-question c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.faqQuestion.title') }}
                            </a>
                        </li>
                    @endcan
                </ul>
            </li>
        @endcan
        @php($unread = \App\Models\QaTopic::unreadCount())
            <li class="c-sidebar-nav-item">
                <a href="{{ route("admin.messenger.index") }}" class="{{ request()->is("admin/messenger") || request()->is("admin/messenger/*") ? "c-active" : "" }} c-sidebar-nav-link">
                    <i class="c-sidebar-nav-icon fa-fw fa fa-envelope">

                    </i>
                    <span>{{ trans('global.messages') }}</span>
                    @if($unread > 0)
                        <strong>( {{ $unread }} )</strong>
                    @endif

                </a>
            </li>
            @if(file_exists(app_path('Http/Controllers/Auth/ChangePasswordController.php')))
                @can('profile_password_edit')
                    <li class="c-sidebar-nav-item">
                        <a class="c-sidebar-nav-link {{ request()->is('profile/password') || request()->is('profile/password/*') ? 'c-active' : '' }}" href="{{ route('profile.password.edit') }}">
                            <i class="fa-fw fas fa-key c-sidebar-nav-icon">
                            </i>
                            {{ trans('global.change_password') }}
                        </a>
                    </li>
                @endcan
            @endif
            <li class="c-sidebar-nav-item">
                <a href="#" class="c-sidebar-nav-link" onclick="event.preventDefault(); document.getElementById('logoutform').submit();">
                    <i class="c-sidebar-nav-icon fas fa-fw fa-sign-out-alt">

                    </i>
                    {{ trans('global.logout') }}
                </a>
            </li>
    </ul>

</div>