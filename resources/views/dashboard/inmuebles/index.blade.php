<div x-data="{openModal: false}" class="dark:bg-gray-800">

    <div class="">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <a href="{{ route('dashboard.inmuebles.create') }}" class="mb-2 appearance-none text-md px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-700">+ Crear</a>
                <x-table.table>
                    <x-slot name="head">                        
                        <x-table.heading>#</x-table.heading>
                        <x-table.heading>Portada</x-table.heading>
                        <x-table.heading>Titulo</x-table.heading>
                        <x-table.heading>Description</x-table.heading>
                        <x-table.heading>Acciones</x-table.heading>
                    </x-slot>

                    <x-slot name="body">
                        @forelse($inmuebles as $inmueble)
                            <x-table.row wire:loading.class="opacity-50">
                                <x-table.cell>
                                    {{$inmueble->id}}
                                </x-table.cell>
                                <x-table.cell>
                                    <img src="{{ Storage::url($inmueble->imagen()) }}" alt="{{$inmueble->title}}">
                                </x-table.cell>
                                <x-table.cell>
                                    {{ $inmueble->titulo() }}
                                </x-table.cell>
                                <x-table.cell>
                                    {{ $inmueble->description }}
                                </x-table.cell>
                                <x-table.cell>
                                    <a href="{{ route('dashboard.inmuebles.edit', $inmueble->id) }}" class="px-4 py-2 text-md bg-blue-500 text-white rounded-md hover:bg-green-700">Editar</a>

                                    <button wire:click="$set('idDelete', {{$inmueble->id}})" x-on:click="openModal = true" class="appearance-none text-md px-4 py-1 bg-red-500 text-white rounded-md hover:bg-red-700">Delete</button>
                                    
                                </x-table.cell>
                            </x-table.row>
                        @empty
                            <x-table.row>
                                <x-table.cell colspan="5">
                                    <div class="flex justify-center items-center text-xl font-bold text-gray-500">No hay
                                        resultados...
                                    </div>
                                </x-table.cell>
                            </x-table.row>
                        @endforelse
                    </x-slot>
                </x-table.table>

                <x-modal />
            </div>
        </div>
    </div>
</div>