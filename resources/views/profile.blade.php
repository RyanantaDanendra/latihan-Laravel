@extends('layouts.noNavbar')

@section('title', 'Profile')
    
@if (Auth::user()->status === 'aktif')  
@section('content')
{{-- <a href="/"><svg class="text-3xl ms-5 mt-8 absolute" xmlns="../assets/backward-solid.svg" height="1em" viewBox="0 0 512 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com --> --}}
    <style>svg{fill:#1d5cc9}</style><path d="M459.5 440.6c9.5 7.9 22.8 9.7 34.1 4.4s18.4-16.6 18.4-29V96c0-12.4-7.2-23.7-18.4-29s-24.5-3.6-34.1 4.4L288 
    214.3V256v41.7L459.5 440.6zM256 352V256 128 96c0-12.4-7.2-23.7-18.4-29s-24.5-3.6-34.1 4.4l-192 160C4.2 237.5 0 246.5 0 256s4.2 18.5 11.5 24.6l192 160c9.5 7.9 22.8 9.7 34.1 4.4s18.4-16.6 18.4-29V352z"/>
    </svg></a>
    <div class="container w-full min-h-screen pt-10">
        <a href="/"><svg class="text-3xl ms-5" xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 512 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license--><path d="M459.5 440.6c9.5 7.9 22.8 9.7 34.1 4.4s18.4-16.6 18.4-29V96c0-12.4-7.2-23.7-18.4-29s-24.5-3.6-34.1 4.4L288 214.3V256v41.7L459.5 440.6zM256 352V256 128 96c0-12.4-7.2-23.7-18.4-29s-24.5-3.6-34.1 4.4l-192 160C4.2 237.5 0 246.5 0 256s4.2 18.5 11.5 24.6l192 160c9.5 7.9 22.8 9.7 34.1 4.4s18.4-16.6 18.4-29V352z"/></svg></a>
        <div class="profile">
            <div class="first flex justify-between">
                <div class="text ms-12 mt-32">
                    <p class="font-bold text-5xl">HI, {{ Auth::user()->name }}!</p>
                    <p class="text-xl">Welcome to your profile page. . .</p>
                    @auth
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button onclick="return confirm('Are you sure to logout?')" class="text-sky-500 hover:underline" type="submit">Logout</button>
                        </form>
                    @endauth
                    <a href="{{ route('likedProducts') }}" class="text-sky-500 hover:underline">Liked Products</a>
                    <br>
                    <a href="{{ route('history') }}" class="text-sky-500 hover:underline">Order History</a>
                    <div class="info flex pt-4">
                        <div class="username">
                            <p>Username :</p>
                            <p>{{ Auth::user()->Username }}</p>
                        </div>
                        <div class="email mx-24">
                            <p>Email :</p>
                            <p>{{ Auth::user()->email }}</p>
                        </div>
                    </div>
                </div>
                <div class="image me-40 mt-16 ">
                    <div class="change w-80 h-80 rounded-full">
                        @if (Auth::user()->image)
                            <img class="me-3 w-full h-full object-cover rounded-full" src="{{ asset('/storage/' . Auth::user()->image) }}" alt="Profile Picture">
                            @if (session('success'))
                                <script>
                                    alert('{{session('success')}}')
                                </script>
                             @endif
                        @else
                                <div class="image">
                                    <img class="h-full w-full rounded-full object-cover hover:scale-90 ease-out duration-300" src="{{ Auth::user()->image ? asset('/storage/' . Auth::user()->image) : asset('/storage/image/download.png') }}" alt="storage/app/download.png">
                                </div>
                        @endif
                        <form action="{{ route('updateProfilePicture') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @error('image')
                                <p>{{$message}}</p>
                            @enderror
                            <label for="image" class="flex justify-center">Change Profile Picture</label>
                            <input class="flex justify-center" type="file" name="image" id="image">
                            <button type="submit">Change</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@else
    <div class="container w-full h-screen bg-red-800 pt-32">
        <h1 class="text-4xl font-bold text-white text-center mt-32">Sorry!, your account has been De-activated due to a violation</h1>
    </div>
@endif