<div>
    <form class="max-w-md mx-auto" wire:submit='saveOrUpdate'>
        <div class="grid md:grid-cols-2 md:gap-6 py-2">
            <div class="relative z-0 w-full mb-5 group">
                <label for="tour" class="sr-only">Tour</label>
                <select id="tour" wire:model.live='tour_id'
                    class="block py-2.5 px-0 w-full text-sm text-gray-500 bg-transparent border-0 border-b-2 border-gray-200 appearance-none dark:text-gray-400 dark:border-gray-700 focus:outline-none focus:ring-0 focus:border-gray-200 peer">
                    <option selected>Seleccione un Tour</option>
                    @foreach ($tours as $tour)
                        <option value={{$tour->id}}> {{$tour->date}} / {{$tour->destination->name}} </option>
                    @endforeach
                </select>
            </div>
            <div class="relative z-0 w-full mb-5 group">
                <x-input wire:model.live='run' wire:blur='createPassenger' type="text"> </x-input>
                <x-label for='run'>RUN {{$statusPassenger ? '✅' : '❌'}}</x-label>
                <x-input-error for="run"></x-input-error>
                
            </div>
        </div>
        <div class="grid md:grid-cols-3 md:gap-6 py-2">
            <div class="relative z-0 w-full mb-5 group">
                <x-input wire:model.live='adult_count' type="number"> </x-input>
                <x-label for='adult_count'> Adultos </x-label>
                <x-input-error for="adult_count"></x-input-error>
            </div>
            <div class="relative z-0 w-full mb-5 group">
                <x-input wire:model.live='children_count' type="number"> </x-input>
                <x-label for='children_count'> Ninos </x-label>
                <x-input-error for="children_count"></x-input-error>
            </div>
            <div class="relative z-0 w-full mb-5 group">
                <x-input wire:model.live='third_age_count' type="number"> </x-input>
                <x-label for='third_age_count'> Tercera Edad </x-label>
                <x-input-error for="third_age_count"></x-input-error>
            </div>
    
        </div>
        <div class="relative z-0 w-full mb-5 group">
            <label for="tour" class="sr-only">Tour</label>
            <select id="tour" wire:model.live='tour_id'
                class="block py-2.5 px-0 w-full text-sm text-gray-500 bg-transparent border-0 border-b-2 border-gray-200 appearance-none dark:text-gray-400 dark:border-gray-700 focus:outline-none focus:ring-0 focus:border-gray-200 peer">
                <option selected>Metodo de Pago</option>
                {{-- @foreach ($payment_method as $payment)
                    <option value={{$payment}}> {{$payment}} </option>
                @endforeach --}}
            </select>
        </div>
<label >{{$currency}} </label>

        <button type="submit"
            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
            {{ $reservation ? 'Editar reserva' : 'Crear reserva' }}
        </button>
    </form>
</div>
