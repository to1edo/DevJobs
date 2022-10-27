<?php

namespace App\Http\Livewire;

use App\Models\Vacante;
use Livewire\Component;

class HomeVacantes extends Component
{

    public $termino;
    public $categoria;
    public $salario;

    protected $listeners = ['terminosBusqueda'=> 'buscar'];

    public function buscar($termino, $salario, $categoria){
        $this->termino = $termino;
        $this->salario = $salario;
        $this->categoria = $categoria;
    }
    
    public function render()
    {
        $vacantes = Vacante::when($this->termino, function($query){
            $query->where('titulo','LIKE', '%'.$this->termino.'%');
        })->when($this->termino, function($query){
            $query->orWhere('empresa','LIKE', '%'.$this->termino.'%');
        })->when($this->salario, function($query){
            $query->where('salario_id', $this->salario);
        })->when($this->categoria, function($query){
            $query->where('categoria_id',$this->categoria);
        })->paginate(10);

        return view('livewire.home-vacantes',[
            "vacantes" => $vacantes
        ]);
    }
}
