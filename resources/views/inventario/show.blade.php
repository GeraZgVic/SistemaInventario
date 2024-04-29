<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Producto ') . $product->brand . ' - ' . $product->id }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 flex flex-col md:flex-row gap-4">
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
                                <p class="font-semibold">Cantidad: <span
                                        class="font-normal">{{ $product->quantity }}</span> </p>
                                <p class="font-semibold">No. Serie: <span
                                        class="font-normal">{{ $product->serial_number }}</span></p>
                                <p class="font-semibold">Actualizado: <span
                                        class="font-normal">{{ $product->updated_at->format('d-m-Y H:i') }}</span></p>
                            </div>
                        </div>
                        <h3 class="text-center font-bold uppercase text-lg">Descripción</h3>
                        <p class="text-center"><span class="font-normal">{{ $product->description }}</span></p>
                    </div>

                </div>
                {{-- Actualizaciones --}}
                <div class="text-center mb-6 mt-2">
                    <h3 class="font-bold text-2xl text-gray-800 uppercase">Historial de Actualizaciones</h3>
                    <p class="text-sm text-gray-600">{{ $historial->count() }} @choice('Actualización|Actualizaciones', $historial->count())</p>
                </div>                
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">
                    @forelse ($historial as $registro)
                        @php
                            $originalAttributes = json_decode($registro->original_attributes, true);
                        @endphp
                        <div class="bg-white p-4 rounded-md shadow-md">
                            <p class="font-semibold">{{ $ordinal($loop->iteration) }} <!-- Número de actualización -->
                            <p class="font-semibold">Registro ID: {{ $registro->id }}</p>
                            <p class="text-sm text-gray-500">Fecha de reemplazo: {{ $registro->created_at->format('d-m-Y H:i') }}
                            </p>
                            <p class="font-semibold mt-2">Atributos Originales:</p>
                            @if (is_array($originalAttributes))
                                <!-- Accede a los valores del array -->
                                <p>Marca: {{ $originalAttributes['brand'] }}</p>
                                <p>Modelo: {{ $originalAttributes['model'] }}</p>
                                <p>Estatus: {{ $originalAttributes['status'] }}</p>
                                <p>No.Serie: {{ $originalAttributes['serial_number'] }}</p>
                                <!-- Agrega más elementos según los datos que desees mostrar -->
                            @endif
                        </div>
                    @empty
                        <p class="font-semibold text-gray-600 text-center col-span-full">Sin Actualizaciones</p>
                    @endforelse
                </div>

                <footer class="text-center py-2 my-3">
                    <p class="font-bold">Ar Site Integradores</p>
                    <address class="font-normal">{{ $product->branch->address }}</address>
                </footer>
            </div>
        </div>
    </div>
</x-app-layout>
