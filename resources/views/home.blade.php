@extends('layouts.app')

@section('titulo')
    Pagina Principal
@endsection

{{-- forelse realiza el forEach y si no hay nada aplica el empty --}}
@section('contenido')

    <x-listar-post :posts="$posts" />





@endsection
