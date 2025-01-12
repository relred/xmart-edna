<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Adulto Autorizado') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
            <form action="{{ route('child.store-guardian', $child) }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-2">
                    <x-ts-input name="name" label="Nombre" hint="Ingrese el nombre del adulto autorizado" required autofocus autocomplete="off"/>
                </div>
                @if ($errors->has('name'))
                    <span class="text-danger">{{ $errors->first('name') }}</span>
                @endif
                <div class="mb-2">
                    <x-ts-input name="relationship_type" label="Relación" hint="Ingrese la relación que tiene con el niño" placeholder="ej. Tío, Abuela, Padre, Madre" required autocomplete="off"/>
                </div>
                <div class="mb-2">
                    <x-ts-input name="phone" label="Celular" hint="Ingrese la relación que tiene con el niño" placeholder="ej. 6865551234" required autocomplete="off"/>
                </div>
                <div class="mb-2">
                    <label for="photo" class="block">Fotografía (optional)</label>
                    <input type="file" 
                           name="photo" 
                           id="photo"
                           accept="image/*"
                           class="mt-1">
                    @error('photo')
                        <span class="text-red-500">{{ $message }}</span>
                    @enderror
                </div>
                
                <x-ts-button type="submit" class="my-4 text-center" color="sky">Registrar adulto</x-ts-button>
            </form>
        </div>
    </div>
</x-app-layout>
