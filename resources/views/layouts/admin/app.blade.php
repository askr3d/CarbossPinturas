<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Laravel</title>
        <!--Este archivo importa las utilerias de tailwind-->
        @vite('resources/css/app.css')


    </head>
    <body class="bg-gray-300">

        

        <div class="container flex justify-between">

            <div class="w-1/6 h-screen bg-gray-950 p-5 flex flex-col justify-between">

                <div class="flex flex-col justify-between gap-5">
                    <span class="flex flex-col gap-4">
                        <h1 class="text-4xl font-bold text-center text-white mb-10 md:mb-0">
                            <a href="/">Carboss Pinturas</a>
                        </h1>
                        <h2 class="block text-center text-gray-400 md:inline font-black uppercasetext-sm mb-5 md:mb-0">{{ Auth::user()->name }}</h2>
                    </span>
                    <nav class="flex flex-col justify-between items-center p-6 gap-4">
                        {{-- Aqui van las categorias - entidades --}}
                        <a href="#" class="flex justify-center border-2 border-sky-400 gap-2 shadow-sm shadow-gray-600 hover:shadow-cyan-400 hover:shadow-lg bg-sky-400 rounded-md w-full text-center p-2">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 10.5V6a3.75 3.75 0 10-7.5 0v4.5m11.356-1.993l1.263 12c.07.665-.45 1.243-1.119 1.243H4.25a1.125 1.125 0 01-1.12-1.243l1.264-12A1.125 1.125 0 015.513 7.5h12.974c.576 0 1.059.435 1.119 1.007zM8.625 10.5a.375.375 0 11-.75 0 .375.375 0 01.75 0zm7.5 0a.375.375 0 11-.75 0 .375.375 0 01.75 0z" />
                            </svg>
                            <p class="font-medium">
                                Productos
                            </p>
                        </a>
                        <a href="#" class="flex justify-center border-2 border-rose-500 gap-2 shadow-sm shadow-gray-600 hover:shadow-pink-600 hover:shadow-lg bg-rose-500 rounded-md w-full text-center p-2">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M9.53 16.122a3 3 0 00-5.78 1.128 2.25 2.25 0 01-2.4 2.245 4.5 4.5 0 008.4-2.245c0-.399-.078-.78-.22-1.128zm0 0a15.998 15.998 0 003.388-1.62m-5.043-.025a15.994 15.994 0 011.622-3.395m3.42 3.42a15.995 15.995 0 004.764-4.648l3.876-5.814a1.151 1.151 0 00-1.597-1.597L14.146 6.32a15.996 15.996 0 00-4.649 4.763m3.42 3.42a6.776 6.776 0 00-3.42-3.42" />
                            </svg>                              
                            <p class="font-medium">
                                Servicios
                            </p>
                        </a>
                        
                    </nav>
                </div>

                <a href="{{ route('logout') }}" class="block text-center md:inline font-bold uppercase text-neutral-400 text-sm mb-5 md:mb-0 hover:text-neutral-200">Cerrar sesion</a>
                
            </div>
            <div class="w-5/6">
                <main class="container mx-auto mt-10">
                    <h2 class="font-black mb-10 text-center text-3xl">
                        @yield('titulo')
                    </h2>
                    @yield('contenido')
                </main>
            </div>
        </div>

    </body>
</html>

