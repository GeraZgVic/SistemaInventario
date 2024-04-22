<div class="relative shadow-md overflow-x-auto sm:rounded-lg my-3">
    <div class='mb-2 flex p-1'>
        {{-- BUSCAR POR TIPO DE SUCURSAL --}}
        <select wire:model.live.debounce.150ms="branch_id"
            class="bg-slate-50 border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-l-md shadow-md text-sm">
            <option value="">Seleccione la Sucursal</option>
            @foreach ($branches as $branch)
                <option value="{{ $branch->id }}">{{ $branch->name }}</option>
            @endforeach
        </select>
        <input placeholder="Buscar por termino"
            class="w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-r-md shadow-md text-sm"
            id="search" type="text" wire:model.live.debounce.150ms="search">

    </div>
    <table class="w-full text-sm text-left rtl:text-right text-gray-500">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50">
            <tr>
                <th scope="col" class="px-6 py-3">Cantidad</th>
                <th scope="col" class="px-6 py-3">Marca</th>
                <th scope="col" class="px-6 py-3">Modelo</th>
                <th scope="col" class="px-6 py-3">No. Serie</th>
                <th scope="col" class="px-6 py-3">Estatus</th>
                <th scope="col" class="px-6 py-3">Descripción</th>
                <th scope="col" class="px-6 py-3">Sucursal</th>
                <th scope="col" class="px-6 py-3">Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($inventories as $inventory)
                <tr wire:key='{{ $inventory->id }}' class="{{ $loop->odd ? 'bg-white' : 'bg-gray-50' }} border-b">
                    <td wire:key='{{ $inventory->id }}' class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                        {{ $inventory->quantity }}</td>
                    <td wire:key='{{ $inventory->id }}' class="px-6 py-4">{{ $inventory->brand }}</td>
                    <td wire:key='{{ $inventory->id }}' class="px-6 py-4">{{ $inventory->model }}</td>
                    <td wire:key='{{ $inventory->id }}' class="px-6 py-4">{{ $inventory->serial_number }}</td>
                    <td wire:key='{{ $inventory->id }}' class="px-6 py-4">{{ $inventory->status }}</td>
                    <td wire:key='{{ $inventory->id }}' class="px-6 py-4">{{ $inventory->description }}</td>
                    <td wire:key='{{ $inventory->id }}' class="px-6 py-4">{{ $inventory->branch->name }}</td>
                    <td wire:key='{{ $inventory->id }}' class="px-6 py-4">
                        <div class="flex items-center">
                            <livewire:modal-editar :key="'modal-editar-' . $inventory->id" :id="$inventory->id" />
                            <livewire:delete-inventory :key="'delete-inventory' . $inventory->id" :id="$inventory->id" />

                            <a
                                wire:key='{{$inventory->id}}' 
                                href="{{route('inventory.show', $inventory->id)}}" 
                                class="text-green-600 hover:text-green-700">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z" />
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                                </svg>
                            </a>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    @if (!$inventories->count())
        <p class="text-sm my-4 text-gray-500 text-center">No se encuentra ningún registro...</p>
    @endif
    <div class="px-4 py-3">
        {{ $inventories->links() }}
    </div>
</div>
