<div class="mt-8">

    @if (count($vacantes) > 0)

        @foreach ( $vacantes as $vacante )
        <div class="py-6 px-2 border-b border-gray-300 flex flex-col gap-4  md:flex-row md:justify-between">

            <div class="flex flex-col gap-2 items-center md:items-start">
                <a href="{{route('vacantes.show',$vacante)}}" class="font-black text-2xl">
                    {{$vacante->titulo}}
                </a>
                <p class="text-gray-700 font-black text-xs uppercase flex items-end">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 21h16.5M4.5 3h15M5.25 3v18m13.5-18v18M9 6.75h1.5m-1.5 3h1.5m-1.5 3h1.5m3-6H15m-1.5 3H15m-1.5 3H15M9 21v-3.375c0-.621.504-1.125 1.125-1.125h3.75c.621 0 1.125.504 1.125 1.125V21" />
                    </svg>
                    {{$vacante->empresa}}
                </p>
                <p class="text-gray-700 text-sm mt-2">Fecha limite: {{$vacante->ultimo_dia->format('d/m/y')}}</p>
            </div>

            <div class="flex flex-col items-stretch md:items-center md:flex-row gap-4">
                <a href="{{route('postulaciones.index',$vacante)}}" class="px-3 py-2 bg-gray-800 text-white rounded-lg flex items-center justify-center gap-1">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 19.128a9.38 9.38 0 002.625.372 9.337 9.337 0 004.121-.952 4.125 4.125 0 00-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 018.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0111.964-3.07M12 6.375a3.375 3.375 0 11-6.75 0 3.375 3.375 0 016.75 0zm8.25 2.25a2.625 2.625 0 11-5.25 0 2.625 2.625 0 015.25 0z" />
                    </svg>
                    Candidatos
                </a>

                <a href="{{route('vacantes.edit',$vacante->id)}}" class="px-3 py-2 bg-blue-800 text-white rounded-lg flex items-center justify-center gap-1">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                    </svg>
                    Editar
                </a>
                                    {{-- Llamar a la funcion de js --}}
                <button wire:click="$emit('eliminarVacante',{{$vacante->id}})"  class="px-3 py-2 bg-red-500 text-white rounded-lg flex items-center justify-center gap-1">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                    </svg>
                    Eliminar
                </button>
            </div>
            
        </div>
            
        @endforeach

    @else
        <p class="text-center font-semibold text-gray-500">No tienes vacantes registradas</p>
    @endif


    <div class="mt-5 flex justify-center">
        {{$vacantes->links()}}
    </div>

    @push('scripts')
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

        <script>
            
            Livewire.on('eliminarVacante',(id)=>{

                Swal.fire({
                title: 'Desea eliminar la vacante?',
                text: "esta accion no se puede revetir!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Si, eliminar'
                }).then((result) => {

                    if (result.isConfirmed) {

                        //llamar al metodo de livewire
                        Livewire.emit('eliminar', id);

                        Swal.fire(
                        'eliminado!',
                        'La vacante ha sido eliminada.',
                        'success'
                        )
                    }
                })
            })
        </script>
    @endpush
</div>


