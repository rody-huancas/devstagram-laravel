@extends('layouts.app')

@section('titulo')
    Inicia Sesión En DevStagram
@endsection

@section('contenido')
    <div class="md:flex md:justify-center md:items-center md:gap-10">
        <div class="md:w-6/12 p-5">
            <img src="{{asset('img/login.jpg')}}" alt="Imagen de login">
        </div>
        
        <div class="md:w-4/12 bg-white p-6 rounded-lg shadow-xl">
            <form action="{{ route('login') }}" method="POST" novalidate>
                @csrf
                
                {{-- el 'mensaje' viene del store del controlador de login --}}
                {{-- Si hay un mensaje, que lo muestre --}}
                @if (session('mensaje'))
                    <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">
                        {{ session('mensaje') }}
                    </p>
                @endif

                {{-- Correo electrónico --}}
                <div class="mb-5">
                    <label for="email" class="mb-2 block uppercase text-gray-500 font-bold">Correo Electrónico</label>
                    <input 
                        type="email" 
                        id="email" 
                        name="email" 
                        placeholder="Tu correo electrónico"  
                        class="border p-3 w-full rounded-lg @error('email') border-red-500 @enderror"
                        value="{{old('email')}}"
                    />

                    @error('email')
                        <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{$message}}</p>
                    @enderror
                </div>

                {{-- Contraseña --}}
                <div class="mb-5">
                    <label for="password" class="mb-2 block uppercase text-gray-500 font-bold">Contraseña</label>
                    <input 
                        type="password" 
                        id="password" 
                        name="password" 
                        placeholder="Tu contraseña"  
                        class="border p-3 w-full rounded-lg @error('password') border-red-500 @enderror"
                    />

                    @error('password')
                        <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{$message}}</p>
                    @enderror
                </div>

                <div class="mb-5 flex items-center gap-1">
                    <input type="checkbox" name="remember" id="remember"> <label for="remember" class="text-gray-500 text-sm">Mantener mi sesión abierta.</label>
                </div>

                {{-- Boton para iniciar sesión --}}
                <input 
                    type="submit" 
                    value="Iniciar Sesión"
                    class="bg-sky-600 hover:bg-sky-700 transition-colors cursor-pointer uppercase font-bold w-full p-3 text-white rounded-lg"
                />
            </form>
        </div>
    </div>
@endsection