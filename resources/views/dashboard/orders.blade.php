@extends('layouts.sidebar')

@section('title', 'ordersTable')

@section('content')
    <div class="container w-full h-screen px-10">
        <table class="mx-auto mt-16">
            <tr>
                <th class="border-b-2 border-black px-2 text-sm">Order's Id</th>
                <th class="border-b-2  border-black px-2 text-sm">User's Id</th>
                <th class="border-b-2  border-black px-12 text-sm">Product name</th>
                <th class="border-b-2 border-black px-12 text-sm">Created At</th>
                <th class="border-b-2 border-black px-12 text-sm">Deliver Time</th>
                <th class="border-b-2 border-black px-12 text-sm">Location</th>
                <th class="border-b-2 border-black text-sm">Post Code</th>
                <th class="border-b-2 border-black px-12 text-sm">Price</th>
            </tr>
            <tr>
                @if (count($orders) > 0)                    
                    @foreach ($orders as $order)
                    <td class="text-center border-b-2">{{ $order['id'] }}</td>
                    <td class="text-center border-b-2">{{ $order['id_user'] }}</td>
                    <td class="text-center border-b-2">{{ $order['product_name'] }}</td>
                    <td class="text-center border-b-2">{{ $order['created_at'] }}</td>
                    @if (session('success'))
                        <script>
                            alert(success);
                        </script>
                    @endif
                    @if ($order['deliver_time'] !== null)
                            <td class="text-center border-b-2">{{ $order['deliver_time'] }}</td>  
                    @else
                            <td class="text-center border-b-2">
                            <form action="{{ route('setDeliver', ['id' => $order['id']]) }}" method="post">
                                @method('PUT')
                                @csrf

                                <input type="datetime-local" name="time" id="time">
                                <button type="submit" onclick="return confirm('Are you sure to set this delivery time?')" class="bg-sky-400 px-4 text-white rounded-full">set</button>
                            </form>
                        </td>
                    @endif
                    <td class="text-center border-b-2">{{ $order['location'] }}</td>
                    <td class="text-center border-b-2">{{ $order['post_code'] }}</td>
                    <td class="text-center border-b-2">{{ $order['price'] }}</td>
                    @endforeach
                @else
                    <p class="absolute top-32 start-2/4 text-gray-400">No Orders Yet. . .</p>
                @endif
            </tr>
        </table>
    </div>
@endsection