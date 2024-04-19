<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Bienvenido ') . Auth::user()->name }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    @if (session('alert-success'))
                        <livewire:alert-success :texto="session('alert-success')" />
                    @elseif (session('alert-danger'))
                        <livewire:alert-danger :texto="session('alert-danger')" />
                    @endif

                    <livewire:modal-agregar />

                    {{-- TABLA --}}
                    <div class="relative overflow-x-auto shadow-md sm:rounded-lg my-3">
                        <table class="w-full text-sm text-left rtl:text-right text-gray-500">
                            <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                                <tr>
                                    <th scope="col" class="px-6 py-3">Cantidad</th>
                                    <th scope="col" class="px-6 py-3">Marca</th>
                                    <th scope="col" class="px-6 py-3">No. Serie</th>
                                    <th scope="col" class="px-6 py-3">Estatus</th>
                                    <th scope="col" class="px-6 py-3">Descripción</th>
                                    <th scope="col" class="px-6 py-3">Sucursal</th>
                                    <th scope="col" class="px-6 py-3">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($inventories as $inventory)
                                    <tr class="{{ $loop->odd ? 'bg-white' : 'bg-gray-50' }} border-b">
                                        <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                            {{ $inventory->quantity }}</td>
                                        <td class="px-6 py-4">{{ $inventory->brand }}</td>
                                        <td class="px-6 py-4">{{ $inventory->serial_number }}</td>
                                        <td class="px-6 py-4">{{ $inventory->status }}</td>
                                        <td class="px-6 py-4">{{ $inventory->description }}</td>
                                        <td class="px-6 py-4">{{ $inventory->branch->name }}</td>
                                        <td class="px-6 py-4">
                                            <livewire:modal-editar id="{{$inventory->id}}" />
                                            <livewire:delete-inventory id="{{$inventory->id}}" />
                                        </td>
                                    </tr>                                    
                                @endforeach
                            </tbody>
                        </table>
                        @if(!$inventories->count()) 
                            <p class="text-sm my-4 text-gray-500/80 text-center capitalize">No hay ningún producto en el inventario, agregue uno.</p>
                        @endif
                    </div>

                    <div class="mt-4">
                        {{ $inventories->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
