@extends('layouts.noNavbar')

@section('title', 'login')

@section('content')
@if (session('alert'))
<script>
    alert('{{session('alert')}}')
</script>
@endif
<div class="container flex justify-center pt-12">
    <div class="box w-96 bg-gray-700 shadow-lg shadow-black" style="height: 450px">
        <img src="../assets/register2.png" alt="" class="mt-20">
    </div>
    <form action="/auth/login" method="POST">
        @csrf

        @if ($errors->any())
            <div class="alert flex justify-center sticky top-24">
                @foreach ($errors->all() as $error)
                    {{ $error }}
                @endforeach
            </div>
        @endif

        <ul class="py-32 w-96 bg-white shadow-lg shadow-black" style="height:450px;">
            <li class="w-80 mx-auto text-center my-5">
                <label for="Username">Username</label>
                <input type="text" name="Username" id="Username" class="w-80 mx-auto bg-transparent border-b-2 border-gray-400">
            </li>
            <li class="w-80 mx-auto text-center my-5">
                <label for="password">Password</label>
                <input type="password" name="password" id="password" class="w-80 mx-auto bg-transparent border-b-2 border-gray-400">
            </li>
            <li class="w-80 mx-auto">
                <button type="submit" class="bg-gray-700 px-4 py-2 text-white rounded-full w-80">Log-in</button>
            </li>
            <li class="mt-5">
                <a href="/auth/register" class="text-sky-600 ms-5 hover:underline hover:cursor-pointer">Dont Have Any Account? Register Now</a>
            </li>
        </ul>
    </form>
</div>
@endsection

@section('footer')