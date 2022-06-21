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
                'title' => 'jurnal_umum_create',
            ],
            [
                'id'    => 150,
                'title' => 'jurnal_umum_edit',
            ],
            [
                'id'    => 151,
                'title' => 'jurnal_umum_show',
            ],
            [
                'id'    => 152,
                'title' => 'jurnal_umum_delete',
            ],
            [
                'id'    => 153,
                'title' => 'jurnal_umum_access',
            ],
            [
                'id'    => 154,
                'title' => 'buku_besar_create',
            ],
            [
                'id'    => 155,
                'title' => 'buku_besar_edit',
            ],
            [
                'id'    => 156,
                'title' => 'buku_besar_show',
            ],
            [
                'id'    => 157,
                'title' => 'buku_besar_delete',
            ],
            [
                'id'    => 158,
                'title' => 'buku_besar_access',
            ],
            [
                'id'    => 159,
                'title' => 'necara_saldo_create',
            ],
            [
                'id'    => 160,
                'title' => 'necara_saldo_edit',
            ],
            [
                'id'    => 161,
                'title' => 'necara_saldo_show',
            ],
            [
                'id'    => 162,
                'title' => 'necara_saldo_delete',
            ],
            [
                'id'    => 163,
                'title' => 'necara_saldo_access',
            ],
            [
                'id'    => 164,
                'title' => 'jurnal_penyelesaian_create',
            ],
            [
                'id'    => 165,
                'title' => 'jurnal_penyelesaian_edit',
            ],
            [
                'id'    => 166,
                'title' => 'jurnal_penyelesaian_show',
            ],
            [
                'id'    => 167,
                'title' => 'jurnal_penyelesaian_delete',
            ],
            [
                'id'    => 168,
                'title' => 'jurnal_penyelesaian_access',
            ],
            [
                'id'    => 169,
                'title' => 'audit_log_show',
            ],
            [
                'id'    => 170,
                'title' => 'audit_log_access',
            ],
            [
                'id'    => 171,
                'title' => 'user_alert_create',
            ],
            [
                'id'    => 172,
                'title' => 'user_alert_show',
            ],
            [
                'id'    => 173,
                'title' => 'user_alert_delete',
            ],
            [
                'id'    => 174,
                'title' => 'user_alert_access',
            ],
            [
                'id'    => 175,
                'title' => 'faq_management_access',
            ],
            [
                'id'    => 176,
                'title' => 'faq_category_create',
            ],
            [
                'id'    => 177,
                'title' => 'faq_category_edit',
            ],
            [
                'id'    => 178,
                'title' => 'faq_category_show',
            ],
            [
                'id'    => 179,
                'title' => 'faq_category_delete',
            ],
            [
                'id'    => 180,
                'title' => 'faq_category_access',
            ],
            [
                'id'    => 181,
                'title' => 'faq_question_create',
            ],
            [
                'id'    => 182,
                'title' => 'faq_question_edit',
            ],
            [
                'id'    => 183,
                'title' => 'faq_question_show',
            ],
            [
                'id'    => 184,
                'title' => 'faq_question_delete',
            ],
            [
                'id'    => 185,
                'title' => 'faq_question_access',
            ],
            [
                'id'    => 186,
                'title' => 'request_stock_product_create',
            ],
            [
                'id'    => 187,
                'title' => 'request_stock_product_edit',
            ],
            [
                'id'    => 188,
                'title' => 'request_stock_product_show',
            ],
            [
                'id'    => 189,
                'title' => 'request_stock_product_delete',
            ],
            [
                'id'    => 190,
                'title' => 'request_stock_product_access',
            ],
            [
                'id'    => 191,
                'title' => 'production_monitoring_create',
            ],
            [
                'id'    => 192,
                'title' => 'production_monitoring_edit',
            ],
            [
                'id'    => 193,
                'title' => 'production_monitoring_show',
            ],
            [
                'id'    => 194,
                'title' => 'production_monitoring_delete',
            ],
            [
                'id'    => 195,
                'title' => 'production_monitoring_access',
            ],
            [
                'id'    => 196,
                'title' => 'quality_control_create',
            ],
            [
                'id'    => 197,
                'title' => 'quality_control_edit',
            ],
            [
                'id'    => 198,
                'title' => 'quality_control_show',
            ],
            [
                'id'    => 199,
                'title' => 'quality_control_delete',
            ],
            [
                'id'    => 200,
                'title' => 'quality_control_access',
            ],
            [
                'id'    => 201,
                'title' => 'data_vendor_access',
            ],
            [
                'id'    => 202,
                'title' => 'vendor_create',
            ],
            [
                'id'    => 203,
                'title' => 'vendor_edit',
            ],
            [
                'id'    => 204,
                'title' => 'vendor_show',
            ],
            [
                'id'    => 205,
                'title' => 'vendor_delete',
            ],
            [
                'id'    => 206,
                'title' => 'vendor_access',
            ],
            [
                'id'    => 207,
                'title' => 'material_create',
            ],
            [
                'id'    => 208,
                'title' => 'material_edit',
            ],
            [
                'id'    => 209,
                'title' => 'material_show',
            ],
            [
                'id'    => 210,
                'title' => 'material_delete',
            ],
            [
                'id'    => 211,
                'title' => 'material_access',
            ],
            [
                'id'    => 212,
                'title' => 'chart_of_account_create',
            ],
            [
                'id'    => 213,
                'title' => 'chart_of_account_edit',
            ],
            [
                'id'    => 214,
                'title' => 'chart_of_account_show',
            ],
            [
                'id'    => 215,
                'title' => 'chart_of_account_delete',
            ],
            [
                'id'    => 216,
                'title' => 'chart_of_account_access',
            ],
            [
                'id'    => 217,
                'title' => 'vendor_status_create',
            ],
            [
                'id'    => 218,
                'title' => 'vendor_status_edit',
            ],
            [
                'id'    => 219,
                'title' => 'vendor_status_show',
            ],
            [
                'id'    => 220,
                'title' => 'vendor_status_delete',
            ],
            [
                'id'    => 221,
                'title' => 'vendor_status_access',
            ],
            [
                'id'    => 222,
                'title' => 'documents_vendor_create',
            ],
            [
                'id'    => 223,
                'title' => 'documents_vendor_edit',
            ],
            [
                'id'    => 224,
                'title' => 'documents_vendor_show',
            ],
            [
                'id'    => 225,
                'title' => 'documents_vendor_delete',
            ],
            [
                'id'    => 226,
                'title' => 'documents_vendor_access',
            ],
            [
                'id'    => 227,
                'title' => 'notes_vendor_create',
            ],
            [
                'id'    => 228,
                'title' => 'notes_vendor_edit',
            ],
            [
                'id'    => 229,
                'title' => 'notes_vendor_show',
            ],
            [
                'id'    => 230,
                'title' => 'notes_vendor_delete',
            ],
            [
                'id'    => 231,
                'title' => 'notes_vendor_access',
            ],
            [
                'id'    => 232,
                'title' => 'request_for_quotation_create',
            ],
            [
                'id'    => 233,
                'title' => 'request_for_quotation_edit',
            ],
            [
                'id'    => 234,
                'title' => 'request_for_quotation_show',
            ],
            [
                'id'    => 235,
                'title' => 'request_for_quotation_delete',
            ],
            [
                'id'    => 236,
                'title' => 'request_for_quotation_access',
            ],
            [
                'id'    => 237,
                'title' => 'purchase_quotation_create',
            ],
            [
                'id'    => 238,
                'title' => 'purchase_quotation_edit',
            ],
            [
                'id'    => 239,
                'title' => 'purchase_quotation_show',
            ],
            [
                'id'    => 240,
                'title' => 'purchase_quotation_delete',
            ],
            [
                'id'    => 241,
                'title' => 'purchase_quotation_access',
            ],
            [
                'id'    => 242,
                'title' => 'task_management_access',
            ],
            [
                'id'    => 243,
                'title' => 'task_status_create',
            ],
            [
                'id'    => 244,
                'title' => 'task_status_edit',
            ],
            [
                'id'    => 245,
                'title' => 'task_status_show',
            ],
            [
                'id'    => 246,
                'title' => 'task_status_delete',
            ],
            [
                'id'    => 247,
                'title' => 'task_status_access',
            ],
            [
                'id'    => 248,
                'title' => 'task_tag_create',
            ],
            [
                'id'    => 249,
                'title' => 'task_tag_edit',
            ],
            [
                'id'    => 250,
                'title' => 'task_tag_show',
            ],
            [
                'id'    => 251,
                'title' => 'task_tag_delete',
            ],
            [
                'id'    => 252,
                'title' => 'task_tag_access',
            ],
            [
                'id'    => 253,
                'title' => 'task_create',
            ],
            [
                'id'    => 254,
                'title' => 'task_edit',
            ],
            [
                'id'    => 255,
                'title' => 'task_show',
            ],
            [
                'id'    => 256,
                'title' => 'task_delete',
            ],
            [
                'id'    => 257,
                'title' => 'task_access',
            ],
            [
                'id'    => 258,
                'title' => 'tasks_calendar_access',
            ],
            [
                'id'    => 259,
                'title' => 'purchase_requition_create',
            ],
            [
                'id'    => 260,
                'title' => 'purchase_requition_edit',
            ],
            [
                'id'    => 261,
                'title' => 'purchase_requition_show',
            ],
            [
                'id'    => 262,
                'title' => 'purchase_requition_delete',
            ],
            [
                'id'    => 263,
                'title' => 'purchase_requition_access',
            ],
            [
                'id'    => 264,
                'title' => 'material_entry_create',
            ],
            [
                'id'    => 265,
                'title' => 'material_entry_edit',
            ],
            [
                'id'    => 266,
                'title' => 'material_entry_show',
            ],
            [
                'id'    => 267,
                'title' => 'material_entry_delete',
            ],
            [
                'id'    => 268,
                'title' => 'material_entry_access',
            ],
            [
                'id'    => 269,
                'title' => 'profile_password_edit',
            ],
        ];

        Permission::insert($permissions);
    }
}
