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
                            <th scope="col">Total</th>
                            <th scope="col">Payment Method</th>
                            <th scope="col">Date Ordered</th>
                            <th scope="col">Date Delivered/Cancelled</th>
                            <th scope="col">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($orders as $order)
                            <tr>
                                <td>{{ $order->order_id }}</td>
                                <td>{{ $order->total }}</td>
                                <td>{{ $order->payment_method }}</td>
                                <td>{{ $order->created_at }}</td>
                                <td>
                                    @if ($order->status == 'delivered')
                                        {{ $order->updated_at }}
                                    @elseif($order->status == 'cancelled')
                                        {{ $order->updated_at }}
                                    @endif
                                </td>
                                <td>
                                    @if ($order->status == 'delivered')
                                        <p class="text-success">Recieved</p>
                                    @elseif ($order->status == 'cancelled')
                                        <p class="text-danger">Cancelled</p>
                                    @else
                                        <p>{{ $order->status }}</p>
                                    @endif
                                </td>
                                <td>
                                    @if ($order->status == 'pending')
                                        <a href="{{ route('update.customer.order', $order->order_id) }}"
                                            class="btn btn-warning">
                                            <button>Cancel Order</button>
                                        </a>
                                    @elseif ($order->status == 'to recieve')
                                        <a href="{{ route('update.customer.order', $order->order_id) }}"
                                            class="btn btn-success">
                                            <button>Recieved</button>
                                        </a>
                                    @elseif ($order->status == 'accepted')
                                        <a href="{{ route('update.customer.order', $order->id) }}"
                                            class="btn btn-warning">
                                            <button>Cancel Order</button>
                                        </a>
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
