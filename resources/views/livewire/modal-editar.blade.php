<div x-data="{ modalOpen: false }" @keydown.escape.window="modalOpen = false" class="relative z-50 w-auto">
    <button @click="modalOpen=true" class="text-blue-600 hover:text-blue-700">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
            class="w-6 h-6">
            <path stroke-linecap="round" stroke-linejoin="round"
                d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
        </svg>
    </button>
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
                    <h3 class="text-lg font-semibold capitalize">Editar Inventario</h3>
                    <button @click="modalOpen=false"
                        class="absolute top-0 right-0 flex items-center justify-center w-8 h-8 mt-5 mr-5 text-gray-600 rounded-full hover:text-gray-800 hover:bg-gray-50">
                        <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                            stroke-width="1.5" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
                <form wire:submit='update' class="grid grid-cols-2 gap-1">
                    <!-- Marca -->
                    <div>
                        <x-input-label for="brand_id" :value="__('Marca')" />
                        <select wire:model="brand_id" id="brand_id" wire:dirty.class='border-green-500'
                            class="w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm text-sm">
                            <option value="">Seleccionar Marca</option>
                            @foreach ($brands as $brand)
                                <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                            @endforeach
                        </select>
                        <x-input-error :messages="$errors->get('brand_id')" class="mt-2" />
                    </div>
                    
                    <!-- Modelo -->
                    <div>
                        <x-input-label for="model" :value="__('Modelo')" />
                        <input wire:model='model' id="model" wire:dirty.class='border-green-500'
                            class="w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm text-sm"
                            type="text" placeholder="Ej: TMK S1">
                            <x-input-error :messages="$errors->get('model')" class="mt-2" />
                    </div>
                    <!-- Numero de Serie -->
                    <div>
                        <x-input-label for="serial_number" :value="__('Numero de Serie')" />
                        <input wire:model='serial_number' id="serial_number" wire:dirty.class='border-green-500'
                            class="w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm text-sm"
                            type="text" placeholder="Ej: 844D09V04">
                            <x-input-error :messages="$errors->get('serial_number')" class="mt-2" />
                    </div>
                    <div>
                        <x-input-label for="part_number" :value="__('Numero de Parte')" />
                        <input wire:model='part_number' id="part_number" wire:dirty.class='border-green-500'
                            class="w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm text-sm"
                            type="text" placeholder="Ej: 844D09V04">
                            <x-input-error :messages="$errors->get('part_number')" class="mt-2" />
                    </div>
                    <!-- Estatus -->
                    <div>
                        <x-input-label for="status" :value="__('Estatus')" />
                        <input wire:model='status' id="status" wire:dirty.class='border-green-500'
                            class="w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm text-sm"
                            type="text" placeholder="Ej: Sin funcionar">
                            <x-input-error :messages="$errors->get('status')" class="mt-2" />
                    </div>
                    {{-- Mayorista --}}
                    <div>
                        <x-input-label for="wholesaler" :value="__('Mayorista')" />
                        <input wire:model='wholesaler' id="wholesaler" wire:dirty.class='border-green-500'
                            class="w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm text-sm"
                            type="text" placeholder="Ej: Sin funcionar">
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
                    <div class="col-span-2">
                        {{-- Imagen Actual --}}
                        <x-input-label for="image" :value="__('Imagen actual')" />
                        <div class="flex gap-x-1">
                            <img id="image" class="w-auto object-cover h-32"
                                src="{{ $image ? asset('storage/images/' . $image) : asset('img/not-found.jpg') }}"
                                alt="{{ 'Imagen ' . $brand }}">
                            @if ($new_image)
                                <img src="{{ $new_image->temporaryUrl() }}" class="w-auto object-cover h-32">
                            @endif
                        </div>
                    </div>
                    <div class="col-span-2" x-data="{ uploading: false, progress: 0 }" x-on:livewire-upload-start="uploading = true"
                        x-on:livewire-upload-finish="uploading = false"
                        x-on:livewire-upload-cancel="uploading = false" x-on:livewire-upload-error="uploading = false"
                        x-on:livewire-upload-progress="progress = $event.detail.progress">
                        <x-input-label for="new_image" :value="__('Nueva Imagen')" />
                        <input id="new_image"
                            class="block w-full text-lg text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50"
                            id="new_image" type="file" wire:model="new_image" accept="image/*">
                        <x-input-error :messages="$errors->get('new_image')" class="mt-2" />

                        <div x-show="uploading">
                            <progress max="100" x-bind:value="progress"></progress>
                        </div>
                    </div>

                    <div class="col-span-2">
                        <x-input-label for="description" :value="__('Descripción')" />
                        <textarea wire:model='description' id="description" rows="4" wire:dirty.class='border-green-500'
                            class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 "
                            placeholder="Agregue una descripción"></textarea>
                        <x-input-error :messages="$errors->get('description')" class="mt-2" />
                    </div>

                    {{-- Campos Adicionales --}}
                    <div class="col-span-2">
                        <h3 class="text-gray-500 text-center text-lg my-3">Campos Adicionales - Opcionales </h3>
                        <div class="grid grid-cols-2 gap-x-2">
                            {{-- Destino --}}
                            <div>
                                <x-input-label for="destination" :value="__('Destino')" />
                                <input wire:model='destination' id="destination" wire:dirty.class='border-green-500'
                                    class="w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm text-sm"
                                    type="text" placeholder="Destino del equipo">
                                <x-input-error :messages="$errors->get('destination')" class="mt-2" />
                            </div>
                            {{-- Equipo de Reemplazo --}}
                            {{-- <div>
                                <x-input-label for="replacement_equipment" :value="__('Equipo de Reemplazo')" />
                                <input wire:model='replacement_equipment' id="replacement_equipment" wire:dirty.class='border-green-500'
                                    class="w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm text-sm"
                                    type="text" placeholder="No. Serie de equipo">
                                <x-input-error :messages="$errors->get('replacement_equipment')" class="mt-2" />
                            </div> --}}
                            {{-- No. Inventario Equipo Anterior --}}
                            <div>
                                <x-input-label for="departure_date" :value="__('Fecha de Salida')" />
                                <input wire:model='departure_date' id="departure_date" wire:dirty.class='border-green-500'
                                    class="w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm text-sm"
                                    type="date">
                                <x-input-error :messages="$errors->get('departure_date')" class="mt-2" />
                            </div>
                            <div>
                                <x-input-label for="previous_inventory_number" :value="__('No. Inventario Anterior')" />
                                <input wire:model='previous_inventory_number' id="previous_inventory_number" wire:dirty.class='border-green-500'
                                    class="w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm text-sm"
                                    type="text" placeholder="No. Inventario Anterior">
                                <x-input-error :messages="$errors->get('previous_inventory_number')" class="mt-2" />
                            </div>
                            {{-- No. Inventario Equipo Nuevo --}}
                            <div>
                                <x-input-label for="later_inventory_number" :value="__('No. Inventario Nuevo')" />
                                <input wire:model='later_inventory_number' id="later_inventory_number" wire:dirty.class='border-green-500'
                                    class="w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm text-sm"
                                    type="text" placeholder="No. Inventario Nuevo">
                                <x-input-error :messages="$errors->get('later_inventory_number')" class="mt-2" />
                            </div>
                        </div>
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
