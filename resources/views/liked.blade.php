@extends('layouts.app')

@section('title', ':iled Products')

@section('content')
    <div class="container w-full h-screen pt-24">
        <a href="/profile" class="underline ms-5">Back</a>
        <div class="wrapper flex justify-center">
        @foreach ($likes as $like)
        @if ($like->product->stock > 0)
        <div class="card text-center w-64 h-72 shadow-md pt-10 shadow-white mx-5 my-5 bg-white flex-wrap hover:cursor-pointer">
            <a href="/product/details/{{ $like['product']['slug'] }}"><img src="{{ asset('storage/'.$like['product']['image']) }}" alt="Tidak Terdapat Gambar" class="hover:scale-90 ease-out duration-300"></a>
            <h1 class="font-bold text-center">{{$like['product']['Product_name']}}</h1>
            <a href="/product/details/{{ $like['product']['slug'] }}" class="text-sky-500 hover:underline">Details |</a>
            <a href="/product/checkOut/{{ $like['product']['slug'] }}" class="text-sky-500 ease-out hover:underline"> Check-Out |</a>
            <form action=" 
                @if(Auth::user()->likes->where('id_product', $like->product->id)->isNotEmpty())
                    {{ route('unlike') }}
                    @else
                    {{ route('like') }}
                @endif
                " 
            method="POST">
                @csrf
                    @if(Auth::user()->likes->where('id_product', $like->product->id)->isNotEmpty())
                        @method('delete')
                    @endif
                    <button type="submit" name="id_product" value={{$like->product->id}}><svg class="
                        @if(Auth::user()->likes->where('id_product', $like->product->id)->isNotEmpty())
                            fill-red-500
                        @endif
                    " xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 512 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com. --><path d="M47.6 300.4L228.3 469.1c7.5 7 17.4 10.9 27.7 10.9s20.2-3.9 27.7-10.9L464.4 300.4c30.4-28.3 47.6-68 47.6-109.5v-5.8c0-69.9-50.5-129.5-119.4-141C347 36.5 300.6 51.4 268 84L256 96 244 84c-32.6-32.6-79-47.5-124.6-39.9C50.5 55.6 0 115.2 0 185.1v5.8c0 41.5 17.2 81.2 47.6 109.5z"/></svg></button>
            </form>
        </div>    
    @endif
        @endforeach
    </div>
    </div>
@endsection

@section('footer')