<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Adulto Autorizado') }}
        </h2>
    </x-slot>

    <div class="py-8">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
            <x-ts-link class="mb-5" href="{{ route('guardians.index') }}">
                < Volver a la tabla
            </x-ts-link>
                <center>
                    <div>
                        @if($guardian->photo)
                            <img class="rounded-full w-40 h-40 object-cover" src="{{ Storage::url($guardian->photo) }}" alt="Guardian photo">
                        @else
                            <img class="rounded-full w-40 h-40 object-cover" src="{{ asset('images/user.png') }}" alt="Guardian photo">
                        @endif
                        <h3 class="text-2xl font-bold ml-2">
                            {{ $guardian->name }}
                        </h3>
                    </div>
                </center>
                <div>
                    <h3 class="text-lg ml-5">
                        <span class="font-bold">Pin: </span> <span class="uppercase">{{ $guardian->pin }}</span>
                    </h3>
                    <h3 class="text-lg mb-6 ml-5">
                        <span class="font-bold">QR: </span>
                        <img src="https://api.qrserver.com/v1/create-qr-code/?size=500x500&data={{ $guardian->qr_code }}" class="w-40 mt-2">
                    </h3>
                    <div class="mb-3">
                        <x-ts-button color="emerald" icon="camera" position="right" href="{{ route('guardians.add-photo.view', $guardian->id) }}">Agregar Fotografía</x-ts-button>
                    </div>
                </div>
            <div class="mb-8">
                <x-ts-card>
                    <div class="flex justify-between items-center">
                        <h3 class="text-xl font-bold">
                            Niños
                        </h3>
                    </div>
                    @if ($guardian->children->count() > 0)
                        <table class="w-full text-md rounded mb-4">
                            <tbody>
                                <tr class="border-b">
                                    <th class="text-left p-3 px-5">Nombre</th>
                                    <th class="text-left p-3 px-5">Nombre</th>
                                    <th class="text-left p-3 px-5"></th>
                                    <th></th>
                                </tr>
                                @foreach ($guardian->children as $child)
                                    <tr class="border-b">
                                        <td class="p-3 px-5">
                                            <p>{{ $child->name }}</p>
                                        </td>
                                        <td class="p-3 px-5">
                                            <p>{{ $child->relationship_type }}</p>
                                        </td>
                                        <td class="p-3 px-5 flex justify-end">
                                            <x-ts-button.circle icon="chevron-double-right" color="amber" href="{{ route('child.show', $child->id) }}"/>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @else
                        <p>No hay niños registrados en este salón</p>
                    @endif
                </x-ts-card>
            </div>
            <x-ts-card>
                <h3 class="text-xl font-bold mb-4">
                    Acciones
                </h3>
                <form action="{{ route('guardians.destroy', $guardian->id) }}" method="POST" style="display: inline;">
                    @csrf
                    @method('DELETE')
                    <x-ts-button icon="trash" position="right" color="red" type="submit" onclick="return confirm('¿Esta seguro de hacer esta acción?');">Borrar</x-ts-button>
                </form>
            </x-ts-card>
        </div>
    </div>
</x-app-layout>
