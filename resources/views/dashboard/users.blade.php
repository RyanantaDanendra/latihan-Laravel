@extends('layouts.sidebar')

@section('title', 'usersTable')

@section('content')
    <div class="container w-full h-screen">
        <a href="/dashboard/home"><svg xmlns="http://www.w3.org/2000/svg" class="text-4xl mx-5 my-5" height="1em" viewBox="0 0 512 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com --><path d="M459.5 440.6c9.5 7.9 22.8 9.7 34.1 4.4s18.4-16.6 18.4-29V96c0-12.4-7.2-23.7-18.4-29s-24.5-3.6-34.1 4.4L288 214.3V256v41.7L459.5 440.6zM256 352V256 128 96c0-12.4-7.2-23.7-18.4-29s-24.5-3.6-34.1 4.4l-192 160C4.2 237.5 0 246.5 0 256s4.2 18.5 11.5 24.6l192 160c9.5 7.9 22.8 9.7 34.1 4.4s18.4-16.6 18.4-29V352z"/></svg></a>
        <table class="mx-auto mt-12">
            <tr>
                <th class="border-b-2 border-black px-2">Id</th>
                <th class="border-b-2 border-black px-12">Name</th>
                <th class="border-b-2 border-black px-12">Username</th>
                <th class="border-b-2 border-black px-12">Email</th>
                <th class="border-b-2 border-black px-12">As</th>
                <th class="border-b-2 border-black">Status</th>
                <th class="border-b-2 border-black px-12">Action</th>
            </tr>
                @foreach ($users as $user)
                    @if ($user->status === 'aktif')                
                        <tr>
                            <td class="text-center border-b-2">{{ $user['id'] }}</td>
                            <td class="text-center border-b-2">{{ $user['name'] }}</td>
                            <td class="text-center border-b-2">{{ $user['Username'] }}</td>
                            <td class="text-center border-b-2">{{ $user['email'] }}</td>
                            <td class="text-center border-b-2">{{ $user['AS'] }}</td>
                            <td class="text-center border-b-2">{{ $user['status'] }}</td>
                            @if ($user->AS === 'user')
                                <td class="border-b-2 flex gap-3 justify-center">
                                    @if (session('alert'))
                                        <div class="alert">
                                            <script>
                                                window.confirm('{{ session('alert') }}')
                                            </script>
                                        </div>
                                    @endif
                                    <form action="{{ route('deleteUser', ['id' => $user->id]) }}" method="POST">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="" onclick="return confirm('Are You Sure To Delete This User?')">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="cursor-pointer" height="1em" viewBox="0 0 448 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com--><path d="M135.2 17.7L128 32H32C14.3 32 0 46.3 0 64S14.3 96 32 96H416c17.7 0 32-14.3 32-32s-14.3-32-32-32H320l-7.2-14.3C307.4 6.8 296.3 0 284.2 0H163.8c-12.1 0-23.2 6.8-28.6 17.7zM416 128H32L53.2 467c1.6 25.3 22.6 45 47.9 45H346.9c25.3 0 46.3-19.7 47.9-45L416 128z"/>
                                            </svg>
                                        </button>
                                    </form>
                                    <form action="{{ route('changeStatus', $user->id) }}" method="POST">
                                        @csrf
                                        <button type="submit" class="">
                                            @if ($user->status == 'aktif')
                                                <svg xmlns="http://www.w3.org/2000/svg" class=" cursor-pointer" height="1em" viewBox="0 0 640 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com --><path d="M38.8 5.1C28.4-3.1 13.3-1.2 5.1 9.2S-1.2 34.7 9.2 42.9l592 464c10.4 8.2 25.5 6.3 33.7-4.1s6.3-25.5-4.1-33.7L525.6 386.7c39.6-40.6 66.4-86.1 79.9-118.4c3.3-7.9 3.3-16.7 0-24.6c-14.9-35.7-46.2-87.7-93-131.1C465.5 68.8 400.8 32 320 32c-68.2 0-125 26.3-169.3 60.8L38.8 5.1zM223.1 149.5C248.6 126.2 282.7 112 320 112c79.5 0 144 64.5 144 144c0 24.9-6.3 48.3-17.4 68.7L408 294.5c8.4-19.3 10.6-41.4 4.8-63.3c-11.1-41.5-47.8-69.4-88.6-71.1c-5.8-.2-9.2 6.1-7.4 11.7c2.1 6.4 3.3 13.2 3.3 20.3c0 10.2-2.4 19.8-6.6 28.3l-90.3-70.8zM373 389.9c-16.4 6.5-34.3 10.1-53 10.1c-79.5 0-144-64.5-144-144c0-6.9 .5-13.6 1.4-20.2L83.1 161.5C60.3 191.2 44 220.8 34.5 243.7c-3.3 7.9-3.3 16.7 0 24.6c14.9 35.7 46.2 87.7 93 131.1C174.5 443.2 239.2 480 320 480c47.8 0 89.9-12.9 126.2-32.5L373 389.9z"/></svg>
                                            @else
                                                <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 576 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com --><path d="M288 80c-65.2 0-118.8 29.6-159.9 67.7C89.6 183.5 63 226 49.4 256c13.6 30 40.2 72.5 78.6 108.3C169.2 402.4 222.8 432 288 432s118.8-29.6 159.9-67.7C486.4 328.5 513 286 526.6 256c-13.6-30-40.2-72.5-78.6-108.3C406.8 109.6 353.2 80 288 80zM95.4 112.6C142.5 68.8 207.2 32 288 32s145.5 36.8 192.6 80.6c46.8 43.5 78.1 95.4 93 131.1c3.3 7.9 3.3 16.7 0 24.6c-14.9 35.7-46.2 87.7-93 131.1C433.5 443.2 368.8 480 288 480s-145.5-36.8-192.6-80.6C48.6 356 17.3 304 2.5 268.3c-3.3-7.9-3.3-16.7 0-24.6C17.3 208 48.6 156 95.4 112.6zM288 336c44.2 0 80-35.8 80-80s-35.8-80-80-80c-.7 0-1.3 0-2 0c1.3 5.1 2 10.5 2 16c0 35.3-28.7 64-64 64c-5.5 0-10.9-.7-16-2c0 .7 0 1.3 0 2c0 44.2 35.8 80 80 80zm0-208a128 128 0 1 1 0 256 128 128 0 1 1 0-256z"/></svg>
                                            @endif
                                        </button>
                                    </form>
                                </td>
                            @else
                                <td><p class="text-center">-</p></td>
                            @endif
                        </tr>
                    @else
                        <tr class="border-b-2">
                            <td class="text-center  text-gray-400">{{ $user['id'] }}</td>
                            <td class="text-center  text-gray-400">{{ $user['name'] }}</td>
                            <td class="text-center  text-gray-400">{{ $user['Username'] }}</td>
                            <td class="text-center  text-gray-400">{{ $user['email'] }}</td>
                            <td class="text-center  text-gray-400">{{ $user['AS'] }}</td>
                            <td class="text-center  text-gray-400">{{ $user['status'] }}</td>
                            <td class=" flex gap-3 justify-center">
                                @if (session('alert'))
                                    <div class="alert">
                                        <script>
                                            window.confirm('{{ session('alert') }}')
                                        </script>
                                    </div>
                                @endif
                                <form action="{{ route('deleteUser', ['id' => $user->id]) }}" method="POST">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="" onclick="return confirm('Are You Sure To Delete This User?')">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="cursor-pointer" height="1em" viewBox="0 0 448 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com--><path d="M135.2 17.7L128 32H32C14.3 32 0 46.3 0 64S14.3 96 32 96H416c17.7 0 32-14.3 32-32s-14.3-32-32-32H320l-7.2-14.3C307.4 6.8 296.3 0 284.2 0H163.8c-12.1 0-23.2 6.8-28.6 17.7zM416 128H32L53.2 467c1.6 25.3 22.6 45 47.9 45H346.9c25.3 0 46.3-19.7 47.9-45L416 128z"/>
                                        </svg>
                                    </button>
                                </form>
                                <form action="{{ route('changeStatus', $user->id) }}" method="POST">
                                    @csrf
                                    <button type="submit" class="">
                                        @if ($user->status == 'aktif')
                                            <svg xmlns="http://www.w3.org/2000/svg" class=" cursor-pointer" height="1em" viewBox="0 0 640 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com --><path d="M38.8 5.1C28.4-3.1 13.3-1.2 5.1 9.2S-1.2 34.7 9.2 42.9l592 464c10.4 8.2 25.5 6.3 33.7-4.1s6.3-25.5-4.1-33.7L525.6 386.7c39.6-40.6 66.4-86.1 79.9-118.4c3.3-7.9 3.3-16.7 0-24.6c-14.9-35.7-46.2-87.7-93-131.1C465.5 68.8 400.8 32 320 32c-68.2 0-125 26.3-169.3 60.8L38.8 5.1zM223.1 149.5C248.6 126.2 282.7 112 320 112c79.5 0 144 64.5 144 144c0 24.9-6.3 48.3-17.4 68.7L408 294.5c8.4-19.3 10.6-41.4 4.8-63.3c-11.1-41.5-47.8-69.4-88.6-71.1c-5.8-.2-9.2 6.1-7.4 11.7c2.1 6.4 3.3 13.2 3.3 20.3c0 10.2-2.4 19.8-6.6 28.3l-90.3-70.8zM373 389.9c-16.4 6.5-34.3 10.1-53 10.1c-79.5 0-144-64.5-144-144c0-6.9 .5-13.6 1.4-20.2L83.1 161.5C60.3 191.2 44 220.8 34.5 243.7c-3.3 7.9-3.3 16.7 0 24.6c14.9 35.7 46.2 87.7 93 131.1C174.5 443.2 239.2 480 320 480c47.8 0 89.9-12.9 126.2-32.5L373 389.9z"/></svg>
                                        @else
                                            <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 576 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com --><path d="M288 80c-65.2 0-118.8 29.6-159.9 67.7C89.6 183.5 63 226 49.4 256c13.6 30 40.2 72.5 78.6 108.3C169.2 402.4 222.8 432 288 432s118.8-29.6 159.9-67.7C486.4 328.5 513 286 526.6 256c-13.6-30-40.2-72.5-78.6-108.3C406.8 109.6 353.2 80 288 80zM95.4 112.6C142.5 68.8 207.2 32 288 32s145.5 36.8 192.6 80.6c46.8 43.5 78.1 95.4 93 131.1c3.3 7.9 3.3 16.7 0 24.6c-14.9 35.7-46.2 87.7-93 131.1C433.5 443.2 368.8 480 288 480s-145.5-36.8-192.6-80.6C48.6 356 17.3 304 2.5 268.3c-3.3-7.9-3.3-16.7 0-24.6C17.3 208 48.6 156 95.4 112.6zM288 336c44.2 0 80-35.8 80-80s-35.8-80-80-80c-.7 0-1.3 0-2 0c1.3 5.1 2 10.5 2 16c0 35.3-28.7 64-64 64c-5.5 0-10.9-.7-16-2c0 .7 0 1.3 0 2c0 44.2 35.8 80 80 80zm0-208a128 128 0 1 1 0 256 128 128 0 1 1 0-256z"/></svg>
                                        @endif
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endif
                @endforeach
        </table>
    </div>
@endsection