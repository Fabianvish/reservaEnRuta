<x-app-layout>
    <div
        class="w-full p-5 text-center bg-white border border-gray-200 rounded-lg shadow-sm sm:p-8 dark:bg-gray-800 dark:border-gray-700">
        <h5 class="mb-2 text-3xl font-bold text-gray-900 dark:text-white"> {{$tour->destination->name}} / {{$tour->created_at}} </h5>
        <p class="mb-5 text-base text-gray-500 sm:text-lg dark:text-gray-400"> {{$tour->destination->origin}} - {{$tour->destination->tour_location}} </p>
        <div class="items-center justify-center space-y-4 sm:flex sm:space-y-0 sm:space-x-4 rtl:space-x-reverse">
            <div>
                <ul class="max-w-md divide-y divide-gray-200 dark:divide-gray-700">
                    <li class="pb-3 sm:pb-4">
                       <div class="flex items-center space-x-4 rtl:space-x-reverse">
                          <div class="flex-1 min-w-0">
                            <p class="text-left text-sm text-gray-500 truncate dark:text-gray-400">
                                Precio Chofer
                             </p>
                          </div>
                          <div class="inline-flex items-center text-sm font-semibold text-gray-900 dark:text-gray-500">
                            {{'- $' . $tour->chauffeur_salary}}
                          </div>
                       </div>
                    </li>
                    <li class="pb-3 sm:pb-4">
                       <div class="flex items-center space-x-4 rtl:space-x-reverse">
                          <div class="flex-1 min-w-0">
                            <p class="text-left text-sm text-gray-500 truncate dark:text-gray-400">
                                Precio Guia
                             </p>
                          </div>
                          <div class="inline-flex items-center text-sm font-semibold text-gray-900 dark:text-gray-500">
                            {{'- $' .$tour->tour_guide_salary}}
                          </div>
                       </div>
                    </li>
                    <li class="pb-3 sm:pb-4">
                       <div class="flex items-center space-x-4 rtl:space-x-reverse">
                          <div class="flex-1 min-w-0">
                            <p class="text-left text-sm text-gray-500 truncate dark:text-gray-400">
                                Consumo Km/lt
                             </p>
                          </div>
                          <div class="inline-flex items-center text-sm font-semibold text-gray-900 dark:text-gray-500">
                            {{'- $' . $consumption}}
                          </div>
                       </div>
                    </li>
                    <li class="pb-3 sm:pb-4">
                       <div class="flex items-center space-x-4 rtl:space-x-reverse">
                          <div class="flex-1 min-w-0">
                            <p class="text-left text-sm text-gray-500 truncate dark:text-gray-400">
                                Ganancia
                             </p>
                          </div>
                          <div class="inline-flex items-center text-sm font-semibold text-gray-900 dark:text-gray-500">
                            {{'$' . $revenue}}
                          </div>
                       </div>
                    </li>
                    <li class="pb-3 sm:pb-4">
                       <div class="flex items-center space-x-4 rtl:space-x-reverse">
                          <div class="flex-1 min-w-0">
                            <p class="text-right text-sm text-gray-500 truncate dark:text-gray-400">
                                Total
                             </p>
                          </div>
                          <div class="inline-flex items-left text-base font-semibold text-gray-900 dark:text-white rounded">
                            @if ($total > 0)
                            <span class="bg-green-100 text-green-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded-sm dark:bg-green-900 dark:text-green-300">{{$total}}</span>
                            @else
                            <span class="bg-red-100 text-red-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded-sm dark:bg-red-900 dark:text-red-300">{{$total}}</span>
                            @endif
                          </div>
                       </div>
                    </li>
                 </ul>
                 
            </div>
        </div>
    </div>

    <x-table>
        @slot('thead')
            <tr>
                <th scope="col" class="px-6 py-3">Fecha Reserva</th>
                <th scope="col" class="px-6 py-3">Nombre Titular</th>
                <th scope="col" class="px-6 py-3">Pasajeros</th>
                <th scope="col" class="px-6 py-3">Monto</th>
                <th scope="col" class="px-6 py-3">Metodo de Pago</th>
                <th scope="col" class="px-6 py-3">Estado</th>
            </tr>
        @endslot
        @slot('tbody')
            @foreach ($reservations as $reservation)
                <tr
                    class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 border-gray-200 hover:bg-gray-50 dark:hover:bg-gray-600">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        {{ $reservation->created_at }} </th>
                    <td class="px-6 py-4"> {{ $reservation->passenger->name }} </td>
                    <td class="px-6 py-4">
                        {{ $reservation->third_age_count + $reservation->adult_count + $reservation->children_count }} </td>
                    <td class="px-6 py-4"> {{ $reservation->currency }} </td>
                    <td class="px-6 py-4"> {{ $reservation->payment_method }} </td>
                    <td class="px-6 py-4"> {{ $reservation->status ? 'Pagado' : 'Impago' }} </td>
                </tr>
            @endforeach
        @endslot
    </x-table>
</x-app-layout>
