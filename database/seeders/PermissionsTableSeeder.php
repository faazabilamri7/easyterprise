<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    public function run()
    {
        $permissions = [
            [
                'id'    => 1,
                'title' => 'user_management_access',
            ],
            [
                'id'    => 2,
                'title' => 'permission_create',
            ],
            [
                'id'    => 3,
                'title' => 'permission_edit',
            ],
            [
                'id'    => 4,
                'title' => 'permission_show',
            ],
            [
                'id'    => 5,
                'title' => 'permission_delete',
            ],
            [
                'id'    => 6,
                'title' => 'permission_access',
            ],
            [
                'id'    => 7,
                'title' => 'role_create',
            ],
            [
                'id'    => 8,
                'title' => 'role_edit',
            ],
            [
                'id'    => 9,
                'title' => 'role_show',
            ],
            [
                'id'    => 10,
                'title' => 'role_delete',
            ],
            [
                'id'    => 11,
                'title' => 'role_access',
            ],
            [
                'id'    => 12,
                'title' => 'user_create',
            ],
            [
                'id'    => 13,
                'title' => 'user_edit',
            ],
            [
                'id'    => 14,
                'title' => 'user_show',
            ],
            [
                'id'    => 15,
                'title' => 'user_delete',
            ],
            [
                'id'    => 16,
                'title' => 'user_access',
            ],
            [
                'id'    => 17,
                'title' => 'sales_marketing_access',
            ],
            [
                'id'    => 18,
                'title' => 'sales_inquiry_create',
            ],
            [
                'id'    => 19,
                'title' => 'sales_inquiry_edit',
            ],
            [
                'id'    => 20,
                'title' => 'sales_inquiry_show',
            ],
            [
                'id'    => 21,
                'title' => 'sales_inquiry_delete',
            ],
            [
                'id'    => 22,
                'title' => 'sales_inquiry_access',
            ],
            [
                'id'    => 23,
                'title' => 'sales_quotation_create',
            ],
            [
                'id'    => 24,
                'title' => 'sales_quotation_edit',
            ],
            [
                'id'    => 25,
                'title' => 'sales_quotation_show',
            ],
            [
                'id'    => 26,
                'title' => 'sales_quotation_delete',
            ],
            [
                'id'    => 27,
                'title' => 'sales_quotation_access',
            ],
            [
                'id'    => 28,
                'title' => 'sales_order_create',
            ],
            [
                'id'    => 29,
                'title' => 'sales_order_edit',
            ],
            [
                'id'    => 30,
                'title' => 'sales_order_show',
            ],
            [
                'id'    => 31,
                'title' => 'sales_order_delete',
            ],
            [
                'id'    => 32,
                'title' => 'sales_order_access',
            ],
            [
                'id'    => 33,
                'title' => 'warehouse_access',
            ],
            [
                'id'    => 34,
                'title' => 'transfer_material_create',
            ],
            [
                'id'    => 35,
                'title' => 'transfer_material_edit',
            ],
            [
                'id'    => 36,
                'title' => 'transfer_material_show',
            ],
            [
                'id'    => 37,
                'title' => 'transfer_material_delete',
            ],
            [
                'id'    => 38,
                'title' => 'transfer_material_access',
            ],
            [
                'id'    => 39,
                'title' => 'transfer_produk_create',
            ],
            [
                'id'    => 40,
                'title' => 'transfer_produk_edit',
            ],
            [
                'id'    => 41,
                'title' => 'transfer_produk_show',
            ],
            [
                'id'    => 42,
                'title' => 'transfer_produk_delete',
            ],
            [
                'id'    => 43,
                'title' => 'transfer_produk_access',
            ],
            [
                'id'    => 44,
                'title' => 'pengiriman_create',
            ],
            [
                'id'    => 45,
                'title' => 'pengiriman_edit',
            ],
            [
                'id'    => 46,
                'title' => 'pengiriman_show',
            ],
            [
                'id'    => 47,
                'title' => 'pengiriman_delete',
            ],
            [
                'id'    => 48,
                'title' => 'pengiriman_access',
            ],
            [
                'id'    => 49,
                'title' => 'list_of_material_create',
            ],
            [
                'id'    => 50,
                'title' => 'list_of_material_edit',
            ],
            [
                'id'    => 51,
                'title' => 'list_of_material_show',
            ],
            [
                'id'    => 52,
                'title' => 'list_of_material_delete',
            ],
            [
                'id'    => 53,
                'title' => 'list_of_material_access',
            ],
            [
                'id'    => 54,
                'title' => 'machine_report_create',
            ],
            [
                'id'    => 55,
                'title' => 'machine_report_edit',
            ],
            [
                'id'    => 56,
                'title' => 'machine_report_show',
            ],
            [
                'id'    => 57,
                'title' => 'machine_report_delete',
            ],
            [
                'id'    => 58,
                'title' => 'machine_report_access',
            ],
            [
                'id'    => 59,
                'title' => 'procurement_access',
            ],
            [
                'id'    => 60,
                'title' => 'purchase_inq_create',
            ],
            [
                'id'    => 61,
                'title' => 'purchase_inq_edit',
            ],
            [
                'id'    => 62,
                'title' => 'purchase_inq_show',
            ],
            [
                'id'    => 63,
                'title' => 'purchase_inq_delete',
            ],
            [
                'id'    => 64,
                'title' => 'purchase_inq_access',
            ],
            [
                'id'    => 65,
                'title' => 'purchase_order_create',
            ],
            [
                'id'    => 66,
                'title' => 'purchase_order_edit',
            ],
            [
                'id'    => 67,
                'title' => 'purchase_order_show',
            ],
            [
                'id'    => 68,
                'title' => 'purchase_order_delete',
            ],
            [
                'id'    => 69,
                'title' => 'purchase_order_access',
            ],
            [
                'id'    => 70,
                'title' => 'purchase_return_create',
            ],
            [
                'id'    => 71,
                'title' => 'purchase_return_edit',
            ],
            [
                'id'    => 72,
                'title' => 'purchase_return_show',
            ],
            [
                'id'    => 73,
                'title' => 'purchase_return_delete',
            ],
            [
                'id'    => 74,
                'title' => 'purchase_return_access',
            ],
            [
                'id'    => 75,
                'title' => 'sales_invoice_create',
            ],
            [
                'id'    => 76,
                'title' => 'sales_invoice_edit',
            ],
            [
                'id'    => 77,
                'title' => 'sales_invoice_show',
            ],
            [
                'id'    => 78,
                'title' => 'sales_invoice_delete',
            ],
            [
                'id'    => 79,
                'title' => 'sales_invoice_access',
            ],
            [
                'id'    => 80,
                'title' => 'purchase_invoice_create',
            ],
            [
                'id'    => 81,
                'title' => 'purchase_invoice_edit',
            ],
            [
                'id'    => 82,
                'title' => 'purchase_invoice_show',
            ],
            [
                'id'    => 83,
                'title' => 'purchase_invoice_delete',
            ],
            [
                'id'    => 84,
                'title' => 'purchase_invoice_access',
            ],
            [
                'id'    => 85,
                'title' => 'basic_c_r_m_access',
            ],
            [
                'id'    => 86,
                'title' => 'crm_status_create',
            ],
            [
                'id'    => 87,
                'title' => 'crm_status_edit',
            ],
            [
                'id'    => 88,
                'title' => 'crm_status_show',
            ],
            [
                'id'    => 89,
                'title' => 'crm_status_delete',
            ],
            [
                'id'    => 90,
                'title' => 'crm_status_access',
            ],
            [
                'id'    => 91,
                'title' => 'crm_customer_create',
            ],
            [
                'id'    => 92,
                'title' => 'crm_customer_edit',
            ],
            [
                'id'    => 93,
                'title' => 'crm_customer_show',
            ],
            [
                'id'    => 94,
                'title' => 'crm_customer_delete',
            ],
            [
                'id'    => 95,
                'title' => 'crm_customer_access',
            ],
            [
                'id'    => 96,
                'title' => 'crm_note_create',
            ],
            [
                'id'    => 97,
                'title' => 'crm_note_edit',
            ],
            [
                'id'    => 98,
                'title' => 'crm_note_show',
            ],
            [
                'id'    => 99,
                'title' => 'crm_note_delete',
            ],
            [
                'id'    => 100,
                'title' => 'crm_note_access',
            ],
            [
                'id'    => 101,
                'title' => 'crm_document_create',
            ],
            [
                'id'    => 102,
                'title' => 'crm_document_edit',
            ],
            [
                'id'    => 103,
                'title' => 'crm_document_show',
            ],
            [
                'id'    => 104,
                'title' => 'crm_document_delete',
            ],
            [
                'id'    => 105,
                'title' => 'crm_document_access',
            ],
            [
                'id'    => 106,
                'title' => 'product_management_access',
            ],
            [
                'id'    => 107,
                'title' => 'product_category_create',
            ],
            [
                'id'    => 108,
                'title' => 'product_category_edit',
            ],
            [
                'id'    => 109,
                'title' => 'product_category_show',
            ],
            [
                'id'    => 110,
                'title' => 'product_category_delete',
            ],
            [
                'id'    => 111,
                'title' => 'product_category_access',
            ],
            [
                'id'    => 112,
                'title' => 'product_tag_create',
            ],
            [
                'id'    => 113,
                'title' => 'product_tag_edit',
            ],
            [
                'id'    => 114,
                'title' => 'product_tag_show',
            ],
            [
                'id'    => 115,
                'title' => 'product_tag_delete',
            ],
            [
                'id'    => 116,
                'title' => 'product_tag_access',
            ],
            [
                'id'    => 117,
                'title' => 'product_create',
            ],
            [
                'id'    => 118,
                'title' => 'product_edit',
            ],
            [
                'id'    => 119,
                'title' => 'product_show',
            ],
            [
                'id'    => 120,
                'title' => 'product_delete',
            ],
            [
                'id'    => 121,
                'title' => 'product_access',
            ],
            [
                'id'    => 122,
                'title' => 'expense_management_access',
            ],
            [
                'id'    => 123,
                'title' => 'expense_category_create',
            ],
            [
                'id'    => 124,
                'title' => 'expense_category_edit',
            ],
            [
                'id'    => 125,
                'title' => 'expense_category_show',
            ],
            [
                'id'    => 126,
                'title' => 'expense_category_delete',
            ],
            [
                'id'    => 127,
                'title' => 'expense_category_access',
            ],
            [
                'id'    => 128,
                'title' => 'income_category_create',
            ],
            [
                'id'    => 129,
                'title' => 'income_category_edit',
            ],
            [
                'id'    => 130,
                'title' => 'income_category_show',
            ],
            [
                'id'    => 131,
                'title' => 'income_category_delete',
            ],
            [
                'id'    => 132,
                'title' => 'income_category_access',
            ],
            [
                'id'    => 133,
                'title' => 'expense_create',
            ],
            [
                'id'    => 134,
                'title' => 'expense_edit',
            ],
            [
                'id'    => 135,
                'title' => 'expense_show',
            ],
            [
                'id'    => 136,
                'title' => 'expense_delete',
            ],
            [
                'id'    => 137,
                'title' => 'expense_access',
            ],
            [
                'id'    => 138,
                'title' => 'income_create',
            ],
            [
                'id'    => 139,
                'title' => 'income_edit',
            ],
            [
                'id'    => 140,
                'title' => 'income_show',
            ],
            [
                'id'    => 141,
                'title' => 'income_delete',
            ],
            [
                'id'    => 142,
                'title' => 'income_access',
            ],
            [
                'id'    => 143,
                'title' => 'expense_report_create',
            ],
            [
                'id'    => 144,
                'title' => 'expense_report_edit',
            ],
            [
                'id'    => 145,
                'title' => 'expense_report_show',
            ],
            [
                'id'    => 146,
                'title' => 'expense_report_delete',
            ],
            [
                'id'    => 147,
                'title' => 'expense_report_access',
            ],
            [
                'id'    => 148,
                'title' => 'finance_access',
            ],
            [
                'id'    => 149,
                'title' => 'akun_create',
            ],
            [
                'id'    => 150,
                'title' => 'akun_edit',
            ],
            [
                'id'    => 151,
                'title' => 'akun_show',
            ],
            [
                'id'    => 152,
                'title' => 'akun_delete',
            ],
            [
                'id'    => 153,
                'title' => 'akun_access',
            ],
            [
                'id'    => 154,
                'title' => 'jurnal_umum_create',
            ],
            [
                'id'    => 155,
                'title' => 'jurnal_umum_edit',
            ],
            [
                'id'    => 156,
                'title' => 'jurnal_umum_show',
            ],
            [
                'id'    => 157,
                'title' => 'jurnal_umum_delete',
            ],
            [
                'id'    => 158,
                'title' => 'jurnal_umum_access',
            ],
            [
                'id'    => 159,
                'title' => 'buku_besar_create',
            ],
            [
                'id'    => 160,
                'title' => 'buku_besar_edit',
            ],
            [
                'id'    => 161,
                'title' => 'buku_besar_show',
            ],
            [
                'id'    => 162,
                'title' => 'buku_besar_delete',
            ],
            [
                'id'    => 163,
                'title' => 'buku_besar_access',
            ],
            [
                'id'    => 164,
                'title' => 'necara_saldo_create',
            ],
            [
                'id'    => 165,
                'title' => 'necara_saldo_edit',
            ],
            [
                'id'    => 166,
                'title' => 'necara_saldo_show',
            ],
            [
                'id'    => 167,
                'title' => 'necara_saldo_delete',
            ],
            [
                'id'    => 168,
                'title' => 'necara_saldo_access',
            ],
            [
                'id'    => 169,
                'title' => 'jurnal_penyelesaian_create',
            ],
            [
                'id'    => 170,
                'title' => 'jurnal_penyelesaian_edit',
            ],
            [
                'id'    => 171,
                'title' => 'jurnal_penyelesaian_show',
            ],
            [
                'id'    => 172,
                'title' => 'jurnal_penyelesaian_delete',
            ],
            [
                'id'    => 173,
                'title' => 'jurnal_penyelesaian_access',
            ],
            [
                'id'    => 174,
                'title' => 'biaya_produksi_create',
            ],
            [
                'id'    => 175,
                'title' => 'biaya_produksi_edit',
            ],
            [
                'id'    => 176,
                'title' => 'biaya_produksi_show',
            ],
            [
                'id'    => 177,
                'title' => 'biaya_produksi_delete',
            ],
            [
                'id'    => 178,
                'title' => 'biaya_produksi_access',
            ],
            [
                'id'    => 179,
                'title' => 'kas_bank_create',
            ],
            [
                'id'    => 180,
                'title' => 'kas_bank_edit',
            ],
            [
                'id'    => 181,
                'title' => 'kas_bank_show',
            ],
            [
                'id'    => 182,
                'title' => 'kas_bank_delete',
            ],
            [
                'id'    => 183,
                'title' => 'kas_bank_access',
            ],
            [
                'id'    => 184,
                'title' => 'transaksi_keuangan_create',
            ],
            [
                'id'    => 185,
                'title' => 'transaksi_keuangan_edit',
            ],
            [
                'id'    => 186,
                'title' => 'transaksi_keuangan_show',
            ],
            [
                'id'    => 187,
                'title' => 'transaksi_keuangan_delete',
            ],
            [
                'id'    => 188,
                'title' => 'transaksi_keuangan_access',
            ],
            [
                'id'    => 189,
                'title' => 'invoice_pembelian_create',
            ],
            [
                'id'    => 190,
                'title' => 'invoice_pembelian_edit',
            ],
            [
                'id'    => 191,
                'title' => 'invoice_pembelian_show',
            ],
            [
                'id'    => 192,
                'title' => 'invoice_pembelian_delete',
            ],
            [
                'id'    => 193,
                'title' => 'invoice_pembelian_access',
            ],
            [
                'id'    => 194,
                'title' => 'audit_log_show',
            ],
            [
                'id'    => 195,
                'title' => 'audit_log_access',
            ],
            [
                'id'    => 196,
                'title' => 'user_alert_create',
            ],
            [
                'id'    => 197,
                'title' => 'user_alert_show',
            ],
            [
                'id'    => 198,
                'title' => 'user_alert_delete',
            ],
            [
                'id'    => 199,
                'title' => 'user_alert_access',
            ],
            [
                'id'    => 200,
                'title' => 'faq_management_access',
            ],
            [
                'id'    => 201,
                'title' => 'faq_category_create',
            ],
            [
                'id'    => 202,
                'title' => 'faq_category_edit',
            ],
            [
                'id'    => 203,
                'title' => 'faq_category_show',
            ],
            [
                'id'    => 204,
                'title' => 'faq_category_delete',
            ],
            [
                'id'    => 205,
                'title' => 'faq_category_access',
            ],
            [
                'id'    => 206,
                'title' => 'faq_question_create',
            ],
            [
                'id'    => 207,
                'title' => 'faq_question_edit',
            ],
            [
                'id'    => 208,
                'title' => 'faq_question_show',
            ],
            [
                'id'    => 209,
                'title' => 'faq_question_delete',
            ],
            [
                'id'    => 210,
                'title' => 'faq_question_access',
            ],
            [
                'id'    => 211,
                'title' => 'request_stock_product_create',
            ],
            [
                'id'    => 212,
                'title' => 'request_stock_product_edit',
            ],
            [
                'id'    => 213,
                'title' => 'request_stock_product_show',
            ],
            [
                'id'    => 214,
                'title' => 'request_stock_product_delete',
            ],
            [
                'id'    => 215,
                'title' => 'request_stock_product_access',
            ],
            [
                'id'    => 216,
                'title' => 'production_monitoring_create',
            ],
            [
                'id'    => 217,
                'title' => 'production_monitoring_edit',
            ],
            [
                'id'    => 218,
                'title' => 'production_monitoring_show',
            ],
            [
                'id'    => 219,
                'title' => 'production_monitoring_delete',
            ],
            [
                'id'    => 220,
                'title' => 'production_monitoring_access',
            ],
            [
                'id'    => 221,
                'title' => 'quality_control_create',
            ],
            [
                'id'    => 222,
                'title' => 'quality_control_edit',
            ],
            [
                'id'    => 223,
                'title' => 'quality_control_show',
            ],
            [
                'id'    => 224,
                'title' => 'quality_control_delete',
            ],
            [
                'id'    => 225,
                'title' => 'quality_control_access',
            ],
            [
                'id'    => 226,
                'title' => 'data_vendor_access',
            ],
            [
                'id'    => 227,
                'title' => 'vendor_create',
            ],
            [
                'id'    => 228,
                'title' => 'vendor_edit',
            ],
            [
                'id'    => 229,
                'title' => 'vendor_show',
            ],
            [
                'id'    => 230,
                'title' => 'vendor_delete',
            ],
            [
                'id'    => 231,
                'title' => 'vendor_access',
            ],
            [
                'id'    => 232,
                'title' => 'material_create',
            ],
            [
                'id'    => 233,
                'title' => 'material_edit',
            ],
            [
                'id'    => 234,
                'title' => 'material_show',
            ],
            [
                'id'    => 235,
                'title' => 'material_delete',
            ],
            [
                'id'    => 236,
                'title' => 'material_access',
            ],
            [
                'id'    => 237,
                'title' => 'chart_of_account_create',
            ],
            [
                'id'    => 238,
                'title' => 'chart_of_account_edit',
            ],
            [
                'id'    => 239,
                'title' => 'chart_of_account_show',
            ],
            [
                'id'    => 240,
                'title' => 'chart_of_account_delete',
            ],
            [
                'id'    => 241,
                'title' => 'chart_of_account_access',
            ],
            [
                'id'    => 242,
                'title' => 'vendor_status_create',
            ],
            [
                'id'    => 243,
                'title' => 'vendor_status_edit',
            ],
            [
                'id'    => 244,
                'title' => 'vendor_status_show',
            ],
            [
                'id'    => 245,
                'title' => 'vendor_status_delete',
            ],
            [
                'id'    => 246,
                'title' => 'vendor_status_access',
            ],
            [
                'id'    => 247,
                'title' => 'documents_vendor_create',
            ],
            [
                'id'    => 248,
                'title' => 'documents_vendor_edit',
            ],
            [
                'id'    => 249,
                'title' => 'documents_vendor_show',
            ],
            [
                'id'    => 250,
                'title' => 'documents_vendor_delete',
            ],
            [
                'id'    => 251,
                'title' => 'documents_vendor_access',
            ],
            [
                'id'    => 252,
                'title' => 'notes_vendor_create',
            ],
            [
                'id'    => 253,
                'title' => 'notes_vendor_edit',
            ],
            [
                'id'    => 254,
                'title' => 'notes_vendor_show',
            ],
            [
                'id'    => 255,
                'title' => 'notes_vendor_delete',
            ],
            [
                'id'    => 256,
                'title' => 'notes_vendor_access',
            ],
            [
                'id'    => 257,
                'title' => 'request_for_quotation_create',
            ],
            [
                'id'    => 258,
                'title' => 'request_for_quotation_edit',
            ],
            [
                'id'    => 259,
                'title' => 'request_for_quotation_show',
            ],
            [
                'id'    => 260,
                'title' => 'request_for_quotation_delete',
            ],
            [
                'id'    => 261,
                'title' => 'request_for_quotation_access',
            ],
            [
                'id'    => 262,
                'title' => 'purchase_quotation_create',
            ],
            [
                'id'    => 263,
                'title' => 'purchase_quotation_edit',
            ],
            [
                'id'    => 264,
                'title' => 'purchase_quotation_show',
            ],
            [
                'id'    => 265,
                'title' => 'purchase_quotation_delete',
            ],
            [
                'id'    => 266,
                'title' => 'purchase_quotation_access',
            ],
            [
                'id'    => 267,
                'title' => 'task_management_access',
            ],
            [
                'id'    => 268,
                'title' => 'task_status_create',
            ],
            [
                'id'    => 269,
                'title' => 'task_status_edit',
            ],
            [
                'id'    => 270,
                'title' => 'task_status_show',
            ],
            [
                'id'    => 271,
                'title' => 'task_status_delete',
            ],
            [
                'id'    => 272,
                'title' => 'task_status_access',
            ],
            [
                'id'    => 273,
                'title' => 'task_tag_create',
            ],
            [
                'id'    => 274,
                'title' => 'task_tag_edit',
            ],
            [
                'id'    => 275,
                'title' => 'task_tag_show',
            ],
            [
                'id'    => 276,
                'title' => 'task_tag_delete',
            ],
            [
                'id'    => 277,
                'title' => 'task_tag_access',
            ],
            [
                'id'    => 278,
                'title' => 'task_create',
            ],
            [
                'id'    => 279,
                'title' => 'task_edit',
            ],
            [
                'id'    => 280,
                'title' => 'task_show',
            ],
            [
                'id'    => 281,
                'title' => 'task_delete',
            ],
            [
                'id'    => 282,
                'title' => 'task_access',
            ],
            [
                'id'    => 283,
                'title' => 'tasks_calendar_access',
            ],
            [
                'id'    => 284,
                'title' => 'purchase_requition_create',
            ],
            [
                'id'    => 285,
                'title' => 'purchase_requition_edit',
            ],
            [
                'id'    => 286,
                'title' => 'purchase_requition_show',
            ],
            [
                'id'    => 287,
                'title' => 'purchase_requition_delete',
            ],
            [
                'id'    => 288,
                'title' => 'purchase_requition_access',
            ],
            [
                'id'    => 289,
                'title' => 'material_entry_create',
            ],
            [
                'id'    => 290,
                'title' => 'material_entry_edit',
            ],
            [
                'id'    => 291,
                'title' => 'material_entry_show',
            ],
            [
                'id'    => 292,
                'title' => 'material_entry_delete',
            ],
            [
                'id'    => 293,
                'title' => 'material_entry_access',
            ],
            [
                'id'    => 294,
                'title' => 'profile_password_edit',
            ],
        ];

        Permission::insert($permissions);
    }
}
