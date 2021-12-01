<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Orders') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Order ID</th>
                            <th scope="col">Name</th>
                            <th scope="col">Phone Number</th>
                            <th scope="col">Address</th>
                            <th scope="col">Email</th>
                            <th scope="col">Products Ordered</th>
                            <th scope="col">Total</th>
                            <th scope="col">Payment Method</th>
                            <th scope="col">Status</th>
                            <th scope="col">Date Ordered</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($orders as $order)
                            <tr>
                                <td>{{ $order->order_id }}</td>
                                <td>{{ $order->first_name }} {{ $order->last_name }}</td>
                                <td>{{ $order->phone_number }}</td>
                                <td>{{ $order->address }}</td>
                                <td>{{ $order->email }}</td>
                                <td>TO BE ADDED/FIXED</td>
                                <td>{{ $order->total }}</td>
                                <td>{{ $order->payment_method }}</td>
                                <td>{{ $order->status }}</td>
                                <td>{{ $order->created_at }}</td>
                                <td><button class="btn btn-success">Update Order</button></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <tr class="pageRow">
                <td colspan="3">
                    <div class="d-flex justify-content-center pt-4"> {{ $orders->links() }} </div>
                </td>
            </tr>
        </div>
    </div>
</x-app-layout>
