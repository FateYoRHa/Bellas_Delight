<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // MENU CONTROLLER
    public function listAllProducts()
    {
        # code...
    }



    public function index()
    {
        //
        $categories = array(
            '',
            'Bread',
            'Cookie',
            'Dessert',
            'Muffin',
            'Pizza',
            'Snack Cakes',
            'Sweet Goods',
            'Tortilla'
        );
        $products = DB::table('products')->paginate(8);
        return view('admin.products.products', compact('products'))->with('categories', $categories);
        //return view('folder.filename', compact('variable to pass'));

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
        Product::updateorCreate(
            ['id'=>$request->id], $request->all()
        );

        return redirect()->route('products.index')->with('message', 'Action was Successful');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $listings = Product::find($id);
        return response()->json($listings);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    // public function update(Request $request, Product $product)
    // {
    //     //
    // }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $listings = Product::find($id);
        $listings->delete();
    }



}
