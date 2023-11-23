@extends('app')
@section('content')
    <div class="h-screen bg-blue-50 flex flex-col items-center justify-center gap-4">
        <div class="w-full px-10 flex flex-row items-center justify-center">
            <img src="https://logospng.org/download/laravel/logo-laravel-icon-1024.png" class="h-20 w-20 object-contain" alt="laravel-images-logo">
            <img src="https://logos-world.net/wp-content/uploads/2021/02/Docker-Symbol.png" class="h-28 w-28 object-contain" alt="docker-images-logo">
            <img src="https://logos-download.com/wp-content/uploads/2016/09/Nginx_logo.png" class="h-10 object-contain" alt="nginx-images-logo">
        </div>

        <div class="flex flex-col gap-2 items-center justify-center mb-5">
            <h1 class="text-4xl font-bold">Congratulations! 🫡</h1>
            <p class="opacity-70">You already succeed running laravel + nginx inside of docker container </p>
        </div>

        <div class="flex flex-col items-center gap-2">
            <a class="bg-sky-600 px-5 py-2 rounded shadow text-white font-semibold" href="/docs">Try to figure out what's going on under the hood 👉</a>
            <a class="text-sky-700 font-semibold underline" href="https://faidfadjri.github.io/" target="_blank">Follow me</a>
        </div>
    </div>
@endsection
