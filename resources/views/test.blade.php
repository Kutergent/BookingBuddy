<?php
$stocksTable = Lava::DataTable();

$stocksTable->addDateColumn('Month')
            ->addNumberColumn('Reservations');


foreach($reserveCount as $rc){
    $stocksTable->addRow([
        '0-'.$rc->Month.'-'.$rc->Year, $rc->reservation_count,
    ]);
}






$Barchart = Lava::BarChart('MyStocks', $stocksTable, [
    'orientation' => 'horizontal'
]);

// echo Lava::render('BarChart', 'MyStocks', 'stocks-chart');
// //  if using Laravel
$filter  = Lava::DateRangeFilter(0, [
    'minValue' => 1672531200000,
    'maxValue' => 1735516799000,
    'format'   => 'd-m-Y'
]);
// $filter  = Lava::NumberRangeFilter(1, [
//     'ui' => [
//         'labelStacking' => 'vertical'
//     ]
// ]);


$control = Lava::ControlWrapper($filter, 'control');
$chart   = Lava::ChartWrapper($Barchart, 'chart');

$dasboard = Lava::Dashboard('MyDash', $stocksTable)->bind($control, $chart);

echo Lava::render('Dashboard', 'MyDash', 'my-dash');






?>


<x-guest-layout>
<script src="https://www.gstatic.com/charts/loader.js"></script>
<script>
    window.google.charts.load('46', {packages: ['corechart']});
</script>
<div id="stocks-chart" class="w-3/4"></div>

<div id="my-dash">
    <div id="chart">
    </div>
    <div id="control">
    </div>
</div>





</x-guest-layout>
