<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

    <!-- Styles -->
    <link rel="stylesheet" href="css/bootstrap.css">
    @livewireStyles
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/cnp.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/sweetalert.css">

    <!-- Scripts -->
    <script src="js/jquery-3.6.0.js"></script>

    <script src="js/bootstrap.js"></script>
    <script src="js/sweetalert.min.js"></script>
    <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
    <script src="{{ mix('js/app.js') }}" defer></script>
</head>
<center>
    <header>
        {{-- <img src="storage\images\logo.png" alt="asdasd"> --}}
        <h2 class="text-center">Bella's Delights</h2>
        <h3 class="text-center">Delivery Report</h3>
    </header>
</center>
<body>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="container-fluid py-5">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title text-center">Delivered Orders</h5>
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">Order #</th>
                                        <th scope="col">Customer Name</th>
                                        <th scope="col">Amount Due</th>
                                        <th scope="col">Payment Method</th>
                                        <th scope="col">Date Delivered</th>
                                        <th scope="col">Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($orders as $order)
                                        <tr>
                                            <td>{{ $order->order_id }}</td>
                                            <td>{{ $order->firstName }} {{ $order->lastName }}</td>
                                            <td>{{ $order->total }}</td>
                                            <td>{{ $order->payment_method }}</td>
                                            <td>{{ $order->updated_at }}</td>
                                            <td>{{ $order->status }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="card-footer">
                            <p class="fw-bold">Total Revenue: {{ $totalRevenue }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>
<footer>
    <p>{{ Auth::user()->firstName }} {{ Auth::user()->lastName }}</p>
    <p>{{ $dateToday }}</p>
</footer>

</html>
