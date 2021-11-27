<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Products') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                @if ($message = Session::get('message'))
                    <div class="alert alert-success" role="alert">
                        {{ $message }}
                    </div>
                @endif
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
                                    <th scope="col" hidden>Photo</th>
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
                                        <td id="lID{{ $product->id }}" hidden></td>
                                        <td>{{ $product->productName }}</td>
                                        <td>{{ $product->category }}</td>
                                        <td>{{ $product->productDesc }}</td>
                                        <td>{{ $product->quantity }}</td>
                                        <td>{{ $product->productPrice }}</td>
                                        <td>{{ $product->rating }}</td>
                                        <td>
                                            <div class="btn-group" role="group">
                                                <div class=" me-md-3">
                                                  <a id="btnEditModal" data_id="{{$product->id}}" role="button"><button class="btn btn-success">Edit</button></a>

                                                </div>
                                                <div class="ms-md-3">
                                                  <a id="btnDelete" data_id="{{$product->id}}" role="button"><button class="btn btn-danger">Delete</button></a>
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

                            <form method="POST" action="{{ route('products.store') }}">
                                <div class="modal-body">
                                    @csrf
                                    <div class="mb-3">
                                        <label for="cat" class="form-label">Category</label>
                                        <select class="form-control" type="string" name="category">
                                            @foreach ($categories as $category)
                                                <option>{{ $category }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label for="pName" class="form-label">Product Name</label>
                                        <input class="form-control" id="pName" name="productName">
                                    </div>
                                    <div class="mb-3">
                                        <label for="pDesc" class="form-label">Description</label>
                                        <input class="form-control" id="pDesc" name="productDesc">
                                    </div>
                                    <div class="mb-3">
                                        <label for="pDesc" class="form-label">Quantity</label>
                                        <input class="form-control" id="quantity" name="quantity">
                                    </div>
                                    <div class="mb-3">
                                        <label for="price" class="form-label">Price</label>
                                        <input class="form-control" id="productPrice" name="productPrice">
                                    </div>

                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                        data-bs-dismiss="modal">Close</button>
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
    <script>
        $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            //UPDATE
            $('#btnEditProduct').click(function() {
                buttonType = $(this).val();
                $.ajax({
                    data: $('#productEditForm').serialize(),
                    url: "{{ route('products.store') }}",
                    type: "POST",

                    success: function(data) {
                        $('#editModal').modal('hide');
                        swal("Product updated.", {
                            icon: "success",
                        });
                        setTimeout(function() { // wait for 5 secs(2)
                            location.reload(); // then reload the page.(3)
                        }, 2000);
                    },

                    error: function(data) {
                        console.log('Error:', data);
                        swal("Error!", "Please fill all required fields or change Book ID",
                            "warning");
                    }
                })
            });

            //DELETE
            $('body').on('click', '#btnDelete', function() {
                //console.log($(this).attr('data_id'));
                data_id = $(this).attr('data_id');
                swal({
                        title: "Are you sure?",
                        text: "Once deleted, this product will be removed from the menu.",
                        icon: "warning",
                        buttons: true,
                        dangerMode: true,
                    })
                    .then((willDelete) => {
                        if (willDelete) {
                            $.ajax({
                                type: "DELETE",
                                url: "{{ route('products.index') }}" + '/' + data_id,

                                success: function() {
                                    $('#lID' + data_id).remove();
                                    swal("Product was removed successfully.", {
                                        icon: "success",
                                    });
                                    setTimeout(function() { // wait for 5 secs(2)
                                        location
                                            .reload(); // then reload the page.(3)
                                    }, 2000);
                                },

                                error: function(data) {
                                    console.log("Error:", data);
                                }
                            });

                        } else {
                            swal("Product was not deleted!");
                        }
                    });
            });

            //EDIT
            $('body').on('click', '#btnEditModal', function(event) {
                $('#editModal').modal('show');
                $('#headerModal').html("Edit Product");
                $('#btnEditProduct').val("Update");
                $('#productEditForm').trigger("reset");

                console.log($(this).attr('data_id'));
                data_id = $(this).attr('data_id');

                //route it sa controller function edit
                $.get("{{ route('products.index') }}/" + data_id + "/edit", function(data) {
                    console.log(data);
                    $("#id2").val(data.id);
                    $("#category2").val(data.category);
                    $("#productName2").val(data.productName);
                    $("#quantity2").val(data.quantity);
                    $("#productDesc2").val(data.productDesc);
                    $("#productPrice2").val(data.productPrice);
                }).fail(function(data) {
                    console.log("error: " + data);
                })
            });
        });
    </script>

</x-app-layout>
