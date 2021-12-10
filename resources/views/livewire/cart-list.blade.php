<div>
    @if ($message = Session::get('success'))
        <div class="p-4 mb-3 bg-green-400 rounded">
            <p class="text-green-800">{{ $message }}</p>
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
                                <img src="{{ $item['attributes']['image'] }}" class="w-20 rounded" alt="Thumbnail">
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
                                    wire:click.prevent="removeCart('{{ $item['id'] }}')"><svg width="15" height="15" fill="currentColor" class="bi bi-trash" viewBox="0 0 15 15">
                                        <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                                        <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
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
            <button class="px-6 py-2 text-red-800 bg-red-300" wire:click.prevent="clearAllCart">Remove All Cart</button>
            <a href="checkout" class="btn float-end"><button class="px-6 py-2 text-black-800 bg-green-300">Check
                    Out</button></a>
        </div>

    @else
    <h3 class="text-3xl text-bold text-center">
        Total of {{ Cart::getCount() }} Item/s in Cart
    </h3>
        <a href="{{ route('product-menu') }}" class="btn btn-success px-6 py-2 text-black-800"><button>Back to
                Shopping</button></a>
        @endif
    </div>
</div>
