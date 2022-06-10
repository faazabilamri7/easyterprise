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
                'title' => 'sales_report_create',
            ],
            [
                'id'    => 34,
                'title' => 'sales_report_edit',
            ],
            [
                'id'    => 35,
                'title' => 'sales_report_show',
            ],
            [
                'id'    => 36,
                'title' => 'sales_report_delete',
            ],
            [
                'id'    => 37,
                'title' => 'sales_report_access',
            ],
            [
                'id'    => 38,
                'title' => 'customer_complain_create',
            ],
            [
                'id'    => 39,
                'title' => 'customer_complain_edit',
            ],
            [
                'id'    => 40,
                'title' => 'customer_complain_show',
            ],
            [
                'id'    => 41,
                'title' => 'customer_complain_delete',
            ],
            [
                'id'    => 42,
                'title' => 'customer_complain_access',
            ],
            [
                'id'    => 43,
                'title' => 'warehouse_access',
            ],
            [
                'id'    => 44,
                'title' => 'transfer_material_create',
            ],
            [
                'id'    => 45,
                'title' => 'transfer_material_edit',
            ],
            [
                'id'    => 46,
                'title' => 'transfer_material_show',
            ],
            [
                'id'    => 47,
                'title' => 'transfer_material_delete',
            ],
            [
                'id'    => 48,
                'title' => 'transfer_material_access',
            ],
            [
                'id'    => 49,
                'title' => 'transfer_produk_create',
            ],
            [
                'id'    => 50,
                'title' => 'transfer_produk_edit',
            ],
            [
                'id'    => 51,
                'title' => 'transfer_produk_show',
            ],
            [
                'id'    => 52,
                'title' => 'transfer_produk_delete',
            ],
            [
                'id'    => 53,
                'title' => 'transfer_produk_access',
            ],
            [
                'id'    => 54,
                'title' => 'pengiriman_create',
            ],
            [
                'id'    => 55,
                'title' => 'pengiriman_edit',
            ],
            [
                'id'    => 56,
                'title' => 'pengiriman_show',
            ],
            [
                'id'    => 57,
                'title' => 'pengiriman_delete',
            ],
            [
                'id'    => 58,
                'title' => 'pengiriman_access',
            ],
            [
                'id'    => 59,
                'title' => 'list_of_material_create',
            ],
            [
                'id'    => 60,
                'title' => 'list_of_material_edit',
            ],
            [
                'id'    => 61,
                'title' => 'list_of_material_show',
            ],
            [
                'id'    => 62,
                'title' => 'list_of_material_delete',
            ],
            [
                'id'    => 63,
                'title' => 'list_of_material_access',
            ],
            [
                'id'    => 64,
                'title' => 'machine_report_create',
            ],
            [
                'id'    => 65,
                'title' => 'machine_report_edit',
            ],
            [
                'id'    => 66,
                'title' => 'machine_report_show',
            ],
            [
                'id'    => 67,
                'title' => 'machine_report_delete',
            ],
            [
                'id'    => 68,
                'title' => 'machine_report_access',
            ],
            [
                'id'    => 69,
                'title' => 'procurement_access',
            ],
            [
                'id'    => 70,
                'title' => 'purchase_inq_create',
            ],
            [
                'id'    => 71,
                'title' => 'purchase_inq_edit',
            ],
            [
                'id'    => 72,
                'title' => 'purchase_inq_show',
            ],
            [
                'id'    => 73,
                'title' => 'purchase_inq_delete',
            ],
            [
                'id'    => 74,
                'title' => 'purchase_inq_access',
            ],
            [
                'id'    => 75,
                'title' => 'purchase_order_create',
            ],
            [
                'id'    => 76,
                'title' => 'purchase_order_edit',
            ],
            [
                'id'    => 77,
                'title' => 'purchase_order_show',
            ],
            [
                'id'    => 78,
                'title' => 'purchase_order_delete',
            ],
            [
                'id'    => 79,
                'title' => 'purchase_order_access',
            ],
            [
                'id'    => 80,
                'title' => 'purchase_return_create',
            ],
            [
                'id'    => 81,
                'title' => 'purchase_return_edit',
            ],
            [
                'id'    => 82,
                'title' => 'purchase_return_show',
            ],
            [
                'id'    => 83,
                'title' => 'purchase_return_delete',
            ],
            [
                'id'    => 84,
                'title' => 'purchase_return_access',
            ],
            [
                'id'    => 85,
                'title' => 'sales_invoice_create',
            ],
            [
                'id'    => 86,
                'title' => 'sales_invoice_edit',
            ],
            [
                'id'    => 87,
                'title' => 'sales_invoice_show',
            ],
            [
                'id'    => 88,
                'title' => 'sales_invoice_delete',
            ],
            [
                'id'    => 89,
                'title' => 'sales_invoice_access',
            ],
            [
                'id'    => 90,
                'title' => 'purchase_invoice_create',
            ],
            [
                'id'    => 91,
                'title' => 'purchase_invoice_edit',
            ],
            [
                'id'    => 92,
                'title' => 'purchase_invoice_show',
            ],
            [
                'id'    => 93,
                'title' => 'purchase_invoice_delete',
            ],
            [
                'id'    => 94,
                'title' => 'purchase_invoice_access',
            ],
            [
                'id'    => 95,
                'title' => 'basic_c_r_m_access',
            ],
            [
                'id'    => 96,
                'title' => 'crm_status_create',
            ],
            [
                'id'    => 97,
                'title' => 'crm_status_edit',
            ],
            [
                'id'    => 98,
                'title' => 'crm_status_show',
            ],
            [
                'id'    => 99,
                'title' => 'crm_status_delete',
            ],
            [
                'id'    => 100,
                'title' => 'crm_status_access',
            ],
            [
                'id'    => 101,
                'title' => 'crm_customer_create',
            ],
            [
                'id'    => 102,
                'title' => 'crm_customer_edit',
            ],
            [
                'id'    => 103,
                'title' => 'crm_customer_show',
            ],
            [
                'id'    => 104,
                'title' => 'crm_customer_delete',
            ],
            [
                'id'    => 105,
                'title' => 'crm_customer_access',
            ],
            [
                'id'    => 106,
                'title' => 'crm_note_create',
            ],
            [
                'id'    => 107,
                'title' => 'crm_note_edit',
            ],
            [
                'id'    => 108,
                'title' => 'crm_note_show',
            ],
            [
                'id'    => 109,
                'title' => 'crm_note_delete',
            ],
            [
                'id'    => 110,
                'title' => 'crm_note_access',
            ],
            [
                'id'    => 111,
                'title' => 'crm_document_create',
            ],
            [
                'id'    => 112,
                'title' => 'crm_document_edit',
            ],
            [
                'id'    => 113,
                'title' => 'crm_document_show',
            ],
            [
                'id'    => 114,
                'title' => 'crm_document_delete',
            ],
            [
                'id'    => 115,
                'title' => 'crm_document_access',
            ],
            [
                'id'    => 116,
                'title' => 'product_management_access',
            ],
            [
                'id'    => 117,
                'title' => 'product_category_create',
            ],
            [
                'id'    => 118,
                'title' => 'product_category_edit',
            ],
            [
                'id'    => 119,
                'title' => 'product_category_show',
            ],
            [
                'id'    => 120,
                'title' => 'product_category_delete',
            ],
            [
                'id'    => 121,
                'title' => 'product_category_access',
            ],
            [
                'id'    => 122,
                'title' => 'product_tag_create',
            ],
            [
                'id'    => 123,
                'title' => 'product_tag_edit',
            ],
            [
                'id'    => 124,
                'title' => 'product_tag_show',
            ],
            [
                'id'    => 125,
                'title' => 'product_tag_delete',
            ],
            [
                'id'    => 126,
                'title' => 'product_tag_access',
            ],
            [
                'id'    => 127,
                'title' => 'product_create',
            ],
            [
                'id'    => 128,
                'title' => 'product_edit',
            ],
            [
                'id'    => 129,
                'title' => 'product_show',
            ],
            [
                'id'    => 130,
                'title' => 'product_delete',
            ],
            [
                'id'    => 131,
                'title' => 'product_access',
            ],
            [
                'id'    => 132,
                'title' => 'expense_management_access',
            ],
            [
                'id'    => 133,
                'title' => 'expense_category_create',
            ],
            [
                'id'    => 134,
                'title' => 'expense_category_edit',
            ],
            [
                'id'    => 135,
                'title' => 'expense_category_show',
            ],
            [
                'id'    => 136,
                'title' => 'expense_category_delete',
            ],
            [
                'id'    => 137,
                'title' => 'expense_category_access',
            ],
            [
                'id'    => 138,
                'title' => 'income_category_create',
            ],
            [
                'id'    => 139,
                'title' => 'income_category_edit',
            ],
            [
                'id'    => 140,
                'title' => 'income_category_show',
            ],
            [
                'id'    => 141,
                'title' => 'income_category_delete',
            ],
            [
                'id'    => 142,
                'title' => 'income_category_access',
            ],
            [
                'id'    => 143,
                'title' => 'expense_create',
            ],
            [
                'id'    => 144,
                'title' => 'expense_edit',
            ],
            [
                'id'    => 145,
                'title' => 'expense_show',
            ],
            [
                'id'    => 146,
                'title' => 'expense_delete',
            ],
            [
                'id'    => 147,
                'title' => 'expense_access',
            ],
            [
                'id'    => 148,
                'title' => 'income_create',
            ],
            [
                'id'    => 149,
                'title' => 'income_edit',
            ],
            [
                'id'    => 150,
                'title' => 'income_show',
            ],
            [
                'id'    => 151,
                'title' => 'income_delete',
            ],
            [
                'id'    => 152,
                'title' => 'income_access',
            ],
            [
                'id'    => 153,
                'title' => 'expense_report_create',
            ],
            [
                'id'    => 154,
                'title' => 'expense_report_edit',
            ],
            [
                'id'    => 155,
                'title' => 'expense_report_show',
            ],
            [
                'id'    => 156,
                'title' => 'expense_report_delete',
            ],
            [
                'id'    => 157,
                'title' => 'expense_report_access',
            ],
            [
                'id'    => 158,
                'title' => 'finance_access',
            ],
            [
                'id'    => 159,
                'title' => 'asset_management_access',
            ],
            [
                'id'    => 160,
                'title' => 'asset_category_create',
            ],
            [
                'id'    => 161,
                'title' => 'asset_category_edit',
            ],
            [
                'id'    => 162,
                'title' => 'asset_category_show',
            ],
            [
                'id'    => 163,
                'title' => 'asset_category_delete',
            ],
            [
                'id'    => 164,
                'title' => 'asset_category_access',
            ],
            [
                'id'    => 165,
                'title' => 'asset_location_create',
            ],
            [
                'id'    => 166,
                'title' => 'asset_location_edit',
            ],
            [
                'id'    => 167,
                'title' => 'asset_location_show',
            ],
            [
                'id'    => 168,
                'title' => 'asset_location_delete',
            ],
            [
                'id'    => 169,
                'title' => 'asset_location_access',
            ],
            [
                'id'    => 170,
                'title' => 'asset_status_create',
            ],
            [
                'id'    => 171,
                'title' => 'asset_status_edit',
            ],
            [
                'id'    => 172,
                'title' => 'asset_status_show',
            ],
            [
                'id'    => 173,
                'title' => 'asset_status_delete',
            ],
            [
                'id'    => 174,
                'title' => 'asset_status_access',
            ],
            [
                'id'    => 175,
                'title' => 'asset_create',
            ],
            [
                'id'    => 176,
                'title' => 'asset_edit',
            ],
            [
                'id'    => 177,
                'title' => 'asset_show',
            ],
            [
                'id'    => 178,
                'title' => 'asset_delete',
            ],
            [
                'id'    => 179,
                'title' => 'asset_access',
            ],
            [
                'id'    => 180,
                'title' => 'assets_history_access',
            ],
            [
                'id'    => 181,
                'title' => 'akun_create',
            ],
            [
                'id'    => 182,
                'title' => 'akun_edit',
            ],
            [
                'id'    => 183,
                'title' => 'akun_show',
            ],
            [
                'id'    => 184,
                'title' => 'akun_delete',
            ],
            [
                'id'    => 185,
                'title' => 'akun_access',
            ],
            [
                'id'    => 186,
                'title' => 'jurnal_umum_create',
            ],
            [
                'id'    => 187,
                'title' => 'jurnal_umum_edit',
            ],
            [
                'id'    => 188,
                'title' => 'jurnal_umum_show',
            ],
            [
                'id'    => 189,
                'title' => 'jurnal_umum_delete',
            ],
            [
                'id'    => 190,
                'title' => 'jurnal_umum_access',
            ],
            [
                'id'    => 191,
                'title' => 'buku_besar_create',
            ],
            [
                'id'    => 192,
                'title' => 'buku_besar_edit',
            ],
            [
                'id'    => 193,
                'title' => 'buku_besar_show',
            ],
            [
                'id'    => 194,
                'title' => 'buku_besar_delete',
            ],
            [
                'id'    => 195,
                'title' => 'buku_besar_access',
            ],
            [
                'id'    => 196,
                'title' => 'necara_saldo_create',
            ],
            [
                'id'    => 197,
                'title' => 'necara_saldo_edit',
            ],
            [
                'id'    => 198,
                'title' => 'necara_saldo_show',
            ],
            [
                'id'    => 199,
                'title' => 'necara_saldo_delete',
            ],
            [
                'id'    => 200,
                'title' => 'necara_saldo_access',
            ],
            [
                'id'    => 201,
                'title' => 'jurnal_penyelesaian_create',
            ],
            [
                'id'    => 202,
                'title' => 'jurnal_penyelesaian_edit',
            ],
            [
                'id'    => 203,
                'title' => 'jurnal_penyelesaian_show',
            ],
            [
                'id'    => 204,
                'title' => 'jurnal_penyelesaian_delete',
            ],
            [
                'id'    => 205,
                'title' => 'jurnal_penyelesaian_access',
            ],
            [
                'id'    => 206,
                'title' => 'biaya_produksi_create',
            ],
            [
                'id'    => 207,
                'title' => 'biaya_produksi_edit',
            ],
            [
                'id'    => 208,
                'title' => 'biaya_produksi_show',
            ],
            [
                'id'    => 209,
                'title' => 'biaya_produksi_delete',
            ],
            [
                'id'    => 210,
                'title' => 'biaya_produksi_access',
            ],
            [
                'id'    => 211,
                'title' => 'kas_bank_create',
            ],
            [
                'id'    => 212,
                'title' => 'kas_bank_edit',
            ],
            [
                'id'    => 213,
                'title' => 'kas_bank_show',
            ],
            [
                'id'    => 214,
                'title' => 'kas_bank_delete',
            ],
            [
                'id'    => 215,
                'title' => 'kas_bank_access',
            ],
            [
                'id'    => 216,
                'title' => 'transaksi_keuangan_create',
            ],
            [
                'id'    => 217,
                'title' => 'transaksi_keuangan_edit',
            ],
            [
                'id'    => 218,
                'title' => 'transaksi_keuangan_show',
            ],
            [
                'id'    => 219,
                'title' => 'transaksi_keuangan_delete',
            ],
            [
                'id'    => 220,
                'title' => 'transaksi_keuangan_access',
            ],
            [
                'id'    => 221,
                'title' => 'invoice_pembelian_create',
            ],
            [
                'id'    => 222,
                'title' => 'invoice_pembelian_edit',
            ],
            [
                'id'    => 223,
                'title' => 'invoice_pembelian_show',
            ],
            [
                'id'    => 224,
                'title' => 'invoice_pembelian_delete',
            ],
            [
                'id'    => 225,
                'title' => 'invoice_pembelian_access',
            ],
            [
                'id'    => 226,
                'title' => 'audit_log_show',
            ],
            [
                'id'    => 227,
                'title' => 'audit_log_access',
            ],
            [
                'id'    => 228,
                'title' => 'user_alert_create',
            ],
            [
                'id'    => 229,
                'title' => 'user_alert_show',
            ],
            [
                'id'    => 230,
                'title' => 'user_alert_delete',
            ],
            [
                'id'    => 231,
                'title' => 'user_alert_access',
            ],
            [
                'id'    => 232,
                'title' => 'faq_management_access',
            ],
            [
                'id'    => 233,
                'title' => 'faq_category_create',
            ],
            [
                'id'    => 234,
                'title' => 'faq_category_edit',
            ],
            [
                'id'    => 235,
                'title' => 'faq_category_show',
            ],
            [
                'id'    => 236,
                'title' => 'faq_category_delete',
            ],
            [
                'id'    => 237,
                'title' => 'faq_category_access',
            ],
            [
                'id'    => 238,
                'title' => 'faq_question_create',
            ],
            [
                'id'    => 239,
                'title' => 'faq_question_edit',
            ],
            [
                'id'    => 240,
                'title' => 'faq_question_show',
            ],
            [
                'id'    => 241,
                'title' => 'faq_question_delete',
            ],
            [
                'id'    => 242,
                'title' => 'faq_question_access',
            ],
            [
                'id'    => 243,
                'title' => 'request_stock_product_create',
            ],
            [
                'id'    => 244,
                'title' => 'request_stock_product_edit',
            ],
            [
                'id'    => 245,
                'title' => 'request_stock_product_show',
            ],
            [
                'id'    => 246,
                'title' => 'request_stock_product_delete',
            ],
            [
                'id'    => 247,
                'title' => 'request_stock_product_access',
            ],
            [
                'id'    => 248,
                'title' => 'production_monitoring_create',
            ],
            [
                'id'    => 249,
                'title' => 'production_monitoring_edit',
            ],
            [
                'id'    => 250,
                'title' => 'production_monitoring_show',
            ],
            [
                'id'    => 251,
                'title' => 'production_monitoring_delete',
            ],
            [
                'id'    => 252,
                'title' => 'production_monitoring_access',
            ],
            [
                'id'    => 253,
                'title' => 'quality_control_create',
            ],
            [
                'id'    => 254,
                'title' => 'quality_control_edit',
            ],
            [
                'id'    => 255,
                'title' => 'quality_control_show',
            ],
            [
                'id'    => 256,
                'title' => 'quality_control_delete',
            ],
            [
                'id'    => 257,
                'title' => 'quality_control_access',
            ],
            [
                'id'    => 258,
                'title' => 'data_vendor_access',
            ],
            [
                'id'    => 259,
                'title' => 'vendor_create',
            ],
            [
                'id'    => 260,
                'title' => 'vendor_edit',
            ],
            [
                'id'    => 261,
                'title' => 'vendor_show',
            ],
            [
                'id'    => 262,
                'title' => 'vendor_delete',
            ],
            [
                'id'    => 263,
                'title' => 'vendor_access',
            ],
            [
                'id'    => 264,
                'title' => 'material_create',
            ],
            [
                'id'    => 265,
                'title' => 'material_edit',
            ],
            [
                'id'    => 266,
                'title' => 'material_show',
            ],
            [
                'id'    => 267,
                'title' => 'material_delete',
            ],
            [
                'id'    => 268,
                'title' => 'material_access',
            ],
            [
                'id'    => 269,
                'title' => 'chart_of_account_create',
            ],
            [
                'id'    => 270,
                'title' => 'chart_of_account_edit',
            ],
            [
                'id'    => 271,
                'title' => 'chart_of_account_show',
            ],
            [
                'id'    => 272,
                'title' => 'chart_of_account_delete',
            ],
            [
                'id'    => 273,
                'title' => 'chart_of_account_access',
            ],
            [
                'id'    => 274,
                'title' => 'vendor_status_create',
            ],
            [
                'id'    => 275,
                'title' => 'vendor_status_edit',
            ],
            [
                'id'    => 276,
                'title' => 'vendor_status_show',
            ],
            [
                'id'    => 277,
                'title' => 'vendor_status_delete',
            ],
            [
                'id'    => 278,
                'title' => 'vendor_status_access',
            ],
            [
                'id'    => 279,
                'title' => 'documents_vendor_create',
            ],
            [
                'id'    => 280,
                'title' => 'documents_vendor_edit',
            ],
            [
                'id'    => 281,
                'title' => 'documents_vendor_show',
            ],
            [
                'id'    => 282,
                'title' => 'documents_vendor_delete',
            ],
            [
                'id'    => 283,
                'title' => 'documents_vendor_access',
            ],
            [
                'id'    => 284,
                'title' => 'notes_vendor_create',
            ],
            [
                'id'    => 285,
                'title' => 'notes_vendor_edit',
            ],
            [
                'id'    => 286,
                'title' => 'notes_vendor_show',
            ],
            [
                'id'    => 287,
                'title' => 'notes_vendor_delete',
            ],
            [
                'id'    => 288,
                'title' => 'notes_vendor_access',
            ],
            [
                'id'    => 289,
                'title' => 'request_for_quotation_create',
            ],
            [
                'id'    => 290,
                'title' => 'request_for_quotation_edit',
            ],
            [
                'id'    => 291,
                'title' => 'request_for_quotation_show',
            ],
            [
                'id'    => 292,
                'title' => 'request_for_quotation_delete',
            ],
            [
                'id'    => 293,
                'title' => 'request_for_quotation_access',
            ],
            [
                'id'    => 294,
                'title' => 'purchase_quotation_create',
            ],
            [
                'id'    => 295,
                'title' => 'purchase_quotation_edit',
            ],
            [
                'id'    => 296,
                'title' => 'purchase_quotation_show',
            ],
            [
                'id'    => 297,
                'title' => 'purchase_quotation_delete',
            ],
            [
                'id'    => 298,
                'title' => 'purchase_quotation_access',
            ],
            [
                'id'    => 299,
                'title' => 'task_management_access',
            ],
            [
                'id'    => 300,
                'title' => 'task_status_create',
            ],
            [
                'id'    => 301,
                'title' => 'task_status_edit',
            ],
            [
                'id'    => 302,
                'title' => 'task_status_show',
            ],
            [
                'id'    => 303,
                'title' => 'task_status_delete',
            ],
            [
                'id'    => 304,
                'title' => 'task_status_access',
            ],
            [
                'id'    => 305,
                'title' => 'task_tag_create',
            ],
            [
                'id'    => 306,
                'title' => 'task_tag_edit',
            ],
            [
                'id'    => 307,
                'title' => 'task_tag_show',
            ],
            [
                'id'    => 308,
                'title' => 'task_tag_delete',
            ],
            [
                'id'    => 309,
                'title' => 'task_tag_access',
            ],
            [
                'id'    => 310,
                'title' => 'task_create',
            ],
            [
                'id'    => 311,
                'title' => 'task_edit',
            ],
            [
                'id'    => 312,
                'title' => 'task_show',
            ],
            [
                'id'    => 313,
                'title' => 'task_delete',
            ],
            [
                'id'    => 314,
                'title' => 'task_access',
            ],
            [
                'id'    => 315,
                'title' => 'tasks_calendar_access',
            ],
            [
                'id'    => 316,
                'title' => 'purchase_requition_create',
            ],
            [
                'id'    => 317,
                'title' => 'purchase_requition_edit',
            ],
            [
                'id'    => 318,
                'title' => 'purchase_requition_show',
            ],
            [
                'id'    => 319,
                'title' => 'purchase_requition_delete',
            ],
            [
                'id'    => 320,
                'title' => 'purchase_requition_access',
            ],
            [
                'id'    => 321,
                'title' => 'material_entry_create',
            ],
            [
                'id'    => 322,
                'title' => 'material_entry_edit',
            ],
            [
                'id'    => 323,
                'title' => 'material_entry_show',
            ],
            [
                'id'    => 324,
                'title' => 'material_entry_delete',
            ],
            [
                'id'    => 325,
                'title' => 'material_entry_access',
            ],
            [
                'id'    => 326,
                'title' => 'profile_password_edit',
            ],
        ];

        Permission::insert($permissions);
    }
}
