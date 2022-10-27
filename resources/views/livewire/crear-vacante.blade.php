<form class="md:w-1/2 space-y-5" wire:submit.prevent ='crearVacante'>

    <div>
        <x-input-label for="titulo" :value="__('Titulo de la vacante')" />

        <x-text-input id="titulo" class="block mt-1 w-full" type="text" wire:model="titulo" :value="old('titulo')" placeholder="titulo vacante"/>

        <x-input-error :messages="$errors->get('titulo')" class="mt-2" />
    </div>

    <div>
        <x-input-label for="salario" :value="__('Salario mensual')" />

        <select id="salario" wire:model="salario" class="w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
            <option value="" >-- Selecciona el rango de salario --</option>
            
            {{-- imprimir salarios --}}
            @foreach ($salarios as $salario )
                <option value="{{$salario->id}}">{{$salario->salario}}</option>
            @endforeach

        </select>
        
        <x-input-error :messages="$errors->get('salario')" class="mt-2" />

    </div>

    <div>
        <x-input-label for="categoria" :value="__('Categoria')" />

        <select id="categoria" wire:model="categoria" class="w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
            <option value="">-- Selecciona una categoria --</option>
            
            {{-- imprimir categorias--}}
            @foreach ($categorias as $categoria )
                <option value="{{$categoria->id}}">{{$categoria->categoria}}</option>
            @endforeach

        </select>
        
        <x-input-error :messages="$errors->get('categoria')" class="mt-2" />

    </div>

    <div>
        <x-input-label for="empresa" :value="__('Empresa')" />

        <x-text-input id="empresa" class="block mt-1 w-full" type="text" wire:model="empresa" :value="old('empresa')" placeholder="Empresa Ej. Facebook, Uber, Spotify"/>

        <x-input-error :messages="$errors->get('empresa')" class="mt-2" />
    </div>

    <div>
        <x-input-label for="ultimo_dia" :value="__('Ultimo dia para postularse')" />

        <x-text-input id="ultimo_dia" class="block mt-1 w-full" type="date" wire:model="ultimo_dia" :value="old('ultimo_dia')"/>

        <x-input-error :messages="$errors->get('ultimo_dia')" class="mt-2" />
    </div>

    <div>
        <x-input-label for="descripcion" :value="__('Descripcion de la vacante')" />

        <textarea wire:model="descripcion" id="descripcion" cols="30" rows="6" placeholder="Descripcion general" class="w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"></textarea>

        <x-input-error :messages="$errors->get('descripcion')" class="mt-2" />
    </div>

    
    <div>
        <x-input-label for="imagen" :value="__('Imagen')" />

        <x-text-input id="imagen" class="block mt-1 w-full" type="file" accept="image/*" wire:model="imagen" />

        {{-- preview de la imagen --}}
        <div class="mt-5 w-60">
            @if ($imagen)
                Vista previa:
                <img src="{{$imagen->temporaryUrl()}}">
            @endif
        </div>

        <x-input-error :messages="$errors->get('imagen')" class="mt-2" />
    </div>


    <x-primary-button class="mx-auto block">
        {{ __('Crear vacante') }}
    </x-primary-button>
</form>
