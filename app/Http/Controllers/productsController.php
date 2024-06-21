<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Products;
use App\Models\like;
use Illuminate\Support\Facades\Auth;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Support\Facades\Storage;

class productsController extends Controller
{
    public function index() {
        $products = Products::all();
        return view('/product/products', [
            'cards' => $products,
        ]);
    }

    public function show(Products $product) {
        return view('/product/details', [
            'product' => $product,
        ]);
    }

    public function search(Request $request) {
        $products = Products::where('Product_name', 'like', '%'.$request['search'].'%')->where('stock', '>', '0')->get();
        return view('/product/products', [
            'cards' => $products,
        ]);
    }

    public function like(Request $request) {
        $validatedData = $request->validate([
            'id_product' => 'required'
        ]);

        like::create([
            'id_product' => $request->id_product,
            'id_user' => Auth::user()->id,
        ]);

        return back();
    }

    public function unlike(Request $request) {
        like::where('id_product', $request->id_product)->where('id_user', Auth::user()->id)->delete();
        return back();
    }

    public function sell(Request $request) {
        $validatedData = $request->validate([
            'name' => 'required | max:30',
            'condition' => 'required',
            'price' => 'required | numeric',
            'description' => 'required | max:999',
            'image' => 'image | mimes:jpeg, jpg, png',
            'slug' => 'required',
            'size' => 'required | max:6'
        ]); 

        $image = $request->file('image')->store('product_images', 'public');

        Products::create([
            'id_user' => Auth::user()->id,
            'Product_name' => $request->name,
            'condition' => $request->condition,
            'product_price' => $request->price,
            'description' => $request->description,
            'image' => $image,
            'slug' => $request->slug,
            'size' => $request->size,
        ]);

        return redirect()->route('products')->with('sell', 'Product successfully uploaded');
    }

    public function view() {
        return view('/product/sell');
    }

    public function deleteProduct(Products $product) {
        Storage::disk('public')->delete($product->image);
        $product->delete();
        // Products::destroy($product->id);
        return back();
    } 

}
