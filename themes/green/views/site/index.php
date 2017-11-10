<?php
$sql_stock = "SELECT 
    SUM((CASE
        WHEN t.`trans_type_id` = '2' THEN CONVERT( IFNULL(t.`qty`, 0) * - 1 , SIGNED)
        ELSE IFNULL(t.`qty`, 0)
    END)) AS available,
    t.`name`,
    i.`minQty`
FROM
    t_item t
        INNER JOIN
    `item` AS i ON t.item_id = i.id
WHERE
    t.`online` = '1'
GROUP BY t.`item_id`";
$stock_det = Yii::app()->db->createCommand($sql_stock)->queryAll();

$data="[";
$dataAvailable="[";
$dataMinimum="[";
$categories = "[";
foreach ($stock_det as $value) {
    $data .="{name: '".$value['name']."',y: ".$value['available']."}, ";
    $categories .= "'".$value['name']."',";
    $dataAvailable .= $value['available'].",";
    $dataMinimum .= $value['minQty'].",";
}
$data = rtrim($data,',')."]";
$dataAvailable = rtrim($dataAvailable,',')."]";
$dataMinimum = rtrim($dataMinimum,',')."]";
$categories = rtrim($categories,',')."]";
?>

<script type="text/javascript">
$(document).ready(function(){
    Highcharts.chart('stockvalue', {
    chart: {
        plotBackgroundColor: null,
        plotBorderWidth: null,
        plotShadow: false,
        type: 'pie'
    },
    title: {
        text: 'Stock Valuation'
    },
    tooltip: {
        pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
    },
    plotOptions: {
        pie: {
            allowPointSelect: true,
            cursor: 'pointer',
            dataLabels: {
                enabled: false
            },
            showInLegend: true
        }
    },
    series: [{
        name: 'Units',
        colorByPoint: true,
        data: <?=$data?>
    }],
credits: {
            enabled: false
        },
        exporting: { enabled: false }
});


    Highcharts.chart('remaining', {
    chart: {
        type: 'column'
    },
    title: {
        text: 'Available Qty VS Re-Order Qty Chart'
    },
    xAxis: {
        categories: <?=$categories?>
    },
    yAxis: [{
        min: 0,
        title: {
            text: 'Item Quantity'
        }
    }, {
        title: {
            text: 'Units'
        },
        opposite: true
    }],
    legend: {
        shadow: false
    },
    tooltip: {
        shared: true
    },
    plotOptions: {
        column: {
            grouping: false,
            shadow: false,
            borderWidth: 0
        }
    },
    series: [{
        name: 'Minumum Qty',
        color: 'rgba(165,170,217,1)',
        data: <?=$dataMinimum?>,
        pointPadding: 0.3,
        pointPlacement: -0.2
    }, {
        name: 'Available Qty',
        color: 'rgba(126,86,134,.9)',
        data: <?=$dataAvailable?>,
        pointPadding: 0.4,
        pointPlacement: -0.2
    }],
credits: {
            enabled: false
        },
        exporting: { enabled: false }
});
});


</script>

<div class="container-fluid">
    <div class="row">
        <div class="col-sm-3" id="left-dash">
            <div class="row">
                <div class="main-tile">
                    <div class="title-midle">
                        <a id="wrkOrder"  href="<?php echo Yii::app()->createUrl("item"); ?>">
                            <div class="link-box text-center">
                                <div style="margin-top:20px;">
                                    <img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/icons/trans.png" width="50px" /><br> Item Setup
                                </div>
                            </div>
                            
                        </a>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="main-tile">
                    <div class="title-midle">
                        <a id="stock" href="<?php echo Yii::app()->createUrl("tItem"); ?>">
                            <div class="link-box text-center">
                                <div style="margin-top:20px;">
                                    <img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/icons/stock.png" width="50px" /> <br>Stock Management.
                                </div>
                            </div>
                            
                        </a>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="main-tile">
                    <div class="title-midle">
                        <a id="stock" href="<?php echo Yii::app()->createUrl("users"); ?>">
                            <div class="link-box text-center">
                                <div style="margin-top:20px;">
                                    <img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/icons/user.png" width="50px" /><br> Users.
                                </div>
                            </div>
                            
                        </a>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="main-tile">
                    <div class="title-midle">
                        <a id="stock" href="<?php echo Yii::app()->createUrl("reservation"); ?>">
                            <div class="link-box text-center">
                                <div style="margin-top:20px;">
                                    <img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/icons/magazine.png" width="50px" /><br> Reports. 
                                </div>
                            </div>
                            
                        </a>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="col-sm-13">
            <div class="row">
                <div class="col-sm-6">
                    <div class="chart-box"  id="stockvalue"></div>
                </div>
                <div class="col-sm-10">
                    <div  class="chart-box" id="remaining" style="height: 520px;"></div>
                </div>
            </div>
        </div>
    </div>
</div>