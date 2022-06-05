<?php

namespace App\Http\Controllers\Admin;

use LaravelDaily\LaravelCharts\Classes\LaravelChart;

class HomeController
{
    public function index()
    {
        $settings1 = [
            'chart_title'           => 'sales inquiry',
            'chart_type'            => 'line',
            'report_type'           => 'group_by_date',
            'model'                 => 'App\Models\ListOfMaterial',
            'group_by_field'        => 'created_at',
            'group_by_period'       => 'day',
            'aggregate_function'    => 'count',
            'filter_field'          => 'created_at',
            'filter_days'           => '7',
            'group_by_field_format' => 'd-m-Y H:i:s',
            'column_class'          => 'col-md-12',
            'entries_number'        => '5',
            'translation_key'       => 'listOfMaterial',
        ];

        $chart1 = new LaravelChart($settings1);

        $settings2 = [
            'chart_title'           => 'sales order',
            'chart_type'            => 'bar',
            'report_type'           => 'group_by_date',
            'model'                 => 'App\Models\SalesOrder',
            'group_by_field'        => 'created_at',
            'group_by_period'       => 'day',
            'aggregate_function'    => 'count',
            'filter_field'          => 'created_at',
            'group_by_field_format' => 'd-m-Y H:i:s',
            'column_class'          => 'col-md-12',
            'entries_number'        => '5',
            'translation_key'       => 'salesOrder',
        ];

        $chart2 = new LaravelChart($settings2);

        return view('home', compact('chart1', 'chart2'));
    }
}
