<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Salones') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <x-ts-button class="mb-4" color="sky" icon="plus" position="right" href="{{ route('classrooms.create') }}">Agregar</x-ts-button>
            <livewire:classrooms.table/>
        </div>
    </div>
</x-app-layout>
