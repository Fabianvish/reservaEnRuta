<x-app-layout>

    <div class="flex justify-center py-5">
        <div
            class="w-full max-w-3xl p-4 bg-white border border-gray-200 rounded-lg shadow-sm sm:p-6 md:p-8 dark:bg-gray-800 dark:border-gray-700">
            @livewire('Destination.Form')

        </div>
    </div>

    <div class="relative overflow-x-auto py-5">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        Actividad
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Codigo Actividad
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Origen
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Destino
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Kms
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Precio Adulto
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Precio Niños
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Precio Tercera Edad
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Hora de inicio
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Hora de llegada
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Estado
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Acciones
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($destinations as $destination)
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 border-gray-200">
                        <th scope="row"
                            class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ $destination->name }}
                        </th>
                        <td class="px-6 py-4">
                            {{ $destination->prefix }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $destination->source }}
                        </td>

                        <td class="px-6 py-4">
                            {{ $destination->destination }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $destination->kms }}
                        </td>

                        <td class="px-6 py-4">
                            {{ $destination->adult_price }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $destination->children_price }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $destination->third_age_price }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $destination->start }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $destination->end }}
                        </td>
                        <td class="px-6 py-4">
                            <span class="text-green-500">{{ $destination->status ? 'Activo' : 'Inactivo' }}</span>
                        </td>
                        <td class="px-6 py-4">
                            <a href="{{ route('destination.show', $destination->id) }}">Ver</a>
                        </td>
                    </tr>
                @endforeach


            </tbody>
        </table>
    </div>
</x-app-layout>
