@extends('layouts.App')

@section('title', 'Products')

@if (Auth::user()->status === 'aktif')    
@section('content')
    @if (session()->has('order'))
        <script>
            var order = "{{ session('order') }}";
            alert(order);
        </script>
    @endif
    @if (session()->has('sell'))
        <script>
            var sell = "{{ session('sell') }}";
            alert(sell);
        </script>
    @endif
    <div class="container min-h-screen">
    <form action={{route('search')}} method="POST">
        @csrf
        <div class="searcBar flex pt-24">
            <input type="text" id="search" name="search" value="{{request('search')}}" " placeholder="Find a Shoes. . ." class="border-2 border-black ms-12 pe-8">
            <button type="submit" class="mx-5 px-5 py-1 bg-transparent border-2 border-x-black hover: hover:border-x-gray-200 hover:border-y-black ease-out duration-300">Search</button> 
        </div>
    </form> 
    @if (count($cards) > 0)
        <div class="cards w-full flex justify-center items-center flex-wrap mt-12" id="searchResults">
            @foreach ($cards as $card)
            @if ($card->stock > 0)  
                <div class="card text-center w-64 h-72 shadow-md shadow-white mx-5 my-5 bg-white flex-wrap hover:cursor-pointer">
                    <a href="/product/details/{{ $card['slug'] }}"><div class="image w-64 h-40 bg-contain bg-no-repeat hover:scale-110 duration-200 ease-out" style="background-image: url({{ asset('storage/'.$card['image']) }})"></div></a>
                    <h1 class="font-bold text-center">{{$card['Product_name']}}</h1>
                    <a href="/product/details/{{ $card['slug'] }}" class="text-sky-500 hover:underline">Details</a>
                    @if ($card->id_user != Auth::user()->id)
                        <a href="/product/checkOut/{{ $card['slug'] }}" class="text-sky-500 ease-out hover:underline">| Check-Out </a>
                        <form action=" 
                            @if(Auth::user()->likes->where('id_product', $card->id)->isNotEmpty())
                                {{ route('unlike') }}
                                @else
                                {{ route('like') }}
                            @endif
                            " 
                        method="POST">
                            @csrf
                                @if(Auth::user()->likes->where('id_product', $card->id)->isNotEmpty())
                                    @method('delete')
                                @endif
                                <button type="submit" name="id_product" value={{$card->id}}><svg class="
                                    @if(Auth::user()->likes->where('id_product', $card->id)->isNotEmpty())
                                        fill-red-500
                                        @else
                                        fill-black
                                    @endif
                                " xmlns="http://www.w3.org/2000/svg" fill="#000" height="1em" viewBox="0 0 512 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com. --><path d="M47.6 300.4L228.3 469.1c7.5 7 17.4 10.9 27.7 10.9s20.2-3.9 27.7-10.9L464.4 300.4c30.4-28.3 47.6-68 47.6-109.5v-5.8c0-69.9-50.5-129.5-119.4-141C347 36.5 300.6 51.4 268 84L256 96 244 84c-32.6-32.6-79-47.5-124.6-39.9C50.5 55.6 0 115.2 0 185.1v5.8c0 41.5 17.2 81.2 47.6 109.5z"/></svg></button>
                        </form>
                            @else 
                        {{-- <form action=" 
                        @if(Auth::user()->likes->where('id_product', $card->id)->isNotEmpty())
                            {{ route('unlike') }}
                            @else
                            {{ route('like') }}
                        @endif
                        " 
                    method="POST">
                        @csrf
                            @if(Auth::user()->likes->where('id_product', $card->id)->isNotEmpty())
                                @method('delete')
                            @endif
                            <button type="submit" name="id_product" value={{$card->id}}><svg class="
                                @if(Auth::user()->likes->where('id_product', $card->id)->isNotEmpty())
                                    fill-red-500
                                @endif
                            " xmlns="http://www.w3.org/2000/svg" fill="#000" height="1em" viewBox="0 0 512 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com. --><path d="M47.6 300.4L228.3 469.1c7.5 7 17.4 10.9 27.7 10.9s20.2-3.9 27.7-10.9L464.4 300.4c30.4-28.3 47.6-68 47.6-109.5v-5.8c0-69.9-50.5-129.5-119.4-141C347 36.5 300.6 51.4 268 84L256 96 244 84c-32.6-32.6-79-47.5-124.6-39.9C50.5 55.6 0 115.2 0 185.1v5.8c0 41.5 17.2 81.2 47.6 109.5z"/></svg></button>
                    </form> --}}
                    <form action="{{ route('deleteProduct', $card->slug) }}" method="POST">
                        @csrf
                        @method('delete')
                            
                        <button type="submit" onclick="return confirm('Are You Sure To Delete This Product?')"><svg class="fill-black" xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 448 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com --><path d="M135.2 17.7L128 32H32C14.3 32 0 46.3 0 64S14.3 96 32 96H416c17.7 0 32-14.3 32-32s-14.3-32-32-32H320l-7.2-14.3C307.4 6.8 296.3 0 284.2 0H163.8c-12.1 0-23.2 6.8-28.6 17.7zM416 128H32L53.2 467c1.6 25.3 22.6 45 47.9 45H346.9c25.3 0 46.3-19.7 47.9-45L416 128z"/></svg></button>
                    </form>
                    @endif
                </div>    
            @endif
            @endforeach
        </div>
        @else
        <p class=" opacity-50 text-center mt-12">No Products Yet. . .</p>
    @endif
    </div>
@endsection
@else
    <div class="container w-full h-screen bg-red-800 pt-32">
        <h1 class="text-4xl font-bold text-white text-center mt-32">Sorry!, your account has been De-activated due to a violation</h1>
    </div>
@endif