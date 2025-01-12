<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Niños') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
            <form action="{{ route('child.store') }}" method="POST">
                @csrf
                <div class="mb-2">
                    <x-ts-input name="name" label="Nombre" hint="Ingrese el nombre del niño" required autofocus autocomplete="off"/>
                </div>
                @if ($errors->has('name'))
                    <span class="text-danger">{{ $errors->first('name') }}</span>
                @endif
                <div class="mb-3">
                    <x-ts-date name="birthday" label="Fecha de nacimiento" format="DD [de] MMMM [del] YYYY" />
                </div>
                <div class="mb-2">
                    <x-ts-select.native name="grade_level" label="Grado" :options="$levels" select="label:name|value:id" />
                </div>
                <x-ts-button type="submit" class="my-4" color="sky">Registrar niño</x-ts-button>
            </form>
        </div>
    </div>
</x-app-layout>
