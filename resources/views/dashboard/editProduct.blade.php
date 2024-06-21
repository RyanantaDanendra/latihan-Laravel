@extends('layouts.sidebar')

@section('title', 'editProduct')

@section('content')
<div class="container w-full overflow-y-auto h-screen">
    @if (session('edit'))
        <script>
            alert(edit);
        </script>
    @endif
    <a href="/dashboard/products"><svg xmlns="http://www.w3.org/2000/svg" class="text-4xl mx-5 my-5" height="1em" viewBox="0 0 512 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com --><path d="M459.5 440.6c9.5 7.9 22.8 9.7 34.1 4.4s18.4-16.6 18.4-29V96c0-12.4-7.2-23.7-18.4-29s-24.5-3.6-34.1 4.4L288 214.3V256v41.7L459.5 440.6zM256 352V256 128 96c0-12.4-7.2-23.7-18.4-29s-24.5-3.6-34.1 4.4l-192 160C4.2 237.5 0 246.5 0 256s4.2 18.5 11.5 24.6l192 160c9.5 7.9 22.8 9.7 34.1 4.4s18.4-16.6 18.4-29V352z"/></svg></a>
    <h1 class="text-3xl font-bold ms-12 mt-5">Edit Product</h1>
    <form action="{{ route('updateProduct', ['product' => $product->slug]) }}" method="POST" class="w-full h-full" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        @if ($errors->any())
            {{$errors->first()}}
        @endif
        <ul class="flex flex-col items-center w-72 h-72 mx-auto mt-12 gap-5">
            <li>
                <label for="name" class="">Product name</label>
                <input type="text" name="name" id="name" value="{{ $product->Product_name }}" placeholder="Product name" class="border-2 shadow-inner shadow-black bg-transparent w-96 h-12">
            </li>
            <li>
                <label for="slug" class="">Slug</label>
                <input type="text" name="slug" id="slug" value="{{ $product->slug }}" placeholder="slug" class="border-2 shadow-inner shadow-black bg-transparent w-96 h-12">
            </li>
            <li>
                <label for="condition" class="">Condition</label>
                <input type="text" name="condition" id="condition" value="{{ $product->condition }}" placeholder="Sneaker condition. . ." class="border-2 shadow-inner shadow-black bg-transparent w-96 h-12">
            </li>
            <li>
                <label for="size" class="">Size</label>
                <input type="text" name="size" id="size" value="{{ $product->size }}" placeholder="Size. . ." class="border-2 shadow-inner shadow-black bg-transparent w-96 h-12">
            </li>
            <li>
                <label for="price" class="">Price</label>
                <input type="numeric" name="price" id="price" value="{{ $product->product_price }}" placeholder="Price. . ." class="border-2 shadow-inner shadow-black bg-transparent w-96 h-12">
            </li>
            <li>
                <label for="image" class="">Image</label>
                <input type="file" name="image" id="image" value="{{ $product->image }}" placeholder="Price. . ." class="border-2 shadow-inner shadow-black bg-transparent w-96">
            </li>
            <li>
                <label for="description" class="">Description</label>
                <textarea type="numeric" name="description" id="description" placeholder="description. . ." class="border-2 shadow-inner shadow-black bg-transparent w-96 h-12"></textarea>
            </li>
            <button type="submit" onclick="return confirm('Are you sure to edit this product?')" class="bg-white shadow-inner shadow-black px-40">Update</button>
        </ul>
    </form>
</div>
@endsection