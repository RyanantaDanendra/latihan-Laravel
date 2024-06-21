  @extends('layouts.app')

@section('title', 'Home')

@if (Auth::user()->status === 'aktif')  
@section('content')

    @if (session('alert'))
    <script>
        alert('{{session('alert')}}')
    </script>
    @endif
    <div class="hero flex items-center z-50" id="hero" style="background-color: rgba(0, 0, 0, 0.5)">
            <div class="bg w-full bg-cover bg-fixed bg-blend-screen" style="background-image: url(assets/bg7.jpg)">
                <div class="text ms-24 z-50 flex justify-center flex-col h-screen"><h1 class="font-bold text-5xl">Kicks</h1>
                <h3 class="text-3xl font-semibold">Best Place to Find Shoes</h3>
                <a href="/product/products" class="px-3 py-2 mt-5 w-32 text-center ease-in duration-100 hover:border-2 hover:shadow-inner hover:shadow-black bg-transparent hover:animate-pulse hover:border-white"><button>Shop Now!</button></a>
                </div>
            </div>
    </div>

    <div class="about w-full pb-20 pt-20 px-10">
        <div class="container">
            <h1 class="text-3xl text-center font-bold">About Us</h1>
            <p class="text-justify">Lorem ipsum dolor sit amet consectetur adipisicing elit. Repellat cumque minus, ratione voluptate voluptates nemo odit dolores officiis minima iure quas, reiciendis, ad nostrum. Ab culpa temporibus, modi commodi nostrum, vero suscipit dignissimos quae ut enim, repudiandae blanditiis maiores aliquid beatae et accusantium quam soluta consequatur officiis magnam! Nostrum hic qui laborum nulla deserunt, repudiandae similique ad, officia excepturi, optio sed magni nam illo. Molestias enim ipsum quidem sunt rerum odit architecto, accusamus, accusantium dolorem possimus labore. Doloribus voluptas dolores iure culpa at tenetur excepturi omnis? Enim, beatae debitis mollitia harum ullam facere blanditiis ducimus error animi eaque eum perferendis!</p>
        </div>
    </div>

    <div id="why" class="w-full h-screen bg-gray-700 pt-8 bg-no-repeat bg-center bg-fixed" style="background-image: url(assets/k.png)">
        <h1 class="text-3xl font-bold text-center text-white">Why Choose Us?</h1>
        <div class="container px-40">
            <div class="content flex justify-between mt-12 gap-8">
                <div class="text text-white">
                <h2 class="text-xl font-bold">Best place to find sneakers</h2>
                    <p class="text-justify">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Voluptates, id. Nesciunt sit dicta temporibus beatae alias possimus, obcaecati corporis totam vel, optio animi quaerat officia, facere voluptatem? Minima, vero repellendus?</p>
                </div>
                <div class="cards flex gap-8">
                    <div class="card w-80 h-56 bg-white shadow-black shadow-lg py-8 px-4">
                        <h1 class="text-xl font-bold text-center">100% Trusted</h1>
                        <p class="text-justify">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Reiciendis id ut odit repellat quam neque blanditiis in optio ducimus non!</p>
                    </div>
                    <div class="card w-80 h-56 bg-white shadow-black shadow-lg py-8 px-5">
                        <h1 class="text-xl font-bold text-center">100% Original products</h1>
                        <p class="text-justify">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Reiciendis id ut odit repellat quam neque blanditiis in optio ducimus non!</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="products w-full pt-10 pb-16">
        <h1 class="text-3xl font-bold text-center pb-10">PRODUCTS</h1>
            <div class="cards flex justify-center flex-wrap gap-32 pb-10">
                @if ($totalProducts > 0)
                    @foreach ($products->take(3) as $product)      
                    @if ($product['stock'] > 0)                                                
                        <div class="card w-56 h-full bg-white shadow-inner shadow-black">
                            <div class="img bg-cover">
                                <div class="icon"></div>
                                <img src="{{ asset('storage/'.$product['image']) }}" alt="">
                            </div>
                        </div>
                    @else
                    @endif
                    @endforeach
                    @else 
                    <h1 class="text-gray-400">No Products Yet. . .</h1>
                @endif
            </div>
        <a href="/product/products" class="text-sky-400 hover:underline ms-16">See More Products</a>    
    </div>
@endsection
@else
    <div class="container w-full h-screen bg-red-800 pt-32">
        <h1 class="text-4xl font-bold text-white text-center mt-32">Sorry!, your account has been De-activated due to a violation</h1>
    </div>
@endif
