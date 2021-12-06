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
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">

            <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addProduct">
                Add Product
            </button>
            <div class="container-fluid">
                <div class="row mx-auto pt-5">

                    <table class="table">
                        <thead>
                            <tr>
                                {{-- <th scope="col" hidden>ID</th> --}}
                                <th scope="col" hidden>ID</th>
                                <th scope="col">Product Photo</th>
                                <th scope="col">Product Name</th>
                                <th scope="col">Category</th>
                                <th scope="col">Description</th>
                                <th scope="col">Quantity</th>
                                <th scope="col">Price</th>
                                <th scope="col">Rating</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($products as $product)
                                <tr>
                                    <td id="lID{{ $product->id }}" hidden>{{ $product->id }}</td>
                                    <td>
                                        <img src="{{ $product->profile_photo_path }}"
                                            alt="{{ $product->profile_photo_path }}">
                                    </td>
                                    <td>{{ $product->productName }}</td>
                                    <td>{{ $product->category }}</td>
                                    <td>{{ $product->productDesc }}</td>
                                    <td>{{ $product->quantity }}</td>
                                    <td>{{ $product->productPrice }}</td>
                                    <td>{{ $product->rating }}</td>
                                    <td>
                                        <div class="btn-group" role="group">
                                            <div class=" me-md-3">
                                                <a id="btnEditModal" data_id="{{ $product->id }}"
                                                    role="button"><button class="btn btn-success">Edit</button></a>

                                            </div>
                                            <div class="ms-md-3">
                                                <a id="btnDelete" data_id="{{ $product->id }}" role="button"><button
                                                        class="btn btn-danger">Delete</button></a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>



                    <tr class="pageRow">
                        <td colspan="3">
                            <div class="d-flex justify-content-center pt-4"> {{ $products->links() }} </div>
                        </td>
                    </tr>
                </div>


            </div>


            <!-- Add Modal -->
            <div class="modal fade" id="addProduct" tabindex="-1" aria-labelledby="addProductLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Add Product</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>

                        <form method="POST" action="{{ route('products.store') }}" enctype="multipart/form-data">
                            <div class="modal-body">
                                @csrf
                                <div class="mb-3">
                                    <div class="form-group d-flex flex-column">
                                        <label for="profile_photo_path2" class="form-label">Product
                                            Image</label>
                                        <input class="form-control py-3" type="file" id="profile_photo_path2"
                                            name="profile_photo_path">

                                        {{-- <p>@error('profile_photo_path') {{ $message }} @enderror</p> --}}

                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="cat" class="form-label">Category</label>
                                    <select class="form-control" type="string" name="category" value="">
                                        @foreach ($categories as $category)
                                            <option>{{ $category }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="pName" class="form-label">Product Name</label>
                                    <input class="form-control" id="pName" name="productName">
                                    @error('productName') <p class="error text-red-500 text-xs italic mt-4">
                                        {{ $message }}</p> @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="pDesc" class="form-label">Description</label>
                                    <input class="form-control" id="pDesc" name="productDesc">
                                    @error('productDesc') <p class="error text-red-500 text-xs italic mt-4">
                                        {{ $message }}</p> @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="pDesc" class="form-label">Quantity</label>
                                    <input class="form-control" id="quantity" name="quantity">
                                    @error('quantity') <p class="error text-red-500 text-xs italic mt-4">
                                        {{ $message }}</p> @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="price" class="form-label">Price</label>
                                    <input class="form-control" id="productPrice" name="productPrice">
                                    @error('productPrice') <p class="error text-red-500 text-xs italic mt-4">
                                        {{ $message }}</p> @enderror
                                </div>

                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Add Product</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- Edit Modal -->
            <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModal" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Edit Product</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <form id="productEditForm">
                            <div class="modal-body">
                                <div class="form-group d-flex flex-column">
                                    {{-- <label for="profile_photo_path2" class="form-label">Product Image</label>
                                    <input class="form-control py-3" type="file" id="profile_photo_path2" name="profile_photo_path"> --}}

                                    {{-- <p>@error('profile_photo_path') {{ $message }} @enderror</p> --}}

                                </div>
                                <input hidden class="form-control" id="id2" name="id">
                                <label for="cat" class="form-label">Category</label>
                                <select class="form-control" type="string" name="category" id="category2">
                                    @foreach ($categories as $category)
                                        @if ($category == $products)
                                            <option value="{{ $category }}" selected>{{ $category }}
                                            </option>
                                        @else
                                            <option value="{{ $category }}">{{ $category }}</option>
                                        @endif
                                    @endforeach
                                </select>
                                <div class="mb-3">
                                    <label for="pName" class="form-label">Product Name</label>
                                    <input class="form-control" id="productName2" name="productName">
                                </div>
                                <div class="mb-3">
                                    <label for="pDesc" class="form-label">Quantity</label>
                                    <input class="form-control" id="quantity2" name="quantity">
                                </div>
                                <div class="mb-3">
                                    <label for="pDesc" class="form-label">Description</label>
                                    <input class="form-control" id="productDesc2" name="productDesc">
                                </div>
                                <div class="mb-3">
                                    <label for="price" class="form-label">Price</label>
                                    <input class="form-control" id="productPrice2" name="productPrice">
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="submit" id="btnEditProduct" class="btn btn-success">Edit
                                    Product</button>
                                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
