<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Grados') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
            <form action="{{ route('grade-levels.store') }}" method="POST">
                @csrf
                <x-ts-input name="name" label="Nombre" hint="Ingrese el nombre del grado" required autofocus autocomplete="off"/>
                @if ($errors->has('name'))
                    <span class="text-danger">{{ $errors->first('name') }}</span>
                @endif
                <x-ts-button type="submit" class="my-4" color="sky">Agregar Grado</x-ts-button>
            </form>
        </div>
    </div>
</x-app-layout>
