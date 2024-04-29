<div class="relative shadow-md overflow-x-auto sm:rounded-lg my-3">
    <div class='mb-2 flex p-1'>
        {{-- BUSCAR POR TERMINO--}}
        
        <input placeholder="Buscar por termino"
            class="w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-md text-sm"
            id="search" type="text" wire:model.live.debounce.150ms="search">

    </div>
    <table class="w-full text-sm text-left rtl:text-right text-gray-500">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50">
            <tr>
                <th scope="col" class="px-6 py-3">Nombre</th>
                <th scope="col" class="px-6 py-3">Email</th>
                <th scope="col" class="px-6 py-3">Rol</th>
                <th scope="col" class="px-6 py-3">Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
                <tr wire:key='{{ $user->id }}' class="{{ $loop->odd ? 'bg-white' : 'bg-gray-50' }} border-b">
                    <td wire:key='{{ $user->id }}' class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                        {{ $user->name }}</td>
                    <td wire:key='{{ $user->id }}' class="px-6 py-4">{{ $user->email }}</td>
                    <td wire:key='{{ $user->id }}' class="px-6 py-4 capitalize">{{ $user->roles->count() ? $user->roles[0]->name : 'Sin rol' }}</td>
                    <td wire:key='{{ $user->id }}' class="px-6 py-4">
                        <div class="flex items-center">
                            <livewire:modal-edit-user :key="'modal-editar-user' . $user->id" :id="$user->id" />
                            <livewire:delete-user :key="'delete-user' . $user->id" :id="$user->id" />
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    @if (!$users->count())
        <p class="text-sm my-4 text-gray-500 text-center">No se encuentra ningún registro...</p>
    @endif
    <div class="px-4 py-3">
        {{ $users->links() }}
    </div>
</div>
