<div>
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                @if (Session::has('error'))
                    <p class="alert alert-danger">{{ Session::get('error') }}</p>
                @endif
            </div>
        </div>
        {{-- {{ dd(Cart::getInstanceName()) }} --}}
        <form action="{{ route('cart.checkout') }}" method="POST" role="form">
            @csrf
            <div class="row">
                <div class="col-md-6">
                    <div class="card">
                        <header class="card-header">
                            <h4 class="card-title mt-2">Billing Details</h4>
                        </header>
                        <article class="card-body">
                            <div class="form-row">
                                <div class="col form-group">
                                    <label>First name</label>
                                    <input type="text" class="form-control" name="first_name" id="first_name"
                                        value="{{ auth()->user()->firstName }}" disabled>
                                </div>
                                <div class="col form-group">
                                    <label>Last name</label>
                                    <input type="text" class="form-control" name="last_name" id="last_name"
                                        value="{{ auth()->user()->lastName }}" disabled>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Address</label>
                                <input type="text" class="form-control" name="address" id="address"
                                    value="{{ auth()->user()->address }}" disabled>
                            </div>
                            <div class="form-row">
                                <div class="form-group  col-md-6">
                                    <label>Phone Number</label>
                                    <input type="text" class="form-control" name="phone_number" id="phone_number"
                                        value="{{ auth()->user()->contactNumber }}" disabled>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Email Address</label>
                                <input type="email" class="form-control" name="email"
                                    value="{{ auth()->user()->email }}" disabled>
                                <small class="form-text text-muted">We'll never share your email with anyone
                                    else.</small>
                            </div>
                            {{-- <div class="form-group">
                                <label>Order Notes</label>
                                <textarea class="form-control" name="notes" rows="6"></textarea>
                            </div> --}}
                        </article>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <header class="card-header">
                                    <h4 class="card-title mt-2">Your Order/s</h4>
                                </header>
                                <article class="card-body">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th scope="col"></th>
                                                <th scope="col">Product Name</th>
                                                <th scope="col">Quantity</th>
                                                <th scope="col">Price</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($cartItems as $item)
                                                <tr>
                                                    <td> <img src="{{ $item['attributes']['image'] }}"
                                                            class="w-20 rounded" alt="Thumbnail"></td>
                                                    <td>{{ $item['name'] }}</td>
                                                    <td>x{{ $item['quantity'] }}</td>
                                                    <td>₱{{ $item['price'] }}({{ $item['price'] * $item['quantity'] }})
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                    <dl class="dlist-align">
                                        <dt>Total cost: </dt>
                                        <dd class="text-right h5 b" name="grand_total"> ₱{{ \Cart::getSubTotal() }}
                                        </dd>
                                    </dl>
                                </article>
                            </div>
                            <div class="card">
                                <header class="card-header">
                                    <h4 class="card-title mt-2">Payment Method</h4>
                                </header>
                                <div class="card-body">
                                    <div class="form-check">
                                        <label class="form-check-label" for="gcash">
                                            GCASH
                                        </label>
                                        <input class="form-check-input" type="radio" name="payment_method" id="gcash"
                                            value="GCASH">

                                    </div>
                                    <div class="form-check">
                                        <label class="form-check-label" for="cod">
                                            Cash-On-Delivery
                                        </label>
                                        <input class="form-check-input" type="radio" name="payment_method" id="cod"
                                            value="CoD">

                                    </div>
                                </div>
                                {{-- <input type="number" value="{{ \Cart::getSubTotal() }}" name="total" hidden> --}}
                            </div>
                        </div>
                        <div class="col-md-12 mt-4">
                            <button type="submit" class="subscribe btn btn-success btn-lg btn-block">Place
                                Order</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
