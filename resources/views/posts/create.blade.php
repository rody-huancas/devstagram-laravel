@extends('layouts.app')

@section('titulo')
    Crear una nueva publicación
@endsection

{{-- Cargar hoja de estilos de dropzone --}}
@push('styles')
    <link rel="stylesheet" href="https://unpkg.com/dropzone@5/dist/min/dropzone.min.css" type="text/css" />
@endpush

@section('contenido')
    <div class="md:flex md:items-center">
        <div class="md:w-1/2 px-10">
            <form action="{{route('imagenes.store')}}" method="POST" id="dropzone" enctype="multipart/form-data"
                class="dropzone border-dashed border-2 w-full h-96 rounded flex flex-col justify-center items-center"    
            >
                @csrf
            </form>
        </div>

        <div class="md:w-1/2 p-10  bg-white rounded-lg shadow-xl mt-10 md:mt-0">
            <form action="{{ route('register') }}" method="POST" novalidate>
                @csrf
                {{-- Título --}}
                <div class="mb-5">
                    <label for="titulo" class="mb-2 block uppercase text-gray-500 font-bold">Título</label>
                    <input 
                        type="text" 
                        id="titulo" 
                        name="titulo" 
                        placeholder="Título de la publicación" 
                        class="border p-3 w-full rounded-lg @error('titulo') border-red-500 @enderror"
                        value="{{old('titulo')}}"
                    />

                    @error('name')
                        <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{$message}}</p>
                    @enderror
                </div>

                {{-- Descripción --}}
                <div class="mb-5">
                    <label for="descripcion" class="mb-2 block uppercase text-gray-500 font-bold">Descripción</label>
                    <textarea 
                        id="descripcion" 
                        name="descripcion" 
                        placeholder="Descripción de la publicación" 
                        class="border p-3 w-full rounded-lg @error('descripcion') border-red-500 @enderror"
                    >{{old('descripcion')}}</textarea>

                    @error('name')
                        <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{$message}}</p>
                    @enderror
                </div>

                {{-- Botón --}}
                <input 
                    type="submit" 
                    value="Crear Publicación"
                    class="bg-sky-600 hover:bg-sky-700 transition-colors cursor-pointer uppercase font-bold w-full p-3 text-white rounded-lg"
                />
            </form>
        </div>
    </div>
@endsection