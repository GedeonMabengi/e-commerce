<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100">

<!-- En-tête -->
<header class="bg-white shadow">
    <nav class="bg-white shadow-md">
        <div class="container mx-auto px-6 py-4 flex justify-between items-center">
          <div class="text-2xl font-bold text-gray-800">kbkl</div>
          <div class="w-1/2">
            <input 
              type="text" 
              placeholder="Search for products..." 
              class="w-full py-2 px-4 rounded-md border border-gray-300 focus:outline-none focus:ring focus:ring-blue-300"
            />
          </div>
          <div class="space-x-6">
            @if (Route::has('login'))
            <nav class="-mx-3 flex flex-1 justify-end">
                @auth
                    <a
                        href="{{ url('/dashboard') }}"
                        class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] "
                    >
                        Dashboard
                    </a>
                @else
                    <a
                        href="{{ route('login') }}"
                        class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] "
                    >
                        Log in
                    </a>
        
                    @if (Route::has('register'))
                        <a
                            href="{{ route('register') }}"
                            class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] "
                        >
                            Register
                        </a>
                    @endif
                @endauth
            </nav>
        @endif
        
          </div>
        </div>
      </nav>
</header>
@yield('content')
<!-- Pied de page -->
<footer class="bg-white py-4">
    <div class="container mx-auto text-center">
        <p class="text-gray-600">© 2024 Mon E-commerce. Tous droits réservés.</p>
    </div>
</footer>
</body>
</html>