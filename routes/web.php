<?php

Route::view('/', 'welcome');
Auth::routes();

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'Admin', 'middleware' => ['auth', '2fa', 'admin']], function () {
    Route::get('/', 'HomeController@index')->name('home');
    // Permissions
    Route::delete('permissions/destroy', 'PermissionsController@massDestroy')->name('permissions.massDestroy');
    Route::resource('permissions', 'PermissionsController');

    // Roles
    Route::delete('roles/destroy', 'RolesController@massDestroy')->name('roles.massDestroy');
    Route::resource('roles', 'RolesController');

    // Users
    Route::delete('users/destroy', 'UsersController@massDestroy')->name('users.massDestroy');
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

    // Sales Report
    Route::delete('sales-reports/destroy', 'SalesReportController@massDestroy')->name('sales-reports.massDestroy');
    Route::post('sales-reports/parse-csv-import', 'SalesReportController@parseCsvImport')->name('sales-reports.parseCsvImport');
    Route::post('sales-reports/process-csv-import', 'SalesReportController@processCsvImport')->name('sales-reports.processCsvImport');
    Route::resource('sales-reports', 'SalesReportController');

    // Customer Complain
    Route::delete('customer-complains/destroy', 'CustomerComplainController@massDestroy')->name('customer-complains.massDestroy');
    Route::post('customer-complains/parse-csv-import', 'CustomerComplainController@parseCsvImport')->name('customer-complains.parseCsvImport');
    Route::post('customer-complains/process-csv-import', 'CustomerComplainController@processCsvImport')->name('customer-complains.processCsvImport');
    Route::resource('customer-complains', 'CustomerComplainController');

    // Transfer Material
    Route::delete('transfer-materials/destroy', 'TransferMaterialController@massDestroy')->name('transfer-materials.massDestroy');
    Route::resource('transfer-materials', 'TransferMaterialController');

    // Transfer Produk
    Route::delete('transfer-produks/destroy', 'TransferProdukController@massDestroy')->name('transfer-produks.massDestroy');
    Route::resource('transfer-produks', 'TransferProdukController');

    // Pengiriman
    Route::delete('pengirimen/destroy', 'PengirimanController@massDestroy')->name('pengirimen.massDestroy');
    Route::resource('pengirimen', 'PengirimanController');

    // List Of Material
    Route::delete('list-of-materials/destroy', 'ListOfMaterialController@massDestroy')->name('list-of-materials.massDestroy');
    Route::resource('list-of-materials', 'ListOfMaterialController');

    // Machine Report
    Route::delete('machine-reports/destroy', 'MachineReportController@massDestroy')->name('machine-reports.massDestroy');
    Route::resource('machine-reports', 'MachineReportController');

    // Purchase Inq
    Route::delete('purchase-inqs/destroy', 'PurchaseInqController@massDestroy')->name('purchase-inqs.massDestroy');
    Route::resource('purchase-inqs', 'PurchaseInqController');

    // Purchase Order
    Route::delete('purchase-orders/destroy', 'PurchaseOrderController@massDestroy')->name('purchase-orders.massDestroy');
    Route::resource('purchase-orders', 'PurchaseOrderController');

    // Purchase Return
    Route::delete('purchase-returns/destroy', 'PurchaseReturnController@massDestroy')->name('purchase-returns.massDestroy');
    Route::resource('purchase-returns', 'PurchaseReturnController');

    // Sales Invoice
    Route::delete('sales-invoices/destroy', 'SalesInvoiceController@massDestroy')->name('sales-invoices.massDestroy');
    Route::resource('sales-invoices', 'SalesInvoiceController');

    // Purchase Invoice
    Route::delete('purchase-invoices/destroy', 'PurchaseInvoiceController@massDestroy')->name('purchase-invoices.massDestroy');
    Route::resource('purchase-invoices', 'PurchaseInvoiceController');

    // Crm Status
    Route::delete('crm-statuses/destroy', 'CrmStatusController@massDestroy')->name('crm-statuses.massDestroy');
    Route::resource('crm-statuses', 'CrmStatusController');

    // Crm Customer
    Route::delete('crm-customers/destroy', 'CrmCustomerController@massDestroy')->name('crm-customers.massDestroy');
    Route::post('crm-customers/parse-csv-import', 'CrmCustomerController@parseCsvImport')->name('crm-customers.parseCsvImport');
    Route::post('crm-customers/process-csv-import', 'CrmCustomerController@processCsvImport')->name('crm-customers.processCsvImport');
    Route::resource('crm-customers', 'CrmCustomerController');

    // Crm Note
    Route::delete('crm-notes/destroy', 'CrmNoteController@massDestroy')->name('crm-notes.massDestroy');
    Route::resource('crm-notes', 'CrmNoteController');

    // Crm Document
    Route::delete('crm-documents/destroy', 'CrmDocumentController@massDestroy')->name('crm-documents.massDestroy');
    Route::post('crm-documents/media', 'CrmDocumentController@storeMedia')->name('crm-documents.storeMedia');
    Route::post('crm-documents/ckmedia', 'CrmDocumentController@storeCKEditorImages')->name('crm-documents.storeCKEditorImages');
    Route::resource('crm-documents', 'CrmDocumentController');

    // Product Category
    Route::delete('product-categories/destroy', 'ProductCategoryController@massDestroy')->name('product-categories.massDestroy');
    Route::post('product-categories/media', 'ProductCategoryController@storeMedia')->name('product-categories.storeMedia');
    Route::post('product-categories/ckmedia', 'ProductCategoryController@storeCKEditorImages')->name('product-categories.storeCKEditorImages');
    Route::resource('product-categories', 'ProductCategoryController');

    // Product Tag
    Route::delete('product-tags/destroy', 'ProductTagController@massDestroy')->name('product-tags.massDestroy');
    Route::resource('product-tags', 'ProductTagController');

    // Product
    Route::delete('products/destroy', 'ProductController@massDestroy')->name('products.massDestroy');
    Route::post('products/media', 'ProductController@storeMedia')->name('products.storeMedia');
    Route::post('products/ckmedia', 'ProductController@storeCKEditorImages')->name('products.storeCKEditorImages');
    Route::resource('products', 'ProductController');

    // Expense Category
    Route::delete('expense-categories/destroy', 'ExpenseCategoryController@massDestroy')->name('expense-categories.massDestroy');
    Route::resource('expense-categories', 'ExpenseCategoryController');

    // Income Category
    Route::delete('income-categories/destroy', 'IncomeCategoryController@massDestroy')->name('income-categories.massDestroy');
    Route::resource('income-categories', 'IncomeCategoryController');

    // Expense
    Route::delete('expenses/destroy', 'ExpenseController@massDestroy')->name('expenses.massDestroy');
    Route::resource('expenses', 'ExpenseController');

    // Income
    Route::delete('incomes/destroy', 'IncomeController@massDestroy')->name('incomes.massDestroy');
    Route::resource('incomes', 'IncomeController');

    // Expense Report
    Route::delete('expense-reports/destroy', 'ExpenseReportController@massDestroy')->name('expense-reports.massDestroy');
    Route::resource('expense-reports', 'ExpenseReportController');

    // Asset Category
    Route::delete('asset-categories/destroy', 'AssetCategoryController@massDestroy')->name('asset-categories.massDestroy');
    Route::resource('asset-categories', 'AssetCategoryController');

    // Asset Location
    Route::delete('asset-locations/destroy', 'AssetLocationController@massDestroy')->name('asset-locations.massDestroy');
    Route::resource('asset-locations', 'AssetLocationController');

    // Asset Status
    Route::delete('asset-statuses/destroy', 'AssetStatusController@massDestroy')->name('asset-statuses.massDestroy');
    Route::resource('asset-statuses', 'AssetStatusController');

    // Asset
    Route::delete('assets/destroy', 'AssetController@massDestroy')->name('assets.massDestroy');
    Route::post('assets/media', 'AssetController@storeMedia')->name('assets.storeMedia');
    Route::post('assets/ckmedia', 'AssetController@storeCKEditorImages')->name('assets.storeCKEditorImages');
    Route::resource('assets', 'AssetController');

    // Assets History
    Route::resource('assets-histories', 'AssetsHistoryController', ['except' => ['create', 'store', 'edit', 'update', 'show', 'destroy']]);

    // Akun
    Route::delete('akuns/destroy', 'AkunController@massDestroy')->name('akuns.massDestroy');
    Route::resource('akuns', 'AkunController');

    // Jurnal Umum
    Route::delete('jurnal-umums/destroy', 'JurnalUmumController@massDestroy')->name('jurnal-umums.massDestroy');
    Route::resource('jurnal-umums', 'JurnalUmumController');

    // Buku Besar
    Route::delete('buku-besars/destroy', 'BukuBesarController@massDestroy')->name('buku-besars.massDestroy');
    Route::resource('buku-besars', 'BukuBesarController');

    // Necara Saldo
    Route::delete('necara-saldos/destroy', 'NecaraSaldoController@massDestroy')->name('necara-saldos.massDestroy');
    Route::resource('necara-saldos', 'NecaraSaldoController');

    // Jurnal Penyelesaian
    Route::delete('jurnal-penyelesaians/destroy', 'JurnalPenyelesaianController@massDestroy')->name('jurnal-penyelesaians.massDestroy');
    Route::resource('jurnal-penyelesaians', 'JurnalPenyelesaianController');

    // Biaya Produksi
    Route::delete('biaya-produksis/destroy', 'BiayaProduksiController@massDestroy')->name('biaya-produksis.massDestroy');
    Route::resource('biaya-produksis', 'BiayaProduksiController');

    // Kas Bank
    Route::delete('kas-banks/destroy', 'KasBankController@massDestroy')->name('kas-banks.massDestroy');
    Route::resource('kas-banks', 'KasBankController');

    // Transaksi Keuangan
    Route::delete('transaksi-keuangans/destroy', 'TransaksiKeuanganController@massDestroy')->name('transaksi-keuangans.massDestroy');
    Route::resource('transaksi-keuangans', 'TransaksiKeuanganController');

    // Invoice Pembelian
    Route::delete('invoice-pembelians/destroy', 'InvoicePembelianController@massDestroy')->name('invoice-pembelians.massDestroy');
    Route::resource('invoice-pembelians', 'InvoicePembelianController');

    // Audit Logs
    Route::resource('audit-logs', 'AuditLogsController', ['except' => ['create', 'store', 'edit', 'update', 'destroy']]);

    // User Alerts
    Route::delete('user-alerts/destroy', 'UserAlertsController@massDestroy')->name('user-alerts.massDestroy');
    Route::get('user-alerts/read', 'UserAlertsController@read');
    Route::resource('user-alerts', 'UserAlertsController', ['except' => ['edit', 'update']]);

    // Faq Category
    Route::delete('faq-categories/destroy', 'FaqCategoryController@massDestroy')->name('faq-categories.massDestroy');
    Route::resource('faq-categories', 'FaqCategoryController');

    // Faq Question
    Route::delete('faq-questions/destroy', 'FaqQuestionController@massDestroy')->name('faq-questions.massDestroy');
    Route::resource('faq-questions', 'FaqQuestionController');

    // Request Stock Product
    Route::delete('request-stock-products/destroy', 'RequestStockProductController@massDestroy')->name('request-stock-products.massDestroy');
    Route::resource('request-stock-products', 'RequestStockProductController');

    // Production Monitoring
    Route::delete('production-monitorings/destroy', 'ProductionMonitoringController@massDestroy')->name('production-monitorings.massDestroy');
    Route::resource('production-monitorings', 'ProductionMonitoringController');

    // Quality Control
    Route::delete('quality-controls/destroy', 'QualityControlController@massDestroy')->name('quality-controls.massDestroy');
    Route::resource('quality-controls', 'QualityControlController');

    // Vendor
    Route::delete('vendors/destroy', 'VendorController@massDestroy')->name('vendors.massDestroy');
    Route::resource('vendors', 'VendorController');

    // Materials
    Route::delete('materials/destroy', 'MaterialsController@massDestroy')->name('materials.massDestroy');
    Route::post('materials/media', 'MaterialsController@storeMedia')->name('materials.storeMedia');
    Route::post('materials/ckmedia', 'MaterialsController@storeCKEditorImages')->name('materials.storeCKEditorImages');
    Route::resource('materials', 'MaterialsController');

    // Chart Of Account
    Route::delete('chart-of-accounts/destroy', 'ChartOfAccountController@massDestroy')->name('chart-of-accounts.massDestroy');
    Route::resource('chart-of-accounts', 'ChartOfAccountController');

    // Vendor Statuses
    Route::delete('vendor-statuses/destroy', 'VendorStatusesController@massDestroy')->name('vendor-statuses.massDestroy');
    Route::resource('vendor-statuses', 'VendorStatusesController');

    // Documents Vendor
    Route::delete('documents-vendors/destroy', 'DocumentsVendorController@massDestroy')->name('documents-vendors.massDestroy');
    Route::post('documents-vendors/media', 'DocumentsVendorController@storeMedia')->name('documents-vendors.storeMedia');
    Route::post('documents-vendors/ckmedia', 'DocumentsVendorController@storeCKEditorImages')->name('documents-vendors.storeCKEditorImages');
    Route::resource('documents-vendors', 'DocumentsVendorController');

    // Notes Vendor
    Route::delete('notes-vendors/destroy', 'NotesVendorController@massDestroy')->name('notes-vendors.massDestroy');
    Route::resource('notes-vendors', 'NotesVendorController');

    // Request For Quotation
    Route::delete('request-for-quotations/destroy', 'RequestForQuotationController@massDestroy')->name('request-for-quotations.massDestroy');
    Route::resource('request-for-quotations', 'RequestForQuotationController');

    // Purchase Quotation
    Route::delete('purchase-quotations/destroy', 'PurchaseQuotationController@massDestroy')->name('purchase-quotations.massDestroy');
    Route::resource('purchase-quotations', 'PurchaseQuotationController');

    // Task Status
    Route::delete('task-statuses/destroy', 'TaskStatusController@massDestroy')->name('task-statuses.massDestroy');
    Route::resource('task-statuses', 'TaskStatusController');

    // Task Tag
    Route::delete('task-tags/destroy', 'TaskTagController@massDestroy')->name('task-tags.massDestroy');
    Route::resource('task-tags', 'TaskTagController');

    // Task
    Route::delete('tasks/destroy', 'TaskController@massDestroy')->name('tasks.massDestroy');
    Route::post('tasks/media', 'TaskController@storeMedia')->name('tasks.storeMedia');
    Route::post('tasks/ckmedia', 'TaskController@storeCKEditorImages')->name('tasks.storeCKEditorImages');
    Route::resource('tasks', 'TaskController');

    // Tasks Calendar
    Route::resource('tasks-calendars', 'TasksCalendarController', ['except' => ['create', 'store', 'edit', 'update', 'show', 'destroy']]);

    // Purchase Requition
    Route::delete('purchase-requitions/destroy', 'PurchaseRequitionController@massDestroy')->name('purchase-requitions.massDestroy');
    Route::resource('purchase-requitions', 'PurchaseRequitionController');

    // Material Entry
    Route::delete('material-entries/destroy', 'MaterialEntryController@massDestroy')->name('material-entries.massDestroy');
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
Route::group(['as' => 'frontend.', 'namespace' => 'Frontend', 'middleware' => ['auth', '2fa']], function () {
    Route::get('/home', 'HomeController@index')->name('home');

    // Permissions
    Route::delete('permissions/destroy', 'PermissionsController@massDestroy')->name('permissions.massDestroy');
    Route::resource('permissions', 'PermissionsController');

    // Roles
    Route::delete('roles/destroy', 'RolesController@massDestroy')->name('roles.massDestroy');
    Route::resource('roles', 'RolesController');

    // Users
    Route::delete('users/destroy', 'UsersController@massDestroy')->name('users.massDestroy');
    Route::resource('users', 'UsersController');

    // Sales Inquiry
    Route::delete('sales-inquiries/destroy', 'SalesInquiryController@massDestroy')->name('sales-inquiries.massDestroy');
    Route::resource('sales-inquiries', 'SalesInquiryController');

    // Sales Quotation
    Route::delete('sales-quotations/destroy', 'SalesQuotationController@massDestroy')->name('sales-quotations.massDestroy');
    Route::resource('sales-quotations', 'SalesQuotationController');

    // Sales Order
    Route::delete('sales-orders/destroy', 'SalesOrderController@massDestroy')->name('sales-orders.massDestroy');
    Route::resource('sales-orders', 'SalesOrderController');

    // Sales Report
    Route::delete('sales-reports/destroy', 'SalesReportController@massDestroy')->name('sales-reports.massDestroy');
    Route::resource('sales-reports', 'SalesReportController');

    // Customer Complain
    Route::delete('customer-complains/destroy', 'CustomerComplainController@massDestroy')->name('customer-complains.massDestroy');
    Route::resource('customer-complains', 'CustomerComplainController');

    // Transfer Material
    Route::delete('transfer-materials/destroy', 'TransferMaterialController@massDestroy')->name('transfer-materials.massDestroy');
    Route::resource('transfer-materials', 'TransferMaterialController');

    // Transfer Produk
    Route::delete('transfer-produks/destroy', 'TransferProdukController@massDestroy')->name('transfer-produks.massDestroy');
    Route::resource('transfer-produks', 'TransferProdukController');

    // Pengiriman
    Route::delete('pengirimen/destroy', 'PengirimanController@massDestroy')->name('pengirimen.massDestroy');
    Route::resource('pengirimen', 'PengirimanController');

    // List Of Material
    Route::delete('list-of-materials/destroy', 'ListOfMaterialController@massDestroy')->name('list-of-materials.massDestroy');
    Route::resource('list-of-materials', 'ListOfMaterialController');

    // Machine Report
    Route::delete('machine-reports/destroy', 'MachineReportController@massDestroy')->name('machine-reports.massDestroy');
    Route::resource('machine-reports', 'MachineReportController');

    // Purchase Inq
    Route::delete('purchase-inqs/destroy', 'PurchaseInqController@massDestroy')->name('purchase-inqs.massDestroy');
    Route::resource('purchase-inqs', 'PurchaseInqController');

    // Purchase Order
    Route::delete('purchase-orders/destroy', 'PurchaseOrderController@massDestroy')->name('purchase-orders.massDestroy');
    Route::resource('purchase-orders', 'PurchaseOrderController');

    // Purchase Return
    Route::delete('purchase-returns/destroy', 'PurchaseReturnController@massDestroy')->name('purchase-returns.massDestroy');
    Route::resource('purchase-returns', 'PurchaseReturnController');

    // Sales Invoice
    Route::delete('sales-invoices/destroy', 'SalesInvoiceController@massDestroy')->name('sales-invoices.massDestroy');
    Route::resource('sales-invoices', 'SalesInvoiceController');

    // Purchase Invoice
    Route::delete('purchase-invoices/destroy', 'PurchaseInvoiceController@massDestroy')->name('purchase-invoices.massDestroy');
    Route::resource('purchase-invoices', 'PurchaseInvoiceController');

    // Crm Status
    Route::delete('crm-statuses/destroy', 'CrmStatusController@massDestroy')->name('crm-statuses.massDestroy');
    Route::resource('crm-statuses', 'CrmStatusController');

    // Crm Customer
    Route::delete('crm-customers/destroy', 'CrmCustomerController@massDestroy')->name('crm-customers.massDestroy');
    Route::resource('crm-customers', 'CrmCustomerController');

    // Crm Note
    Route::delete('crm-notes/destroy', 'CrmNoteController@massDestroy')->name('crm-notes.massDestroy');
    Route::resource('crm-notes', 'CrmNoteController');

    // Crm Document
    Route::delete('crm-documents/destroy', 'CrmDocumentController@massDestroy')->name('crm-documents.massDestroy');
    Route::post('crm-documents/media', 'CrmDocumentController@storeMedia')->name('crm-documents.storeMedia');
    Route::post('crm-documents/ckmedia', 'CrmDocumentController@storeCKEditorImages')->name('crm-documents.storeCKEditorImages');
    Route::resource('crm-documents', 'CrmDocumentController');

    // Product Category
    Route::delete('product-categories/destroy', 'ProductCategoryController@massDestroy')->name('product-categories.massDestroy');
    Route::post('product-categories/media', 'ProductCategoryController@storeMedia')->name('product-categories.storeMedia');
    Route::post('product-categories/ckmedia', 'ProductCategoryController@storeCKEditorImages')->name('product-categories.storeCKEditorImages');
    Route::resource('product-categories', 'ProductCategoryController');

    // Product Tag
    Route::delete('product-tags/destroy', 'ProductTagController@massDestroy')->name('product-tags.massDestroy');
    Route::resource('product-tags', 'ProductTagController');

    // Product
    Route::delete('products/destroy', 'ProductController@massDestroy')->name('products.massDestroy');
    Route::post('products/media', 'ProductController@storeMedia')->name('products.storeMedia');
    Route::post('products/ckmedia', 'ProductController@storeCKEditorImages')->name('products.storeCKEditorImages');
    Route::resource('products', 'ProductController');

    // Expense Category
    Route::delete('expense-categories/destroy', 'ExpenseCategoryController@massDestroy')->name('expense-categories.massDestroy');
    Route::resource('expense-categories', 'ExpenseCategoryController');

    // Income Category
    Route::delete('income-categories/destroy', 'IncomeCategoryController@massDestroy')->name('income-categories.massDestroy');
    Route::resource('income-categories', 'IncomeCategoryController');

    // Expense
    Route::delete('expenses/destroy', 'ExpenseController@massDestroy')->name('expenses.massDestroy');
    Route::resource('expenses', 'ExpenseController');

    // Income
    Route::delete('incomes/destroy', 'IncomeController@massDestroy')->name('incomes.massDestroy');
    Route::resource('incomes', 'IncomeController');

    // Asset Category
    Route::delete('asset-categories/destroy', 'AssetCategoryController@massDestroy')->name('asset-categories.massDestroy');
    Route::resource('asset-categories', 'AssetCategoryController');

    // Asset Location
    Route::delete('asset-locations/destroy', 'AssetLocationController@massDestroy')->name('asset-locations.massDestroy');
    Route::resource('asset-locations', 'AssetLocationController');

    // Asset Status
    Route::delete('asset-statuses/destroy', 'AssetStatusController@massDestroy')->name('asset-statuses.massDestroy');
    Route::resource('asset-statuses', 'AssetStatusController');

    // Asset
    Route::delete('assets/destroy', 'AssetController@massDestroy')->name('assets.massDestroy');
    Route::post('assets/media', 'AssetController@storeMedia')->name('assets.storeMedia');
    Route::post('assets/ckmedia', 'AssetController@storeCKEditorImages')->name('assets.storeCKEditorImages');
    Route::resource('assets', 'AssetController');

    // Assets History
    Route::resource('assets-histories', 'AssetsHistoryController', ['except' => ['create', 'store', 'edit', 'update', 'show', 'destroy']]);

    // Akun
    Route::delete('akuns/destroy', 'AkunController@massDestroy')->name('akuns.massDestroy');
    Route::resource('akuns', 'AkunController');

    // Jurnal Umum
    Route::delete('jurnal-umums/destroy', 'JurnalUmumController@massDestroy')->name('jurnal-umums.massDestroy');
    Route::resource('jurnal-umums', 'JurnalUmumController');

    // Buku Besar
    Route::delete('buku-besars/destroy', 'BukuBesarController@massDestroy')->name('buku-besars.massDestroy');
    Route::resource('buku-besars', 'BukuBesarController');

    // Necara Saldo
    Route::delete('necara-saldos/destroy', 'NecaraSaldoController@massDestroy')->name('necara-saldos.massDestroy');
    Route::resource('necara-saldos', 'NecaraSaldoController');

    // Jurnal Penyelesaian
    Route::delete('jurnal-penyelesaians/destroy', 'JurnalPenyelesaianController@massDestroy')->name('jurnal-penyelesaians.massDestroy');
    Route::resource('jurnal-penyelesaians', 'JurnalPenyelesaianController');

    // Biaya Produksi
    Route::delete('biaya-produksis/destroy', 'BiayaProduksiController@massDestroy')->name('biaya-produksis.massDestroy');
    Route::resource('biaya-produksis', 'BiayaProduksiController');

    // Kas Bank
    Route::delete('kas-banks/destroy', 'KasBankController@massDestroy')->name('kas-banks.massDestroy');
    Route::resource('kas-banks', 'KasBankController');

    // Transaksi Keuangan
    Route::delete('transaksi-keuangans/destroy', 'TransaksiKeuanganController@massDestroy')->name('transaksi-keuangans.massDestroy');
    Route::resource('transaksi-keuangans', 'TransaksiKeuanganController');

    // Invoice Pembelian
    Route::delete('invoice-pembelians/destroy', 'InvoicePembelianController@massDestroy')->name('invoice-pembelians.massDestroy');
    Route::resource('invoice-pembelians', 'InvoicePembelianController');

    // User Alerts
    Route::delete('user-alerts/destroy', 'UserAlertsController@massDestroy')->name('user-alerts.massDestroy');
    Route::resource('user-alerts', 'UserAlertsController', ['except' => ['edit', 'update']]);

    // Faq Category
    Route::delete('faq-categories/destroy', 'FaqCategoryController@massDestroy')->name('faq-categories.massDestroy');
    Route::resource('faq-categories', 'FaqCategoryController');

    // Faq Question
    Route::delete('faq-questions/destroy', 'FaqQuestionController@massDestroy')->name('faq-questions.massDestroy');
    Route::resource('faq-questions', 'FaqQuestionController');

    // Request Stock Product
    Route::delete('request-stock-products/destroy', 'RequestStockProductController@massDestroy')->name('request-stock-products.massDestroy');
    Route::resource('request-stock-products', 'RequestStockProductController');

    // Production Monitoring
    Route::delete('production-monitorings/destroy', 'ProductionMonitoringController@massDestroy')->name('production-monitorings.massDestroy');
    Route::resource('production-monitorings', 'ProductionMonitoringController');

    // Quality Control
    Route::delete('quality-controls/destroy', 'QualityControlController@massDestroy')->name('quality-controls.massDestroy');
    Route::resource('quality-controls', 'QualityControlController');

    // Vendor
    Route::delete('vendors/destroy', 'VendorController@massDestroy')->name('vendors.massDestroy');
    Route::resource('vendors', 'VendorController');

    // Materials
    Route::delete('materials/destroy', 'MaterialsController@massDestroy')->name('materials.massDestroy');
    Route::post('materials/media', 'MaterialsController@storeMedia')->name('materials.storeMedia');
    Route::post('materials/ckmedia', 'MaterialsController@storeCKEditorImages')->name('materials.storeCKEditorImages');
    Route::resource('materials', 'MaterialsController');

    // Chart Of Account
    Route::delete('chart-of-accounts/destroy', 'ChartOfAccountController@massDestroy')->name('chart-of-accounts.massDestroy');
    Route::resource('chart-of-accounts', 'ChartOfAccountController');

    // Vendor Statuses
    Route::delete('vendor-statuses/destroy', 'VendorStatusesController@massDestroy')->name('vendor-statuses.massDestroy');
    Route::resource('vendor-statuses', 'VendorStatusesController');

    // Documents Vendor
    Route::delete('documents-vendors/destroy', 'DocumentsVendorController@massDestroy')->name('documents-vendors.massDestroy');
    Route::post('documents-vendors/media', 'DocumentsVendorController@storeMedia')->name('documents-vendors.storeMedia');
    Route::post('documents-vendors/ckmedia', 'DocumentsVendorController@storeCKEditorImages')->name('documents-vendors.storeCKEditorImages');
    Route::resource('documents-vendors', 'DocumentsVendorController');

    // Notes Vendor
    Route::delete('notes-vendors/destroy', 'NotesVendorController@massDestroy')->name('notes-vendors.massDestroy');
    Route::resource('notes-vendors', 'NotesVendorController');

    // Request For Quotation
    Route::delete('request-for-quotations/destroy', 'RequestForQuotationController@massDestroy')->name('request-for-quotations.massDestroy');
    Route::resource('request-for-quotations', 'RequestForQuotationController');

    // Purchase Quotation
    Route::delete('purchase-quotations/destroy', 'PurchaseQuotationController@massDestroy')->name('purchase-quotations.massDestroy');
    Route::resource('purchase-quotations', 'PurchaseQuotationController');

    // Task Status
    Route::delete('task-statuses/destroy', 'TaskStatusController@massDestroy')->name('task-statuses.massDestroy');
    Route::resource('task-statuses', 'TaskStatusController');

    // Task Tag
    Route::delete('task-tags/destroy', 'TaskTagController@massDestroy')->name('task-tags.massDestroy');
    Route::resource('task-tags', 'TaskTagController');

    // Task
    Route::delete('tasks/destroy', 'TaskController@massDestroy')->name('tasks.massDestroy');
    Route::post('tasks/media', 'TaskController@storeMedia')->name('tasks.storeMedia');
    Route::post('tasks/ckmedia', 'TaskController@storeCKEditorImages')->name('tasks.storeCKEditorImages');
    Route::resource('tasks', 'TaskController');

    // Tasks Calendar
    Route::resource('tasks-calendars', 'TasksCalendarController', ['except' => ['create', 'store', 'edit', 'update', 'show', 'destroy']]);

    // Purchase Requition
    Route::delete('purchase-requitions/destroy', 'PurchaseRequitionController@massDestroy')->name('purchase-requitions.massDestroy');
    Route::resource('purchase-requitions', 'PurchaseRequitionController');

    // Material Entry
    Route::delete('material-entries/destroy', 'MaterialEntryController@massDestroy')->name('material-entries.massDestroy');
    Route::resource('material-entries', 'MaterialEntryController');

    Route::get('frontend/profile', 'ProfileController@index')->name('profile.index');
    Route::post('frontend/profile', 'ProfileController@update')->name('profile.update');
    Route::post('frontend/profile/destroy', 'ProfileController@destroy')->name('profile.destroy');
    Route::post('frontend/profile/password', 'ProfileController@password')->name('profile.password');
    Route::post('profile/toggle-two-factor', 'ProfileController@toggleTwoFactor')->name('profile.toggle-two-factor');
});
Route::group(['namespace' => 'Auth', 'middleware' => ['auth', '2fa']], function () {
    // Two Factor Authentication
    if (file_exists(app_path('Http/Controllers/Auth/TwoFactorController.php'))) {
        Route::get('two-factor', 'TwoFactorController@show')->name('twoFactor.show');
        Route::post('two-factor', 'TwoFactorController@check')->name('twoFactor.check');
        Route::get('two-factor/resend', 'TwoFactorController@resend')->name('twoFactor.resend');
    }
});
