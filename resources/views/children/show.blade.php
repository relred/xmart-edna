<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Niño') }}
        </h2>
    </x-slot>

    <div class="py-8">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
            <x-ts-link class="mb-5" href="{{ route('child.index') }}">
                < Volver a la tabla
            </x-ts-link>
            <div class="ml-5">
                @if($child->photo)
                    <img class="rounded-full w-40 h-40 object-cover" src="{{ Storage::url($child->photo) }}" alt="Guardian photo">
                @else
                    <img class="rounded-full w-40 h-40 object-cover" src="{{ asset('images/user.png') }}" alt="Guardian photo">
                @endif
            </div>
            <div class="flex">
                <svg class="mt-1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" width="28" height="28" stroke-width="2">
                    <path d="M12 12m-9 0a9 9 0 1 0 18 0a9 9 0 1 0 -18 0"></path>
                    <path d="M9 10l.01 0"></path>
                    <path d="M15 10l.01 0"></path>
                    <path d="M9.5 15a3.5 3.5 0 0 0 5 0"></path>
                    <path d="M12 3a2 2 0 0 0 0 4"></path>
                </svg>
                <h3 class="text-2xl font-bold ml-2">
                    {{ $child->name }}
                </h3>
            </div>
            @if ($child->gradeLevel)
                <h3 class="text-lg ml-5">
                    <span class="font-bold">Grado: </span> <x-ts-link href="{{ route('grade-levels.show', $child->gradeLevel->id) }}">{{ $child->gradeLevel->name }}</x-ts-link>                
                </h3>
                <h3 class="text-lg mb-6 ml-5">
                    <span class="font-bold">Salón: </span> <x-ts-link href="{{ route('classrooms.show', $child->gradeLevel->classroom->id) }}">{{ $child->gradeLevel->classroom->name }}</x-ts-link>
                </h3>
            @else
                <p class="my-4">Sin grado asignado</p>
            @endif
            <div class="mb-3">
                <x-ts-button color="emerald" icon="camera" position="right" href="{{ route('child.add-photo.view', $child->id) }}">Agregar Fotografía</x-ts-button>
            </div>
            <div class="mb-8">
                <x-ts-card>
                    <div class="flex justify-between items-center">
                        <h3 class="text-xl font-bold">
                            Adultos Autorizados
                        </h3>
                        <x-ts-button icon="user" position="right" href="{{ route('child.add-guardian', $child) }}">Agregar Autorizado</x-ts-button>
                    </div>
                    @if ($child->guardians->count() > 0)
                        <table class="w-full text-md rounded mb-4">
                            <tbody>
                                <tr class="border-b">
                                    <th class="text-left p-3 px-5">Nombre</th>
                                    <th class="text-left p-3 px-5"></th>
                                    <th></th>
                                </tr>
                                @foreach ($child->guardians as $guardian)
                                    <tr class="border-b">
                                        <td class="p-3 px-5">
                                            <p>{{ $guardian->name }}</p>
                                        </td>
                                        <td class="p-3 px-5 flex justify-end">
                                            <x-ts-button.circle icon="chevron-double-right" color="amber" href="{{ route('guardians.show', $guardian->id) }}"/>
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
                <form action="{{ route('child.destroy', $child->id) }}" method="POST" style="display: inline;">
                    @csrf
                    @method('DELETE')
                    <x-ts-button icon="trash" position="right" color="red" type="submit" onclick="return confirm('¿Esta seguro de hacer esta acción?');">Borrar</x-ts-button>
                </form>
            </x-ts-card>
        </div>
    </div>
</x-app-layout>
