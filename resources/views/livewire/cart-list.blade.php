<div>
    @if ($message = Session::get('success'))
        <div class="p-4 mb-3 bg-green-400 rounded">
            <p class="text-green-800">{{ $message }}</p>
        </div>
    @endif
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
                    <th class="text-right md:table-cell">Price</th>
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
                            <button class="px-4 py-2 text-white bg-red-600"
                                wire:click.prevent="removeCart('{{ $item['id'] }}')">x</button>
                        </td>
                    </tr>
                @endforeach

            </tbody>
        </table>
        <div>
            Total: ₱{{ Cart::getTotal() }}
        </div>
        <div class="mt-5">
            <button class="px-6 py-2 text-red-800 bg-red-300" wire:click.prevent="clearAllCart">Remove All Cart</button>
            <a href="checkout" class="btn float-end"><button class="px-6 py-2 text-black-800 bg-green-300">Check Out</button></a>
        </div>

    </div>
</div>
