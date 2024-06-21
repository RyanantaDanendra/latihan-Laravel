@extends('layouts.sidebar')

@section('title', 'dashboard')

@section('name')
    
@section('content')
@if (session('alert'))
<script>
    alert('{{session('alert')}}')
</script>
@endif
    <div class="container w-full min-h-screen">
        <div class="cards flex pt-32">
            <a href="{{ route('usersTable') }}" class="ms-40 hover:scale-90 duration-300 ease-out"><div class="card w-72 h-48 pt-10 bg-blue-800 text-white shadow-xl shadow-black"><h3 class="text-xl text-center font-bold">Total User Registered <p class="text-3xl mt-7">{{ $totalUser }}</p></h3></div></a>
            <a href="{{ route('productsTable') }}"><div class="card ms-40 hover:scale-90 duration-300 ease-out w-72 h-48 pt-10 bg-red-500 text-white shadow-xl shadow-black"><h3 class="text-xl text-center font-bold">Total Products Registered <p class="text-3xl mt-7">{{ $totalProducts }}</p></h3></div></a>
        </div>
        <div class="card w-72 h-48 pt-2 mt-5 mx-auto bg-yellow-400 text-white shadow-xl shadow-black hover:scale-90 duration-300 ease-out"><h3 class="text-xl text-center font-bold mt-10">Total Orders<p class="text-3xl mt-7">{{ $totalOrders }}</p></h3></div>
    </div>
@endsection