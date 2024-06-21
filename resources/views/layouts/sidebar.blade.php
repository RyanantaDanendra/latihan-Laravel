<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    {{-- @viteReactRefresh
    @viteReactRefresh --}}
    @vite('resources/css/app.css')
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Agbalumo&family=Montserrat&display=swap" rel="stylesheet">
</head>
<body class="h-screen max-h-screen overflow-hidden flex w-full">
    <div class="sidebar w-64 min-h-screen shadow-lg bg-black shadow-black">
        <div class="image pt-8">
            <img src="{{ Auth::user()->image ? asset('/storage/' . Auth::user()->image) : asset('/storage/image/download.png') }}" alt="" class="rounded-full w-20 mx-auto h-20 object-cover border-2 border-black">
        </div>
        <div class="links flex flex-col items-center mt-12 gap-3 text-white">
            <a href="{{ route('dashboard') }}" class="font-bold text-xl  hover:bg-sky-500 hover:text-white py-3 px-6 duration-200 ease-out">Home</a>
            <a href="{{ route('usersTable') }}" class="font-bold text-xl  hover:bg-sky-500 hover:text-white py-3 px-6 duration-200 ease-out">Users</a>
            <a href="{{ route('productsTable') }}" class="font-bold text-xl  hover:bg-sky-500 hover:text-white py-3 px-6 duration-200 ease-out">Products</a>
            <a href="{{ route('ordersTable') }}" class="font-bold text-xl  hover:bg-sky-500 hover:text-white py-3 px-6 duration-200 ease-out">Orders</a>
        </div>
        @auth
            <form action="{{ Route('logout') }}" method="post">
                @csrf

                <button type="submit" onclick="return confirm('Are you sure o\to Log-out')" class="text-white px-5 py-5 mx-auto hover:underline">Log-Out</button>
            </form>
        @endauth
    </div>


    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <div class="content w-full">
        @yield('content')
    </div>
    
</body>
</html>