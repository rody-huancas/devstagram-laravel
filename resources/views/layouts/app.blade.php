<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>DevStagram - @yield('titulo')</title>
        @vite('resources/css/app.css')
        @vite('resources/js/app.js')

    </head>
    <body class="bg-gray-100">
        
        <header class="p-5 border-b bg-white shadow">
            <div class="container mx-auto flex justify-between items-center">
                <h1 class="text-3xl font-black">DevStagram</h1>

                <nav class="flex items-center gap-3">
                    <a href="#" class="font-bold uppercase text-gray-600">Inicio de Sesión</a>
                    <a href="#" class="font-bold uppercase text-gray-600">Registrarse</a>
                </nav>
            </div>
        </header>

        <main class="container mx-auto mt-10">
            <h2 class="font-black text-center text-3xl mb-10">@yield('titulo')</h2>
            @yield('contenido')
        </main>

        <footer class="text-center p-5 text-gray-500 font-bold uppercase">
            Devstagram - Todos los derechos reservados {{now()->year}}
        </footer>

    </body>
</html>