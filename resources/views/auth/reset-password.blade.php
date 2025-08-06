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
        <h1 class="font-bold text-center text-3xl">
            R&eacute;initialiser le mot de passe
        </h1>
        <div class="w-32 border-b-2 mx-auto mt-6 rounded"></div>
        <form class="flex flex-col" method="POST" action="/reset-password">
            @csrf
            <input type="hidden" name="token" value="{{ $token }}">
            <input type="hidden" name="email" value="{{ $email }}">
            <div class="flex flex-col mb-2 mt-6">
                <label class="mb-2" for="password">
                    Mot de passe
                </label>
                <input class="border p-2 rounded" type="password" name="password" id="password" placeholder="********" required>
            </div>
            <div class="flex flex-col mb-6">
                <label class="mb-2" for="password_confirmation">
                    Confirmer le mot de passe
                </label>
                <input class="border p-2 rounded" type="password" name="password_confirmation" id="password_confirmation" placeholder="********" requuired>
            </div>
            <x-button>
                R&eacute;initialiser
            </x-button>
        </form>
    </div>
</body>
</html>
