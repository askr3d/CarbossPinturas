@extends('layouts.admin.app')

@section('titulo')
    Bienvenido, {{ Auth::user()->name }}
@endsection
@section('contenido')
    <p class="text-center font-mono text-xs">Estás logeado como {{ Auth::user()->email }}</p>
@endsection