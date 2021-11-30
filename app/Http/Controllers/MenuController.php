<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\Orders;
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
                return view('admin.dashboard');
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
        $order = new Orders();
        $id = auth()->user()->id;
        $order->cart = serialize($items);
        $order->first_name = auth()->user()->firstName;
        $order->last_name = auth()->user()->lastName;
        $order->address = auth()->user()->address;
        $order->phone_number = auth()->user()->contactNumber;
        $order->email = auth()->user()->email;
        $order->payment_method = $request->input('payment_method');
        // $order->first_name = $request->input('first_name');
        // $order->last_name = $request->input('last_name');
        // $order->address = $request->input('address');
        // $order->phone_number = $request->input('phone_number');
        // $order->email = $request->input('email');
        // $order->payment_method = $request->input('payment_method');
        $order->user_id = $id;

        Auth::user()->orders()->save($order);
        
        session()->flash('success', 'Order send, please wait for confirmation');
        \Cart::clear();
        return redirect()->route('product-menu');
    }
}
