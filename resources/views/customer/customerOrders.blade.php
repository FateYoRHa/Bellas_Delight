<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('My Orders') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Order ID</th>
                            <th scope="col">Products Ordered|Quantity</th>
                            <th scope="col">Total</th>
                            <th scope="col">Payment Method</th>
                            <th scope="col">Date Ordered</th>
                            <th scope="col">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($orders as $order)
                            <tr>
                                <td>{{ $order->id }}</td>
                                <td>
                                    <ul>
                                        {{-- @if ($order->id == $order->order_id)
                                            <li>{{ $order->product_id }}|{{ $order->quantity }}</li>
                                        @endif --}}
                                        {{-- @foreach ($products as $product)
                                            @if ($products->order_id == $order->id)
                                                <li>{{ $product->product_id }}|{{ $product->quantity }}</li>
                                            @endif
                                        @endforeach --}}
                                    </ul>
                                </td>
                                <td>{{ $order->total }}</td>
                                <td>{{ $order->payment_method }}</td>
                                <td>{{ $order->created_at }}</td>
                                <td>
                                    @if ($order->status == 'pending')
                                        <p>{{ $order->status }}</p>
                                    @elseif ($order->status == 'to recieve')
                                    <button class="btn btn-success">Recieved</button>
                                    @elseif ($order->status == 'canceled')
                                        <p>{{ $order->status }}</p>
                                    @elseif ($order->status == 'accepted')
                                        <p>{{ $order->status }}</p>
                                    @else
                                        <p>Recieved</p>
                                    @endif
                                </td>
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
