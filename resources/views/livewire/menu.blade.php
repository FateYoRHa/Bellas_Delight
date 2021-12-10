<div>
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="container row mb-3 p-2">
            <div class="col-md-2">
                <label for="">Category</label>
                <select wire:model="byCategory">
                    <option value="">...</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category }}">{{ $category }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-2">
                <label for="">Order By</label>
                <select wire:model="orderBy">
                    <option value="productName">Product Name</option>
                    <option value="quantity">Quantity</option>
                    <option value="rating">Rating</option>
                </select>
            </div>
            <div class="col-md-2">
                <label for="">Sort By</label>
                <select wire:model="sortBy">
                    <option value="asc">ASC</option>
                    <option value="desc">DESC</option>
                </select>
            </div>
            <div class="col-md-2">
                <label for="">Per Page</label>
                <select wire:model="perPage">
                    <option value="5">5</option>
                    <option value="10">10</option>
                    <option value="20">20</option>
                </select>
            </div>
            <div class="col-md-4">
                <label for="">Search</label>
                <input class="form-control" type="text" wire:model.debounce.350ms="search">
            </div>
        </div>
        <div class="bg-warning overflow-hidden shadow-xl sm:rounded-lg">
            <div class="row mx-auto pt-5">
                @if ($message = Session::get('success'))
                <div class="alert alert-primary alert-dismissible fade show" role="alert">
                    <strong>{{ $message }}</strong>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                  </div>
                @endif
                @foreach ($menu as $product)
                    @if ($product->quantity > 0)
                        <div class="col-lg-3 col-md-6 col-sm-12 col-xs-12 px-2 py-2">
                            <div class="card border border-primary">
                                <!-- {{-- Pa ayos nlng css :> --}} -->
                                {{-- <img src="{{ $product->profile_photo_path }}"
                                    class="mx-auto rounded-circle card-img-top pImg" alt="..."> --}}
                                <img src="https://images-gmi-pmc.edge-generalmills.com/da2abda1-fae1-4782-b65f-93868ca5bd40.jpg"
                                    class="mx-auto rounded-circle card-img-top pImg" alt="...">
                                <div class="card-body">
                                    <h5 class="card-header text-center">{{ $product->productName }}</h5>
                                    {{-- <h5 class="card-title">
                                        <p class="text-center text-md">{{ $product->productName }}</p>
                                    </h5> --}}
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
                                                <input type="hidden" value="{{ $product->quantity }}"
                                                    name="productQuantity">
                                                <input type="hidden" value="{{ $product->productName }}" name="name">
                                                <input type="hidden" value="{{ $product->productPrice }}"
                                                    name="price">
                                                <input type="hidden" value="{{ $product->profile_photo_path }}"
                                                    name="image">
                                                <input type="hidden" value="1" name="quantity">
                                                <button class="px-4 py-2 text-black btn btn-primary rounded">Add To
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
                                {{-- <img src="{{ $product->profile_photo_path }}"
                                    class="mx-auto rounded-circle card-img-top pImg" alt="..."> --}}
                                    <img src="https://images-gmi-pmc.edge-generalmills.com/da2abda1-fae1-4782-b65f-93868ca5bd40.jpg"
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
                                                <input type="hidden" value="{{ $product->productName }}" name="name">
                                                <input type="hidden" value="{{ $product->productPrice }}"
                                                    name="price">
                                                <input type="hidden" value="{{ $product->profile_photo_path }}"
                                                    name="image">
                                                <input type="hidden" value="1" name="quantity">
                                                <button class="px-4 py-2 text-black bg-red-800 rounded" disabled>Out of
                                                    Stock</button>
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
