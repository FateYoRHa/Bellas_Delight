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

    public $productName;
    public $category;
    public $productDesc;
    public $productPrice;
    public $quantity;
    public $profile_photo_path;

    protected $rules = [
        'productName' => 'required|min:1',
        'category' => 'required',
        'productDesc' => 'required',
        'productPrice' => 'required|integer',
        'quantity' => 'required|integer',
        'profile_photo_path' => 'image|max:5000',
    ];

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

        if($request->hasfile('profile_photo_path'))
        {
            $file = $request->file('profile_photo_path');
            $extention = $file->getClientOriginalExtension();
            $filename = time().'.'.$extention;
            $file->move('storage/app/public/profile-photos/', $filename);
            $request->profile_photo_path = $filename;
        }
        Product::updateorCreate(
            ['id'=>$request->id], $request->all()
        );

        return redirect()->route('products.index')->with('message', 'Action was Successful');
    }

    // public function validate(){

    // }

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
        if($listings->quantity > 0){
            return redirect()->route('products.index')->with('message', 'Cannot delete');
        }else{
            $listings->delete();
        }

    }



}
