<div>

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
    <div class="container-fluid py-5 row">

    </div>
    <div class="container-fluid py-5 row">
        <div class="card col-md-6">
            <div class="card-body">
                <div id="chartContainer" style="height: 370px; width: 100%;"></div>
            </div>
            <div class="card-footer">
                <h5 class="card-title">Total Number of Sales: </h5>
                <p class="card-text">{{ $totalSales }}</p>
                <h5 class="card-title">Today's Sales: </h5>
                <p class="card-text">{{ $todaySales }}</p>

            </div>
        </div>
        <div class="card col-md-6">
            <div class="card-body">
                <div id="reevenue_chart" style="height: 370px; width: 100%;"></div>
            </div>
            <div class="card-footer">
                <h5 class="card-title">Total Revenue: </h5>
                <p class="card-text">₱{{ $totalRevenue }}</p>
                <h5 class="card-title">Today's Revenue: </h5>
                <p class="card-text">₱{{ $todayRevenue }}</p>
            </div>
        </div>
    </div>
    <div class="container-fluid py-5">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title text-center">Latest Orders</h5>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Order #</th>
                            <th scope="col">Customer Name</th>
                            <th scope="col">Phone Number</th>
                            <th scope="col">Amount Due</th>
                            <th scope="col">Payment Method</th>
                            <th scope="col">Email</th>
                            <th scope="col">Order Date</th>
                            <th scope="col">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($orders as $order)
                            <tr>
                                <td>{{ $order->id }}</td>
                                <td>{{ $order->first_name }} {{ $order->first_name }}</td>
                                <td>{{ $order->phone_number }}</td>
                                <td>{{ $order->total }}</td>
                                <td>{{ $order->payment_method }}</td>
                                <td>{{ $order->email }}</td>
                                <td>{{ $order->created_at }}</td>
                                <td>{{ $order->status }}</td>
                            </tr>

                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
