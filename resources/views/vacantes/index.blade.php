<x-app-layout>
  <x-slot name="header">
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
          {{ __('Mis vacantes') }}
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
                  <h2 class="font-bold text-center text-3xl">Listado de vacantes</h2>

                  <livewire:mostrar-vacantes>
              </div>
          </div>
      </div>
  </div>
</x-app-layout>
