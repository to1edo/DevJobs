<x-app-layout>
  <x-slot name="header">
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
          {{ __('Postulaciones de la vacante: '.$vacante->titulo) }}
      </h2>
  </x-slot>

  @if (session()->has('mensaje'))
      <div class=" flex justify-center mt-5">
          <p class="p-2 text-center bg-green-300 text-green-600 font-semibold">{{ session('mensaje')}}</p>
      </div>
  @endif

  <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
          <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
              <div class="p-6 bg-white border-b border-gray-200">
                  <h2 class="font-bold text-center text-3xl mb-5">Listado de postulaciones</h2>

                  @forelse ( $postulaciones as  $postulacion )
                    <div class="border border-gray-300 mb-5 p-4 flex  flex-col md:flex-row md:justify-between md:items-center gap-4">
                      <div>
                        <p class="font-bold">Nombre: <span class="font-normal">{{$postulacion->usuario->name}}</span></p>
                        <p class="font-bold">Email: <span class="font-normal">{{$postulacion->usuario->email}}</span></p>
                        <p class="text-sm text-gray-500">Postulado {{ $postulacion->created_at->diffForHumans()}}</p>

                      </div>
                      <a class="bg-lime-500 p-2 text-white rounded-lg text-center " target="_blank" href="{{asset('storage/postulaciones/'.$postulacion->cv)}}">Hoja de vida o CV</a>
                    </div>
                  @empty
                    <p class="text-center font-semibold text-gray-500">No tienes postulaciones para esta vacante</p>
                  @endforelse
                  
              </div>
          </div>
      </div>
  </div>
</x-app-layout>
