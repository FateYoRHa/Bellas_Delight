<?php
$months = [];
$count = 0;
while ($count <= 3) {
    $months[] = date('M Y', strtotime('-' . $count . ' month'));
    $count++;
}
$dataPoints = [['y' => $ordersCount[3], 'label' => $months[3]], ['y' => $ordersCount[2], 'label' => $months[2]], ['y' => $ordersCount[1], 'label' => $months[1]], ['y' => $ordersCount[0], 'label' => $months[0]]];

$months = [];
$count = 0;
while ($count <= 3) {
    $months[] = date('M Y', strtotime('-' . $count . ' month'));
    $count++;
}
$revenueDataPoints = [['y' => $revenue[3], 'label' => $months[3]], ['y' => $revenue[2], 'label' => $months[2]], ['y' => $revenue[1], 'label' => $months[1]], ['y' => $revenue[0], 'label' => $months[0]]];
?>
<script>
    window.onload = function() {
        var chart = new CanvasJS.Chart("chartContainer", {
            animationEnabled: true,
            title: {
                text: "Monthly Sales Chart"
            },
            axisX: {
                title: "Date",
                valueFormatString: "DD-MMM",
                labelAngle: -50
            },
            axisY: {
                title: "Number of Sales",
                valueFormatString: "#0",
            },
            data: [{
                type: "line",
                markerSize: 5,
                xValueType: "dateTime",
                dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
            }]
        });
        chart.render();

        var reevenue_chart = new CanvasJS.Chart("reevenue_chart", {
            animationEnabled: true,
            title: {
                text: "Monthly Revenue Chart"
            },
            axisX: {
                title: "Date",
                valueFormatString: "DD-MMM",
                labelAngle: -50
            },
            axisY: {
                title: "Revenue",
                valueFormatString: "#0",
                prefix:'₱'
            },
            data: [{
                type: "line",
                markerSize: 5,
                xValueType: "dateTime",
                yValueFormatString: "₱#,##0.##",
                dataPoints: <?php echo json_encode($revenueDataPoints, JSON_NUMERIC_CHECK); ?>
            }]
        });
        reevenue_chart.render();
    }
</script>
