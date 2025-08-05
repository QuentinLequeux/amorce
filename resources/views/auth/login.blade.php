<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @vite(['resources/js/app.js', 'resources/css/app.css'])
</head>
<body class="font-sans antialiased min-h-screen flex items-center justify-center bg-yellow2">
<div class="bg-white p-10 rounded-xl w-full max-w-md shadow-2xl">
    <h1 class="font-bold text-center text-3xl" aria-level="1" role="heading">
        Amorce
    </h1>
    <div class="w-32 border-b-2 mx-auto mt-6 rounded"></div>
    <form method="POST" action="/login">
        @csrf
        <div>
            <div class="flex flex-col mt-6">
                <label class="mb-1" for="email">
                    Email
                </label>
                <input class="border rounded p-2"
                       type="email"
                       id="email"
                       name="email"
                       placeholder="john.doe@example.com"
                       required>
                <span class="text-red-500">
                        @error('email')
                    {{ $message }}
                    @enderror
                    </span>
            </div>
            <div class="flex flex-col mt-6 mb-6">
                <label class="mb-1" for="password">
                    Password
                </label>
                <input class="border rounded p-2"
                       type="password"
                       id="password"
                       name="password"
                       placeholder="********"
                       required>
                <span class="text-red-500">
                        @error('password')
                    {{ $message }}
                    @enderror
                    </span>
            </div>
        </div>
        <label for="remember">
            <input type="checkbox"
                   id="remember"
                   name="remember">
            <span>Remember&nbsp;me</span>
        </label>
        <div class="flex justify-center mt-6 mb-4">
            <x-button>Login</x-button>
        </div>
        <a class="flex justify-center" href="/forgot-password" title="">
            Mot de passe oubli&eacute;&nbsp;?
        </a>
    </form>
</div>
</body>
</html>
