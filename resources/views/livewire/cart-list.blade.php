<div>
    @if ($message = Session::get('success'))
        {{-- <div class="p-4 mb-3 bg-green-400 rounded">
            <p class="text-green-800">{{ $message }}</p>
        </div> --}}
        <div class="alert alert-primary alert-dismissible fade show" role="alert">
            <strong>{{ $message }}</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
    @endif
    @if (Cart::getCount() > 0)
    <h3 class="text-3xl text-bold">
        Total of {{ Cart::getCount() }} Item/s in Cart
    </h3>
    <div class="flex-1">
        <table class="w-full text-sm lg:text-base" cellspacing="0">

                <thead>
                    <tr class="h-12 uppercase">
                        <th class="md:table-cell"></th>
                        <th class="text-left">Product Name</th>
                        <th class="pl-5 text-left lg:text-right lg:pl-0">Quantity
                        </th>
                        <th class="text-right md:table-cell">Price/Total</th>
                        <th class="hidden text-right md:table-cell">Remove </th>
                    </tr>
                </thead>
                <tbody>

                    @foreach ($cartItems as $item)
                        <tr>
                            <td>
                                {{-- <img src="{{ $item['attributes']['image'] }}" class="w-20 rounded" alt="Thumbnail"> --}}
                                <img src="https://images-gmi-pmc.edge-generalmills.com/da2abda1-fae1-4782-b65f-93868ca5bd40.jpg"
                                    class="mx-auto rounded-circle card-img-top pImg" alt="..." style="height: 50px">
                            </td>
                            <td>
                                {{ $item['name'] }}
                            </td>
                            <td>
                                <livewire:cart-update :item="$item" :key="$item['id']" />
                            </td>
                            <td class="text-right md:table-cell">
                                <span class="text-sm font-medium lg:text-base">
                                    ₱{{ $item['price'] * $item['quantity'] }}
                                </span>
                            </td>
                            <td class="text-right md:table-cell">
                                <button class="px-2 py-2 bg-red-500"
                                    wire:click.prevent="removeCart('{{ $item['id'] }}')"> <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x-circle" viewBox="0 0 16 16">
                                        <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                                        <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"/>
                                      </svg></button>

                                     
                            </td>
                        </tr>

                    @endforeach
                </tbody>
        </table>
        <div class="float-end pr-12 pt-6">
            Total: ₱{{ Cart::getTotal() }}
        </div>
        <div class="mt-5">
            <button class="px-6 py-2 btn btn-primary" wire:click.prevent="clearAllCart">Remove All Orders</button>
            <a href="checkout" class="btn float-end"><button class="px-6 py-2 btn btn-warning">Check
                    Out</button></a>
        </div>


    @else
    <h3 class="text-3xl text-bold text-center">
        Total of {{ Cart::getCount() }} Item/s in Cart
    </h3>
        <a href="{{ route('product-menu') }}" class="btn btn-warning px-6 py-2 text-black-800"><button>Back to
                Shopping</button></a>
        @endif
    </div>
</div>
