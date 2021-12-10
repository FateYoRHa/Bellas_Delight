<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Products') }}
        </h2>
    </x-slot>
    @if ($message = Session::get('message'))
        {{-- <div class="alert alert-success" role="alert">
            {{ $message }}
        </div> --}}<div class="alert alert-primary alert-dismissible fade show" role="alert">
  <strong>{{ $message }}</strong>
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
    @endif

    <div class="py-12">
        <livewire:products />
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
                    enctype: "multipart/form-data",

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
                        swal("Error!", "Please fill all required fields",
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
                                    swal("Product still have some left.", {
                                        icon: "error",
                                    });
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
                    //$("#profile_photo_path2").val(data.profile_photo_path);
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
