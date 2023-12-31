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
                    <a href="{{route('index')}}">Carboss Pinturas</a>
                </h1>
                @auth
                    <nav class="flex flex-col md:flex-row gap-6 items-center">
                        @if(\Illuminate\Support\Str::startsWith(request()->path(), 'client/',)||\Illuminate\Support\Facades\Route::is('index'))
                            @if (isset($orden_seleccionada))
                                <a href="{{ route('client.price.details') }}" class="block text-center md:inline font-bold uppercase text-gray-600 text-sm mb-5 md:mb-0">{{$orden_seleccionada->nombre}}</a>
                            @endif
                            <a href="{{ route('client.price.add') }}" class="block text-center md:inline font-bold uppercase text-gray-600 text-sm mb-5 md:mb-0">Crear orden</a>
                            <a href="{{ route('client.price') }}" class="block text-center md:inline font-bold uppercase text-gray-600 text-sm mb-5 md:mb-0">Cotizaciones</a>
                            <a href="{{ route('client.index') }}" class="block text-center md:inline font-bold uppercase text-gray-600 text-sm mb-5 md:mb-0">Productos</a>
                        @endif
                        <h2 class="block text-center md:inline font-black uppercase  text-sm mb-5 md:mb-0">{{ Auth::user()->name }}</h2>
                        <a href="{{ route('logout') }}" class="block text-center md:inline font-bold uppercase text-gray-600 text-sm mb-5 md:mb-0">Cerrar sesion</a>
                    </nav>
                @endauth
                @guest
                    <nav class="flex flex-col md:flex-row gap-6 items-center">
                        <a href="/login" class="block text-center md:inline font-bold uppercase text-gray-600 text-sm mb-5 md:mb-0">Iniciar sesion</a>
                        <a href="/register" class="block text-center md:inline font-bold uppercase text-gray-600 text-sm mb-5 md:mb-0">Crear cuenta</a>
                    </nav>
                @endguest
            </div>
        </header>


        <main class="container mx-auto mt-10">
            <h2 class="font-black mb-10 text-center text-3xl">
                @yield('titulo')
            </h2>
            @yield('contenido')
        </main>

        <footer class="mt-10 text-center p-5 text-gray-500 font-bold uppercase">
            Carboss Pinturas - Todos los derechos reservados {{ now()->year }}
        </footer>
    </body>
</html>
