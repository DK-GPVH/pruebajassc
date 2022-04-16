<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('INICIO') }}
        </h2>
    </x-slot>
    <x-slot name="yield">
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <p> Bienvenido al panel administrativo de JASSC con el siguiente boton tendra acceso a todas las funciones administrativas:</p>
                <a class="link-primary" style="display:inline-block;background:blue;border-radius:2em; padding:0.5em; margin:1em 2em 1em 15em; color:aqua;" href="{{ url('/adminjassc') }}" >Adminjassc</a></button> 
                <br>
            </div>
            
        </div>

    </div>
    </x-slot>
</x-app-layout>
