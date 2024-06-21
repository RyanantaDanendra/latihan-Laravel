<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\Orders;
use App\Models\Products;
use App\Http\Controllers\productsController;
use illuminate\Support\facades\auth;

class orderController extends Controller
{
    public function store() {
        $products = Product::pluck('id', 'product_name','product_price');
    }

    public function index(Products $product) {
        // $products = Products::select('id', 'product_name','product_stock')->get();
        // dd($product);
        return view('/product/checkOut', compact('product'));
    }

    public function productPrice($id) {
        $product = Products::findOrFail($id);
        $price = $product->product_price;

        return response()->json(['price' => $price]);
    }

    public function show(Request $request) {
        $validatedData = $request->validate([
            'location' => 'required | string',
            'postal' => 'required | numeric',
        ]);

        $product = Products::find($request->idProduct);
        $order = Orders::create([
            'id_user' => Auth::user()->id,
            'product_name' => $product->Product_name,
            'price' => $product->product_price,
            'location' => $request->location,
            'post_code' => $request->postal,
            'stock',
        ]);
        $stock = $product->stock - 1;
        $product->update(['stock' => $stock]);

        return redirect()->route('products')->with('order', 'Order Successed');
    }
}
