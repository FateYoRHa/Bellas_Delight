<div>
    <div class="container-fluid row">
        <div class="col-md-3">
            <div class="card" style="width: 18rem;">
                <div class="card-body">
                    <h5 class="card-title">Total Sales Revenue: </h5>
                    <p class="card-text">₱{{ $totalRevenue }}</p>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card" style="width: 18rem;">
                <div class="card-body">
                    <h5 class="card-title">Total Number of Sales: </h5>
                    <p class="card-text">{{ $totalSales }}</p>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card" style="width: 18rem;">
                <div class="card-body">
                    <h5 class="card-title">Today's Revenue: </h5>
                    <p class="card-text">₱{{ $todayRevenue }}</p>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card" style="width: 18rem;">
                <div class="card-body">
                    <h5 class="card-title">Today's Sales: </h5>
                    <p class="card-text">{{ $todaySales }}</p>
                </div>
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
