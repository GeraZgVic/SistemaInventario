<div x-data="{ modalOpen: false }" @keydown.escape.window="modalOpen = false" class="relative z-50 w-auto h-auto">
    <button @click="modalOpen=true"
        class="inline-flex items-center justify-center h-10 px-4 py-2 text-sm font-medium transition-colors bg-white border rounded-md hover:bg-neutral-100 active:bg-white focus:bg-white focus:outline-none focus:ring-2 focus:ring-neutral-200/60 focus:ring-offset-2 disabled:opacity-50 disabled:pointer-events-none">Agregar
        a Inventario</button>
    <template x-teleport="body">
        <div x-show="modalOpen" class="fixed top-0 left-0 z-[99] flex items-center justify-center w-screen h-screen"
            x-cloak>
            <div x-show="modalOpen" x-transition:enter="ease-out duration-300" x-transition:enter-start="opacity-0"
                x-transition:enter-end="opacity-100" x-transition:leave="ease-in duration-300"
                x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" @click="modalOpen=false"
                class="absolute inset-0 w-full h-full bg-black bg-opacity-40"></div>
            <div x-show="modalOpen" x-trap.inert.noscroll="modalOpen" x-transition:enter="ease-out duration-300"
                x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
                x-transition:leave="ease-in duration-200"
                x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
                x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                class="relative w-full py-6 bg-white px-7 sm:max-w-lg sm:rounded-lg h-[96vh] overflow-y-scroll">
                <div class="flex items-center justify-between pb-2">
                    <h3 class="text-lg font-semibold capitalize">Agregar a inventario</h3>
                    <button @click="modalOpen=false"
                        class="absolute top-0 right-0 flex items-center justify-center w-8 h-8 mt-5 mr-5 text-gray-600 rounded-full hover:text-gray-800 hover:bg-gray-50">
                        <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                            stroke-width="1.5" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
                <form wire:submit='save' class="grid grid-cols-2 gap-1">
                    <!-- Marca -->
                    <div>
                        <x-input-label for="brand" :value="__('Marca')" />
                        <input wire:model='brand' id="brand" wire:dirty.class='border-green-500'
                            class="w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm text-sm"
                            type="text" placeholder="Ej: Fortinet">
                        <x-input-error :messages="$errors->get('brand')" class="mt-2" />
                    </div>
                    <!-- Cantidad -->
                    <div>
                        <x-input-label for="quantity" :value="__('Cantidad')" />
                        <input wire:model='quantity' id="quantity" wire:dirty.class='border-green-500'
                            class="w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm text-sm"
                            type="number" min="0">

                        <x-input-error :messages="$errors->get('quantity')" class="mt-2" />
                    </div>
                    <!-- Modelo -->
                    <div class="col-span-2">
                        <x-input-label for="model" :value="__('Modelo')" />
                        <input wire:model='model' id="model" wire:dirty.class='border-green-500'
                            class="w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm text-sm"
                            type="text" placeholder="Ej: TMK S1">
                    </div>
                    <!-- Numero de Serie -->
                    <div>
                        <x-input-label for="serial_number" :value="__('Numero de Serie')" />
                        <input wire:model='serial_number' id="serial_number" wire:dirty.class='border-green-500'
                            class="w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm text-sm"
                            type="text" placeholder="Ej: 844D09V04">
                    </div>
                    <!-- Estatus -->
                    <div>
                        <x-input-label for="status" :value="__('Estatus')" />
                        <input wire:model='status' id="status" wire:dirty.class='border-green-500'
                            class="w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm text-sm"
                            type="text" placeholder="Ej: Sin funcionar">
                    </div>
                    {{-- Mayorista --}}
                    <div>
                        <x-input-label for="wholesaler" :value="__('Mayorista')" />
                        <input wire:model='wholesaler' id="wholesaler" wire:dirty.class='border-green-500'
                            class="w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm text-sm"
                            type="text" placeholder="Escribe el mayorista">
                        <x-input-error :messages="$errors->get('wholesaler')" class="mt-2" />
                    </div>
                    {{-- Sucursal --}}
                    <div>
                        <x-input-label for="branch_id" :value="__('Sucursal')" />
                        <select wire:model="branch_id" id="branch_id" wire:dirty.class='border-green-500'
                            class="w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm text-sm">
                            <option value="">Seleccionar una sucursal</option>
                            @foreach ($branches as $branch)
                                <option value="{{ $branch->id }}">{{ $branch->name }}</option>
                            @endforeach
                        </select>
                        <x-input-error :messages="$errors->get('branch_id')" class="mt-2" />
                    </div>
                    {{-- SUBIR IMAGEN --}}
                    <div class="col-span-2" x-data="{ uploading: false, progress: 0 }" x-on:livewire-upload-start="uploading = true"
                        x-on:livewire-upload-finish="uploading = false" x-on:livewire-upload-cancel="uploading = false"
                        x-on:livewire-upload-error="uploading = false"
                        x-on:livewire-upload-progress="progress = $event.detail.progress">
                        <x-input-label for="image" :value="__('Imagen')" />
                        <input
                            class="block w-full text-lg text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50"
                            id="image" type="file" wire:model="image" accept="image/*">
                        <x-input-error :messages="$errors->get('image')" class="mt-2" />

                        <div x-show="uploading">
                            <progress max="100" x-bind:value="progress"></progress>
                        </div>
                    </div>
                    {{-- Descripción --}}
                    <div class="col-span-2">
                        <x-input-label for="description" :value="__('Descripción')" />
                        <textarea wire:model='description' id="description" rows="4" wire:dirty.class='border-green-500'
                            class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 "
                            placeholder="Agregue una descripción"></textarea>
                        <x-input-error :messages="$errors->get('description')" class="mt-2" />
                    </div>

                    <div class="col-span-2 text-sm text-gray-400" wire:dirty>Los cambios aún no se han guardado...
                    </div>

                    <div class="mt-4 col-span-2">
                        <x-primary-button class="">
                            {{ __('Guardar') }}
                        </x-primary-button>
                    </div>
                </form>
            </div>
        </div>
    </template>
</div>
