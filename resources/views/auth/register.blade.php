@extends('layouts.noNavbar')

@section('title', 'register')

@section('content')
    <div class="container w-full h-screen flex justify-center pt-12">
        <div class="box w-96 bg-gray-700 rounded-lg shadow-lg shadow-black" style="height: 450px;">
            <img src="../assets/register2.png" alt="" class="mt-20">
        </div>
        <div class="form w-96 rounded-lg shadow-lg shadow-black" style="height:450px;">
            <form action="register" method="POST" enctype="multipart/form-data">
                @csrf

                <ul>
                    <li>
                        <div class="profile w-32 h-32 mx-auto bg-center rounded-full border-2 bg-cover border-sky-500 text-center" id="preview">
                            <input onchange="previewFile()" class="mt-12 text-xs hover:cursor-pointer" type="file" name="image" id="image">
                        </div>  
                        <p id="text" class="flex justify-center">Place your profile picture</p>
                        <script>
                            function previewFile() {
                                var preview = document.getElementById('preview');
                                var file = document.querySelector('input[type=file]').files[0];
                                var reader = new FileReader();
                                var fileInput = document.querySelector('input[type=file]');
                                var text = document.getElementById('text');
                                var name = document.getElementById('name');

                                reader.onloadend = function () {
                                    preview.style.backgroundImage = "url(" + reader.result + ")";
                                    fileInput.style.marginTop = "140px";
                                    text.style.display = "none";
                                    name.style.marginTop = "50px";
                                }

                                if(file) {
                                    reader.readAsDataURL(file);
                                } else {
                                    preview.style.backgroundImage = "";
                                }
                            }
                        </script>
                    </li>
                    <li class="w-80 mx-auto text-center my-5" id="name">
                        <input type="text" name="name" id="name" placeholder="Your Name. . ."  class="w-64 mx-auto bg-transparent border-b-2 border-gray-400 @error('name') is-invalid @enderror">
                        @error('name')
                        <div class="alert alert-danger text-red-500">{{ $message }}</div>
                        @enderror
                    </li>
                    <li class="w-80 mx-auto text-center my-5">
                        <input type="text" name="Username" id="Username" placeholder="Username" class="w-64 mx-auto bg-transparent border-b-2 border-gray-400 @error('Username') is-invalid @enderror">
                        @error('Username')
                        <div class="alert alert-danger text-red-500">{{ $message }}</div>
                        @enderror
                    </li>
                    <li class="w-80 mx-auto text-center my-5">
                        <input type="password" name="password" id="password" placeholder="Password" class="w-64 mx-auto bg-transparent border-b-2 border-gray-400 @error('password') is-invalid @enderror">
                        @error('password')
                        <div class="alert alert-danger text-red-500">{{ $message }}</div>
                        @enderror
                    </li>
                    <li class="w-80 mx-auto text-center my-5">
                        <input type="email" name="email" id="email" placeholder="Email" class="w-64 mx-auto bg-transparent border-b-2 border-gray-400 @error('email') is-invalid @enderror">
                        @error('email')
                        <div class="alert alert-danger text-red-500">{{ $message }}</div>
                        @enderror
                    </li>
                    <li class="w-96">
                        <button type="submit" class="bg-gray-700 w-64 ms-16 py-2 text-white rounded-full">Register</button>
                    </li>
                    <li class="mt-5 text-center">
                        <a href='/auth/login' class="text-sky-600 mt-3 hover:underline hover:cursor-pointer">Allready Have an Account? Log-in</a>
                    </li>
                </ul>
            </form>
        </div>
    </div>
@endsection
