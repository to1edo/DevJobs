<div>

    <livewire:filtrar-vacantes>

    <div class="py-12">
        <div class="max-w-7xl mx-auto">
            <h3 class="text-center font-extrabold text-4xl text-gray-800 mb-12">Nuestras vacantes disponibles</h3>

            <div class="bg-white p-6 shadow-sm rounded-lg">

                @forelse ($vacantes as $vacante )
                    <div class="md:flex md:justify-between md:items-center md:gap-4 py-5 border-b border-gray-300 ">
                        <div class="md:flex-1">
                            <a class="text-3xl font-extrabold text-gray-600" href="{{ route('vacantes.show',$vacante->id)}}">{{$vacante->titulo}}</a>
                            <p class="text-gray-700 font-black text-xs uppercase flex items-end">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 21h16.5M4.5 3h15M5.25 3v18m13.5-18v18M9 6.75h1.5m-1.5 3h1.5m-1.5 3h1.5m3-6H15m-1.5 3H15m-1.5 3H15M9 21v-3.375c0-.621.504-1.125 1.125-1.125h3.75c.621 0 1.125.504 1.125 1.125V21" />
                                </svg>
                                {{$vacante->empresa}}
                            </p>
                            <p class="text-sm text-gray-800 mt-2">Categoria: {{ $vacante->categoria->categoria}}</p>
                            <p class="text-sm text-gray-800 mt-2">Salario: {{ $vacante->salario->salario}}</p>
                            <p class="text-sm text-gray-500 mt-2">{{ $vacante->created_at->diffForHumans()}}</p>

                        </div>

                        <div class="mt-5 md:mt-0">
                            <a class="block text-center bg-lime-600 p-3 text-sm font-bold text-white rounded-lg" href="{{ route('vacantes.show',$vacante->id)}}">Ver vacante</a>
                        </div>
                    </div>
                @empty
                    <p class="p-3 text-center text-sm text-neutral-600">No hay vacantes disponibles todavia</p>
                @endforelse
            </div>
        </div>

        <div class="mt-5 flex justify-center">
            {{$vacantes->links()}}
        </div>
    </div>
</div>
