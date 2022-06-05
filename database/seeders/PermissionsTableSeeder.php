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
                'title' => 'stok_produk_create',
            ],
            [
                'id'    => 45,
                'title' => 'stok_produk_edit',
            ],
            [
                'id'    => 46,
                'title' => 'stok_produk_show',
            ],
            [
                'id'    => 47,
                'title' => 'stok_produk_delete',
            ],
            [
                'id'    => 48,
                'title' => 'stok_produk_access',
            ],
            [
                'id'    => 49,
                'title' => 'stok_material_create',
            ],
            [
                'id'    => 50,
                'title' => 'stok_material_edit',
            ],
            [
                'id'    => 51,
                'title' => 'stok_material_show',
            ],
            [
                'id'    => 52,
                'title' => 'stok_material_delete',
            ],
            [
                'id'    => 53,
                'title' => 'stok_material_access',
            ],
            [
                'id'    => 54,
                'title' => 'transfer_material_create',
            ],
            [
                'id'    => 55,
                'title' => 'transfer_material_edit',
            ],
            [
                'id'    => 56,
                'title' => 'transfer_material_show',
            ],
            [
                'id'    => 57,
                'title' => 'transfer_material_delete',
            ],
            [
                'id'    => 58,
                'title' => 'transfer_material_access',
            ],
            [
                'id'    => 59,
                'title' => 'transfer_produk_create',
            ],
            [
                'id'    => 60,
                'title' => 'transfer_produk_edit',
            ],
            [
                'id'    => 61,
                'title' => 'transfer_produk_show',
            ],
            [
                'id'    => 62,
                'title' => 'transfer_produk_delete',
            ],
            [
                'id'    => 63,
                'title' => 'transfer_produk_access',
            ],
            [
                'id'    => 64,
                'title' => 'pengiriman_create',
            ],
            [
                'id'    => 65,
                'title' => 'pengiriman_edit',
            ],
            [
                'id'    => 66,
                'title' => 'pengiriman_show',
            ],
            [
                'id'    => 67,
                'title' => 'pengiriman_delete',
            ],
            [
                'id'    => 68,
                'title' => 'pengiriman_access',
            ],
            [
                'id'    => 69,
                'title' => 'list_of_material_create',
            ],
            [
                'id'    => 70,
                'title' => 'list_of_material_edit',
            ],
            [
                'id'    => 71,
                'title' => 'list_of_material_show',
            ],
            [
                'id'    => 72,
                'title' => 'list_of_material_delete',
            ],
            [
                'id'    => 73,
                'title' => 'list_of_material_access',
            ],
            [
                'id'    => 74,
                'title' => 'machine_report_create',
            ],
            [
                'id'    => 75,
                'title' => 'machine_report_edit',
            ],
            [
                'id'    => 76,
                'title' => 'machine_report_show',
            ],
            [
                'id'    => 77,
                'title' => 'machine_report_delete',
            ],
            [
                'id'    => 78,
                'title' => 'machine_report_access',
            ],
            [
                'id'    => 79,
                'title' => 'procurement_access',
            ],
            [
                'id'    => 80,
                'title' => 'purchas_req_create',
            ],
            [
                'id'    => 81,
                'title' => 'purchas_req_edit',
            ],
            [
                'id'    => 82,
                'title' => 'purchas_req_show',
            ],
            [
                'id'    => 83,
                'title' => 'purchas_req_delete',
            ],
            [
                'id'    => 84,
                'title' => 'purchas_req_access',
            ],
            [
                'id'    => 85,
                'title' => 'purchase_inq_create',
            ],
            [
                'id'    => 86,
                'title' => 'purchase_inq_edit',
            ],
            [
                'id'    => 87,
                'title' => 'purchase_inq_show',
            ],
            [
                'id'    => 88,
                'title' => 'purchase_inq_delete',
            ],
            [
                'id'    => 89,
                'title' => 'purchase_inq_access',
            ],
            [
                'id'    => 90,
                'title' => 'purchase_order_create',
            ],
            [
                'id'    => 91,
                'title' => 'purchase_order_edit',
            ],
            [
                'id'    => 92,
                'title' => 'purchase_order_show',
            ],
            [
                'id'    => 93,
                'title' => 'purchase_order_delete',
            ],
            [
                'id'    => 94,
                'title' => 'purchase_order_access',
            ],
            [
                'id'    => 95,
                'title' => 'purchase_return_create',
            ],
            [
                'id'    => 96,
                'title' => 'purchase_return_edit',
            ],
            [
                'id'    => 97,
                'title' => 'purchase_return_show',
            ],
            [
                'id'    => 98,
                'title' => 'purchase_return_delete',
            ],
            [
                'id'    => 99,
                'title' => 'purchase_return_access',
            ],
            [
                'id'    => 100,
                'title' => 'sales_invoice_create',
            ],
            [
                'id'    => 101,
                'title' => 'sales_invoice_edit',
            ],
            [
                'id'    => 102,
                'title' => 'sales_invoice_show',
            ],
            [
                'id'    => 103,
                'title' => 'sales_invoice_delete',
            ],
            [
                'id'    => 104,
                'title' => 'sales_invoice_access',
            ],
            [
                'id'    => 105,
                'title' => 'purchase_invoice_create',
            ],
            [
                'id'    => 106,
                'title' => 'purchase_invoice_edit',
            ],
            [
                'id'    => 107,
                'title' => 'purchase_invoice_show',
            ],
            [
                'id'    => 108,
                'title' => 'purchase_invoice_delete',
            ],
            [
                'id'    => 109,
                'title' => 'purchase_invoice_access',
            ],
            [
                'id'    => 110,
                'title' => 'basic_c_r_m_access',
            ],
            [
                'id'    => 111,
                'title' => 'crm_status_create',
            ],
            [
                'id'    => 112,
                'title' => 'crm_status_edit',
            ],
            [
                'id'    => 113,
                'title' => 'crm_status_show',
            ],
            [
                'id'    => 114,
                'title' => 'crm_status_delete',
            ],
            [
                'id'    => 115,
                'title' => 'crm_status_access',
            ],
            [
                'id'    => 116,
                'title' => 'crm_customer_create',
            ],
            [
                'id'    => 117,
                'title' => 'crm_customer_edit',
            ],
            [
                'id'    => 118,
                'title' => 'crm_customer_show',
            ],
            [
                'id'    => 119,
                'title' => 'crm_customer_delete',
            ],
            [
                'id'    => 120,
                'title' => 'crm_customer_access',
            ],
            [
                'id'    => 121,
                'title' => 'crm_note_create',
            ],
            [
                'id'    => 122,
                'title' => 'crm_note_edit',
            ],
            [
                'id'    => 123,
                'title' => 'crm_note_show',
            ],
            [
                'id'    => 124,
                'title' => 'crm_note_delete',
            ],
            [
                'id'    => 125,
                'title' => 'crm_note_access',
            ],
            [
                'id'    => 126,
                'title' => 'crm_document_create',
            ],
            [
                'id'    => 127,
                'title' => 'crm_document_edit',
            ],
            [
                'id'    => 128,
                'title' => 'crm_document_show',
            ],
            [
                'id'    => 129,
                'title' => 'crm_document_delete',
            ],
            [
                'id'    => 130,
                'title' => 'crm_document_access',
            ],
            [
                'id'    => 131,
                'title' => 'product_management_access',
            ],
            [
                'id'    => 132,
                'title' => 'product_category_create',
            ],
            [
                'id'    => 133,
                'title' => 'product_category_edit',
            ],
            [
                'id'    => 134,
                'title' => 'product_category_show',
            ],
            [
                'id'    => 135,
                'title' => 'product_category_delete',
            ],
            [
                'id'    => 136,
                'title' => 'product_category_access',
            ],
            [
                'id'    => 137,
                'title' => 'product_tag_create',
            ],
            [
                'id'    => 138,
                'title' => 'product_tag_edit',
            ],
            [
                'id'    => 139,
                'title' => 'product_tag_show',
            ],
            [
                'id'    => 140,
                'title' => 'product_tag_delete',
            ],
            [
                'id'    => 141,
                'title' => 'product_tag_access',
            ],
            [
                'id'    => 142,
                'title' => 'product_create',
            ],
            [
                'id'    => 143,
                'title' => 'product_edit',
            ],
            [
                'id'    => 144,
                'title' => 'product_show',
            ],
            [
                'id'    => 145,
                'title' => 'product_delete',
            ],
            [
                'id'    => 146,
                'title' => 'product_access',
            ],
            [
                'id'    => 147,
                'title' => 'expense_management_access',
            ],
            [
                'id'    => 148,
                'title' => 'expense_category_create',
            ],
            [
                'id'    => 149,
                'title' => 'expense_category_edit',
            ],
            [
                'id'    => 150,
                'title' => 'expense_category_show',
            ],
            [
                'id'    => 151,
                'title' => 'expense_category_delete',
            ],
            [
                'id'    => 152,
                'title' => 'expense_category_access',
            ],
            [
                'id'    => 153,
                'title' => 'income_category_create',
            ],
            [
                'id'    => 154,
                'title' => 'income_category_edit',
            ],
            [
                'id'    => 155,
                'title' => 'income_category_show',
            ],
            [
                'id'    => 156,
                'title' => 'income_category_delete',
            ],
            [
                'id'    => 157,
                'title' => 'income_category_access',
            ],
            [
                'id'    => 158,
                'title' => 'expense_create',
            ],
            [
                'id'    => 159,
                'title' => 'expense_edit',
            ],
            [
                'id'    => 160,
                'title' => 'expense_show',
            ],
            [
                'id'    => 161,
                'title' => 'expense_delete',
            ],
            [
                'id'    => 162,
                'title' => 'expense_access',
            ],
            [
                'id'    => 163,
                'title' => 'income_create',
            ],
            [
                'id'    => 164,
                'title' => 'income_edit',
            ],
            [
                'id'    => 165,
                'title' => 'income_show',
            ],
            [
                'id'    => 166,
                'title' => 'income_delete',
            ],
            [
                'id'    => 167,
                'title' => 'income_access',
            ],
            [
                'id'    => 168,
                'title' => 'expense_report_create',
            ],
            [
                'id'    => 169,
                'title' => 'expense_report_edit',
            ],
            [
                'id'    => 170,
                'title' => 'expense_report_show',
            ],
            [
                'id'    => 171,
                'title' => 'expense_report_delete',
            ],
            [
                'id'    => 172,
                'title' => 'expense_report_access',
            ],
            [
                'id'    => 173,
                'title' => 'finance_access',
            ],
            [
                'id'    => 174,
                'title' => 'asset_management_access',
            ],
            [
                'id'    => 175,
                'title' => 'asset_category_create',
            ],
            [
                'id'    => 176,
                'title' => 'asset_category_edit',
            ],
            [
                'id'    => 177,
                'title' => 'asset_category_show',
            ],
            [
                'id'    => 178,
                'title' => 'asset_category_delete',
            ],
            [
                'id'    => 179,
                'title' => 'asset_category_access',
            ],
            [
                'id'    => 180,
                'title' => 'asset_location_create',
            ],
            [
                'id'    => 181,
                'title' => 'asset_location_edit',
            ],
            [
                'id'    => 182,
                'title' => 'asset_location_show',
            ],
            [
                'id'    => 183,
                'title' => 'asset_location_delete',
            ],
            [
                'id'    => 184,
                'title' => 'asset_location_access',
            ],
            [
                'id'    => 185,
                'title' => 'asset_status_create',
            ],
            [
                'id'    => 186,
                'title' => 'asset_status_edit',
            ],
            [
                'id'    => 187,
                'title' => 'asset_status_show',
            ],
            [
                'id'    => 188,
                'title' => 'asset_status_delete',
            ],
            [
                'id'    => 189,
                'title' => 'asset_status_access',
            ],
            [
                'id'    => 190,
                'title' => 'asset_create',
            ],
            [
                'id'    => 191,
                'title' => 'asset_edit',
            ],
            [
                'id'    => 192,
                'title' => 'asset_show',
            ],
            [
                'id'    => 193,
                'title' => 'asset_delete',
            ],
            [
                'id'    => 194,
                'title' => 'asset_access',
            ],
            [
                'id'    => 195,
                'title' => 'assets_history_access',
            ],
            [
                'id'    => 196,
                'title' => 'akun_create',
            ],
            [
                'id'    => 197,
                'title' => 'akun_edit',
            ],
            [
                'id'    => 198,
                'title' => 'akun_show',
            ],
            [
                'id'    => 199,
                'title' => 'akun_delete',
            ],
            [
                'id'    => 200,
                'title' => 'akun_access',
            ],
            [
                'id'    => 201,
                'title' => 'jurnal_umum_create',
            ],
            [
                'id'    => 202,
                'title' => 'jurnal_umum_edit',
            ],
            [
                'id'    => 203,
                'title' => 'jurnal_umum_show',
            ],
            [
                'id'    => 204,
                'title' => 'jurnal_umum_delete',
            ],
            [
                'id'    => 205,
                'title' => 'jurnal_umum_access',
            ],
            [
                'id'    => 206,
                'title' => 'buku_besar_create',
            ],
            [
                'id'    => 207,
                'title' => 'buku_besar_edit',
            ],
            [
                'id'    => 208,
                'title' => 'buku_besar_show',
            ],
            [
                'id'    => 209,
                'title' => 'buku_besar_delete',
            ],
            [
                'id'    => 210,
                'title' => 'buku_besar_access',
            ],
            [
                'id'    => 211,
                'title' => 'necara_saldo_create',
            ],
            [
                'id'    => 212,
                'title' => 'necara_saldo_edit',
            ],
            [
                'id'    => 213,
                'title' => 'necara_saldo_show',
            ],
            [
                'id'    => 214,
                'title' => 'necara_saldo_delete',
            ],
            [
                'id'    => 215,
                'title' => 'necara_saldo_access',
            ],
            [
                'id'    => 216,
                'title' => 'jurnal_penyelesaian_create',
            ],
            [
                'id'    => 217,
                'title' => 'jurnal_penyelesaian_edit',
            ],
            [
                'id'    => 218,
                'title' => 'jurnal_penyelesaian_show',
            ],
            [
                'id'    => 219,
                'title' => 'jurnal_penyelesaian_delete',
            ],
            [
                'id'    => 220,
                'title' => 'jurnal_penyelesaian_access',
            ],
            [
                'id'    => 221,
                'title' => 'biaya_produksi_create',
            ],
            [
                'id'    => 222,
                'title' => 'biaya_produksi_edit',
            ],
            [
                'id'    => 223,
                'title' => 'biaya_produksi_show',
            ],
            [
                'id'    => 224,
                'title' => 'biaya_produksi_delete',
            ],
            [
                'id'    => 225,
                'title' => 'biaya_produksi_access',
            ],
            [
                'id'    => 226,
                'title' => 'kas_bank_create',
            ],
            [
                'id'    => 227,
                'title' => 'kas_bank_edit',
            ],
            [
                'id'    => 228,
                'title' => 'kas_bank_show',
            ],
            [
                'id'    => 229,
                'title' => 'kas_bank_delete',
            ],
            [
                'id'    => 230,
                'title' => 'kas_bank_access',
            ],
            [
                'id'    => 231,
                'title' => 'transaksi_keuangan_create',
            ],
            [
                'id'    => 232,
                'title' => 'transaksi_keuangan_edit',
            ],
            [
                'id'    => 233,
                'title' => 'transaksi_keuangan_show',
            ],
            [
                'id'    => 234,
                'title' => 'transaksi_keuangan_delete',
            ],
            [
                'id'    => 235,
                'title' => 'transaksi_keuangan_access',
            ],
            [
                'id'    => 236,
                'title' => 'invoice_pembelian_create',
            ],
            [
                'id'    => 237,
                'title' => 'invoice_pembelian_edit',
            ],
            [
                'id'    => 238,
                'title' => 'invoice_pembelian_show',
            ],
            [
                'id'    => 239,
                'title' => 'invoice_pembelian_delete',
            ],
            [
                'id'    => 240,
                'title' => 'invoice_pembelian_access',
            ],
            [
                'id'    => 241,
                'title' => 'audit_log_show',
            ],
            [
                'id'    => 242,
                'title' => 'audit_log_access',
            ],
            [
                'id'    => 243,
                'title' => 'user_alert_create',
            ],
            [
                'id'    => 244,
                'title' => 'user_alert_show',
            ],
            [
                'id'    => 245,
                'title' => 'user_alert_delete',
            ],
            [
                'id'    => 246,
                'title' => 'user_alert_access',
            ],
            [
                'id'    => 247,
                'title' => 'task_management_access',
            ],
            [
                'id'    => 248,
                'title' => 'task_status_create',
            ],
            [
                'id'    => 249,
                'title' => 'task_status_edit',
            ],
            [
                'id'    => 250,
                'title' => 'task_status_show',
            ],
            [
                'id'    => 251,
                'title' => 'task_status_delete',
            ],
            [
                'id'    => 252,
                'title' => 'task_status_access',
            ],
            [
                'id'    => 253,
                'title' => 'task_tag_create',
            ],
            [
                'id'    => 254,
                'title' => 'task_tag_edit',
            ],
            [
                'id'    => 255,
                'title' => 'task_tag_show',
            ],
            [
                'id'    => 256,
                'title' => 'task_tag_delete',
            ],
            [
                'id'    => 257,
                'title' => 'task_tag_access',
            ],
            [
                'id'    => 258,
                'title' => 'task_create',
            ],
            [
                'id'    => 259,
                'title' => 'task_edit',
            ],
            [
                'id'    => 260,
                'title' => 'task_show',
            ],
            [
                'id'    => 261,
                'title' => 'task_delete',
            ],
            [
                'id'    => 262,
                'title' => 'task_access',
            ],
            [
                'id'    => 263,
                'title' => 'tasks_calendar_access',
            ],
            [
                'id'    => 264,
                'title' => 'faq_management_access',
            ],
            [
                'id'    => 265,
                'title' => 'faq_category_create',
            ],
            [
                'id'    => 266,
                'title' => 'faq_category_edit',
            ],
            [
                'id'    => 267,
                'title' => 'faq_category_show',
            ],
            [
                'id'    => 268,
                'title' => 'faq_category_delete',
            ],
            [
                'id'    => 269,
                'title' => 'faq_category_access',
            ],
            [
                'id'    => 270,
                'title' => 'faq_question_create',
            ],
            [
                'id'    => 271,
                'title' => 'faq_question_edit',
            ],
            [
                'id'    => 272,
                'title' => 'faq_question_show',
            ],
            [
                'id'    => 273,
                'title' => 'faq_question_delete',
            ],
            [
                'id'    => 274,
                'title' => 'faq_question_access',
            ],
            [
                'id'    => 275,
                'title' => 'request_stock_product_create',
            ],
            [
                'id'    => 276,
                'title' => 'request_stock_product_edit',
            ],
            [
                'id'    => 277,
                'title' => 'request_stock_product_show',
            ],
            [
                'id'    => 278,
                'title' => 'request_stock_product_delete',
            ],
            [
                'id'    => 279,
                'title' => 'request_stock_product_access',
            ],
            [
                'id'    => 280,
                'title' => 'production_plan_create',
            ],
            [
                'id'    => 281,
                'title' => 'production_plan_edit',
            ],
            [
                'id'    => 282,
                'title' => 'production_plan_show',
            ],
            [
                'id'    => 283,
                'title' => 'production_plan_delete',
            ],
            [
                'id'    => 284,
                'title' => 'production_plan_access',
            ],
            [
                'id'    => 285,
                'title' => 'production_monitoring_create',
            ],
            [
                'id'    => 286,
                'title' => 'production_monitoring_edit',
            ],
            [
                'id'    => 287,
                'title' => 'production_monitoring_show',
            ],
            [
                'id'    => 288,
                'title' => 'production_monitoring_delete',
            ],
            [
                'id'    => 289,
                'title' => 'production_monitoring_access',
            ],
            [
                'id'    => 290,
                'title' => 'quality_control_create',
            ],
            [
                'id'    => 291,
                'title' => 'quality_control_edit',
            ],
            [
                'id'    => 292,
                'title' => 'quality_control_show',
            ],
            [
                'id'    => 293,
                'title' => 'quality_control_delete',
            ],
            [
                'id'    => 294,
                'title' => 'quality_control_access',
            ],
            [
                'id'    => 295,
                'title' => 'data_vendor_access',
            ],
            [
                'id'    => 296,
                'title' => 'vendor_create',
            ],
            [
                'id'    => 297,
                'title' => 'vendor_edit',
            ],
            [
                'id'    => 298,
                'title' => 'vendor_show',
            ],
            [
                'id'    => 299,
                'title' => 'vendor_delete',
            ],
            [
                'id'    => 300,
                'title' => 'vendor_access',
            ],
            [
                'id'    => 301,
                'title' => 'material_create',
            ],
            [
                'id'    => 302,
                'title' => 'material_edit',
            ],
            [
                'id'    => 303,
                'title' => 'material_show',
            ],
            [
                'id'    => 304,
                'title' => 'material_delete',
            ],
            [
                'id'    => 305,
                'title' => 'material_access',
            ],
            [
                'id'    => 306,
                'title' => 'chart_of_account_create',
            ],
            [
                'id'    => 307,
                'title' => 'chart_of_account_edit',
            ],
            [
                'id'    => 308,
                'title' => 'chart_of_account_show',
            ],
            [
                'id'    => 309,
                'title' => 'chart_of_account_delete',
            ],
            [
                'id'    => 310,
                'title' => 'chart_of_account_access',
            ],
            [
                'id'    => 311,
                'title' => 'vendor_status_create',
            ],
            [
                'id'    => 312,
                'title' => 'vendor_status_edit',
            ],
            [
                'id'    => 313,
                'title' => 'vendor_status_show',
            ],
            [
                'id'    => 314,
                'title' => 'vendor_status_delete',
            ],
            [
                'id'    => 315,
                'title' => 'vendor_status_access',
            ],
            [
                'id'    => 316,
                'title' => 'documents_vendor_create',
            ],
            [
                'id'    => 317,
                'title' => 'documents_vendor_edit',
            ],
            [
                'id'    => 318,
                'title' => 'documents_vendor_show',
            ],
            [
                'id'    => 319,
                'title' => 'documents_vendor_delete',
            ],
            [
                'id'    => 320,
                'title' => 'documents_vendor_access',
            ],
            [
                'id'    => 321,
                'title' => 'notes_vendor_create',
            ],
            [
                'id'    => 322,
                'title' => 'notes_vendor_edit',
            ],
            [
                'id'    => 323,
                'title' => 'notes_vendor_show',
            ],
            [
                'id'    => 324,
                'title' => 'notes_vendor_delete',
            ],
            [
                'id'    => 325,
                'title' => 'notes_vendor_access',
            ],
            [
                'id'    => 326,
                'title' => 'request_for_quotation_create',
            ],
            [
                'id'    => 327,
                'title' => 'request_for_quotation_edit',
            ],
            [
                'id'    => 328,
                'title' => 'request_for_quotation_show',
            ],
            [
                'id'    => 329,
                'title' => 'request_for_quotation_delete',
            ],
            [
                'id'    => 330,
                'title' => 'request_for_quotation_access',
            ],
            [
                'id'    => 331,
                'title' => 'purchase_quotation_create',
            ],
            [
                'id'    => 332,
                'title' => 'purchase_quotation_edit',
            ],
            [
                'id'    => 333,
                'title' => 'purchase_quotation_show',
            ],
            [
                'id'    => 334,
                'title' => 'purchase_quotation_delete',
            ],
            [
                'id'    => 335,
                'title' => 'purchase_quotation_access',
            ],
            [
                'id'    => 336,
                'title' => 'profile_password_edit',
            ],
        ];

        Permission::insert($permissions);
    }
}
