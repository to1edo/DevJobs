<div class="mt-8 flex justify-center">

    @if (session()->has('mensaje'))
        <div class=" flex justify-center mt-5">
            <p class="p-2 text-center bg-green-300 text-green-600 font-semibold">{{ session('mensaje')}}</p>
        </div>
    @else
        @if ($vacante->checkUser(auth()->user()))
            <p class="p-2 text-center bg-green-300 text-green-600 font-semibold">Ya te has postulado a esta vacante, mucha suerte!</p>
        @else
            <form class="bg-gray-300 p-6 rounded-xl space-y-5" wire:submit.prevent ='postularVacante'>
                <p class="text-center text-xl font-bold">Postularse a esta vacante</p>
                
                <x-input-label for="cv" :value="__('Hoja de vida o CV (PDF)')" class="mt-8"  />

                <x-text-input id="cv" class="block w-full" type="file" accept=".pdf" wire:model="cv" />

                <x-input-error :messages="$errors->get('cv')"  />

                <x-primary-button class="mx-auto block ">
                    {{ __('Postularse') }}
                </x-primary-button>

            </form>
        @endif
    @endif

</div>
