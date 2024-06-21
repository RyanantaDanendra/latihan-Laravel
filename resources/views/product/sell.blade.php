@extends('layouts.app')

@section('title', 'Sell')


@if (Auth::user()->status === 'aktif')  
@section('content')
    <div id="sell" class="container min-h-screen w-full py-12">
        <a href="/product/products"><svg class="text-3xl ms-5" xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 512 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license--><path d="M459.5 440.6c9.5 7.9 22.8 9.7 34.1 4.4s18.4-16.6 18.4-29V96c0-12.4-7.2-23.7-18.4-29s-24.5-3.6-34.1 4.4L288 214.3V256v41.7L459.5 440.6zM256 352V256 128 96c0-12.4-7.2-23.7-18.4-29s-24.5-3.6-34.1 4.4l-192 160C4.2 237.5 0 246.5 0 256s4.2 18.5 11.5 24.6l192 160c9.5 7.9 22.8 9.7 34.1 4.4s18.4-16.6 18.4-29V352z"/></svg></a>
        <div class="form mb-10 bottom-0 flex justify-center">
            <form action="{{ route('sell') }}" method="POST" class="form-sell py-5 mt-12 max-w-96 px-56 shadow-2xl shadow-black opacity-80 bg-fixed" style="background-image: url('/assets/k.png')" enctype="multipart/form-data">
                @csrf
                @if ($errors->any())
                    {{$errors->first()}}
                @endif
                {{-- <div class="bg-white shadow-xl shadow-black px-8 py-8"> --}}
                    <div class="productName flex flex-col text-center  mt-12">
                        <label for="name">Product Name :</label>
                        <input type="text" name="name" id="name" class="border-2 shadow-inner shadow-black border-black bg-transparent " required>
                    </div>
                    <div class="productName flex flex-col text-center mt-5 ">
                        <label for="slug">Slug :</label>
                        <input type="text" name="slug" id="slug" class="border-2 shadow-inner shadow-black border-black bg-transparent active:border-none" required>
                    </div>
                    <div class="productStock flex flex-col text-center mt-5 ">
                        <label for="condition">Condition</label>
                        <select name="condition" id="condition" class="border-2 border-black rounded- w-96 h-10">
                            <option value="BNIB">BNIB Brand New In Box</option>
                            <option value="9/10">9/10  Worn only once or twic, no visible signs of wear & no flaws</option>
                            <option value="8/10">8/10  Worn fewer than 10x. Minimal signs of wear & no flaws</option>
                            <option value="7/10">7/10  Visible signs of wear / 1 minor flaw</option>
                            <option value="7/10">6/10  visible signs of wear / 2 flaws</option>
                            <option value="7/10">5/10  obvious signs of wear / a few of flaws</option>
                            <option value="7/10">4/10  obvious signs of wear / significant flaws</option>
                            <option value="7/10">3/10  BEAT (significant signs of wear)</option>
                            <option value="7/10">2/10  On last legs</option>
                            <option value="7/10">1/10  Not wearable</option>
                        </select>
                    </div>
                    <div class="productPrice flex flex-col mt-5 text-center ">
                        <label for="price">Product Price</label>
                        <input type="text" name="price" id="price" class="border-2 shadow-inner shadow-black border-black bg-transparent" required>
                    </div>
                    <div class="size flex flex-col mt-5 text-center ">
                        <label for="size">Size</label>
                        <select name="size" id="size" class="w-96 h-10 border-2 border-black">
                            <option value="EUR 38">EUR 38</option>
                            <option value="EUR 39">EUR 39</option>
                            <option value="EUR 40">EUR 40</option>
                            <option value="EUR 41">EUR 41</option>
                            <option value="EUR 42">EUR 42</option>
                            <option value="EUR 43">EUR 43</option>
                            <option value="EUR 44">EUR 44</option>
                            <option value="EUR 45">EUR 45</option>
                            <option value="EUR 46">EUR 46</option>
                        </select>
                        {{-- <input type="text" name="size" id="size" class="border-2 shadow-inner shadow-black border-black bg-transparent" required> --}}
                    </div>
                    <div class="description flex flex-col mt-5 text-center ">
                        <label for="description">Product Description</label>
                        <textarea name="description" id="description" class="border-2 shadow-inner shadow-black border-black bg-transparent" required></textarea>
                    </div>
                    <div class="image flex flex-col mt-5 text-center ">
                        <label for="image">Product Image</label>
                        <input type="file" name="image" id="image" required>
                    </div>
                    <div class="button flex justify-center">
                        <button type="submit" class="mt-4 shadow-inner shadow-black  py-2 px-3 hover:cursor-pointer">Upload</button>
                    </div>
                {{-- </div> --}}
            </form>
        </div>
    </div>
@endsection
@else
    <div class="container w-full h-screen bg-red-800 pt-32">
        <h1 class="text-4xl font-bold text-white text-center mt-32">Sorry!, your account has been De-activated due to a violation</h1>
    </div>
@endif