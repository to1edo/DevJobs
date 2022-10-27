<div>
    <p class="text-4xl font-bold capitalize">{{$vacante->titulo}}</p>

    <img class="md:w-96 mx-auto mt-5" src="{{asset('storage/vacantes/'.$vacante->imagen)}}" alt="imagen vacante">
    <div class="mt-10 md:grid md:grid-cols-2 bg-gray-200 p-5 rounded-lg">
        <p class="font-bold mb-5">Empresa: <span class="font-normal">{{$vacante->empresa}}</span></p>
        <p class="font-bold mb-5">Categoria: <span class="font-normal">{{$vacante->categoria->categoria}}</span></p>
        <p class="font-bold mb-5">Salario: <span class="font-normal">{{$vacante->salario->salario}}</span></p>
        <p class="font-bold mb-5">Fecha Limite: <span class="font-normal">{{$vacante->ultimo_dia->toFormattedDateString()}}</span></p>
        <p class="font-bold mb-5">Descripcion de la vacante:  <span class="font-normal">{{$vacante->descripcion}}</span></p>
    </div>
    
    @auth
        @cannot('create',App\Models\Vacante::class)

            <livewire:postular-vacante :vacante="$vacante" />

        @endcannot     
    @endauth
    

    @guest
        <div class="mt-10">
            <p class="text-center">Deseas postularte a esta vacante? para hacerlo debes <a href="{{route('register')}}" class="font-bold text-lime-600">Crear una cuenta o iniciar sesion</a></p>
        </div>
    @endguest
    
</div>
