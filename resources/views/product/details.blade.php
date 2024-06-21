@extends('layouts.app')

@section('title', 'details')

@section('content')
<div class="container w-full min-h-screen pb-80">
    <a href="/product/products"><svg class="text-3xl ms-5 mt-16 absolute" xmlns="../assets/backward-solid.svg" height="1em" viewBox="0 0 512 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com -->
    <style>svg{fill:#1d5cc9}</style><path d="M459.5 440.6c9.5 7.9 22.8 9.7 34.1 4.4s18.4-16.6 18.4-29V96c0-12.4-7.2-23.7-18.4-29s-24.5-3.6-34.1 4.4L288 
    214.3V256v41.7L459.5 440.6zM256 352V256 128 96c0-12.4-7.2-23.7-18.4-29s-24.5-3.6-34.1 4.4l-192 160C4.2 237.5 0 246.5 0 256s4.2 18.5 11.5 24.6l192 160c9.5 7.9 22.8 9.7 34.1 4.4s18.4-16.6 18.4-29V352z"/>
    </svg></a>
    <div class="details w-full absolute mt-24">
        <div class="card h-full flex">
            <img class="mt-10 ms-80 w-80 h-80 object-cover shadow-md shadow-white" src="{{ asset('storage/'.$product['image']) }}" alt="">
            <div class="text ms-5">
                <h1 class="text-xl mt-8">Name : {{ $product['Product_name'] }}</h1>
                <h1 class="text-xl mt-5">Condition : {{$product['condition']}}</h1>
                <h1 class="text-xl mt-5">Price : RP.{{ $product['product_price'] }}</h1>
                <h1 class="mt-5">Size : {{ $product['size'] }}</h1>
                <h1 class="text-xl mt-5">{{ $product['description'] }}</h1>
                @if ($product->id_user != Auth::user()->id)
                <a href="/product/checkOut/{{ $product['slug'] }}" class="text-sky-500 hover:underline">Check-Out</a>
                @else
                @endif

            </div>
        </div>
    </div>
</div>
@endsection
    
