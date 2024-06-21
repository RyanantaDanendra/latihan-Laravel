@extends('layouts.app')

@section('title', 'ChrckOut')

@section('content')
    <div class="container flex justify-center items-center min-h-screen">
        <div class="card w-80 h-3/4">
            @if (session()->has('error'))
                {{session('error')}}
            @endif
            <form action="{{ route('order.checkout', $product->slug)}}" method="POST" class="pt-16">
                @csrf

                <div class="name flex">
                    <label for="name">Name :</label>
                    <p>{{ Auth::user()->name }}</p>
                </div>
                <div class="product mt-5">
                    <input type="hidden" id="id" value={{ $product->id }} name="idProduct">
                    <p>Product : {{$product->Product_name}}</p>
                </div>
                <div class="total mt-5">
                    <input type="hidden" id="price" name="price" value="{{ $product->product_price }}">
                    <p>Price : {{ $product->product_price }}</p>
                </div>
                <div class="location mt-5">
                    <input class="bg-transparent border-b-2" type="text" name="location" id="location" placeholder="Your location. . ." class="border-b-2" required>
                </div>
                <div class="postal">
                    <input type="text" name="postal" id="postal" placeholder="Your Postal Code . . " class="border-b-2 bg-transparent mt-5" required>
                </div>
                <div class="mt-5">
                    <button type="submit" class="py-1 px-5 border-2 border-x-black hover:border-y-black hover:border-x-transparent ease-out duration-300">Order</button>
                </div>
            </form>
        </div>
        <div class="img w-80 h-96 mt-40">
            <img class="my-auto" src="{{ asset('storage/'.$product->image) }}" alt="Tidak Terdapat Gambar">
        </div>
    </div>
@endsection