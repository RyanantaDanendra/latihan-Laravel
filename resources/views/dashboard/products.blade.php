@extends('layouts.sidebar')

@section('title', 'productsTable')

@section('content')
@if (session('alert'))
    <script>
        alert(alert);
    </script>
@endif
    <div class="container w-full h-screen">
        <a href="/dashboard/home"><svg xmlns="http://www.w3.org/2000/svg" class="text-4xl mx-5 my-5" height="1em" viewBox="0 0 512 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com --><path d="M459.5 440.6c9.5 7.9 22.8 9.7 34.1 4.4s18.4-16.6 18.4-29V96c0-12.4-7.2-23.7-18.4-29s-24.5-3.6-34.1 4.4L288 214.3V256v41.7L459.5 440.6zM256 352V256 128 96c0-12.4-7.2-23.7-18.4-29s-24.5-3.6-34.1 4.4l-192 160C4.2 237.5 0 246.5 0 256s4.2 18.5 11.5 24.6l192 160c9.5 7.9 22.8 9.7 34.1 4.4s18.4-16.6 18.4-29V352z"/></svg></a>
        <a href="{{ route('addProduct') }}"><button class="px-5 py-3 ms-10 mt-5 shadow-inner shadow-black flex items-center gap-5"><svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 448 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com --><path d="M256 80c0-17.7-14.3-32-32-32s-32 14.3-32 32V224H48c-17.7 0-32 14.3-32 32s14.3 32 32 32H192V432c0 17.7 14.3 32 32 32s32-14.3 32-32V288H400c17.7 0 32-14.3 32-32s-14.3-32-32-32H256V80z"/></svg>| Add Proudct</button></a>
        <table class="mt-12 mx-auto">
            <tr>
                <th class="border-b-2 border-black px-2">Id</th>
                <th class="border-b-2 border-black px-12">Product Name</th>
                <th class="border-b-2 border-black px-12">Condition</th>
                <th class="border-b-2 border-black px-12">Price</th>
                <th class="border-b-2 border-black px-12">Size</th>
                <th class="border-b-2 border-black">Created At</th>
                <th class="border-b-2 border-black px-12">Action</th>
            </tr>
            @if (count($products) > 0)                
                @foreach ($products as $product)
                    <tr class="border-b-2">
                        <td class="text-center">{{ $product['id'] }}</td>
                        <td class="text-center">{{ $product['Product_name'] }}</td>
                        <td class="text-center">{{ $product['condition'] }}</td>
                        <td class="text-center">RP. {{ $product['product_price'] }}</td>
                        <td class="text-center">{{ $product['size'] }}</td>
                        <td class="text-center">{{ $product['created_at'] }}</td>
                        <td class="border-b-2 flex justify-center items-center gap-3">
                            <form action="{{ route('deleteProducts', ['product' => $product->slug]) }}" method="POST">
                                @method('delete')
                                @csrf

                                <button type="submit" onclick="return confirm('Are you sure to delete this product?')">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="cursor-pointer mx-auto" height="1em" viewBox="0 0 448 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com--><path d="M135.2 17.7L128 32H32C14.3 32 0 46.3 0 64S14.3 96 32 96H416c17.7 0 32-14.3 32-32s-14.3-32-32-32H320l-7.2-14.3C307.4 6.8 296.3 0 284.2 0H163.8c-12.1 0-23.2 6.8-28.6 17.7zM416 128H32L53.2 467c1.6 25.3 22.6 45 47.9 45H346.9c25.3 0 46.3-19.7 47.9-45L416 128z"/></svg>
                                </button>
                            </form>
                            <a href="{{ route('editProduct', ['product' => $product->slug]) }}">
                                <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 512 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com --><path d="M471.6 21.7c-21.9-21.9-57.3-21.9-79.2 0L362.3 51.7l97.9 97.9 30.1-30.1c21.9-21.9 21.9-57.3 0-79.2L471.6 21.7zm-299.2 220c-6.1 6.1-10.8 13.6-13.5 21.9l-29.6 88.8c-2.9 8.6-.6 18.1 5.8 24.6s15.9 8.7 24.6 5.8l88.8-29.6c8.2-2.7 15.7-7.4 21.9-13.5L437.7 172.3 339.7 74.3 172.4 241.7zM96 64C43 64 0 107 0 160V416c0 53 43 96 96 96H352c53 0 96-43 96-96V320c0-17.7-14.3-32-32-32s-32 14.3-32 32v96c0 17.7-14.3 32-32 32H96c-17.7 0-32-14.3-32-32V160c0-17.7 14.3-32 32-32h96c17.7 0 32-14.3 32-32s-14.3-32-32-32H96z"/></svg>
                            </a>           
                        </td>
                    </tr>
                @endforeach
            @else
             <p class="absolute top-64 left-2/4 text-gray-400">No Products Yet.. .</p>
            @endif
        </table>
    </div>
@endsection