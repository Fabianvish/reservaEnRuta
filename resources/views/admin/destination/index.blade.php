<x-app-layout>
    @if (session()->has('message'))
    <div id="toast-success" class="flex items-center w-full max-w-xs p-4 mb-4 text-gray-500 bg-white rounded-lg shadow-sm dark:text-gray-400 dark:bg-gray-800" role="alert">
        <div class="inline-flex items-center justify-center shrink-0 w-8 h-8 text-green-500 bg-green-100 rounded-lg dark:bg-green-800 dark:text-green-200">
            <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 8.207-4 4a1 1 0 0 1-1.414 0l-2-2a1 1 0 0 1 1.414-1.414L9 10.586l3.293-3.293a1 1 0 0 1 1.414 1.414Z"/>
            </svg>
            <span class="sr-only">Check icon</span>
        </div>
        <div class="ms-3 text-sm font-normal">{{ session('message') }}</div>
        <button type="button" class="ms-auto -mx-1.5 -my-1.5 bg-white text-gray-400 hover:text-gray-900 rounded-lg focus:ring-2 focus:ring-gray-300 p-1.5 hover:bg-gray-100 inline-flex items-center justify-center h-8 w-8 dark:text-gray-500 dark:hover:text-white dark:bg-gray-800 dark:hover:bg-gray-700" data-dismiss-target="#toast-success" aria-label="Close">
            <span class="sr-only">Close</span>
            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
            </svg>
        </button>
    </div>
    @endif
    <x-table>
        @slot('thead')
            <tr>
                <th scope="col" class="px-6 py-3"> Actividad </th>
                <th scope="col" class="px-6 py-3"> Codigo Actividad </th>
                <th scope="col" class="px-6 py-3"> Origen </th>
                <th scope="col" class="px-6 py-3"> Destino </th>
                <th scope="col" class="px-6 py-3"> Kms </th>
                <th scope="col" class="px-6 py-3"> Precio Adulto </th>
                <th scope="col" class="px-6 py-3"> Precio Niños </th>
                <th scope="col" class="px-6 py-3"> Precio Tercera Edad </th>
                <th scope="col" class="px-6 py-3"> Hora de inicio </th>
                <th scope="col" class="px-6 py-3"> Hora de llegada </th>
                <th scope="col" class="px-6 py-3"> Estado </th>
                <th scope="col" class="px-6 py-3"> Acciones </th>
            </tr>
        @endslot
        @slot('tbody')
            @foreach ($destinations as $destination)
                <tr
                    class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 border-gray-200 hover:bg-gray-50 dark:hover:bg-gray-600">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        {{ $destination->name }}
                    </th>
                    <td class="px-6 py-4"> {{ $destination->prefix }} </td>
                    <td class="px-6 py-4"> {{ $destination->origin }} </td>
                    <td class="px-6 py-4"> {{ $destination->tour_location }}  </td>
                    <td class="px-6 py-4"> {{ $destination->kms }} </td>
                    <td class="px-6 py-4"> {{ new NumberFormatter('es_CL', NumberFormatter::CURRENCY)->formatCurrency($destination->adult_price, 'CLP') }} </td>
                    {{-- <td class="px-6 py-4"> {{ number_format($destination->adult_price, 0, ',', '.') }} </td> --}}
                    <td class="px-6 py-4"> {{ new NumberFormatter('es_CL', NumberFormatter::CURRENCY)->formatCurrency($destination->children_price, 'CLP') }} </td>
                    <td class="px-6 py-4"> {{ new NumberFormatter('es_CL', NumberFormatter::CURRENCY)->formatCurrency($destination->third_age_price, 'CLP') }} </td>
                    <td class="px-6 py-4"> {{ $destination->start }} </td>
                    <td class="px-6 py-4"> {{ $destination->end }} </td>
                    <td class="px-6 py-4">
                        <span class="text-green-500">{{ $destination->status ? 'Activo' : 'Inactivo' }}</span>
                    </td>
                    <td class="px-6 py-4">
                        <a href="{{ route('destination.show', $destination->id) }}">Ver</a>
                        <a href="{{ route('destination.edit', $destination->id) }}">Editar</a>
                    </td>
                </tr>
            @endforeach
        @endslot
    </x-table>
</x-app-layout>
