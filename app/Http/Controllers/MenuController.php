<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\Orders;
use App\Models\OrderItem;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;


class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $menu = DB::table('products')->paginate(8);

        if(Auth::user()){
            if(Auth::user()->hasRole('administrator')){
                return redirect()->route('admin.orders');
            }
            else{
                return view('customer.menu.menu', compact('menu'));
            }
        }
        else{
            return view('customer.menu.menu', compact('menu'));
        }

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function show(Menu $menu)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function edit(Menu $menu)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    // public function update(Request $request, Menu $menu)
    // {
    //     //
    // }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function destroy(Menu $menu)
    {
        //
    }

    public function cartList()
    {
        return view('customer.cart.cart');
    }
    public function orders(){
        $orders = DB::table('users')
        ->join('orders', 'users.id', '=', 'orders.user_id')
        ->select('orders.*','orders.id AS order_id', 'users.*')
        ->paginate(8);
        return view('customer.customerOrders', compact('orders'));
    }

    public function addToCart(Request $request)
    {
        \Cart::add([
            'id' => $request->id,
            'name' => $request->name,
            'price' => $request->price,
            'quantity' => $request->quantity,
            'attributes' => array(
                'image' => $request->image,
            )
        ]);
        session()->flash('success', 'Product is Added to Cart Successfully !');

        return redirect()->route('product-menu');
    }

    public function checkout()
    {
        return view('customer.cart.checkout');
    }

    public function clickCheckout(Request $request){
        // dd($request);
        $items = \Cart::getContent();
        $total = \Cart::getSubTotal();
        $order = new Orders();
        $id = auth()->user()->id;
        $order->cart = serialize($items);
        $order->payment_method = $request->input('payment_method');
        $order->total = $total;
        $order->address = auth()->user()->address;
        // $order->first_name = $request->input('first_name');
        // $order->last_name = $request->input('last_name');
        // $order->address = $request->input('address');
        // $order->phone_number = $request->input('phone_number');
        // $order->email = $request->input('email');
        // $order->payment_method = $request->input('payment_method');
        $order->user_id = $id;
        // dd($order);
        Auth::user()->orders()->save($order);
        //$cart_item = \Cart::getContent();
        //  dd($order->id);

        // foreach($cart_item as $item){
        //     $orders = new OrderItem();
        //     $orders->order_id = $order->id;
        //     $orders->product_id = $item->id;
        //     $orders->quantity = $item->quantity;
        //     $orders->price = $item->price*$item->quantity;
        //     $orders->save();
        // }
        session()->flash('success', 'Order send, please wait for confirmation');
        \Cart::clear();
        return redirect()->route('product-menu');
    }

}
