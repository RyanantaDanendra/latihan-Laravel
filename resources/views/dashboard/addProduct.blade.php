@extends('layouts.sidebar')

@section('title', 'addProduct')

@section('content')
    <div class="container w-full overflow-y-auto h-screen">
        <a href="../dashboard/products"><svg xmlns="http://www.w3.org/2000/svg" class="text-4xl mx-5 my-5" height="1em" viewBox="0 0 512 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com --><path d="M459.5 440.6c9.5 7.9 22.8 9.7 34.1 4.4s18.4-16.6 18.4-29V96c0-12.4-7.2-23.7-18.4-29s-24.5-3.6-34.1 4.4L288 214.3V256v41.7L459.5 440.6zM256 352V256 128 96c0-12.4-7.2-23.7-18.4-29s-24.5-3.6-34.1 4.4l-192 160C4.2 237.5 0 246.5 0 256s4.2 18.5 11.5 24.6l192 160c9.5 7.9 22.8 9.7 34.1 4.4s18.4-16.6 18.4-29V352z"/></svg></a>
        <h1 class="text-3xl font-bold ms-12 mt-5">Add New Product</h1>
        <form action="{{ route('addNewProduct') }}" method="POST" class="w-full h-full" enctype="multipart/form-data">
            @csrf
            @if ($errors->any())
                {{$errors->first()}}
            @endif
            <ul class="flex flex-col items-center w-72 h-72 ms-24 mt-12 gap-5">
                <li>
                    <label for="name" class="">Product name</label>
                    <input type="text" name="name" id="name" placeholder="Product name" class="border-2 shadow-inner shadow-black bg-transparent w-96 h-12">
                </li>
                <li>
                    <label for="slug" class="">Slug</label>
                    <input type="text" name="slug" id="slug" placeholder="slug" class="border-2 shadow-inner shadow-black bg-transparent w-96 h-12">
                </li>
                <li>
                    <label for="condition" class="">Condition</label>
                    <br>
                    <select name="condition" id="condition" class="border-2 border-black rounded- w-96 h-12">
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
                    {{-- <input type="text" name="conditionInput" id="conditionInput" class="hidden">
                    <script>
                        function updateInput(select) {
                            var selectedOption = select.value;
                            document.getElementById('conditionInput').value = selectedOption;
                        }
                    </script> --}}
                    {{-- <input type="text" name="condition" id="condition" placeholder="Sneaker condition. . ." class="border-2 shadow-inner shadow-black bg-transparent w-96 h-12"> --}}
                </li>
                <li>
                    <label for="size" class="">Size</label>
                    <br>
                    <select name="size" id="size" class="w-96 h-12 border-2 border-black">
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
                    {{-- <input type="text" name="size" id="size" placeholder="Size. . ." class="border-2 shadow-inner shadow-black bg-transparent w-96 h-12"> --}}
                </li>
                <li>
                    <label for="price" class="">Price</label>
                    <input type="numeric" name="price" id="price" placeholder="Price. . ." class="border-2 shadow-inner shadow-black bg-transparent w-96 h-12">
                </li>
                <li>
                    <label for="image" class="">Image</label>
                    <input type="file" name="image" id="image" placeholder="Price. . ." class="border-2 shadow-inner shadow-black bg-transparent w-96">
                </li>
                <li>
                    <label for="description" class="">Description</label>
                    <textarea type="numeric" name="description" id="description" placeholder="description. . ." class="border-2 shadow-inner shadow-black bg-transparent w-96 h-12"></textarea>
                </li>
                <button type="submit" class="bg-white shadow-inner shadow-black px-40">Add</button>
            </ul>
        </form>
    </div>
@endsection