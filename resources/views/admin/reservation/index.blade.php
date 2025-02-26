<x-app-layout>
    <div class="relative overflow-x-auto py-5">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                       Codigo reserva
                    </th>
                    <th scope="col" class="px-6 py-3">
                       Actividad
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Pasajero
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Niños
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Adultos
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Tercera Edad
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Estado 
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Forma de pago
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Valor a pagar
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Acciones
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($reservations as $reservation)
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 border-gray-200">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        {{$reservation->reservation_code }}
                    </th>
                    <td class="px-6 py-4">
                        {{$reservation->tour->destination->name}}
                    </td>
                    <td class="px-6 py-4">
                        {{$reservation->passenger->name}}
                    </td>
                    <td class="px-6 py-4">
                        {{$reservation->children_count }}
                    </td>
                    <td class="px-6 py-4">
                        {{$reservation->adult_count }}
                    </td>
                    <td class="px-6 py-4">
                        {{$reservation->third_age_count }}
                    </td>
                    <td class="px-6 py-4">
                        {{$reservation->status ? 'Pagado' : 'Impago'}}
                    </td>
                    <td class="px-6 py-4">
                        {{$reservation->payment_method}}
                    </td>
                    <td class="px-6 py-4">
                        {{$reservation->currency}}
                    </td>
                    <td class="px-6 py-4">
                        Editar
                        <a href="{{route('reservation.show',$reservation->id)}}">Ver</a>
                    </td>
                </tr>
                @endforeach


            </tbody>
        </table>
    </div>
</x-app-layout>