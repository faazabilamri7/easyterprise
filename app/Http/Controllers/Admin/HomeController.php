<?php

namespace App\Http\Controllers\Admin;

use LaravelDaily\LaravelCharts\Classes\LaravelChart;

class HomeController
{
    public function index()
    {
        $settings1 = [
            'chart_title'           => 'Stock Product',
            'chart_type'            => 'number_block',
            'report_type'           => 'group_by_date',
            'model'                 => 'App\Models\Product',
            'group_by_field'        => 'created_at',
            'group_by_period'       => 'day',
            'aggregate_function'    => 'count',
            'filter_field'          => 'created_at',
            'group_by_field_format' => 'd/m/Y H:i:s',
            'column_class'          => 'col-md-3',
            'entries_number'        => '5',
            'translation_key'       => 'product',
        ];

        $settings1['total_number'] = 0;
        if (class_exists($settings1['model'])) {
            $settings1['total_number'] = $settings1['model']::when(isset($settings1['filter_field']), function ($query) use ($settings1) {
                if (isset($settings1['filter_days'])) {
                    return $query->where($settings1['filter_field'], '>=',
                now()->subDays($settings1['filter_days'])->format('Y-m-d'));
                }
                if (isset($settings1['filter_period'])) {
                    switch ($settings1['filter_period']) {
                case 'week': $start = date('Y-m-d', strtotime('last Monday')); break;
                case 'month': $start = date('Y-m') . '-01'; break;
                case 'year': $start = date('Y') . '-01-01'; break;
            }
                    if (isset($start)) {
                        return $query->where($settings1['filter_field'], '>=', $start);
                    }
                }
            })
                ->{$settings1['aggregate_function'] ?? 'count'}($settings1['aggregate_field'] ?? '*');
        }

        $settings2 = [
            'chart_title'           => 'Total Customers',
            'chart_type'            => 'number_block',
            'report_type'           => 'group_by_date',
            'model'                 => 'App\Models\CrmCustomer',
            'group_by_field'        => 'created_at',
            'group_by_period'       => 'day',
            'aggregate_function'    => 'count',
            'filter_field'          => 'created_at',
            'group_by_field_format' => 'd/m/Y H:i:s',
            'column_class'          => 'col-md-3',
            'entries_number'        => '5',
            'translation_key'       => 'crmCustomer',
        ];

        $settings2['total_number'] = 0;
        if (class_exists($settings2['model'])) {
            $settings2['total_number'] = $settings2['model']::when(isset($settings2['filter_field']), function ($query) use ($settings2) {
                if (isset($settings2['filter_days'])) {
                    return $query->where($settings2['filter_field'], '>=',
                now()->subDays($settings2['filter_days'])->format('Y-m-d'));
                }
                if (isset($settings2['filter_period'])) {
                    switch ($settings2['filter_period']) {
                case 'week': $start = date('Y-m-d', strtotime('last Monday')); break;
                case 'month': $start = date('Y-m') . '-01'; break;
                case 'year': $start = date('Y') . '-01-01'; break;
            }
                    if (isset($start)) {
                        return $query->where($settings2['filter_field'], '>=', $start);
                    }
                }
            })
                ->{$settings2['aggregate_function'] ?? 'count'}($settings2['aggregate_field'] ?? '*');
        }

        $settings3 = [
            'chart_title'           => 'Total Delivery',
            'chart_type'            => 'number_block',
            'report_type'           => 'group_by_date',
            'model'                 => 'App\Models\Pengiriman',
            'group_by_field'        => 'created_at',
            'group_by_period'       => 'day',
            'aggregate_function'    => 'count',
            'filter_field'          => 'created_at',
            'group_by_field_format' => 'd/m/Y H:i:s',
            'column_class'          => 'col-md-3',
            'entries_number'        => '5',
            'translation_key'       => 'pengiriman',
        ];

        $settings3['total_number'] = 0;
        if (class_exists($settings3['model'])) {
            $settings3['total_number'] = $settings3['model']::when(isset($settings3['filter_field']), function ($query) use ($settings3) {
                if (isset($settings3['filter_days'])) {
                    return $query->where($settings3['filter_field'], '>=',
                now()->subDays($settings3['filter_days'])->format('Y-m-d'));
                }
                if (isset($settings3['filter_period'])) {
                    switch ($settings3['filter_period']) {
                case 'week': $start = date('Y-m-d', strtotime('last Monday')); break;
                case 'month': $start = date('Y-m') . '-01'; break;
                case 'year': $start = date('Y') . '-01-01'; break;
            }
                    if (isset($start)) {
                        return $query->where($settings3['filter_field'], '>=', $start);
                    }
                }
            })
                ->{$settings3['aggregate_function'] ?? 'count'}($settings3['aggregate_field'] ?? '*');
        }

        $settings4 = [
            'chart_title'           => 'Total Sales Order',
            'chart_type'            => 'number_block',
            'report_type'           => 'group_by_date',
            'model'                 => 'App\Models\SalesOrder',
            'group_by_field'        => 'created_at',
            'group_by_period'       => 'day',
            'aggregate_function'    => 'count',
            'filter_field'          => 'created_at',
            'group_by_field_format' => 'd/m/Y H:i:s',
            'column_class'          => 'col-md-3',
            'entries_number'        => '5',
            'translation_key'       => 'salesOrder',
        ];

        $settings4['total_number'] = 0;
        if (class_exists($settings4['model'])) {
            $settings4['total_number'] = $settings4['model']::when(isset($settings4['filter_field']), function ($query) use ($settings4) {
                if (isset($settings4['filter_days'])) {
                    return $query->where($settings4['filter_field'], '>=',
                now()->subDays($settings4['filter_days'])->format('Y-m-d'));
                }
                if (isset($settings4['filter_period'])) {
                    switch ($settings4['filter_period']) {
                case 'week': $start = date('Y-m-d', strtotime('last Monday')); break;
                case 'month': $start = date('Y-m') . '-01'; break;
                case 'year': $start = date('Y') . '-01-01'; break;
            }
                    if (isset($start)) {
                        return $query->where($settings4['filter_field'], '>=', $start);
                    }
                }
            })
                ->{$settings4['aggregate_function'] ?? 'count'}($settings4['aggregate_field'] ?? '*');
        }

        $settings5 = [
            'chart_title'           => 'Sales Inquiry',
            'chart_type'            => 'line',
            'report_type'           => 'group_by_date',
            'model'                 => 'App\Models\SalesInquiry',
            'group_by_field'        => 'created_at',
            'group_by_period'       => 'day',
            'aggregate_function'    => 'count',
            'filter_field'          => 'created_at',
            'filter_days'           => '7',
            'group_by_field_format' => 'd/m/Y H:i:s',
            'column_class'          => 'col-md-6',
            'entries_number'        => '5',
            'translation_key'       => 'salesInquiry',
        ];

        $chart5 = new LaravelChart($settings5);

        $settings6 = [
            'chart_title'           => 'Customer Insight',
            'chart_type'            => 'line',
            'report_type'           => 'group_by_date',
            'model'                 => 'App\Models\CrmCustomer',
            'group_by_field'        => 'created_at',
            'group_by_period'       => 'day',
            'aggregate_function'    => 'count',
            'filter_field'          => 'created_at',
            'filter_days'           => '7',
            'group_by_field_format' => 'd/m/Y H:i:s',
            'column_class'          => 'col-md-6',
            'entries_number'        => '5',
            'translation_key'       => 'crmCustomer',
        ];

        $chart6 = new LaravelChart($settings6);

        $settings7 = [
            'chart_title'           => 'Stock Product',
            'chart_type'            => 'number_block',
            'report_type'           => 'group_by_date',
            'model'                 => 'App\Models\Product',
            'group_by_field'        => 'created_at',
            'group_by_period'       => 'day',
            'aggregate_function'    => 'count',
            'filter_field'          => 'created_at',
            'group_by_field_format' => 'd/m/Y H:i:s',
            'column_class'          => 'col-md-3',
            'entries_number'        => '5',
            'translation_key'       => 'product',
        ];

        $settings7['total_number'] = 0;
        if (class_exists($settings7['model'])) {
            $settings7['total_number'] = $settings7['model']::when(isset($settings7['filter_field']), function ($query) use ($settings7) {
                if (isset($settings7['filter_days'])) {
                    return $query->where($settings7['filter_field'], '>=',
                now()->subDays($settings7['filter_days'])->format('Y-m-d'));
                }
                if (isset($settings7['filter_period'])) {
                    switch ($settings7['filter_period']) {
                case 'week': $start = date('Y-m-d', strtotime('last Monday')); break;
                case 'month': $start = date('Y-m') . '-01'; break;
                case 'year': $start = date('Y') . '-01-01'; break;
            }
                    if (isset($start)) {
                        return $query->where($settings7['filter_field'], '>=', $start);
                    }
                }
            })
                ->{$settings7['aggregate_function'] ?? 'count'}($settings7['aggregate_field'] ?? '*');
        }

        $settings8 = [
            'chart_title'           => 'Total Sales Order',
            'chart_type'            => 'number_block',
            'report_type'           => 'group_by_date',
            'model'                 => 'App\Models\SalesOrder',
            'group_by_field'        => 'created_at',
            'group_by_period'       => 'day',
            'aggregate_function'    => 'count',
            'filter_field'          => 'created_at',
            'group_by_field_format' => 'd/m/Y H:i:s',
            'column_class'          => 'col-md-3',
            'entries_number'        => '5',
            'translation_key'       => 'salesOrder',
        ];

        $settings8['total_number'] = 0;
        if (class_exists($settings8['model'])) {
            $settings8['total_number'] = $settings8['model']::when(isset($settings8['filter_field']), function ($query) use ($settings8) {
                if (isset($settings8['filter_days'])) {
                    return $query->where($settings8['filter_field'], '>=',
                now()->subDays($settings8['filter_days'])->format('Y-m-d'));
                }
                if (isset($settings8['filter_period'])) {
                    switch ($settings8['filter_period']) {
                case 'week': $start = date('Y-m-d', strtotime('last Monday')); break;
                case 'month': $start = date('Y-m') . '-01'; break;
                case 'year': $start = date('Y') . '-01-01'; break;
            }
                    if (isset($start)) {
                        return $query->where($settings8['filter_field'], '>=', $start);
                    }
                }
            })
                ->{$settings8['aggregate_function'] ?? 'count'}($settings8['aggregate_field'] ?? '*');
        }

        $settings9 = [
            'chart_title'           => 'Stock Material',
            'chart_type'            => 'latest_entries',
            'report_type'           => 'group_by_date',
            'model'                 => 'App\Models\Material',
            'group_by_field'        => 'created_at',
            'group_by_period'       => 'day',
            'aggregate_function'    => 'count',
            'filter_field'          => 'created_at',
            'group_by_field_format' => 'd/m/Y H:i:s',
            'column_class'          => 'col-md-6',
            'entries_number'        => '5',
            'fields'                => [
                'name_material' => '',
                'stock'         => '',
            ],
            'translation_key' => 'material',
        ];

        $settings9['data'] = [];
        if (class_exists($settings9['model'])) {
            $settings9['data'] = $settings9['model']::latest()
                ->take($settings9['entries_number'])
                ->get();
        }

        if (!array_key_exists('fields', $settings9)) {
            $settings9['fields'] = [];
        }

        $settings10 = [
            'chart_title'           => 'Purchase Requisition',
            'chart_type'            => 'latest_entries',
            'report_type'           => 'group_by_date',
            'model'                 => 'App\Models\PurchaseRequition',
            'group_by_field'        => 'created_at',
            'group_by_period'       => 'day',
            'aggregate_function'    => 'count',
            'filter_field'          => 'created_at',
            'group_by_field_format' => 'd/m/Y H:i:s',
            'column_class'          => 'col-md-6',
            'entries_number'        => '20',
            'fields'                => [
                'status'     => '',
                'material_1' => 'name_material',
                'qty_1'      => '',
                'material_2' => 'name_material',
                'qty_2'      => '',
                'material_3' => 'name_material',
                'qty_3'      => '',
                'material_4' => 'name_material',
                'qty_4'      => '',
                'material_5' => 'name_material',
                'qty_5'      => '',
                'material_6' => 'name_material',
                'qty_6'      => '',
            ],
            'translation_key' => 'purchaseRequition',
        ];

        $settings10['data'] = [];
        if (class_exists($settings10['model'])) {
            $settings10['data'] = $settings10['model']::latest()
                ->take($settings10['entries_number'])
                ->get();
        }

        if (!array_key_exists('fields', $settings10)) {
            $settings10['fields'] = [];
        }

        $settings11 = [
            'chart_title'           => 'Material Entry',
            'chart_type'            => 'latest_entries',
            'report_type'           => 'group_by_date',
            'model'                 => 'App\Models\MaterialEntry',
            'group_by_field'        => 'created_at',
            'group_by_period'       => 'day',
            'aggregate_function'    => 'count',
            'filter_field'          => 'created_at',
            'group_by_field_format' => 'd/m/Y H:i:s',
            'column_class'          => 'col-md-6',
            'entries_number'        => '20',
            'fields'                => [
                'date_material_entry' => '',
                'material_name'       => '',
                'qty'                 => '',
                'status'              => '',
            ],
            'translation_key' => 'materialEntry',
        ];

        $settings11['data'] = [];
        if (class_exists($settings11['model'])) {
            $settings11['data'] = $settings11['model']::latest()
                ->take($settings11['entries_number'])
                ->get();
        }

        if (!array_key_exists('fields', $settings11)) {
            $settings11['fields'] = [];
        }

        $settings12 = [
            'chart_title'           => 'Product Entry',
            'chart_type'            => 'latest_entries',
            'report_type'           => 'group_by_date',
            'model'                 => 'App\Models\TransferProduk',
            'group_by_field'        => 'created_at',
            'group_by_period'       => 'day',
            'aggregate_function'    => 'count',
            'filter_field'          => 'created_at',
            'group_by_field_format' => 'd/m/Y H:i:s',
            'column_class'          => 'col-md-6',
            'entries_number'        => '20',
            'fields'                => [
                'id_transfer_produk' => '',
                'product_name'       => 'name',
                'qty'                => '',
                'status'             => '',
            ],
            'translation_key' => 'transferProduk',
        ];

        $settings12['data'] = [];
        if (class_exists($settings12['model'])) {
            $settings12['data'] = $settings12['model']::latest()
                ->take($settings12['entries_number'])
                ->get();
        }

        if (!array_key_exists('fields', $settings12)) {
            $settings12['fields'] = [];
        }

        $settings13 = [
            'chart_title'           => 'Delivery Status',
            'chart_type'            => 'latest_entries',
            'report_type'           => 'group_by_date',
            'model'                 => 'App\Models\Pengiriman',
            'group_by_field'        => 'created_at',
            'group_by_period'       => 'day',
            'aggregate_function'    => 'count',
            'filter_field'          => 'created_at',
            'group_by_field_format' => 'd/m/Y H:i:s',
            'column_class'          => 'col-md-6',
            'entries_number'        => '20',
            'fields'                => [
                'status_pengiriman' => '',
                'id_pengiriman'     => '',
                'no_sales_order'    => 'no_sales_order',
            ],
            'translation_key' => 'pengiriman',
        ];

        $settings13['data'] = [];
        if (class_exists($settings13['model'])) {
            $settings13['data'] = $settings13['model']::latest()
                ->take($settings13['entries_number'])
                ->get();
        }

        if (!array_key_exists('fields', $settings13)) {
            $settings13['fields'] = [];
        }

        $settings14 = [
            'chart_title'           => 'Total Machine',
            'chart_type'            => 'number_block',
            'report_type'           => 'group_by_date',
            'model'                 => 'App\Models\MachineReport',
            'group_by_field'        => 'created_at',
            'group_by_period'       => 'day',
            'aggregate_function'    => 'count',
            'filter_field'          => 'created_at',
            'group_by_field_format' => 'd/m/Y H:i:s',
            'column_class'          => 'col-md-3',
            'entries_number'        => '5',
            'translation_key'       => 'machineReport',
        ];

        $settings14['total_number'] = 0;
        if (class_exists($settings14['model'])) {
            $settings14['total_number'] = $settings14['model']::when(isset($settings14['filter_field']), function ($query) use ($settings14) {
                if (isset($settings14['filter_days'])) {
                    return $query->where($settings14['filter_field'], '>=',
                now()->subDays($settings14['filter_days'])->format('Y-m-d'));
                }
                if (isset($settings14['filter_period'])) {
                    switch ($settings14['filter_period']) {
                case 'week': $start = date('Y-m-d', strtotime('last Monday')); break;
                case 'month': $start = date('Y-m') . '-01'; break;
                case 'year': $start = date('Y') . '-01-01'; break;
            }
                    if (isset($start)) {
                        return $query->where($settings14['filter_field'], '>=', $start);
                    }
                }
            })
                ->{$settings14['aggregate_function'] ?? 'count'}($settings14['aggregate_field'] ?? '*');
        }

        $settings15 = [
            'chart_title'           => 'Total Production',
            'chart_type'            => 'number_block',
            'report_type'           => 'group_by_date',
            'model'                 => 'App\Models\QualityControl',
            'group_by_field'        => 'created_at',
            'group_by_period'       => 'day',
            'aggregate_function'    => 'sum',
            'aggregate_field'       => 'qty',
            'filter_field'          => 'created_at',
            'group_by_field_format' => 'd/m/Y H:i:s',
            'column_class'          => 'col-md-3',
            'entries_number'        => '5',
            'translation_key'       => 'qualityControl',
        ];

        $settings15['total_number'] = 0;
        if (class_exists($settings15['model'])) {
            $settings15['total_number'] = $settings15['model']::when(isset($settings15['filter_field']), function ($query) use ($settings15) {
                if (isset($settings15['filter_days'])) {
                    return $query->where($settings15['filter_field'], '>=',
                now()->subDays($settings15['filter_days'])->format('Y-m-d'));
                }
                if (isset($settings15['filter_period'])) {
                    switch ($settings15['filter_period']) {
                case 'week': $start = date('Y-m-d', strtotime('last Monday')); break;
                case 'month': $start = date('Y-m') . '-01'; break;
                case 'year': $start = date('Y') . '-01-01'; break;
            }
                    if (isset($start)) {
                        return $query->where($settings15['filter_field'], '>=', $start);
                    }
                }
            })
                ->{$settings15['aggregate_function'] ?? 'count'}($settings15['aggregate_field'] ?? '*');
        }

        $settings16 = [
            'chart_title'           => 'Total Request Product',
            'chart_type'            => 'latest_entries',
            'report_type'           => 'group_by_date',
            'model'                 => 'App\Models\RequestStockProduct',
            'group_by_field'        => 'tanggal_request',
            'group_by_period'       => 'day',
            'aggregate_function'    => 'count',
            'filter_field'          => 'created_at',
            'group_by_field_format' => 'd/m/Y',
            'column_class'          => 'col-md-6',
            'entries_number'        => '10',
            'fields'                => [
                'tanggal_request'    => '',
                'request_product'    => 'name',
                'qty'                => '',
                'status'             => '',
                'id_request_product' => '',
            ],
            'translation_key' => 'requestStockProduct',
        ];

        $settings16['data'] = [];
        if (class_exists($settings16['model'])) {
            $settings16['data'] = $settings16['model']::latest()
                ->take($settings16['entries_number'])
                ->get();
        }

        if (!array_key_exists('fields', $settings16)) {
            $settings16['fields'] = [];
        }

        $settings17 = [
            'chart_title'           => 'Material Status',
            'chart_type'            => 'latest_entries',
            'report_type'           => 'group_by_date',
            'model'                 => 'App\Models\ListOfMaterial',
            'group_by_field'        => 'created_at',
            'group_by_period'       => 'day',
            'aggregate_function'    => 'count',
            'filter_field'          => 'created_at',
            'group_by_field_format' => 'd/m/Y H:i:s',
            'column_class'          => 'col-md-6',
            'entries_number'        => '10',
            'fields'                => [
                'status'              => '',
                'id_list_of_material' => '',
                'id_production_plan'  => 'id_production_plan',
            ],
            'translation_key' => 'listOfMaterial',
        ];

        $settings17['data'] = [];
        if (class_exists($settings17['model'])) {
            $settings17['data'] = $settings17['model']::latest()
                ->take($settings17['entries_number'])
                ->get();
        }

        if (!array_key_exists('fields', $settings17)) {
            $settings17['fields'] = [];
        }

        $settings18 = [
            'chart_title'           => 'Machine Status',
            'chart_type'            => 'latest_entries',
            'report_type'           => 'group_by_date',
            'model'                 => 'App\Models\MachineReport',
            'group_by_field'        => 'created_at',
            'group_by_period'       => 'day',
            'aggregate_function'    => 'count',
            'filter_field'          => 'created_at',
            'group_by_field_format' => 'd/m/Y H:i:s',
            'column_class'          => 'col-md-6',
            'entries_number'        => '10',
            'fields'                => [
                'nama_mesin' => '',
                'status'     => '',
                'id_mesin'   => '',
            ],
            'translation_key' => 'machineReport',
        ];

        $settings18['data'] = [];
        if (class_exists($settings18['model'])) {
            $settings18['data'] = $settings18['model']::latest()
                ->take($settings18['entries_number'])
                ->get();
        }

        if (!array_key_exists('fields', $settings18)) {
            $settings18['fields'] = [];
        }

        $settings19 = [
            'chart_title'           => 'Production Process',
            'chart_type'            => 'latest_entries',
            'report_type'           => 'group_by_date',
            'model'                 => 'App\Models\ProductionMonitoring',
            'group_by_field'        => 'created_at',
            'group_by_period'       => 'day',
            'aggregate_function'    => 'count',
            'filter_field'          => 'created_at',
            'group_by_field_format' => 'd/m/Y H:i:s',
            'column_class'          => 'col-md-6',
            'entries_number'        => '10',
            'fields'                => [
                'status'                   => '',
                'id_production_monitoring' => '',
            ],
            'translation_key' => 'productionMonitoring',
        ];

        $settings19['data'] = [];
        if (class_exists($settings19['model'])) {
            $settings19['data'] = $settings19['model']::latest()
                ->take($settings19['entries_number'])
                ->get();
        }

        if (!array_key_exists('fields', $settings19)) {
            $settings19['fields'] = [];
        }

        $settings20 = [
            'chart_title'           => 'Production Insight',
            'chart_type'            => 'line',
            'report_type'           => 'group_by_date',
            'model'                 => 'App\Models\QualityControl',
            'group_by_field'        => 'created_at',
            'group_by_period'       => 'day',
            'aggregate_function'    => 'sum',
            'aggregate_field'       => 'qty',
            'filter_field'          => 'created_at',
            'filter_days'           => '30',
            'group_by_field_format' => 'd/m/Y H:i:s',
            'column_class'          => 'col-md-6',
            'entries_number'        => '5',
            'translation_key'       => 'qualityControl',
        ];

        $chart20 = new LaravelChart($settings20);

        $settings21 = [
            'chart_title'           => 'Purchase Requisition',
            'chart_type'            => 'latest_entries',
            'report_type'           => 'group_by_date',
            'model'                 => 'App\Models\PurchaseRequition',
            'group_by_field'        => 'created_at',
            'group_by_period'       => 'day',
            'aggregate_function'    => 'count',
            'filter_field'          => 'created_at',
            'group_by_field_format' => 'd/m/Y H:i:s',
            'column_class'          => 'col-md-6',
            'entries_number'        => '20',
            'fields'                => [
                'status'     => '',
                'material_1' => 'name_material',
                'qty_1'      => '',
                'material_2' => 'name_material',
                'qty_2'      => '',
                'material_3' => 'name_material',
                'qty_3'      => '',
                'material_4' => 'name_material',
                'qty_4'      => '',
                'material_5' => 'name_material',
                'qty_5'      => '',
                'material_6' => 'name_material',
                'qty_6'      => '',
            ],
            'translation_key' => 'purchaseRequition',
        ];

        $settings21['data'] = [];
        if (class_exists($settings21['model'])) {
            $settings21['data'] = $settings21['model']::latest()
                ->take($settings21['entries_number'])
                ->get();
        }

        if (!array_key_exists('fields', $settings21)) {
            $settings21['fields'] = [];
        }

        $settings22 = [
            'chart_title'           => 'Request for Quotation',
            'chart_type'            => 'latest_entries',
            'report_type'           => 'group_by_date',
            'model'                 => 'App\Models\RequestForQuotation',
            'group_by_field'        => 'created_at',
            'group_by_period'       => 'day',
            'aggregate_function'    => 'count',
            'filter_field'          => 'created_at',
            'group_by_field_format' => 'd/m/Y H:i:s',
            'column_class'          => 'col-md-6',
            'entries_number'        => '20',
            'fields'                => [
                'status'        => '',
                'material_name' => '',
                'qty'           => '',
                'company_name'  => '',
            ],
            'translation_key' => 'requestForQuotation',
        ];

        $settings22['data'] = [];
        if (class_exists($settings22['model'])) {
            $settings22['data'] = $settings22['model']::latest()
                ->take($settings22['entries_number'])
                ->get();
        }

        if (!array_key_exists('fields', $settings22)) {
            $settings22['fields'] = [];
        }

        $settings23 = [
            'chart_title'           => 'Total Vendor',
            'chart_type'            => 'number_block',
            'report_type'           => 'group_by_date',
            'model'                 => 'App\Models\Vendor',
            'group_by_field'        => 'created_at',
            'group_by_period'       => 'day',
            'aggregate_function'    => 'count',
            'filter_field'          => 'created_at',
            'group_by_field_format' => 'd/m/Y H:i:s',
            'column_class'          => 'col-md-4',
            'entries_number'        => '5',
            'translation_key'       => 'vendor',
        ];

        $settings23['total_number'] = 0;
        if (class_exists($settings23['model'])) {
            $settings23['total_number'] = $settings23['model']::when(isset($settings23['filter_field']), function ($query) use ($settings23) {
                if (isset($settings23['filter_days'])) {
                    return $query->where($settings23['filter_field'], '>=',
                now()->subDays($settings23['filter_days'])->format('Y-m-d'));
                }
                if (isset($settings23['filter_period'])) {
                    switch ($settings23['filter_period']) {
                case 'week': $start = date('Y-m-d', strtotime('last Monday')); break;
                case 'month': $start = date('Y-m') . '-01'; break;
                case 'year': $start = date('Y') . '-01-01'; break;
            }
                    if (isset($start)) {
                        return $query->where($settings23['filter_field'], '>=', $start);
                    }
                }
            })
                ->{$settings23['aggregate_function'] ?? 'count'}($settings23['aggregate_field'] ?? '*');
        }

        $settings24 = [
            'chart_title'           => 'Purchase Inquiry',
            'chart_type'            => 'line',
            'report_type'           => 'group_by_date',
            'model'                 => 'App\Models\PurchaseInq',
            'group_by_field'        => 'created_at',
            'group_by_period'       => 'day',
            'aggregate_function'    => 'count',
            'filter_field'          => 'created_at',
            'filter_days'           => '7',
            'group_by_field_format' => 'd/m/Y H:i:s',
            'column_class'          => 'col-md-4',
            'entries_number'        => '5',
            'translation_key'       => 'purchaseInq',
        ];

        $chart24 = new LaravelChart($settings24);

        $settings25 = [
            'chart_title'           => 'Purchase Order',
            'chart_type'            => 'bar',
            'report_type'           => 'group_by_date',
            'model'                 => 'App\Models\PurchaseOrder',
            'group_by_field'        => 'created_at',
            'group_by_period'       => 'day',
            'aggregate_function'    => 'count',
            'filter_field'          => 'created_at',
            'filter_days'           => '7',
            'group_by_field_format' => 'd/m/Y H:i:s',
            'column_class'          => 'col-md-4',
            'entries_number'        => '5',
            'translation_key'       => 'purchaseOrder',
        ];

        $chart25 = new LaravelChart($settings25);

        $settings26 = [
            'chart_title'           => 'Material Entry',
            'chart_type'            => 'latest_entries',
            'report_type'           => 'group_by_date',
            'model'                 => 'App\Models\MaterialEntry',
            'group_by_field'        => 'created_at',
            'group_by_period'       => 'day',
            'aggregate_function'    => 'count',
            'filter_field'          => 'created_at',
            'group_by_field_format' => 'd/m/Y H:i:s',
            'column_class'          => 'col-md-6',
            'entries_number'        => '20',
            'fields'                => [
                'date_material_entry' => '',
                'material_name'       => '',
                'qty'                 => '',
                'status'              => '',
            ],
            'translation_key' => 'materialEntry',
        ];

        $settings26['data'] = [];
        if (class_exists($settings26['model'])) {
            $settings26['data'] = $settings26['model']::latest()
                ->take($settings26['entries_number'])
                ->get();
        }

        if (!array_key_exists('fields', $settings26)) {
            $settings26['fields'] = [];
        }

        $settings27 = [
            'chart_title'           => 'Purchase Return',
            'chart_type'            => 'pie',
            'report_type'           => 'group_by_date',
            'model'                 => 'App\Models\PurchaseReturn',
            'group_by_field'        => 'created_at',
            'group_by_period'       => 'day',
            'aggregate_function'    => 'count',
            'filter_field'          => 'created_at',
            'filter_days'           => '7',
            'group_by_field_format' => 'd/m/Y H:i:s',
            'column_class'          => 'col-md-6',
            'entries_number'        => '5',
            'translation_key'       => 'purchaseReturn',
        ];

        $chart27 = new LaravelChart($settings27);

        return view('home', compact('chart20', 'chart24', 'chart25', 'chart27', 'chart5', 'chart6', 'settings1', 'settings10', 'settings11', 'settings12', 'settings13', 'settings14', 'settings15', 'settings16', 'settings17', 'settings18', 'settings19', 'settings2', 'settings21', 'settings22', 'settings23', 'settings26', 'settings3', 'settings4', 'settings7', 'settings8', 'settings9'));
    }
}
