<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Models\Product;
use App\Models\Orders;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

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

        return view('admin.products.products');
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

        // dd($request);
        $this->validate($request,[

            'profile_photo_path' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if($request->hasfile('profile_photo_path'))
        {
            $file = $request->file('profile_photo_path');
            $extention = $file->getClientOriginalExtension();
            $filename = $request->productName.'.'.$extention;
            $file->storeAs('public/product_images', $filename);
            $request->profile_photo_path = $file;

        }
        Product::updateorCreate(
            ['id'=>$request->id], $request->all(),

        );

        return redirect()->route('products.index')->with('message', 'Product was Successfully Added');
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
    public function orders(){
        // $orders = DB::table('orders')->paginate(8);
        // $users = DB::table('users')
        //     ->join('role_user', 'users.id', '=', 'role_user.user_id')
        //     ->leftJoin('roles', 'roles.id', '=', 'role_user.role_id')
        //     ->select('users.*', 'roles.display_name','roles.description', 'role_user.user_id')->paginate(4);
        // $orders = DB::table('orders')
        //     ->join('order_items', 'orders.id', '=', 'order_items.order_id')
        //     ->select('orders.*', 'order_items.order_id')->paginate(4);
        $orders = DB::table('users')
            ->join('orders', 'users.id', '=', 'orders.user_id')
            ->orderBy('orders.created_at', 'DESC')
            ->select('orders.*','orders.id AS order_id' , 'users.*')
            ->paginate(8);
        // $orders = Auth::user()->orders;
        // $orders->transform(function($order, $key){
        //     $order->cart = unserialize($order->cart);
        //     return $order;
        // });
        // $products = DB::table('order_items')
        //     ->join('orders', 'order_items.order_id', '=', 'orders.id')
        //     ->select('order_items.product_id')
        //     //->where('orders.id','order_items.order_id')
        //     ->get();
        //$products = DB::table('order_items')->get();

            // $products = DB::table('order_items')
            // ->join('orders', 'order_items.order_id', '=', 'orders.id')
            // ->select('order_items.product_id')
            // ->where(['orders.id' => 'order_items.order_id'])
            // ->get();

        //return view('admin.products.orders',['orders' => $orders]);
        return view('admin.products.orders',compact('orders'));
    }

    //UPDATE ORDER STATUS
    public function updateOrder($id){
        //dd($id);
        $order = DB::table('orders')->select('orders.*')->where('orders.id', $id)->first();
        //$order = DB::table('orders')->where('orders.id', $id)->first();
        //dd($order->status);
        //'pending', 'cancelled', 'delivered', 'accepted', 'to recieve'

        if($order->status == 'pending'){
            //DB::table('orders')->first()->update(['status' => 'accepted']);
            DB::table('orders')
            ->where('status', 'pending')
            ->update(['status' => 'accepted']);

        }
        elseif($order->status == 'accepted'){
            //DB::table('orders')->first()->update(['status' => 'accepted']);
            DB::table('orders')
            ->where('status', 'accepted')
            ->update(['status' => 'to recieve']);

        }

        return redirect()->route('admin.orders');

    }

    //UPDATE ORDER STATUS
    public function updateCustomerOrder($id){
        //dd($id);
        $order = DB::table('orders')->select('orders.*')->where('orders.id', $id)->first();
        //$order = DB::table('orders')->where('orders.id', $id)->first();
        //dd($order->status);
        //'pending', 'cancelled', 'delivered', 'accepted', 'to recieve'

        if($order->status == 'to recieve'){
            //DB::table('orders')->first()->update(['status' => 'accepted']);
            DB::table('orders')
            ->where('status', 'to recieve')
            ->update(['status' => 'delivered']);

        }
        elseif($order->status == 'accepted'){
            //DB::table('orders')->first()->update(['status' => 'accepted']);
            DB::table('orders')
            ->where('status', 'accepted')
            ->update(['status' => 'cancelled']);

        }
        else{
            DB::table('orders')
            ->where('status', 'pending')
            ->update(['status' => 'cancelled']);

        }

        return redirect()->route('customer.orders');

    }



}
