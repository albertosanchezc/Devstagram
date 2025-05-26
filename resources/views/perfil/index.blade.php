@extends('layouts.app')

@section('titulo')
    Editar Perfil: {{ auth()->user()->username }}
@endsection

@section('contenido')
    <div class="md:flex md:justify-center">
        <div class="md:w-1/2 bg-white shadow p-6">
            <form method="POST" action="{{ route('perfil.store') }}" class="mt-10 md:mt-0" enctype="multipart/form-data">
                @csrf
                <div class="mb-5">
                    <label class="mb-2 block uppercase text-gray-500 font-bold" for="username">
                        Username
                    </label>
                    <input class="border p-3 w-full rounded-lg @error('username') border-red-500 @enderror" type="text"
                        name="username" placeholder="Tu Nombre de Usuario" id="username"
                        value="{{ auth()->user()->username }}">
                    @error('username')
                        <p class="bg-red-500 rounded-lg text-white my-2 text-sm p-2 text-center">
                            {{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-5">
                    <label class="mb-2 block uppercase text-gray-500 font-bold" for="email">
                        Email
                    </label>
                    <input class="border p-3 w-full rounded-lg @error('email') border-red-500 @enderror" type="text"
                        name="email" placeholder="Tu email" id="email"
                        value="{{ auth()->user()->email }}">
                    @error('email')
                        <p class="bg-red-500 rounded-lg text-white my-2 text-sm p-2 text-center">
                            {{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-5">
                    <label class="mb-2 block uppercase text-gray-500 font-bold" for="imagen">
                        Imágen Perfil
                    </label>
                    <input class="border p-3 w-full rounded-lg" type="file" name="imagen" id="imagen"
                        accept=".jpg, .jpeg, .png" />
                </div>

                <input type="submit" value="Guardar Cambios"
                    class="bg-sky-600 hover:bg-sky-700 transition-colors cursor-pointer uppercase font-bold w-full p-3 text-white rounded-lg">
            </form>
        </div>
    </div>
@endsection
