<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Historial de ingresos') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="container">
                <table class="text-left w-full">
                    <thead class="bg-gray-200 flex text-gray-600 rounded-md w-full">
                        <tr class="flex w-full mb-4">
                            <th class="p-4 w-1/4">Adulto</th>
                            <th class="p-4 w-1/4">Niños</th>
                            <th class="p-4 w-1/5">Identificador usado</th>
                            <th class="p-4 w-1/7">Fecha exacta</th>
                            <th class="p-4 w-1/7"></th>
                        </tr>
                    </thead>
                    <tbody class="bg-grey-light flex flex-col items-center justify-between overflow-y-scroll w-full bg-white">
                        @foreach ($logs as $log)
                            <tr class="flex w-full mb-4">
                                <td class="p-4 w-1/4">{{ optional($log->guardian)->name ?? 'Sin Nombre' }}</td>
                                <td class="p-4 w-1/4">
                                    <ul class="list-disc">
                                        @if ($log->guardian && $log->guardian->children)
                                            @foreach ($log->guardian->children as $child)
                                                <li>{{ $child->name ?? 'Sin nombre' }}</li>
                                            @endforeach
                                        @else
                                            <li>Sin niños</li>
                                        @endif
                                    </ul>
                                </td>
                                <td class="p-4 w-1/5 text-center">{{ $log->identifier_type ?? 'Sin identificador' }}</td>
                                <td class="p-4 w-1/7">{{ $log->created_at ? $log->created_at->format('H:i, d/m/Y') : 'Sin fecha' }}</td>
                                <td class="p-4 w-1/7">{{ $log->created_at ? $log->created_at->diffForHumans() : '' }}</td>
                            </tr>
                        @endforeach
                    
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>
