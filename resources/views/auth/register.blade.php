<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Registro</title>
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
                    <a href="/login" class="block text-center md:inline font-bold uppercase text-gray-600 text-sm mb-5 md:mb-0">Iniciar sesion</a>
                    <a href="/register" class="block text-center md:inline font-bold uppercase text-gray-600 text-sm mb-5 md:mb-0">Crear cuenta</a>
                </nav>
            </div>
        </header>

        <main class="container mx-auto mt-10">
            <h2 class="font-black mb-10 text-center text-3xl">
                Crear cuenta
            </h2>
            <div class="flex justify-center items-center ">
                <form action="/register" method="POST">
                    @csrf
                    <input type="text" name="name" placeholder="Nombre" value="{{ old('name') }}">
                    @error('name')
                        <div style="color: red;">
                            {{ $message }}
                        </div>
                    @enderror
                    <input type="email" name="email" placeholder="Email" value="{{ old('email') }}">
                    @error('email')
                        <div style="color: red;">
                            {{ $message }}
                        </div>
                    @enderror
                    <input type="password" name="password" placeholder="Contraseña" >
                    @error('password')
                        <div style="color: red;">
                            {{ $message }}
                        </div>
                    @enderror
                    <input type="password" name="password_confirmation" placeholder="Confirmar contraseña">
                    @error('password_confirmation')
                        <div style="color: red;">
                            {{ $message }}
                        </div>
                    @enderror
                    <br>
                    <input type="submit" name="Registrarse">
                </form>
            <div>
        </main>

        <footer class="mt-10 text-center p-5 text-gray-500 font-bold uppercase">
            Carboss Pinturas - Todos los derechos reservados {{ now()->year }}
        </footer>
    </body>
</html>
