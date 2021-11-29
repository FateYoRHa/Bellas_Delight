<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

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
        return view('customer.menu.menu', compact('menu'));
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

    //<<+++++++++++++++++++++CART STUFF++++++++++++++++++++++>>

    // public function cart()
    // {
    //     return view('cart');
    // }

    // /**
    //  * Write code on Method
    //  *
    //  * @return response()
    //  */
    // public function addToCart($id)
    // {
    //     //$product = DB::findOrFail($id);
    //     $product = DB::table('products');
    //     $cart = session()->get('cart', []);

    //     if(isset($cart[$id])) {
    //         $cart[$id]['quantity']++;
    //     } else {
    //         $cart[$id] = [
    //             "name" => "SAMPLE",
    //             "quantity" => 1,
    //             "price" => 100,
    //             // "image" => $product->image
    //         ];
    //     }

    //     session()->put('cart', $cart);
    //     return redirect()->back()->with('success', 'Product added to cart successfully!');
    // }

    // /**
    //  * Write code on Method
    //  *
    //  * @return response()
    //  */
    // public function update(Request $request)
    // {
    //     if($request->id && $request->quantity){
    //         $cart = session()->get('cart');
    //         $cart[$request->id]["quantity"] = $request->quantity;
    //         session()->put('cart', $cart);
    //         session()->flash('success', 'Cart updated successfully');
    //     }
    // }

    // /**
    //  * Write code on Method
    //  *
    //  * @return response()
    //  */
    // public function remove(Request $request)
    // {
    //     if($request->id) {
    //         $cart = session()->get('cart');
    //         if(isset($cart[$request->id])) {
    //             unset($cart[$request->id]);
    //             session()->put('cart', $cart);
    //         }
    //         session()->flash('success', 'Product removed successfully');
    //     }
    // }
}
