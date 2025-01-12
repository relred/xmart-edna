<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Grado') }}
        </h2>
    </x-slot>

    <div class="py-8">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
            <x-ts-link class="mb-5" href="{{ route('grade-levels.index') }}">
                < Volver a la tabla
            </x-ts-link>
            <div class="flex items-center mb-5">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M4.26 10.147a60.438 60.438 0 0 0-.491 6.347A48.62 48.62 0 0 1 12 20.904a48.62 48.62 0 0 1 8.232-4.41 60.46 60.46 0 0 0-.491-6.347m-15.482 0a50.636 50.636 0 0 0-2.658-.813A59.906 59.906 0 0 1 12 3.493a59.903 59.903 0 0 1 10.399 5.84c-.896.248-1.783.52-2.658.814m-15.482 0A50.717 50.717 0 0 1 12 13.489a50.702 50.702 0 0 1 7.74-3.342M6.75 15a.75.75 0 1 0 0-1.5.75.75 0 0 0 0 1.5Zm0 0v-3.675A55.378 55.378 0 0 1 12 8.443m-7.007 11.55A5.981 5.981 0 0 0 6.75 15.75v-1.5" />
                </svg>

                <h3 class="text-2xl font-bold ml-2">
                    {{ $gradeLevel->name }}
                </h3>
            </div>

            <div class="mb-8">
                <x-ts-card>
                    <h3 class="text-xl font-bold mb-4">
                        Niños del grado
                    </h3>
                    @if ($gradeLevel->children->count() > 0)
                        <table class="w-full text-md rounded mb-4">
                            <tbody>
                                <tr class="border-b">
                                    <th class="text-left p-3 px-5">Nombre</th>
                                    <th class="text-left p-3 px-5"></th>
                                    <th></th>
                                </tr>
                                @foreach ($gradeLevel->children as $child)
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
                <form action="{{ route('grade-levels.destroy', $gradeLevel->id) }}" method="POST" style="display: inline;">
                    @csrf
                    @method('DELETE')
                    <x-ts-button icon="trash" position="right" type="submit" onclick="return confirm('¿Esta seguro de hacer esta acción?');">Borrar</x-ts-button>
                </form>
            </x-ts-card>
        </div>
    </div>
</x-app-layout>
