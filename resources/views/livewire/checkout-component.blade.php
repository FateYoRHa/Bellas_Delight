<div>
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                @if (Session::has('error'))
                    <p class="alert alert-danger">{{ Session::get('error') }}</p>
                @endif
            </div>
        </div>
        <form action="" method="POST" role="form">
            @csrf
            <div class="row">
                <div class="col-md-8">
                    <div class="card">
                        <header class="card-header">
                            <h4 class="card-title mt-2">Billing Details</h4>
                        </header>
                        <article class="card-body">
                            <div class="form-row">
                                <div class="col form-group">
                                    <label>First name</label>
                                    <input type="text" class="form-control" name="first_name"
                                        value="{{ auth()->user()->firstName }}" disabled>
                                </div>
                                <div class="col form-group">
                                    <label>Last name</label>
                                    <input type="text" class="form-control" name="last_name"
                                        value="{{ auth()->user()->lastName }}" disabled>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Address</label>
                                <input type="text" class="form-control" name="address"
                                    value="{{ auth()->user()->address }}" disabled>
                            </div>
                            <div class="form-row">
                                <div class="form-group  col-md-6">
                                    <label>Phone Number</label>
                                    <input type="text" class="form-control" name="phone_number"
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
                <div class="col-md-4">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <header class="card-header">
                                    <h4 class="card-title mt-2">Your Order</h4>
                                </header>
                                <article class="card-body">
                                    <dl class="dlist-align">
                                        <dt>Items: </dt>
                                        <dd> ITEMS PLACE HOLDER </dd>
                                    </dl>
                                    <dl class="dlist-align">
                                        <dt>Total cost: </dt>
                                        <dd class="text-right h5 b"> ₱{{ \Cart::getSubTotal() }} </dd>
                                    </dl>
                                </article>
                            </div>
                            <div class="card">
                                <header class="card-header">
                                    <h4 class="card-title mt-2">Payment Method</h4>
                                </header>
                                <div class="card-body">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="gcash" id="gcash">
                                        <label class="form-check-label" for="gcash">
                                            GCASH
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="cod" id="cod" checked>
                                        <label class="form-check-label" for="cod">
                                            Cash-On-Delivery
                                        </label>
                                    </div>
                                </div>
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
