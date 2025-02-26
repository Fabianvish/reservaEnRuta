<x-app-layout>
    <x-table>
        @slot('thead')
            <tr>
                <th scope="col" class="px-6 py-3"> Fecha </th>
                <th scope="col" class="px-6 py-3"> Actividad </th>
                <th scope="col" class="px-6 py-3"> Destino </th>
                <th scope="col" class="px-6 py-3"> Valor Chofer </th>
                <th scope="col" class="px-6 py-3"> Valor Guia </th>
                <th scope="col" class="px-6 py-3"> Cupo </th>
                <th scope="col" class="px-6 py-3"> Estado </th>
                <th scope="col" class="px-6 py-3"> Acciones </th>
            </tr>
        @endslot
        @slot('tbody')
            @foreach ($tours as $tour)
                <tr
                    class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 border-gray-200 hover:bg-gray-50 dark:hover:bg-gray-600">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        {{ $tour->date }} </th>
                    <td class="px-6 py-4"> {{ $tour->destination->name }} </td>
                    <td class="px-6 py-4"> {{ $tour->destination->tour_location }} </td>
                    <td class="px-6 py-4"> {{ $tour->chauffeur_salary }} </td>
                    <td class="px-6 py-4"> {{ $tour->tour_guide_salary }} </td>
                    <td class="px-6 py-4">
                        @forelse ($reservations as $reservation)
                            @if ($reservation->tour_id == $tour->id)
                                {{ $tour->vehicle->capacity = $tour->vehicle->capacity - 1 }}
                            @endif
                        @empty
                            {{ $tour->vehicle->capacity }}
                        @endforelse
                    </td>
                    <td class="px-6 py-4">
                        <span class="text-green-500">{{ $tour->status ? 'Activo' : 'Inactivo' }}</span>
                    </td>
                    <td class="px-6 py-4"> 
                        <a href="{{route('tour.edit', $tour->id)}}">Editar</a>
                        <a href="{{route('tour.show',$tour->id)}}">Ver</a>
                    </td>
                </tr>
            @endforeach
        @endslot
    </x-table>
</x-app-layout>
