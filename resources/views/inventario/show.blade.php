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
                    <img
                    class="object-cover max-w-lg rounded" 
                    src="https://images.unsplash.com/photo-1606904825846-647eb07f5be2?q=80&w=2070&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" 
                    alt="router">

                    <div class="space-y-6">
                        <div class="grid grid-cols-1 sm:grid-cols-2">
                            <div>
                                <P class="font-semibold">Modelo: <span class="font-normal">{{ $product->model }} </span></P>
                                <p class="font-semibold">Marca: <span class="font-normal">{{ $product->brand }} </span></p>
                                <p class="font-semibold">Sucursal: <span class="font-normal">{{ $product->branch->name }} </span></p>
                            </div>
                            <div>
                                <p class="font-semibold">Estatus: <span class="font-normal">{{ $product->status }}</span></p>
                                <p class="font-semibold">Cantidad: <span class="font-normal">{{ $product->quantity }}</span> </p>
                                <p class="font-semibold">No. Serie: <span class="font-normal">{{ $product->serial_number }}</span></p>
                            </div>
                        </div>
                        
                        <p class="text-center"><span class="font-normal">{{ $product->description }}</span></p>
                    </div>
                    
                </div>
                <footer class="text-center py-2 my-3">
                    <p class="font-bold">Ar Site Integradores</p>
                    <address class="font-normal">{{$product->branch->address}}</address>
                </footer>
            </div>
        </div>
    </div>
</x-app-layout>
