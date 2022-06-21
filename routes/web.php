<?php

Route::redirect('/', '/login');
Route::get('/home', function () {
    if (session('status')) {
        return redirect()->route('admin.home')->with('status', session('status'));
    }

    return redirect()->route('admin.home');
});

Auth::routes();

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'Admin', 'middleware' => ['auth', '2fa']], function () {
    Route::get('/', 'HomeController@index')->name('home');
    // Permissions
    Route::delete('permissions/destroy', 'PermissionsController@massDestroy')->name('permissions.massDestroy');
    Route::post('permissions/parse-csv-import', 'PermissionsController@parseCsvImport')->name('permissions.parseCsvImport');
    Route::post('permissions/process-csv-import', 'PermissionsController@processCsvImport')->name('permissions.processCsvImport');
    Route::resource('permissions', 'PermissionsController');

    // Roles
    Route::delete('roles/destroy', 'RolesController@massDestroy')->name('roles.massDestroy');
    Route::post('roles/parse-csv-import', 'RolesController@parseCsvImport')->name('roles.parseCsvImport');
    Route::post('roles/process-csv-import', 'RolesController@processCsvImport')->name('roles.processCsvImport');
    Route::resource('roles', 'RolesController');

    // Users
    Route::delete('users/destroy', 'UsersController@massDestroy')->name('users.massDestroy');
    Route::post('users/parse-csv-import', 'UsersController@parseCsvImport')->name('users.parseCsvImport');
    Route::post('users/process-csv-import', 'UsersController@processCsvImport')->name('users.processCsvImport');
    Route::resource('users', 'UsersController');

    // Sales Inquiry
    Route::delete('sales-inquiries/destroy', 'SalesInquiryController@massDestroy')->name('sales-inquiries.massDestroy');
    Route::post('sales-inquiries/parse-csv-import', 'SalesInquiryController@parseCsvImport')->name('sales-inquiries.parseCsvImport');
    Route::post('sales-inquiries/process-csv-import', 'SalesInquiryController@processCsvImport')->name('sales-inquiries.processCsvImport');
    Route::resource('sales-inquiries', 'SalesInquiryController');

    // Sales Quotation
    Route::delete('sales-quotations/destroy', 'SalesQuotationController@massDestroy')->name('sales-quotations.massDestroy');
    Route::post('sales-quotations/parse-csv-import', 'SalesQuotationController@parseCsvImport')->name('sales-quotations.parseCsvImport');
    Route::post('sales-quotations/process-csv-import', 'SalesQuotationController@processCsvImport')->name('sales-quotations.processCsvImport');
    Route::resource('sales-quotations', 'SalesQuotationController');

    // Sales Order
    Route::delete('sales-orders/destroy', 'SalesOrderController@massDestroy')->name('sales-orders.massDestroy');
    Route::post('sales-orders/parse-csv-import', 'SalesOrderController@parseCsvImport')->name('sales-orders.parseCsvImport');
    Route::post('sales-orders/process-csv-import', 'SalesOrderController@processCsvImport')->name('sales-orders.processCsvImport');
    Route::resource('sales-orders', 'SalesOrderController');

    // Transfer Material
    Route::delete('transfer-materials/destroy', 'TransferMaterialController@massDestroy')->name('transfer-materials.massDestroy');
    Route::post('transfer-materials/parse-csv-import', 'TransferMaterialController@parseCsvImport')->name('transfer-materials.parseCsvImport');
    Route::post('transfer-materials/process-csv-import', 'TransferMaterialController@processCsvImport')->name('transfer-materials.processCsvImport');
    Route::resource('transfer-materials', 'TransferMaterialController');

    // Transfer Produk
    Route::delete('transfer-produks/destroy', 'TransferProdukController@massDestroy')->name('transfer-produks.massDestroy');
    Route::post('transfer-produks/parse-csv-import', 'TransferProdukController@parseCsvImport')->name('transfer-produks.parseCsvImport');
    Route::post('transfer-produks/process-csv-import', 'TransferProdukController@processCsvImport')->name('transfer-produks.processCsvImport');
    Route::resource('transfer-produks', 'TransferProdukController');

    // Pengiriman
    Route::delete('pengirimen/destroy', 'PengirimanController@massDestroy')->name('pengirimen.massDestroy');
    Route::post('pengirimen/parse-csv-import', 'PengirimanController@parseCsvImport')->name('pengirimen.parseCsvImport');
    Route::post('pengirimen/process-csv-import', 'PengirimanController@processCsvImport')->name('pengirimen.processCsvImport');
    Route::resource('pengirimen', 'PengirimanController');

    // List Of Material
    Route::delete('list-of-materials/destroy', 'ListOfMaterialController@massDestroy')->name('list-of-materials.massDestroy');
    Route::post('list-of-materials/parse-csv-import', 'ListOfMaterialController@parseCsvImport')->name('list-of-materials.parseCsvImport');
    Route::post('list-of-materials/process-csv-import', 'ListOfMaterialController@processCsvImport')->name('list-of-materials.processCsvImport');
    Route::resource('list-of-materials', 'ListOfMaterialController');

    // Machine Report
    Route::delete('machine-reports/destroy', 'MachineReportController@massDestroy')->name('machine-reports.massDestroy');
    Route::post('machine-reports/parse-csv-import', 'MachineReportController@parseCsvImport')->name('machine-reports.parseCsvImport');
    Route::post('machine-reports/process-csv-import', 'MachineReportController@processCsvImport')->name('machine-reports.processCsvImport');
    Route::resource('machine-reports', 'MachineReportController');

    // Purchase Inq
    Route::delete('purchase-inqs/destroy', 'PurchaseInqController@massDestroy')->name('purchase-inqs.massDestroy');
    Route::post('purchase-inqs/parse-csv-import', 'PurchaseInqController@parseCsvImport')->name('purchase-inqs.parseCsvImport');
    Route::post('purchase-inqs/process-csv-import', 'PurchaseInqController@processCsvImport')->name('purchase-inqs.processCsvImport');
    Route::resource('purchase-inqs', 'PurchaseInqController');

    // Purchase Order
    Route::delete('purchase-orders/destroy', 'PurchaseOrderController@massDestroy')->name('purchase-orders.massDestroy');
    Route::post('purchase-orders/parse-csv-import', 'PurchaseOrderController@parseCsvImport')->name('purchase-orders.parseCsvImport');
    Route::post('purchase-orders/process-csv-import', 'PurchaseOrderController@processCsvImport')->name('purchase-orders.processCsvImport');
    Route::resource('purchase-orders', 'PurchaseOrderController');

    // Purchase Return
    Route::delete('purchase-returns/destroy', 'PurchaseReturnController@massDestroy')->name('purchase-returns.massDestroy');
    Route::post('purchase-returns/parse-csv-import', 'PurchaseReturnController@parseCsvImport')->name('purchase-returns.parseCsvImport');
    Route::post('purchase-returns/process-csv-import', 'PurchaseReturnController@processCsvImport')->name('purchase-returns.processCsvImport');
    Route::resource('purchase-returns', 'PurchaseReturnController');

    // Sales Invoice
    Route::delete('sales-invoices/destroy', 'SalesInvoiceController@massDestroy')->name('sales-invoices.massDestroy');
    Route::post('sales-invoices/parse-csv-import', 'SalesInvoiceController@parseCsvImport')->name('sales-invoices.parseCsvImport');
    Route::post('sales-invoices/process-csv-import', 'SalesInvoiceController@processCsvImport')->name('sales-invoices.processCsvImport');
    Route::resource('sales-invoices', 'SalesInvoiceController');

    // Purchase Invoice
    Route::delete('purchase-invoices/destroy', 'PurchaseInvoiceController@massDestroy')->name('purchase-invoices.massDestroy');
    Route::post('purchase-invoices/parse-csv-import', 'PurchaseInvoiceController@parseCsvImport')->name('purchase-invoices.parseCsvImport');
    Route::post('purchase-invoices/process-csv-import', 'PurchaseInvoiceController@processCsvImport')->name('purchase-invoices.processCsvImport');
    Route::resource('purchase-invoices', 'PurchaseInvoiceController');

    // Crm Status
    Route::delete('crm-statuses/destroy', 'CrmStatusController@massDestroy')->name('crm-statuses.massDestroy');
    Route::post('crm-statuses/parse-csv-import', 'CrmStatusController@parseCsvImport')->name('crm-statuses.parseCsvImport');
    Route::post('crm-statuses/process-csv-import', 'CrmStatusController@processCsvImport')->name('crm-statuses.processCsvImport');
    Route::resource('crm-statuses', 'CrmStatusController');

    // Crm Customer
    Route::delete('crm-customers/destroy', 'CrmCustomerController@massDestroy')->name('crm-customers.massDestroy');
    Route::post('crm-customers/parse-csv-import', 'CrmCustomerController@parseCsvImport')->name('crm-customers.parseCsvImport');
    Route::post('crm-customers/process-csv-import', 'CrmCustomerController@processCsvImport')->name('crm-customers.processCsvImport');
    Route::resource('crm-customers', 'CrmCustomerController');

    // Crm Note
    Route::delete('crm-notes/destroy', 'CrmNoteController@massDestroy')->name('crm-notes.massDestroy');
    Route::post('crm-notes/parse-csv-import', 'CrmNoteController@parseCsvImport')->name('crm-notes.parseCsvImport');
    Route::post('crm-notes/process-csv-import', 'CrmNoteController@processCsvImport')->name('crm-notes.processCsvImport');
    Route::resource('crm-notes', 'CrmNoteController');

    // Crm Document
    Route::delete('crm-documents/destroy', 'CrmDocumentController@massDestroy')->name('crm-documents.massDestroy');
    Route::post('crm-documents/media', 'CrmDocumentController@storeMedia')->name('crm-documents.storeMedia');
    Route::post('crm-documents/ckmedia', 'CrmDocumentController@storeCKEditorImages')->name('crm-documents.storeCKEditorImages');
    Route::post('crm-documents/parse-csv-import', 'CrmDocumentController@parseCsvImport')->name('crm-documents.parseCsvImport');
    Route::post('crm-documents/process-csv-import', 'CrmDocumentController@processCsvImport')->name('crm-documents.processCsvImport');
    Route::resource('crm-documents', 'CrmDocumentController');

    // Product Category
    Route::delete('product-categories/destroy', 'ProductCategoryController@massDestroy')->name('product-categories.massDestroy');
    Route::post('product-categories/media', 'ProductCategoryController@storeMedia')->name('product-categories.storeMedia');
    Route::post('product-categories/ckmedia', 'ProductCategoryController@storeCKEditorImages')->name('product-categories.storeCKEditorImages');
    Route::post('product-categories/parse-csv-import', 'ProductCategoryController@parseCsvImport')->name('product-categories.parseCsvImport');
    Route::post('product-categories/process-csv-import', 'ProductCategoryController@processCsvImport')->name('product-categories.processCsvImport');
    Route::resource('product-categories', 'ProductCategoryController');

    // Product Tag
    Route::delete('product-tags/destroy', 'ProductTagController@massDestroy')->name('product-tags.massDestroy');
    Route::post('product-tags/parse-csv-import', 'ProductTagController@parseCsvImport')->name('product-tags.parseCsvImport');
    Route::post('product-tags/process-csv-import', 'ProductTagController@processCsvImport')->name('product-tags.processCsvImport');
    Route::resource('product-tags', 'ProductTagController');

    // Product
    Route::delete('products/destroy', 'ProductController@massDestroy')->name('products.massDestroy');
    Route::post('products/media', 'ProductController@storeMedia')->name('products.storeMedia');
    Route::post('products/ckmedia', 'ProductController@storeCKEditorImages')->name('products.storeCKEditorImages');
    Route::post('products/parse-csv-import', 'ProductController@parseCsvImport')->name('products.parseCsvImport');
    Route::post('products/process-csv-import', 'ProductController@processCsvImport')->name('products.processCsvImport');
    Route::resource('products', 'ProductController');

    // Expense Category
    Route::delete('expense-categories/destroy', 'ExpenseCategoryController@massDestroy')->name('expense-categories.massDestroy');
    Route::post('expense-categories/parse-csv-import', 'ExpenseCategoryController@parseCsvImport')->name('expense-categories.parseCsvImport');
    Route::post('expense-categories/process-csv-import', 'ExpenseCategoryController@processCsvImport')->name('expense-categories.processCsvImport');
    Route::resource('expense-categories', 'ExpenseCategoryController');

    // Income Category
    Route::delete('income-categories/destroy', 'IncomeCategoryController@massDestroy')->name('income-categories.massDestroy');
    Route::post('income-categories/parse-csv-import', 'IncomeCategoryController@parseCsvImport')->name('income-categories.parseCsvImport');
    Route::post('income-categories/process-csv-import', 'IncomeCategoryController@processCsvImport')->name('income-categories.processCsvImport');
    Route::resource('income-categories', 'IncomeCategoryController');

    // Expense
    Route::delete('expenses/destroy', 'ExpenseController@massDestroy')->name('expenses.massDestroy');
    Route::post('expenses/parse-csv-import', 'ExpenseController@parseCsvImport')->name('expenses.parseCsvImport');
    Route::post('expenses/process-csv-import', 'ExpenseController@processCsvImport')->name('expenses.processCsvImport');
    Route::resource('expenses', 'ExpenseController');

    // Income
    Route::delete('incomes/destroy', 'IncomeController@massDestroy')->name('incomes.massDestroy');
    Route::post('incomes/parse-csv-import', 'IncomeController@parseCsvImport')->name('incomes.parseCsvImport');
    Route::post('incomes/process-csv-import', 'IncomeController@processCsvImport')->name('incomes.processCsvImport');
    Route::resource('incomes', 'IncomeController');

    // Expense Report
    Route::delete('expense-reports/destroy', 'ExpenseReportController@massDestroy')->name('expense-reports.massDestroy');
    Route::resource('expense-reports', 'ExpenseReportController');

    // Jurnal Umum
    Route::delete('jurnal-umums/destroy', 'JurnalUmumController@massDestroy')->name('jurnal-umums.massDestroy');
    Route::post('jurnal-umums/parse-csv-import', 'JurnalUmumController@parseCsvImport')->name('jurnal-umums.parseCsvImport');
    Route::post('jurnal-umums/process-csv-import', 'JurnalUmumController@processCsvImport')->name('jurnal-umums.processCsvImport');
    Route::resource('jurnal-umums', 'JurnalUmumController');

    // Buku Besar
    Route::delete('buku-besars/destroy', 'BukuBesarController@massDestroy')->name('buku-besars.massDestroy');
    Route::post('buku-besars/parse-csv-import', 'BukuBesarController@parseCsvImport')->name('buku-besars.parseCsvImport');
    Route::post('buku-besars/process-csv-import', 'BukuBesarController@processCsvImport')->name('buku-besars.processCsvImport');
    Route::resource('buku-besars', 'BukuBesarController');

    // Necara Saldo
    Route::delete('necara-saldos/destroy', 'NecaraSaldoController@massDestroy')->name('necara-saldos.massDestroy');
    Route::post('necara-saldos/parse-csv-import', 'NecaraSaldoController@parseCsvImport')->name('necara-saldos.parseCsvImport');
    Route::post('necara-saldos/process-csv-import', 'NecaraSaldoController@processCsvImport')->name('necara-saldos.processCsvImport');
    Route::resource('necara-saldos', 'NecaraSaldoController');

    // Jurnal Penyelesaian
    Route::delete('jurnal-penyelesaians/destroy', 'JurnalPenyelesaianController@massDestroy')->name('jurnal-penyelesaians.massDestroy');
    Route::post('jurnal-penyelesaians/parse-csv-import', 'JurnalPenyelesaianController@parseCsvImport')->name('jurnal-penyelesaians.parseCsvImport');
    Route::post('jurnal-penyelesaians/process-csv-import', 'JurnalPenyelesaianController@processCsvImport')->name('jurnal-penyelesaians.processCsvImport');
    Route::resource('jurnal-penyelesaians', 'JurnalPenyelesaianController');

    // Audit Logs
    Route::resource('audit-logs', 'AuditLogsController', ['except' => ['create', 'store', 'edit', 'update', 'destroy']]);

    // User Alerts
    Route::delete('user-alerts/destroy', 'UserAlertsController@massDestroy')->name('user-alerts.massDestroy');
    Route::get('user-alerts/read', 'UserAlertsController@read');
    Route::resource('user-alerts', 'UserAlertsController', ['except' => ['edit', 'update']]);

    // Faq Category
    Route::delete('faq-categories/destroy', 'FaqCategoryController@massDestroy')->name('faq-categories.massDestroy');
    Route::post('faq-categories/parse-csv-import', 'FaqCategoryController@parseCsvImport')->name('faq-categories.parseCsvImport');
    Route::post('faq-categories/process-csv-import', 'FaqCategoryController@processCsvImport')->name('faq-categories.processCsvImport');
    Route::resource('faq-categories', 'FaqCategoryController');

    // Faq Question
    Route::delete('faq-questions/destroy', 'FaqQuestionController@massDestroy')->name('faq-questions.massDestroy');
    Route::post('faq-questions/parse-csv-import', 'FaqQuestionController@parseCsvImport')->name('faq-questions.parseCsvImport');
    Route::post('faq-questions/process-csv-import', 'FaqQuestionController@processCsvImport')->name('faq-questions.processCsvImport');
    Route::resource('faq-questions', 'FaqQuestionController');

    // Request Stock Product
    Route::delete('request-stock-products/destroy', 'RequestStockProductController@massDestroy')->name('request-stock-products.massDestroy');
    Route::post('request-stock-products/parse-csv-import', 'RequestStockProductController@parseCsvImport')->name('request-stock-products.parseCsvImport');
    Route::post('request-stock-products/process-csv-import', 'RequestStockProductController@processCsvImport')->name('request-stock-products.processCsvImport');
    Route::resource('request-stock-products', 'RequestStockProductController');

    // Production Monitoring
    Route::delete('production-monitorings/destroy', 'ProductionMonitoringController@massDestroy')->name('production-monitorings.massDestroy');
    Route::post('production-monitorings/parse-csv-import', 'ProductionMonitoringController@parseCsvImport')->name('production-monitorings.parseCsvImport');
    Route::post('production-monitorings/process-csv-import', 'ProductionMonitoringController@processCsvImport')->name('production-monitorings.processCsvImport');
    Route::resource('production-monitorings', 'ProductionMonitoringController');

    // Quality Control
    Route::delete('quality-controls/destroy', 'QualityControlController@massDestroy')->name('quality-controls.massDestroy');
    Route::post('quality-controls/parse-csv-import', 'QualityControlController@parseCsvImport')->name('quality-controls.parseCsvImport');
    Route::post('quality-controls/process-csv-import', 'QualityControlController@processCsvImport')->name('quality-controls.processCsvImport');
    Route::resource('quality-controls', 'QualityControlController');

    // Vendor
    Route::delete('vendors/destroy', 'VendorController@massDestroy')->name('vendors.massDestroy');
    Route::post('vendors/parse-csv-import', 'VendorController@parseCsvImport')->name('vendors.parseCsvImport');
    Route::post('vendors/process-csv-import', 'VendorController@processCsvImport')->name('vendors.processCsvImport');
    Route::resource('vendors', 'VendorController');

    // Materials
    Route::delete('materials/destroy', 'MaterialsController@massDestroy')->name('materials.massDestroy');
    Route::post('materials/media', 'MaterialsController@storeMedia')->name('materials.storeMedia');
    Route::post('materials/ckmedia', 'MaterialsController@storeCKEditorImages')->name('materials.storeCKEditorImages');
    Route::post('materials/parse-csv-import', 'MaterialsController@parseCsvImport')->name('materials.parseCsvImport');
    Route::post('materials/process-csv-import', 'MaterialsController@processCsvImport')->name('materials.processCsvImport');
    Route::resource('materials', 'MaterialsController');

    // Chart Of Account
    Route::delete('chart-of-accounts/destroy', 'ChartOfAccountController@massDestroy')->name('chart-of-accounts.massDestroy');
    Route::post('chart-of-accounts/parse-csv-import', 'ChartOfAccountController@parseCsvImport')->name('chart-of-accounts.parseCsvImport');
    Route::post('chart-of-accounts/process-csv-import', 'ChartOfAccountController@processCsvImport')->name('chart-of-accounts.processCsvImport');
    Route::resource('chart-of-accounts', 'ChartOfAccountController');

    // Vendor Statuses
    Route::delete('vendor-statuses/destroy', 'VendorStatusesController@massDestroy')->name('vendor-statuses.massDestroy');
    Route::post('vendor-statuses/parse-csv-import', 'VendorStatusesController@parseCsvImport')->name('vendor-statuses.parseCsvImport');
    Route::post('vendor-statuses/process-csv-import', 'VendorStatusesController@processCsvImport')->name('vendor-statuses.processCsvImport');
    Route::resource('vendor-statuses', 'VendorStatusesController');

    // Documents Vendor
    Route::delete('documents-vendors/destroy', 'DocumentsVendorController@massDestroy')->name('documents-vendors.massDestroy');
    Route::post('documents-vendors/media', 'DocumentsVendorController@storeMedia')->name('documents-vendors.storeMedia');
    Route::post('documents-vendors/ckmedia', 'DocumentsVendorController@storeCKEditorImages')->name('documents-vendors.storeCKEditorImages');
    Route::post('documents-vendors/parse-csv-import', 'DocumentsVendorController@parseCsvImport')->name('documents-vendors.parseCsvImport');
    Route::post('documents-vendors/process-csv-import', 'DocumentsVendorController@processCsvImport')->name('documents-vendors.processCsvImport');
    Route::resource('documents-vendors', 'DocumentsVendorController');

    // Notes Vendor
    Route::delete('notes-vendors/destroy', 'NotesVendorController@massDestroy')->name('notes-vendors.massDestroy');
    Route::post('notes-vendors/parse-csv-import', 'NotesVendorController@parseCsvImport')->name('notes-vendors.parseCsvImport');
    Route::post('notes-vendors/process-csv-import', 'NotesVendorController@processCsvImport')->name('notes-vendors.processCsvImport');
    Route::resource('notes-vendors', 'NotesVendorController');

    // Request For Quotation
    Route::delete('request-for-quotations/destroy', 'RequestForQuotationController@massDestroy')->name('request-for-quotations.massDestroy');
    Route::post('request-for-quotations/parse-csv-import', 'RequestForQuotationController@parseCsvImport')->name('request-for-quotations.parseCsvImport');
    Route::post('request-for-quotations/process-csv-import', 'RequestForQuotationController@processCsvImport')->name('request-for-quotations.processCsvImport');
    Route::resource('request-for-quotations', 'RequestForQuotationController');

    // Purchase Quotation
    Route::delete('purchase-quotations/destroy', 'PurchaseQuotationController@massDestroy')->name('purchase-quotations.massDestroy');
    Route::post('purchase-quotations/parse-csv-import', 'PurchaseQuotationController@parseCsvImport')->name('purchase-quotations.parseCsvImport');
    Route::post('purchase-quotations/process-csv-import', 'PurchaseQuotationController@processCsvImport')->name('purchase-quotations.processCsvImport');
    Route::resource('purchase-quotations', 'PurchaseQuotationController');

    // Task Status
    Route::delete('task-statuses/destroy', 'TaskStatusController@massDestroy')->name('task-statuses.massDestroy');
    Route::post('task-statuses/parse-csv-import', 'TaskStatusController@parseCsvImport')->name('task-statuses.parseCsvImport');
    Route::post('task-statuses/process-csv-import', 'TaskStatusController@processCsvImport')->name('task-statuses.processCsvImport');
    Route::resource('task-statuses', 'TaskStatusController');

    // Task Tag
    Route::delete('task-tags/destroy', 'TaskTagController@massDestroy')->name('task-tags.massDestroy');
    Route::post('task-tags/parse-csv-import', 'TaskTagController@parseCsvImport')->name('task-tags.parseCsvImport');
    Route::post('task-tags/process-csv-import', 'TaskTagController@processCsvImport')->name('task-tags.processCsvImport');
    Route::resource('task-tags', 'TaskTagController');

    // Task
    Route::delete('tasks/destroy', 'TaskController@massDestroy')->name('tasks.massDestroy');
    Route::post('tasks/media', 'TaskController@storeMedia')->name('tasks.storeMedia');
    Route::post('tasks/ckmedia', 'TaskController@storeCKEditorImages')->name('tasks.storeCKEditorImages');
    Route::post('tasks/parse-csv-import', 'TaskController@parseCsvImport')->name('tasks.parseCsvImport');
    Route::post('tasks/process-csv-import', 'TaskController@processCsvImport')->name('tasks.processCsvImport');
    Route::resource('tasks', 'TaskController');

    // Tasks Calendar
    Route::resource('tasks-calendars', 'TasksCalendarController', ['except' => ['create', 'store', 'edit', 'update', 'show', 'destroy']]);

    // Purchase Requition
    Route::delete('purchase-requitions/destroy', 'PurchaseRequitionController@massDestroy')->name('purchase-requitions.massDestroy');
    Route::post('purchase-requitions/parse-csv-import', 'PurchaseRequitionController@parseCsvImport')->name('purchase-requitions.parseCsvImport');
    Route::post('purchase-requitions/process-csv-import', 'PurchaseRequitionController@processCsvImport')->name('purchase-requitions.processCsvImport');
    Route::resource('purchase-requitions', 'PurchaseRequitionController');

    // Material Entry
    Route::delete('material-entries/destroy', 'MaterialEntryController@massDestroy')->name('material-entries.massDestroy');
    Route::post('material-entries/parse-csv-import', 'MaterialEntryController@parseCsvImport')->name('material-entries.parseCsvImport');
    Route::post('material-entries/process-csv-import', 'MaterialEntryController@processCsvImport')->name('material-entries.processCsvImport');
    Route::resource('material-entries', 'MaterialEntryController');

    Route::get('messenger', 'MessengerController@index')->name('messenger.index');
    Route::get('messenger/create', 'MessengerController@createTopic')->name('messenger.createTopic');
    Route::post('messenger', 'MessengerController@storeTopic')->name('messenger.storeTopic');
    Route::get('messenger/inbox', 'MessengerController@showInbox')->name('messenger.showInbox');
    Route::get('messenger/outbox', 'MessengerController@showOutbox')->name('messenger.showOutbox');
    Route::get('messenger/{topic}', 'MessengerController@showMessages')->name('messenger.showMessages');
    Route::delete('messenger/{topic}', 'MessengerController@destroyTopic')->name('messenger.destroyTopic');
    Route::post('messenger/{topic}/reply', 'MessengerController@replyToTopic')->name('messenger.reply');
    Route::get('messenger/{topic}/reply', 'MessengerController@showReply')->name('messenger.showReply');
});
Route::group(['prefix' => 'profile', 'as' => 'profile.', 'namespace' => 'Auth', 'middleware' => ['auth', '2fa']], function () {
    // Change password
    if (file_exists(app_path('Http/Controllers/Auth/ChangePasswordController.php'))) {
        Route::get('password', 'ChangePasswordController@edit')->name('password.edit');
        Route::post('password', 'ChangePasswordController@update')->name('password.update');
        Route::post('profile', 'ChangePasswordController@updateProfile')->name('password.updateProfile');
        Route::post('profile/destroy', 'ChangePasswordController@destroy')->name('password.destroyProfile');
        Route::post('profile/two-factor', 'ChangePasswordController@toggleTwoFactor')->name('password.toggleTwoFactor');
    }
});
Route::group(['namespace' => 'Auth', 'middleware' => ['auth', '2fa']], function () {
    // Two Factor Authentication
    if (file_exists(app_path('Http/Controllers/Auth/TwoFactorController.php'))) {
        Route::get('two-factor', 'TwoFactorController@show')->name('twoFactor.show');
        Route::post('two-factor', 'TwoFactorController@check')->name('twoFactor.check');
        Route::get('two-factor/resend', 'TwoFactorController@resend')->name('twoFactor.resend');
    }
});
