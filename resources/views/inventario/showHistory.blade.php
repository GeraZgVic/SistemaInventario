<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Información General') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-sm sm:rounded-lg">
                <div class="flex justify-start px-4 py-2">
                    @foreach ($historial as $registro)
                        @php
                            $originalAttributes = json_decode($registro->original_attributes, true);
                        @endphp
                        <livewire:return-back :routeName="'inventory.show'" :routeParams="[$originalAttributes['id']]" />
                    @endforeach
                </div>
                <div>
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    </div>
                    <div class="text-center">
                        <h2 class="font-bold text-2xl text-gray-800 uppercase">Información Detallada</h2>
                    </div>
                    <div class="bg-gray-50 max-w-3xl mx-auto rounded-b-md overflow-hidden">
                        @foreach ($historialData as $data)
                            @php
                                $registro = $data['registro'];
                                $originalAttributes = $data['originalAttributes'];
                            @endphp
                            <div class="bg-white border-t border-gray-200 p-6">
                                <p class="font-semibold text-gray-500 text-center mb-3">Equipo Reemplazado No.
                                    {{ $loop->iteration }}</p>
                                <img class="object-cover w-full rounded-lg mb-4"
                                    src="{{ $originalAttributes['image'] ? asset('storage/images/' . $originalAttributes['image']) : asset('img/not-found.jpg') }}"
                                    alt="{{ $originalAttributes['image'] ? 'Imagen Producto ' . $originalAttributes['image'] : 'Sin Imagen' }}">
                                <p class="font-semibold mb-4 text-gray-500">Fecha de reemplazo:
                                    {{ $registro->created_at->format('d-m-Y H:i') }}</p>
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-2">
                                    @if ($product->details)
                                        <p class="font-semibold">No. Inventario: <span
                                                class="font-normal">{{ $product->details->previous_inventory_number }}</span>
                                        </p>
                                    @endif
                                    @if (is_array($originalAttributes))
                                        <p><span class="font-semibold">Marca:</span> {{ $data['brandName'] }}</p>
                                        <p><span class="font-semibold">Sucursal:</span> {{ $data['branchName'] }}</p>
                                        <p><span class="font-semibold">Modelo:</span> {{ $originalAttributes['model'] }}
                                        </p>
                                        <p><span class="font-semibold">Estatus anterior:</span>
                                            {{ $originalAttributes['status'] ?? 'Sin estatus' }}</p>
                                        <p><span class="font-semibold">Estatus actual:</span> Dañado</p>
                                        <p><span class="font-semibold">No. Serie:</span>
                                            {{ $originalAttributes['serial_number'] }}</p>
                                        <p class="md:col-span-2"><span class="font-semibold">Descripción:</span>
                                            {{ $originalAttributes['description'] }}</p>
                                    @endif
                                </div>
                            </div>
                        @endforeach

                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
