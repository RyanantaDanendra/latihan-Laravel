@extends('layouts.app')

@section('title', 'Order History')

@section('content')
    <div class="container w-full min-h-screen pt-20 pb-20">
        <a href="/profile" class="ms-5 underline">Back</a>
        <h1 class="text-2xl ms-5 font-bold mt-24">Your History :</h1>
        @foreach ($histories as $history)
            <div class="card w-3/4 pt-12 bg-white shadow-lg shadow-black h-80 ms-5 mt-5 bg-no-repeat bg-center" style="background-image: url('/assets/k.png"')">
                <h1 class="text-xl font-bold mt-3 ms-3">Product Name : {{ $history['product_name'] }}</h1>
                <h1 class="text-xl font-bold mt-2 ms-3">Price  : {{ $history['price'] }}</h1>
                {{-- <h1 class="text-xl font-bold mt-2 ms-3">Total : {{ $history['total_price'] }}</h1> --}}
                <h1 class="text-xl font-bold mt-2 ms-3">location : {{ $history['location'] }}</h1>
                <h1 class="text-xl font-bold mt-2 ms-3">Postal Code : {{ $history['post_code'] }}</h1>
                <h3 class="ms-3">Created At : {{ $history['created_at'] }}</h3>
                @if ($history['deliver_time']  !== null)                 
                    <h3 class="ms-3"> will be Delivered At : {{ $history['deliver_time'] }}</h3>
                @else
                    <p class="ms-3"> Delivery time will be informed soon!</p>
                @endif
            </div>
        @endforeach
    </div>
@endsection

@section('footer')