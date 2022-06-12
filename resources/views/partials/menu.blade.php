<aside class="main-sidebar sidebar-dark-primary elevation-4" style="min-height: 917px;">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
        <span class="brand-text font-weight-light">{{ trans('panel.site_title') }}</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user (optional) -->

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route("admin.home") }}">
                        <i class="fas fa-fw fa-tachometer-alt nav-icon">
                        </i>
                        <p>
                            {{ trans('global.dashboard') }}
                        </p>
                    </a>
                </li>
                @can('sales_marketing_access')
                    <li class="nav-item has-treeview {{ request()->is("admin/sales-inquiries*") ? "menu-open" : "" }} {{ request()->is("admin/sales-quotations*") ? "menu-open" : "" }} {{ request()->is("admin/sales-orders*") ? "menu-open" : "" }}">
                        <a class="nav-link nav-dropdown-toggle" href="#">
                            <i class="fa-fw nav-icon fas fa-shopping-cart">

                            </i>
                            <p>
                                {{ trans('cruds.salesMarketing.title') }}
                                <i class="right fa fa-fw fa-angle-left nav-icon"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            @can('sales_inquiry_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.sales-inquiries.index") }}" class="nav-link {{ request()->is("admin/sales-inquiries") || request()->is("admin/sales-inquiries/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-file">

                                        </i>
                                        <p>
                                            {{ trans('cruds.salesInquiry.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('sales_quotation_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.sales-quotations.index") }}" class="nav-link {{ request()->is("admin/sales-quotations") || request()->is("admin/sales-quotations/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-quote-left">

                                        </i>
                                        <p>
                                            {{ trans('cruds.salesQuotation.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('sales_order_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.sales-orders.index") }}" class="nav-link {{ request()->is("admin/sales-orders") || request()->is("admin/sales-orders/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-file-alt">

                                        </i>
                                        <p>
                                            {{ trans('cruds.salesOrder.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endcan
                @can('product_management_access')
                    <li class="nav-item has-treeview {{ request()->is("admin/products*") ? "menu-open" : "" }} {{ request()->is("admin/request-stock-products*") ? "menu-open" : "" }} {{ request()->is("admin/materials*") ? "menu-open" : "" }} {{ request()->is("admin/purchase-requitions*") ? "menu-open" : "" }} {{ request()->is("admin/product-categories*") ? "menu-open" : "" }} {{ request()->is("admin/product-tags*") ? "menu-open" : "" }}">
                        <a class="nav-link nav-dropdown-toggle" href="#">
                            <i class="fa-fw nav-icon fas fa-database">

                            </i>
                            <p>
                                {{ trans('cruds.productManagement.title') }}
                                <i class="right fa fa-fw fa-angle-left nav-icon"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            @can('product_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.products.index") }}" class="nav-link {{ request()->is("admin/products") || request()->is("admin/products/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-shopping-cart">

                                        </i>
                                        <p>
                                            {{ trans('cruds.product.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('request_stock_product_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.request-stock-products.index") }}" class="nav-link {{ request()->is("admin/request-stock-products") || request()->is("admin/request-stock-products/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-clipboard-list">

                                        </i>
                                        <p>
                                            {{ trans('cruds.requestStockProduct.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('material_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.materials.index") }}" class="nav-link {{ request()->is("admin/materials") || request()->is("admin/materials/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-box-open">

                                        </i>
                                        <p>
                                            {{ trans('cruds.material.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('purchase_requition_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.purchase-requitions.index") }}" class="nav-link {{ request()->is("admin/purchase-requitions") || request()->is("admin/purchase-requitions/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-clipboard-list">

                                        </i>
                                        <p>
                                            {{ trans('cruds.purchaseRequition.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('product_category_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.product-categories.index") }}" class="nav-link {{ request()->is("admin/product-categories") || request()->is("admin/product-categories/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-folder">

                                        </i>
                                        <p>
                                            {{ trans('cruds.productCategory.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('product_tag_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.product-tags.index") }}" class="nav-link {{ request()->is("admin/product-tags") || request()->is("admin/product-tags/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-folder">

                                        </i>
                                        <p>
                                            {{ trans('cruds.productTag.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endcan
                @can('basic_c_r_m_access')
                    <li class="nav-item has-treeview {{ request()->is("admin/crm-customers*") ? "menu-open" : "" }} {{ request()->is("admin/crm-statuses*") ? "menu-open" : "" }} {{ request()->is("admin/crm-notes*") ? "menu-open" : "" }} {{ request()->is("admin/crm-documents*") ? "menu-open" : "" }}">
                        <a class="nav-link nav-dropdown-toggle" href="#">
                            <i class="fa-fw nav-icon fas fa-database">

                            </i>
                            <p>
                                {{ trans('cruds.basicCRM.title') }}
                                <i class="right fa fa-fw fa-angle-left nav-icon"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            @can('crm_customer_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.crm-customers.index") }}" class="nav-link {{ request()->is("admin/crm-customers") || request()->is("admin/crm-customers/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-user-plus">

                                        </i>
                                        <p>
                                            {{ trans('cruds.crmCustomer.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('crm_status_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.crm-statuses.index") }}" class="nav-link {{ request()->is("admin/crm-statuses") || request()->is("admin/crm-statuses/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-folder">

                                        </i>
                                        <p>
                                            {{ trans('cruds.crmStatus.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('crm_note_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.crm-notes.index") }}" class="nav-link {{ request()->is("admin/crm-notes") || request()->is("admin/crm-notes/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-sticky-note">

                                        </i>
                                        <p>
                                            {{ trans('cruds.crmNote.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('crm_document_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.crm-documents.index") }}" class="nav-link {{ request()->is("admin/crm-documents") || request()->is("admin/crm-documents/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-folder">

                                        </i>
                                        <p>
                                            {{ trans('cruds.crmDocument.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endcan
                @can('warehouse_access')
                    <li class="nav-item has-treeview {{ request()->is("admin/material-entries*") ? "menu-open" : "" }} {{ request()->is("admin/transfer-produks*") ? "menu-open" : "" }} {{ request()->is("admin/transfer-materials*") ? "menu-open" : "" }} {{ request()->is("admin/pengirimen*") ? "menu-open" : "" }}">
                        <a class="nav-link nav-dropdown-toggle" href="#">
                            <i class="fa-fw nav-icon fas fa-warehouse">

                            </i>
                            <p>
                                {{ trans('cruds.warehouse.title') }}
                                <i class="right fa fa-fw fa-angle-left nav-icon"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            @can('material_entry_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.material-entries.index") }}" class="nav-link {{ request()->is("admin/material-entries") || request()->is("admin/material-entries/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-cogs">

                                        </i>
                                        <p>
                                            {{ trans('cruds.materialEntry.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('transfer_produk_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.transfer-produks.index") }}" class="nav-link {{ request()->is("admin/transfer-produks") || request()->is("admin/transfer-produks/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-exchange-alt">

                                        </i>
                                        <p>
                                            {{ trans('cruds.transferProduk.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('transfer_material_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.transfer-materials.index") }}" class="nav-link {{ request()->is("admin/transfer-materials") || request()->is("admin/transfer-materials/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-exchange-alt">

                                        </i>
                                        <p>
                                            {{ trans('cruds.transferMaterial.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('pengiriman_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.pengirimen.index") }}" class="nav-link {{ request()->is("admin/pengirimen") || request()->is("admin/pengirimen/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-shipping-fast">

                                        </i>
                                        <p>
                                            {{ trans('cruds.pengiriman.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endcan
                @can('task_management_access')
                    <li class="nav-item has-treeview {{ request()->is("admin/tasks-calendars*") ? "menu-open" : "" }} {{ request()->is("admin/tasks*") ? "menu-open" : "" }} {{ request()->is("admin/list-of-materials*") ? "menu-open" : "" }} {{ request()->is("admin/production-monitorings*") ? "menu-open" : "" }} {{ request()->is("admin/quality-controls*") ? "menu-open" : "" }} {{ request()->is("admin/machine-reports*") ? "menu-open" : "" }} {{ request()->is("admin/task-statuses*") ? "menu-open" : "" }} {{ request()->is("admin/task-tags*") ? "menu-open" : "" }}">
                        <a class="nav-link nav-dropdown-toggle" href="#">
                            <i class="fa-fw nav-icon fas fa-list">

                            </i>
                            <p>
                                {{ trans('cruds.taskManagement.title') }}
                                <i class="right fa fa-fw fa-angle-left nav-icon"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            @can('tasks_calendar_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.tasks-calendars.index") }}" class="nav-link {{ request()->is("admin/tasks-calendars") || request()->is("admin/tasks-calendars/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-calendar">

                                        </i>
                                        <p>
                                            {{ trans('cruds.tasksCalendar.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('task_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.tasks.index") }}" class="nav-link {{ request()->is("admin/tasks") || request()->is("admin/tasks/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-briefcase">

                                        </i>
                                        <p>
                                            {{ trans('cruds.task.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('list_of_material_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.list-of-materials.index") }}" class="nav-link {{ request()->is("admin/list-of-materials") || request()->is("admin/list-of-materials/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon far fa-list-alt">

                                        </i>
                                        <p>
                                            {{ trans('cruds.listOfMaterial.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('production_monitoring_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.production-monitorings.index") }}" class="nav-link {{ request()->is("admin/production-monitorings") || request()->is("admin/production-monitorings/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-cogs">

                                        </i>
                                        <p>
                                            {{ trans('cruds.productionMonitoring.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('quality_control_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.quality-controls.index") }}" class="nav-link {{ request()->is("admin/quality-controls") || request()->is("admin/quality-controls/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-cogs">

                                        </i>
                                        <p>
                                            {{ trans('cruds.qualityControl.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('machine_report_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.machine-reports.index") }}" class="nav-link {{ request()->is("admin/machine-reports") || request()->is("admin/machine-reports/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-hdd">

                                        </i>
                                        <p>
                                            {{ trans('cruds.machineReport.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('task_status_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.task-statuses.index") }}" class="nav-link {{ request()->is("admin/task-statuses") || request()->is("admin/task-statuses/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-server">

                                        </i>
                                        <p>
                                            {{ trans('cruds.taskStatus.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('task_tag_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.task-tags.index") }}" class="nav-link {{ request()->is("admin/task-tags") || request()->is("admin/task-tags/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-server">

                                        </i>
                                        <p>
                                            {{ trans('cruds.taskTag.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endcan
                @can('procurement_access')
                    <li class="nav-item has-treeview {{ request()->is("admin/request-for-quotations*") ? "menu-open" : "" }} {{ request()->is("admin/purchase-inqs*") ? "menu-open" : "" }} {{ request()->is("admin/purchase-orders*") ? "menu-open" : "" }} {{ request()->is("admin/purchase-returns*") ? "menu-open" : "" }}">
                        <a class="nav-link nav-dropdown-toggle" href="#">
                            <i class="fa-fw nav-icon fas fa-box">

                            </i>
                            <p>
                                {{ trans('cruds.procurement.title') }}
                                <i class="right fa fa-fw fa-angle-left nav-icon"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            @can('request_for_quotation_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.request-for-quotations.index") }}" class="nav-link {{ request()->is("admin/request-for-quotations") || request()->is("admin/request-for-quotations/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-braille">

                                        </i>
                                        <p>
                                            {{ trans('cruds.requestForQuotation.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('purchase_inq_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.purchase-inqs.index") }}" class="nav-link {{ request()->is("admin/purchase-inqs") || request()->is("admin/purchase-inqs/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon far fa-list-alt">

                                        </i>
                                        <p>
                                            {{ trans('cruds.purchaseInq.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('purchase_order_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.purchase-orders.index") }}" class="nav-link {{ request()->is("admin/purchase-orders") || request()->is("admin/purchase-orders/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-shopping-basket">

                                        </i>
                                        <p>
                                            {{ trans('cruds.purchaseOrder.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('purchase_return_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.purchase-returns.index") }}" class="nav-link {{ request()->is("admin/purchase-returns") || request()->is("admin/purchase-returns/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-undo">

                                        </i>
                                        <p>
                                            {{ trans('cruds.purchaseReturn.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endcan
                @can('data_vendor_access')
                    <li class="nav-item has-treeview {{ request()->is("admin/vendors*") ? "menu-open" : "" }} {{ request()->is("admin/purchase-quotations*") ? "menu-open" : "" }} {{ request()->is("admin/vendor-statuses*") ? "menu-open" : "" }} {{ request()->is("admin/notes-vendors*") ? "menu-open" : "" }} {{ request()->is("admin/documents-vendors*") ? "menu-open" : "" }}">
                        <a class="nav-link nav-dropdown-toggle" href="#">
                            <i class="fa-fw nav-icon fas fa-gem">

                            </i>
                            <p>
                                {{ trans('cruds.dataVendor.title') }}
                                <i class="right fa fa-fw fa-angle-left nav-icon"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            @can('vendor_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.vendors.index") }}" class="nav-link {{ request()->is("admin/vendors") || request()->is("admin/vendors/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-cogs">

                                        </i>
                                        <p>
                                            {{ trans('cruds.vendor.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('purchase_quotation_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.purchase-quotations.index") }}" class="nav-link {{ request()->is("admin/purchase-quotations") || request()->is("admin/purchase-quotations/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-quote-left">

                                        </i>
                                        <p>
                                            {{ trans('cruds.purchaseQuotation.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('vendor_status_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.vendor-statuses.index") }}" class="nav-link {{ request()->is("admin/vendor-statuses") || request()->is("admin/vendor-statuses/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-folder">

                                        </i>
                                        <p>
                                            {{ trans('cruds.vendorStatus.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('notes_vendor_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.notes-vendors.index") }}" class="nav-link {{ request()->is("admin/notes-vendors") || request()->is("admin/notes-vendors/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-sticky-note">

                                        </i>
                                        <p>
                                            {{ trans('cruds.notesVendor.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('documents_vendor_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.documents-vendors.index") }}" class="nav-link {{ request()->is("admin/documents-vendors") || request()->is("admin/documents-vendors/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-folder">

                                        </i>
                                        <p>
                                            {{ trans('cruds.documentsVendor.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endcan
                @can('finance_access')
                    <li class="nav-item has-treeview {{ request()->is("admin/chart-of-accounts*") ? "menu-open" : "" }} {{ request()->is("admin/sales-invoices*") ? "menu-open" : "" }} {{ request()->is("admin/purchase-invoices*") ? "menu-open" : "" }} {{ request()->is("admin/akuns*") ? "menu-open" : "" }} {{ request()->is("admin/buku-besars*") ? "menu-open" : "" }} {{ request()->is("admin/jurnal-umums*") ? "menu-open" : "" }} {{ request()->is("admin/necara-saldos*") ? "menu-open" : "" }} {{ request()->is("admin/jurnal-penyelesaians*") ? "menu-open" : "" }} {{ request()->is("admin/biaya-produksis*") ? "menu-open" : "" }} {{ request()->is("admin/kas-banks*") ? "menu-open" : "" }} {{ request()->is("admin/transaksi-keuangans*") ? "menu-open" : "" }} {{ request()->is("admin/invoice-pembelians*") ? "menu-open" : "" }}">
                        <a class="nav-link nav-dropdown-toggle" href="#">
                            <i class="fa-fw nav-icon fas fa-hand-holding-usd">

                            </i>
                            <p>
                                {{ trans('cruds.finance.title') }}
                                <i class="right fa fa-fw fa-angle-left nav-icon"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            @can('chart_of_account_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.chart-of-accounts.index") }}" class="nav-link {{ request()->is("admin/chart-of-accounts") || request()->is("admin/chart-of-accounts/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-cogs">

                                        </i>
                                        <p>
                                            {{ trans('cruds.chartOfAccount.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('sales_invoice_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.sales-invoices.index") }}" class="nav-link {{ request()->is("admin/sales-invoices") || request()->is("admin/sales-invoices/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-file-invoice-dollar">

                                        </i>
                                        <p>
                                            {{ trans('cruds.salesInvoice.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('purchase_invoice_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.purchase-invoices.index") }}" class="nav-link {{ request()->is("admin/purchase-invoices") || request()->is("admin/purchase-invoices/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-file-invoice">

                                        </i>
                                        <p>
                                            {{ trans('cruds.purchaseInvoice.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('akun_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.akuns.index") }}" class="nav-link {{ request()->is("admin/akuns") || request()->is("admin/akuns/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-address-book">

                                        </i>
                                        <p>
                                            {{ trans('cruds.akun.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('buku_besar_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.buku-besars.index") }}" class="nav-link {{ request()->is("admin/buku-besars") || request()->is("admin/buku-besars/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-book-open">

                                        </i>
                                        <p>
                                            {{ trans('cruds.bukuBesar.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('jurnal_umum_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.jurnal-umums.index") }}" class="nav-link {{ request()->is("admin/jurnal-umums") || request()->is("admin/jurnal-umums/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-cogs">

                                        </i>
                                        <p>
                                            {{ trans('cruds.jurnalUmum.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('necara_saldo_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.necara-saldos.index") }}" class="nav-link {{ request()->is("admin/necara-saldos") || request()->is("admin/necara-saldos/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-balance-scale">

                                        </i>
                                        <p>
                                            {{ trans('cruds.necaraSaldo.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('jurnal_penyelesaian_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.jurnal-penyelesaians.index") }}" class="nav-link {{ request()->is("admin/jurnal-penyelesaians") || request()->is("admin/jurnal-penyelesaians/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-cogs">

                                        </i>
                                        <p>
                                            {{ trans('cruds.jurnalPenyelesaian.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('biaya_produksi_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.biaya-produksis.index") }}" class="nav-link {{ request()->is("admin/biaya-produksis") || request()->is("admin/biaya-produksis/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-cogs">

                                        </i>
                                        <p>
                                            {{ trans('cruds.biayaProduksi.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('kas_bank_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.kas-banks.index") }}" class="nav-link {{ request()->is("admin/kas-banks") || request()->is("admin/kas-banks/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-cogs">

                                        </i>
                                        <p>
                                            {{ trans('cruds.kasBank.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('transaksi_keuangan_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.transaksi-keuangans.index") }}" class="nav-link {{ request()->is("admin/transaksi-keuangans") || request()->is("admin/transaksi-keuangans/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-dollar-sign">

                                        </i>
                                        <p>
                                            {{ trans('cruds.transaksiKeuangan.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('invoice_pembelian_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.invoice-pembelians.index") }}" class="nav-link {{ request()->is("admin/invoice-pembelians") || request()->is("admin/invoice-pembelians/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-envelope-square">

                                        </i>
                                        <p>
                                            {{ trans('cruds.invoicePembelian.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endcan
                @can('expense_management_access')
                    <li class="nav-item has-treeview {{ request()->is("admin/expense-categories*") ? "menu-open" : "" }} {{ request()->is("admin/income-categories*") ? "menu-open" : "" }} {{ request()->is("admin/expenses*") ? "menu-open" : "" }} {{ request()->is("admin/incomes*") ? "menu-open" : "" }} {{ request()->is("admin/expense-reports*") ? "menu-open" : "" }}">
                        <a class="nav-link nav-dropdown-toggle" href="#">
                            <i class="fa-fw nav-icon fas fa-money-check-alt">

                            </i>
                            <p>
                                {{ trans('cruds.expenseManagement.title') }}
                                <i class="right fa fa-fw fa-angle-left nav-icon"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            @can('expense_category_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.expense-categories.index") }}" class="nav-link {{ request()->is("admin/expense-categories") || request()->is("admin/expense-categories/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-list">

                                        </i>
                                        <p>
                                            {{ trans('cruds.expenseCategory.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('income_category_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.income-categories.index") }}" class="nav-link {{ request()->is("admin/income-categories") || request()->is("admin/income-categories/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-list">

                                        </i>
                                        <p>
                                            {{ trans('cruds.incomeCategory.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('expense_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.expenses.index") }}" class="nav-link {{ request()->is("admin/expenses") || request()->is("admin/expenses/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-arrow-circle-right">

                                        </i>
                                        <p>
                                            {{ trans('cruds.expense.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('income_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.incomes.index") }}" class="nav-link {{ request()->is("admin/incomes") || request()->is("admin/incomes/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-arrow-circle-right">

                                        </i>
                                        <p>
                                            {{ trans('cruds.income.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('expense_report_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.expense-reports.index") }}" class="nav-link {{ request()->is("admin/expense-reports") || request()->is("admin/expense-reports/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-chart-line">

                                        </i>
                                        <p>
                                            {{ trans('cruds.expenseReport.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endcan
                @can('user_management_access')
                    <li class="nav-item has-treeview {{ request()->is("admin/permissions*") ? "menu-open" : "" }} {{ request()->is("admin/roles*") ? "menu-open" : "" }} {{ request()->is("admin/users*") ? "menu-open" : "" }} {{ request()->is("admin/audit-logs*") ? "menu-open" : "" }}">
                        <a class="nav-link nav-dropdown-toggle" href="#">
                            <i class="fa-fw nav-icon fas fa-users">

                            </i>
                            <p>
                                {{ trans('cruds.userManagement.title') }}
                                <i class="right fa fa-fw fa-angle-left nav-icon"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            @can('permission_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.permissions.index") }}" class="nav-link {{ request()->is("admin/permissions") || request()->is("admin/permissions/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-unlock-alt">

                                        </i>
                                        <p>
                                            {{ trans('cruds.permission.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('role_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.roles.index") }}" class="nav-link {{ request()->is("admin/roles") || request()->is("admin/roles/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-briefcase">

                                        </i>
                                        <p>
                                            {{ trans('cruds.role.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('user_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.users.index") }}" class="nav-link {{ request()->is("admin/users") || request()->is("admin/users/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-user">

                                        </i>
                                        <p>
                                            {{ trans('cruds.user.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('audit_log_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.audit-logs.index") }}" class="nav-link {{ request()->is("admin/audit-logs") || request()->is("admin/audit-logs/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-file-alt">

                                        </i>
                                        <p>
                                            {{ trans('cruds.auditLog.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endcan
                @can('asset_management_access')
                    <li class="nav-item has-treeview {{ request()->is("admin/asset-categories*") ? "menu-open" : "" }} {{ request()->is("admin/asset-locations*") ? "menu-open" : "" }} {{ request()->is("admin/asset-statuses*") ? "menu-open" : "" }} {{ request()->is("admin/assets*") ? "menu-open" : "" }} {{ request()->is("admin/assets-histories*") ? "menu-open" : "" }}">
                        <a class="nav-link nav-dropdown-toggle" href="#">
                            <i class="fa-fw nav-icon fas fa-book">

                            </i>
                            <p>
                                {{ trans('cruds.assetManagement.title') }}
                                <i class="right fa fa-fw fa-angle-left nav-icon"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            @can('asset_category_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.asset-categories.index") }}" class="nav-link {{ request()->is("admin/asset-categories") || request()->is("admin/asset-categories/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-tags">

                                        </i>
                                        <p>
                                            {{ trans('cruds.assetCategory.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('asset_location_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.asset-locations.index") }}" class="nav-link {{ request()->is("admin/asset-locations") || request()->is("admin/asset-locations/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-map-marker">

                                        </i>
                                        <p>
                                            {{ trans('cruds.assetLocation.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('asset_status_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.asset-statuses.index") }}" class="nav-link {{ request()->is("admin/asset-statuses") || request()->is("admin/asset-statuses/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-server">

                                        </i>
                                        <p>
                                            {{ trans('cruds.assetStatus.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('asset_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.assets.index") }}" class="nav-link {{ request()->is("admin/assets") || request()->is("admin/assets/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-book">

                                        </i>
                                        <p>
                                            {{ trans('cruds.asset.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('assets_history_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.assets-histories.index") }}" class="nav-link {{ request()->is("admin/assets-histories") || request()->is("admin/assets-histories/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-th-list">

                                        </i>
                                        <p>
                                            {{ trans('cruds.assetsHistory.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endcan
                @can('user_alert_access')
                    <li class="nav-item">
                        <a href="{{ route("admin.user-alerts.index") }}" class="nav-link {{ request()->is("admin/user-alerts") || request()->is("admin/user-alerts/*") ? "active" : "" }}">
                            <i class="fa-fw nav-icon fas fa-bell">

                            </i>
                            <p>
                                {{ trans('cruds.userAlert.title') }}
                            </p>
                        </a>
                    </li>
                @endcan
                @can('faq_management_access')
                    <li class="nav-item has-treeview {{ request()->is("admin/faq-categories*") ? "menu-open" : "" }} {{ request()->is("admin/faq-questions*") ? "menu-open" : "" }}">
                        <a class="nav-link nav-dropdown-toggle" href="#">
                            <i class="fa-fw nav-icon fas fa-question">

                            </i>
                            <p>
                                {{ trans('cruds.faqManagement.title') }}
                                <i class="right fa fa-fw fa-angle-left nav-icon"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            @can('faq_category_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.faq-categories.index") }}" class="nav-link {{ request()->is("admin/faq-categories") || request()->is("admin/faq-categories/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-briefcase">

                                        </i>
                                        <p>
                                            {{ trans('cruds.faqCategory.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('faq_question_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.faq-questions.index") }}" class="nav-link {{ request()->is("admin/faq-questions") || request()->is("admin/faq-questions/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-question">

                                        </i>
                                        <p>
                                            {{ trans('cruds.faqQuestion.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endcan
                @php($unread = \App\Models\QaTopic::unreadCount())
                    <li class="nav-item">
                        <a href="{{ route("admin.messenger.index") }}" class="{{ request()->is("admin/messenger") || request()->is("admin/messenger/*") ? "active" : "" }} nav-link">
                            <i class="fa-fw fa fa-envelope nav-icon">

                            </i>
                            <p>{{ trans('global.messages') }}</p>
                            @if($unread > 0)
                                <strong>( {{ $unread }} )</strong>
                            @endif

                        </a>
                    </li>
                    @if(file_exists(app_path('Http/Controllers/Auth/ChangePasswordController.php')))
                        @can('profile_password_edit')
                            <li class="nav-item">
                                <a class="nav-link {{ request()->is('profile/password') || request()->is('profile/password/*') ? 'active' : '' }}" href="{{ route('profile.password.edit') }}">
                                    <i class="fa-fw fas fa-key nav-icon">
                                    </i>
                                    <p>
                                        {{ trans('global.change_password') }}
                                    </p>
                                </a>
                            </li>
                        @endcan
                    @endif
                    <li class="nav-item">
                        <a href="#" class="nav-link" onclick="event.preventDefault(); document.getElementById('logoutform').submit();">
                            <p>
                                <i class="fas fa-fw fa-sign-out-alt nav-icon">

                                </i>
                                <p>{{ trans('global.logout') }}</p>
                            </p>
                        </a>
                    </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>