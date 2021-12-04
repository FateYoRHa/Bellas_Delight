@include('dependencies.generate-scripts')
<div>
    <a href="{{ route('admin.generate') }}" class="btn-success"><button>Generate Report</button></a>
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
                <h5 class="card-title text-center">Delivered Orders</h5>
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
                                <td>₱{{ $order->total }}</td>
                                <td>{{ $order->payment_method }}</td>
                                <td>{{ $order->email }}</td>
                                <td>{{ $order->updated_at }}</td>
                                <td>{{ $order->status }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
