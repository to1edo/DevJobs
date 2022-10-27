<x-app-layout>
  <x-slot name="header">
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
          {{ __('Notificaciones') }}
      </h2>
  </x-slot>

  <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
          <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
              <div class="p-6 bg-white border-b border-gray-200">

                <h1 class="text-center text-2xl mb-6 font-bold">Mis notificaciones</h1>
                
                @forelse ($notificaciones as $notificacion )

                  <div class=" md:flex md:justify-between md:items-center border border-gray-300 p-4">
                    <div class="mb-5 md:mb-0">
                      <p>Tienes una nueva postulacion en: <span class="font-bold">{{$notificacion->data["nombre"]}}</span></p>
                      <p class="text-sm text-gray-500">{{ $notificacion->created_at->diffForHumans()}}</p>
                    </div>
  
                    <a href="{{route('postulaciones.index',$notificacion->data['vacante_id'])}}" class="bg-lime-500 p-2 text-white rounded-lg md:mt-0">Ver postulaciones</a>
                  </div>

                @empty
                  <p class="text-center text-gray-400 font-bold">No tienes notificaciones nuevas</p>
                @endforelse

              </div>
          </div>
      </div>
  </div>
</x-app-layout>