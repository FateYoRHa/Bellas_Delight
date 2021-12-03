<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Menu') }}
        </h2>
    </x-slot>

    <div class="py-12">

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="row mx-auto pt-5">
                    @if ($message = Session::get('success'))
                        <div class="p-4 mb-3 bg-green-400 rounded">
                            <p class="text-green-800">{{ $message }}</p>
                        </div>
                    @endif
                    @foreach ($menu as $product)
                        @if ($product->quantity > 0)
                            <div class="col-lg-3 col-md-6 col-sm-12 col-xs-12">
                                <div class="card pcard">
                                    <!-- {{-- Pa ayos nlng css :> --}} -->
                                    <img src="{{ $product->profile_photo_path }}"
                                        class="mx-auto rounded-circle card-img-top pImg" alt="...">
                                    <div class="card-body">
                                        <h5 class="card-title">
                                            <p class="text-center text-md">{{ $product->productName }}</p>
                                        </h5>
                                        <p id="lID{{ $product->id }}"></p>
                                        <p>{{ $product->category }}</p>
                                        <p class="card-text">{{ $product->productDesc }}</p>
                                        <p class="card-text">Available: {{ $product->quantity }}</p>
                                        <p class="card-text">Price: {{ $product->productPrice }}</p>

                                        <div class="btn-group" role="group">
                                            <div class="me-md-3">
                                                <form action="{{ route('cart.store') }}" method="POST"
                                                    enctype="multipart/form-data">
                                                    @csrf
                                                    <input type="hidden" value="{{ $product->id }}" name="id">
                                                    <input type="hidden" value="{{ $product->quantity }}" name="productQuantity">
                                                    <input type="hidden" value="{{ $product->productName }}"
                                                        name="name">
                                                    <input type="hidden" value="{{ $product->productPrice }}"
                                                        name="price">
                                                    <input type="hidden" value="{{ $product->profile_photo_path }}"
                                                        name="image">
                                                    <input type="hidden" value="1" name="quantity">
                                                    <button class="px-4 py-2 text-black bg-blue-800 rounded">Add To
                                                        Cart</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @else
                            <div class="col-lg-3 col-md-6 col-sm-12 col-xs-12">
                                <div class="card border-red bg-secondary">
                                    <!-- {{-- Pa ayos nlng css :> --}} -->
                                    <img src="{{ $product->profile_photo_path }}"
                                        class="mx-auto rounded-circle card-img-top pImg" alt="...">
                                    <div class="card-body">
                                        <h5 class="card-title">
                                            <p class="text-center text-md">{{ $product->productName }}</p>
                                        </h5>
                                        <p id="lID{{ $product->id }}"></p>
                                        <p>{{ $product->category }}</p>
                                        <p class="card-text">{{ $product->productDesc }}</p>
                                        <p class="card-text">Available: {{ $product->quantity }}</p>
                                        <p class="card-text">Price: {{ $product->productPrice }}</p>

                                        <div class="btn-group" role="group">
                                            <div class="me-md-3">
                                                <form action="{{ route('cart.store') }}" method="POST"
                                                    enctype="multipart/form-data">
                                                    @csrf
                                                    <input type="hidden" value="{{ $product->id }}" name="id">
                                                    <input type="hidden" value="{{ $product->productName }}"
                                                        name="name">
                                                    <input type="hidden" value="{{ $product->productPrice }}"
                                                        name="price">
                                                    <input type="hidden" value="{{ $product->profile_photo_path }}"
                                                        name="image">
                                                    <input type="hidden" value="1" name="quantity">
                                                    <button class="px-4 py-2 text-black bg-red-800 rounded" disabled>Out of Stock</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endif
                        @endforeach

                        <tr class="pageRow">
                            <td colspan="3">
                                <div class="d-flex justify-content-center pt-4"> {{ $menu->links() }} </div>
                            </td>
                        </tr>
                </div>


            </div>
        </div>
    </div>
</x-app-layout>
