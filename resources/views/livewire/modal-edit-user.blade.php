<div x-data="{ modalOpen: false }" @keydown.escape.window="modalOpen = false" class="relative z-50 w-auto h-auto">
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
                class="relative w-full py-6 bg-white px-7 sm:max-w-lg sm:rounded-lg">
                <div class="flex items-center justify-between pb-2">
                    <h3 class="text-lg font-semibold capitalize">Editar Usuario</h3>
                    <button @click="modalOpen=false"
                        class="absolute top-0 right-0 flex items-center justify-center w-8 h-8 mt-5 mr-5 text-gray-600 rounded-full hover:text-gray-800 hover:bg-gray-50">
                        <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                            stroke-width="1.5" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
                <form wire:submit='update' class="grid grid-cols-2 gap-1">
                    <!-- Nombre -->
                    <div>
                        <x-input-label for="name-edit" :value="__('Nombre')" />
                        <input wire:model='name' id="name-edit" wire:dirty.class='border-green-500'
                            class="w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm text-sm"
                            type="text" placeholder="Escribe el nombre">
                        <x-input-error :messages="$errors->get('name')" class="mt-2" />
                    </div>
                    <!-- Email -->
                    <div>
                        <x-input-label for="email-edit" :value="__('Email')" />
                        <input wire:model='email' id="email-edit" wire:dirty.class='border-green-500'
                            class="w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm text-sm"
                            type="email" min="0" placeholder="Escribe el email">
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>
                    <!-- Contraseña -->
                    <div>
                        <x-input-label for="password-edit" :value="__('Contraseña')" />
                        <input wire:model='password' id="password-edit" wire:dirty.class='border-green-500'
                            class="w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm text-sm"
                            type="password" min="0" placeholder="Escribe la contraseña">
                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                    </div>
                    <!-- Repetir Contraseña -->
                    <div>
                        <x-input-label for="password_confirm-edit" :value="__('Repetir Contraseña')" />
                        <input wire:model='password_confirm' id="password_confirm-edit" wire:dirty.class='border-green-500'
                            class="w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm text-sm"
                            type="password" min="0" placeholder="Repite la contraseña">
                        <x-input-error :messages="$errors->get('password_confirm')" class="mt-2" />
                    </div>
                    {{-- Roles --}}
                    <h3 class="col-span-2 text-center mt-2 font-semibold">Asginar Rol</h3>
                    @foreach ($roles as $rol)
                        <div class="inline-flex items-center">
                            <label class="relative flex items-center p-3 rounded-full cursor-pointer"
                                htmlFor="checkbox{{$rol->id}}">
                                <input type="checkbox"
                                    class="before:content[''] peer relative h-5 w-5 cursor-pointer appearance-none rounded-md border border-blue-gray-200 transition-all before:absolute before:top-2/4 before:left-2/4 before:block before:h-12 before:w-12 before:-translate-y-2/4 before:-translate-x-2/4 before:rounded-full before:bg-blue-gray-500 before:opacity-0 before:transition-opacity checked:border-gray-900 checked:bg-gray-900 checked:before:bg-gray-900 hover:before:opacity-10"
                                    id="checkbox{{ $rol->id }}"
                                    value="{{ $rol->id }}"
                                    wire:model='roless'
                                    
                                    />
                                <span class="ml-3 text-sm font-medium text-gray-900">{{ $rol->name }}</span>
                            </label>
                        </div>
                    @endforeach

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
