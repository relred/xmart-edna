<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Adulto Autorizado | Modificar Fotografía') }}
        </h2>
    </x-slot>

    <div class="py-8">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
            <x-ts-link class="mb-5" href="{{ route('guardians.show', $guardian->id) }}">
                < Volver al perfil
            </x-ts-link>
            <x-ts-card>
                <center>
                    <div>
                        @if($guardian->photo)
                            <img class="rounded-full w-40 h-40 object-cover" src="{{ asset('storage/' . $guardian->image_path) }}" alt="Guardian photo">
                        @else
                            <img class="rounded-full w-40 h-40 object-cover" src="{{ asset('images/user.png') }}" alt="Guardian photo">
                        @endif
                        <h3 class="text-2xl font-bold ml-2">
                            {{ $guardian->name }}
                        </h3>
                    </div>
                    <form action="{{ route('guardians.add-photo.store', $guardian->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="my-5">
                            <input type="file" name="photo" id="photo" accept="image/*">
                        </div>
                        <div class="mb-3 w-full">
                            <x-ts-button type="submit">Subir</x-ts-button>
                        </div>
                    </form>
                </center>
            </x-ts-card>
        </div>
    </div>
</x-app-layout>
