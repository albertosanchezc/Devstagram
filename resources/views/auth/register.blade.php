@extends('layouts.app')

@section('titulo')
    Regístrate en DevStagram
@endsection

@section('contenido')
    <div class="md:flex md:justify-center md:gap-10 md:items-center">
        <div class="md:w-6/12 p-2">
            <img src="{{ asset('img/registrar.jpg') }}" alt="Imagen Registro Usuarios">
        </div>

        <div class="4">
            <form action="{{ route('register') }}" method="POST">
                @csrf
                <div class="mb-5">
                    <label class="mb-2 block uppercase text-gray-500 font-bold" for="name">
                        Nombre
                    </label>
                    <input class="border p-3 w-full rounded-lg @error('name') border-red-500 @enderror" type="text"
                        name="name" placeholder="Tu Nombre" id="name" value="{{ old('name') }}">
                    @error('name')
                        <p class="bg-red-500 rounded-lg text-white my-2 text-sm p-2 text-center">
                            {{ str_replace('name', 'nombre', $message) }}</p>
                    @enderror
                </div>

                <div class="mb-5">
                    <label class="mb-2 block uppercase text-gray-500 font-bold" for="username">
                        Username
                    </label>
                    <input class="border p-3 w-full rounded-lg @error('username') border-red-500 @enderror" type="text"
                        name="username" placeholder="Tu Nombre de Usuario" id="username" value="{{ old('username') }}">
                    @error('username')
                        <p class="bg-red-500 rounded-lg text-white my-2 text-sm p-2 text-center">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-5">
                    <label class="mb-2 block uppercase text-gray-500 font-bold" for="email">
                        Email
                    </label>
                    <input class="border p-3 w-full rounded-lg @error('email') border-red-500 @enderror" type="text"
                        name="email" placeholder="Tu Email de Registro" id="email" 
                        value="{{ old('email') }}">

                    @error('email')
                        <p class="bg-red-500 rounded-lg text-white my-2 text-sm p-2 text-center">{{ $message }}</p>
                    @enderror
                </div>


                <div class="mb-5">
                    <label class="mb-2 block uppercase text-gray-500 font-bold" for="password">
                        Password
                    </label>
                    <input class="border p-3 w-full rounded-lg @error('password') border-red-500 @enderror" type="password" name="password" placeholder="Tu Password de Registro" id="password">

                    @error('password')
                        <p class="bg-red-500 rounded-lg text-white my-2 text-sm p-2 text-center">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-5">
                    <label class="mb-2 block uppercase text-gray-500 font-bold" for="password_confirmation">
                        Repetir Password
                    </label>
                    <input class="border p-3 w-full rounded-lg" type="password" name="password_confirmation"
                        placeholder="Repite tu Password" id="password_confirmation">
                </div>

                <input type="submit" value="Crear Cuenta"
                    class="bg-sky-600 hover:bg-sky-700 transition-colors cursor-pointer uppercase font-bold w-full p-3 text-white rounded-lg">
            </form>
        </div>


    </div>
@endsection
