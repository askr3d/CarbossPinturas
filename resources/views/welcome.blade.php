<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Laravel</title>
        <!--Este archivo importa las utilerias de tailwind-->
        @vite('resources/css/app.css')


    </head>
    <body class="bg-gray-100">
        <header class="p-10 bg-white border-b shadow">
            <div class="md:flex container mx-auto justify-between items-center">
                <h1 class="text-4xl font-bold text-center mb-10 md:mb-0">
                    <a href="/">Carboss Pinturas</a>
                </h1>
                <nav class="flex flex-col md:flex-row gap-6 items-center">
                    <a href="#" class="block text-center md:inline font-bold uppercase text-gray-600 text-sm mb-5 md:mb-0">Iniciar sesion</a>
                    <a href="#" class="block text-center md:inline font-bold uppercase text-gray-600 text-sm mb-5 md:mb-0">Crear cuenta</a>
                </nav>
            </div>
        </header>

        <main class="container mx-auto mt-10">
            <h2 class="font-black mb-10 text-center text-3xl">
                Aqui va el titulo de la pagina
            </h2>
            <p class="text-center font-mono text-xs">Aqui va el contenido (Remplezar esta linea completa) con '@ yield()'</p>
        </main>

        <footer class="mt-10 text-center p-5 text-gray-500 font-bold uppercase">
            Carboss Pinturas - Todos los derechos reservados {{ now()->year }}
        </footer>
    </body>
</html>
