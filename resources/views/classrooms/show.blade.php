<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Salón') }}
        </h2>
    </x-slot>

    <div class="py-8">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
            <x-ts-link class="mb-5" href="{{ route('classrooms.index') }}">
                < Volver a la tabla
            </x-ts-link>
            <div class="flex items-center">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 21v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21m0 0h4.5V3.545M12.75 21h7.5V10.75M2.25 21h1.5m18 0h-18M2.25 9l4.5-1.636M18.75 3l-1.5.545m0 6.205 3 1m1.5.5-1.5-.5M6.75 7.364V3h-3v18m3-13.636 10.5-3.819" />
                </svg>
                  
                <h3 class="text-2xl font-bold ml-2">
                    {{ $classroom->name }}
                </h3>
            </div>
            @if ($classroom->gradeLevel)
                <h3 class="text-lg mb-6 ml-10">
                    <span class="font-bold">Grado: </span> <x-ts-link href="{{ route('grade-levels.show', $classroom->gradeLevel->id) }}">{{ $classroom->gradeLevel->name }}</x-ts-link>
                </h3>
            @else
                <p class="my-4">Sin grado asignado</p>
            @endif

            <div class="mb-8">
                <x-ts-card>
                    <h3 class="text-xl font-bold mb-4">
                        Niños del Salón
                    </h3>
                    @if ($classroom->gradeLevel && $classroom->gradeLevel->children->count() > 0)
                        <table class="w-full text-md bg-white shadow-md rounded mb-4">
                            <tbody>
                                <tr class="border-b">
                                    <th class="text-left p-3 px-5">Nombre</th>
                                    <th class="text-left p-3 px-5"></th>
                                    <th></th>
                                </tr>
                                @foreach ($classroom->gradeLevel->children as $child)
                                    <tr class="border-b">
                                        <td class="p-3 px-5">
                                            <p>{{ $child->name }}</p>
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
                <form action="{{ route('classrooms.destroy', $classroom->id) }}" method="POST" style="display: inline;">
                    @csrf
                    @method('DELETE')
                    <x-ts-button icon="trash" position="right" type="submit" onclick="return confirm('¿Esta seguro de hacer esta acción?');">Borrar</x-ts-button>
                </form>
            </x-ts-card>
        </div>
    </div>
</x-app-layout>
