<div>
    <form class="max-w-md mx-auto" wire:submit='saveOrUpdate'>
        <div class="grid md:grid-cols-2 md:gap-6 py-2">
            <div class="relative z-0 w-full mb-5 group">
                <x-input wire:model.live='name' type="text"> </x-input>
                <x-label for='name'>Nombre de la actividad</x-label>
                <x-input-error for="name"></x-input-error>
                <x-input-error for="prefix"></x-input-error>
            </div>
            <div class="relative z-0 w-full mb-5 group">
                <x-input wire:model.live='origin' type="text"> </x-input>
                <x-label for='origin'>Origen</x-label>
                <x-input-error for="origin"></x-input-error>

            </div>
        </div>
        <div class="grid md:grid-cols-2 md:gap-6 py-2">
            <div class="relative z-0 w-full mb-5 group">
                <x-input wire:model.live='tour_location' type="text"> </x-input>
                <x-label for='tour_location'>Destino</x-label>
                <x-input-error for="tour_location"></x-input-error>
            </div>
            <div class="relative z-0 w-full mb-5 group">
                <x-input wire:model.live='kms' type="text"> </x-input>
                <x-label for='kms'>Kms</x-label>
                <x-input-error for="kms"></x-input-error>
            </div>
        </div>
        <div class="grid md:grid-cols-2 md:gap-6 py-2">
            <div class="relative z-0 w-full mb-5 group">
                <x-input wire:model.live='start' type="text"> </x-input>
                <x-label for='start'>Hora de inicio</x-label>
                <x-input-error for="start"></x-input-error>
            </div>
            <div class="relative z-0 w-full mb-5 group">
                <x-input wire:model.live='end' type="text"> </x-input>
                <x-label for='end'>Hora de termino</x-label>
                <x-input-error for="end"></x-input-error>
            </div>
        </div>
        <div class="grid md:grid-cols-3 md:gap-6 py-2">
            <div class="relative z-0 w-full mb-5 group">
                <x-input wire:model.live='adult_price' type="text"> </x-input>
                <x-label for='adult_price'>Precio Adulto</x-label>
                <x-input-error for="adult_price"></x-input-error>
            </div>
            <div class="relative z-0 w-full mb-5 group">
                <x-input wire:model.live='children_price' type="text"> </x-input>
                <x-label for='children_price'>Precio niños</x-label>
                <x-input-error for="children_price"></x-input-error>
            </div>
            <div class="relative z-0 w-full mb-5 group">
                <x-input wire:model.live='third_age_price' type="text"> </x-input>
                <x-label for='third_age_price'>Precio adulto mayor</x-label>
                <x-input-error for="third_age_price"></x-input-error>
            </div>
        </div>
        <button type="submit"
            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
            {{ $destination ? 'Editar' : 'Crear' }}
        </button>
    </form>
</div>