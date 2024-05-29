<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Producto ') . $product->brand . ' - ' . $product->id }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="flex justify-start px-4 py-2">
                        <livewire:return-back :routeName="'dashboard'" />
                </div>
                <div class="p-6 text-gray-900 flex flex-col md:flex-row gap-4">
                    @if (session('alert-danger'))
                        <livewire:alert-danger :texto="session('alert-danger')" />
                    @endif
                    {{-- IMG --}}
                    <img class="object-cover max-w-lg rounded"
                        src="{{ $product->image ? asset('storage/images/' . $product->image) : asset('img/not-found.jpg') }}"
                        alt="{{ $product->image ? 'Imagen Producto' . $product->model : 'Sin Imagen' }}">

                    <div class="space-y-4">
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-8">
                            <div>
                                <P class="font-semibold">Modelo: <span class="font-normal">{{ $product->model }} </span>
                                </P>
                                <p class="font-semibold">Marca: <span class="font-normal">{{ $product->brand }} </span>
                                </p>
                                <p class="font-semibold">Mayorista: <span class="font-normal">{{ $product->wholesaler }}
                                    </span></p>
                                <p class="font-semibold">Sucursal: <span
                                        class="font-normal">{{ $product->branch->name }} </span></p>
                                <p class="font-semibold">Agregado: <span
                                        class="font-normal">{{ $product->created_at->format('d-m-Y H:i') }} </span></p>
                            </div>
                            <div>
                                <p class="font-semibold">Estatus: <span
                                        class="font-normal">{{ $product->status }}</span></p>
                                {{-- <p class="font-semibold">Cantidad: <span
                                        class="font-normal">{{ $product->quantity }}</span> </p> --}}
                                <p class="font-semibold">No. Serie: <span
                                        class="font-normal">{{ $product->serial_number }}</span></p>
                                <p class="font-semibold">Actualizado: <span
                                        class="font-normal">{{ $product->updated_at->format('d-m-Y H:i') }}</span></p>
                            </div>
                            @if ($product->details)
                                <div class="col-span-2">
                                    <h3 class="font-semibold text-gray-500 text-center">Información Adicional</h3>
                                    <p class="font-semibold">Destino: <span
                                            class="font-normal">{{ $product->details->destination }}</span></p>
                                    <p class="font-semibold">Fecha de Salida: <span
                                            class="font-normal">{{ $product->details->departure_date }}</span></p>
                                    <p class="font-semibold">No.Inventario de equipo anterior: <span
                                            class="font-normal">{{ $product->details->previous_inventory_number }}</span>
                                    </p>
                                    <p class="font-semibold">No.Inventario de equipo nuevo: <span
                                            class="font-normal">{{ $product->details->later_inventory_number }}</span>
                                    </p>
                                </div>
                            @endif
                        </div>
                        <h3 class="text-center font-bold uppercase text-lg">Descripción</h3>
                        <p class="text-center"><span class="font-normal">{{ $product->description }}</span></p>
                    </div>

                </div>
                {{-- Actualizaciones --}}
                <div class="text-center mb-6 mt-2">
                    <h3 class="font-bold text-2xl text-gray-800 uppercase">Historial de Actualizaciones</h3>
                    <p class="text-sm text-gray-600">{{ $historial->count() }} @choice('Actualización|Actualizaciones', $historial->count()) </p>
                </div>
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">
                    @foreach ($historial as $registro)
                        @php
                            $originalAttributes = json_decode($registro->original_attributes, true);
                        @endphp
                        <div class="bg-white p-4 rounded-md shadow-md">
                            <div class="flex justify-end">
                                <a href="{{route('history.show', $registro->id)}}">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-green-600 hover:text-green-800">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z" />
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                                      </svg>                                      
                                </a>
                                @can('delete.inventory.history')
                                    <livewire:delete-history :key="$registro->id" :id="$registro->id" :idProduct="$product->id" />
                                @endcan
                                
                            </div>
                            <p class="font-semibold text-gray-500">Equipo Anterior No. {{ $loop->iteration }}
                                <!-- Número de actualización -->
                            <p class="text-sm text-gray-500">Fecha de reemplazo:
                                {{ $registro->created_at->format('d-m-Y H:i') }}
                            </p>
        
                            @if (is_array($originalAttributes))
                                <!-- Accede a los valores del array -->
                                <p><span class="font-semibold">Marca: </span> {{ $originalAttributes['brand'] }}</p>
                                <p><span class="font-semibold">Estatus actual: </span> {{ 'Dañado' }}</p>
                                <p><span class="font-semibold">No.Serie: </span>
                                    {{ $originalAttributes['serial_number'] }}</p>
                                <!-- Agrega más elementos según los datos que desees mostrar -->
                            @endif
                        </div>
                    @endforeach
                </div>

                <footer class="text-center py-2 my-3">
                    <p class="font-bold">Ar Site Integradores</p>
                    <address class="font-normal">{{ $product->branch->address }}</address>
                </footer>
            </div>
        </div>
    </div>
</x-app-layout>
