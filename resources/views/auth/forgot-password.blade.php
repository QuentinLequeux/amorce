<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Mot de passe oubli&eacute; - Amorce</title>
    <!-- Favicon -->
    <link rel="icon" type="image/svg" href="{{ asset('favicon.svg') }}">
    <link rel="apple-touch-icon" type="image/svg" href="{{ asset('favicon.svg') }}">
    <link rel="apple-touch-icon-precomposed" type="image/svg" href="{{ asset('favicon.svg') }}">
    @vite(['resources/js/app.js', 'resources/css/app.css'])
</head>
<body class="font-sans antialiased min-h-screen flex items-center justify-center bg-yellow2">
<div class="bg-white p-10 rounded-xl w-full max-w-md shadow-2xl max-sm:w-[90%]">
    <h1 class="font-bold text-center text-3xl" aria-level="1" role="heading">
        R&eacute;initialiser le mot de passe
    </h1>
    <div class="w-32 border-b-2 mx-auto mt-6 rounded"></div>
    <form method="POST" action="/forgot-password">
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
                @if(session('success'))
                    <p class="mt-2">
                        {{ session('success') }}
                    </p>
                @endif
                <span class="text-red-500">
                        @error('email')
                    {{ $message }}
                    @enderror
                    </span>
            </div>
        </div>
        <div class="flex justify-center mt-6 mb-2">
            <button title="Envoyer" class="mt-2 bg-yellow2 px-10 py-2 rounded-xl text-black font-bold" type="submit">
                Envoyer
            </button>
        </div>
        <a class="flex justify-center" href="/login" title="Retour">
            Retour
        </a>
    </form>
</div>
</body>
</html>
