<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Salones') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
            <form action="{{ route('classrooms.store') }}" method="POST">
                @csrf
                <x-ts-input name="name" label="Nombre" hint="Ingrese el nombre del salón" required autofocus autocomplete="off"/>
                @if ($errors->has('name'))
                    <span class="text-danger">{{ $errors->first('name') }}</span>
                @endif
                <x-ts-select.native name="grade_level" :options="$levels" select="label:name|value:id" required/>
                <x-ts-button type="submit" class="my-4" color="sky">Agregar Salon</x-ts-button>
            </form>
        </div>
    </div>
</x-app-layout>
