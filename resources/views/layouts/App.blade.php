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
<body class="min-h-screen p-0 m-0">
    <div class="container fixed top-0 z-50">
    <div class="navbar flex w-full right-0 justify-between bg-white">
            <img src="/assets/k.png" alt="" class="w-16 h-16 ms-5">
            <a href="/" class="hover:scale-90 ease-out duration-300"><h1 class=" text-2xl ms-32 font-bold py-4">KICKS</h1></a>
            <div class="links me-5 font-bold mt-4 flex items-center">
                <a href="/product/products" class="px-4 py-4 hover:scale-90 duration-300 ease-out">Products </a>
                <a href="/product/sell" class="px-4 py-4 hover:scale-90 duration-300 ease-out">Sell</a>
                <div class="logout flex">
                        <a href="/profile">
                            <div class="profileImage mx-5 w-8 h-8 rounded-full">
                                <img class="h-full w-full rounded-full object-cover hover:scale-90 ease-out duration-300" src="{{ Auth::user()->image ? asset('/storage/' . Auth::user()->image) : asset('/storage/image/download.png') }}" alt="storage/app/download.png">
                            </div>
                        </a>
                </div>
            </div>
        </div>
    </div>
    

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <div class="content">
        @yield('content')
    </div>


    <footer class="w-full h-80 bg-gray-700 bg-no-repeat bg-center bg-fixed" style="background-image: url(/assets/k.png)">
        <div class="flex ">
            <div class="w-2/4"><h1 class="text-white">
                <h1 class="text-white text-3xl mt-5 mx-5 font-bold">KICKS</h1>
                <p class="text-white mx-5">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Enim, qui sequi. Blanditiis, nobis beatae earum delectus inventore omnis hic totam nesciunt quibusdam aperiam pariatur distinctio, amet sequi quo labore recusandae?</p>
                <div class="social flex gap-14 ms-5 mt-8">
                    <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 448 512" class="text-4xl"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com --><style>svg{fill:#ffffff}</style><path d="M224.1 141c-63.6 0-114.9 51.3-114.9 114.9s51.3 114.9 114.9 114.9S339 319.5 339 255.9 287.7 141 224.1 141zm0 189.6c-41.1 0-74.7-33.5-74.7-74.7s33.5-74.7 74.7-74.7 74.7 33.5 74.7 74.7-33.6 74.7-74.7 74.7zm146.4-194.3c0 14.9-12 26.8-26.8 26.8-14.9 0-26.8-12-26.8-26.8s12-26.8 26.8-26.8 26.8 12 26.8 26.8zm76.1 27.2c-1.7-35.9-9.9-67.7-36.2-93.9-26.2-26.2-58-34.4-93.9-36.2-37-2.1-147.9-2.1-184.9 0-35.8 1.7-67.6 9.9-93.9 36.1s-34.4 58-36.2 93.9c-2.1 37-2.1 147.9 0 184.9 1.7 35.9 9.9 67.7 36.2 93.9s58 34.4 93.9 36.2c37 2.1 147.9 2.1 184.9 0 35.9-1.7 67.7-9.9 93.9-36.2 26.2-26.2 34.4-58 36.2-93.9 2.1-37 2.1-147.8 0-184.8zM398.8 388c-7.8 19.6-22.9 34.7-42.6 42.6-29.5 11.7-99.5 9-132.1 9s-102.7 2.6-132.1-9c-19.6-7.8-34.7-22.9-42.6-42.6-11.7-29.5-9-99.5-9-132.1s-2.6-102.7 9-132.1c7.8-19.6 22.9-34.7 42.6-42.6 29.5-11.7 99.5-9 132.1-9s102.7-2.6 132.1 9c19.6 7.8 34.7 22.9 42.6 42.6 11.7 29.5 9 99.5 9 132.1s2.7 102.7-9 132.1z"/></svg>
                    <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 512 512" class="text-4xl"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com --><style>svg{fill:#ffffff}</style><path d="M504 256C504 119 393 8 256 8S8 119 8 256c0 123.78 90.69 226.38 209.25 245V327.69h-63V256h63v-54.64c0-62.15 37-96.48 93.67-96.48 27.14 0 55.52 4.84 55.52 4.84v61h-31.28c-30.8 0-40.41 19.12-40.41 38.73V256h68.78l-11 71.69h-57.78V501C413.31 482.38 504 379.78 504 256z"/></svg>
                    <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 448 512" class="text-4xl"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com--><style>svg{fill:#ffffff}</style><path d="M380.9 97.1C339 55.1 283.2 32 223.9 32c-122.4 0-222 99.6-222 222 0 39.1 10.2 77.3 29.6 111L0 480l117.7-30.9c32.4 17.7 68.9 27 106.1 27h.1c122.3 0 224.1-99.6 224.1-222 0-59.3-25.2-115-67.1-157zm-157 341.6c-33.2 0-65.7-8.9-94-25.7l-6.7-4-69.8 18.3L72 359.2l-4.4-7c-18.5-29.4-28.2-63.3-28.2-98.2 0-101.7 82.8-184.5 184.6-184.5 49.3 0 95.6 19.2 130.4 54.1 34.8 34.9 56.2 81.2 56.1 130.5 0 101.8-84.9 184.6-186.6 184.6zm101.2-138.2c-5.5-2.8-32.8-16.2-37.9-18-5.1-1.9-8.8-2.8-12.5 2.8-3.7 5.6-14.3 18-17.6 21.8-3.2 3.7-6.5 4.2-12 1.4-32.6-16.3-54-29.1-75.5-66-5.7-9.8 5.7-9.1 16.3-30.3 1.8-3.7.9-6.9-.5-9.7-1.4-2.8-12.5-30.1-17.1-41.2-4.5-10.8-9.1-9.3-12.5-9.5-3.2-.2-6.9-.2-10.6-.2-3.7 0-9.7 1.4-14.8 6.9-5.1 5.6-19.4 19-19.4 46.3 0 27.3 19.9 53.7 22.6 57.4 2.8 3.7 39.1 59.7 94.8 83.8 35.2 15.2 49 16.5 66.6 13.9 10.7-1.6 32.8-13.4 37.4-26.4 4.6-13 4.6-24.1 3.2-26.4-1.3-2.5-5-3.9-10.5-6.6z"/></svg>
                    <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 512 512" class="text-4xl"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com --><style>svg{fill:#ffffff}</style><path d="M48 64C21.5 64 0 85.5 0 112c0 15.1 7.1 29.3 19.2 38.4L236.8 313.6c11.4 8.5 27 8.5 38.4 0L492.8 150.4c12.1-9.1 19.2-23.3 19.2-38.4c0-26.5-21.5-48-48-48H48zM0 176V384c0 35.3 28.7 64 64 64H448c35.3 0 64-28.7 64-64V176L294.4 339.2c-22.8 17.1-54 17.1-76.8 0L0 176z"/></svg>
                </div>
            </div>
            <div class="w-2/4">
                <h1 class="text-3xl text-white mt-5 ms-5">Address</h1>
                <div class="location flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 384 512" class="ms-5 mt-5"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com --><style>svg{fill:#ffffff}</style><path d="M215.7 499.2C267 435 384 279.4 384 192C384 86 298 0 192 0S0 86 0 192c0 87.4 117 243 168.3 307.2c12.3 15.3 35.1 15.3 47.4 0zM192 128a64 64 0 1 1 0 128 64 64 0 1 1 0-128z"/></svg>
                    <p class="text-white mt-5 ms-5">Lorem ipsum dolor sit amet consectetur adipisicing elit. Veniam, aliquam!</p>
                </div>
                <div class="phone flex">
                    <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 512 512" class="ms-5 mt-5"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com --><style>svg{fill:#ffffff}</style><path d="M164.9 24.6c-7.7-18.6-28-28.5-47.4-23.2l-88 24C12.1 30.2 0 46 0 64C0 311.4 200.6 512 448 512c18 0 33.8-12.1 38.6-29.5l24-88c5.3-19.4-4.6-39.7-23.2-47.4l-96-40c-16.3-6.8-35.2-2.1-46.3 11.6L304.7 368C234.3 334.7 177.3 277.7 144 207.3L193.3 167c13.7-11.2 18.4-30 11.6-46.3l-40-96z"/></svg>
                    <p class="text-white ms-5 mt-5">(+12) 345 678</p>
                </div>
            </div>
        </div>
    </footer>
    
</body>
</html>