<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Products;
use App\Models\User;
use App\Models\Orders;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class dashboardController extends Controller
{
    public function index() {
        $userTotal = User::count();
        $productsTotal = Products::count();
        $ordersTotal = Orders::count();

        return view('dashboard/home', [
            'totalUser' => $userTotal,
            'totalProducts' => $productsTotal,
            'totalOrders' => $ordersTotal,
        ]);
    }

    public function usersTable() {
        $users = User::all();
        return view('dashboard/users', [
            'users' => $users,
        ]);
    }

    public function deleteUser($id) {
        $user = User::findOrFail($id);
        $user->delete();
        return back();
    }

    public function changeStatus($id) {
        $user = User::findOrFail($id);
        if($user->status == 'aktif'){
            $status = 'non-aktif';
        } else {
            $status = 'aktif';
        }
        
        $user->update([
            'status' => $status
        ]);

        return back();
    }

    public function productsTable() {
        $products = Products::all();
        return view ('dashboard/products', [
            'products' => $products,
        ]);
    }

    public function deleteProducts($product) {
        $product = Products::where('slug', $product)->first();
        $product->delete();
        return back();
    }

    public function addProduct() {
        return view('/dashboard/addProduct');
    }

    public function addNewProduct (Request $request) {
        $validatedData = $request->validate([
            'name' => 'required | max:30',
            'condition' => 'required | max:10',
            'size' => 'required | max:6',
            'price' => 'required | numeric',    
            'image' => 'required | image | mimes:jpeg, jpg, png',    
            'description' => 'required',    
        ]);

        $image = $request->file('image')->store('product_images', 'public');

        $create = Products::create([
            'id_user' => Auth::user()->id,
            'Product_name' => $request->name,
            'condition' => $request->condition,
            'product_price' => $request->price,
            'size' => $request->size,
            'description' => $request->description,
            'image' => $image,
            'slug' => $request->slug,
        ]);

        return redirect()->route('productsTable')->with('alert', 'Product Has Been Added');
    }

    public function editProduct($product) {
        $product = Products::where('slug', $product)->first();
        return view('dashboard/editProduct', [
            'product' => $product,
        ]);
    }

    public function updateProduct(Request $request, $product) {
        $product = Products::where('slug', $product)->first();
        $image = $request->file('image')->store('product_images', 'public');

        $validatedData = $request->validate([
            'name' => 'required | max:30',
            'condition' => 'required | max:10',
            'size' => 'required | max:6',
            'price' => 'required | numeric',    
            'image' => 'required | image | mimes:jpeg, jpg, png',    
            'description' => 'required',
        ]);

        Products::where('slug', $product->slug)->update([
            'id_user' => Auth::user()->id,
            'Product_name' => $request->name,
            'condition' => $request->condition,
            'product_price' => $request->price,
            'size' => $request->size,
            'description' => $request->description,
            'image' => $image,
            'slug' => $request->slug,
        ]);
        
        return redirect()->route('productsTable')->with('edit', 'Product Berhasil di Update');
    }

    public function ordersTable() {
        $orders = Orders::all();
        return view('/dashboard/orders', [
            'orders' => $orders,
        ]);
    }

    public function setDeliver(Request $request, Orders $orders, $id) {
        $order = Orders::findOrFail($id);
        $validatedData = $request->validate([
            'time' => 'required',
        ]);

        Orders::where('id', $order['id'])->update([
            'deliver_time' => $request->time,
        ]);

        return back()->with('success', 'Deliver Time Has Been Setted');
    }


}
