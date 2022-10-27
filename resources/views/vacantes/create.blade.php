<x-app-layout>
  <x-slot name="header">
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
          {{ __('Crear Vacante') }}
      </h2>
  </x-slot>

  <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
          <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
              <div class="p-6 bg-white border-b border-gray-200">

                <h1 class="text-center text-2xl mb-6 font-bold">Publicar una vacante</h1>
                
                <div class="md:flex justify-center p-5">

                    <livewire:crear-vacante>
                        
                </div>

              </div>
          </div>
      </div>
  </div>
</x-app-layout>