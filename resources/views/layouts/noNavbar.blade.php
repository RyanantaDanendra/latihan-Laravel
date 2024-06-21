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
<body class="h-screen">
    <div class="content">
        @yield('content')
    </div>

    <footer class=" w-full text-center text-gray-400 fixed bottom-0">
        <h3>Ryananta Danendra</h3>
        <p>2023 @ All Copyrights Reserved</p>
    </footer>

</body>
</html>