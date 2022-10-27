<?php

namespace App\Http\Livewire;

use App\Models\Salario;
use App\Models\Vacante;
use Livewire\Component;
use App\Models\Categoria;
use Illuminate\Support\Carbon;
use Livewire\WithFileUploads;

class EditarVacante extends Component
{
    public $vacante_id;
    public $titulo;
    public $salario;
    public $categoria;
    public $empresa;
    public $ultimo_dia;
    public $descripcion;
    public $imagen;
    public $imagen_nueva;

    //habilitar subida de archivos
    use WithFileUploads;

    //establecer reglas para la validacion
    protected $rules = [
        "titulo" => "required|string",
        "salario" => 'required|between:1,9',
        "categoria" => 'required|between:1,7',
        "empresa" => 'required',
        "ultimo_dia" => 'required',
        "descripcion" => 'required',
        "imagen_nueva" => 'nullable|image|max:1024'
    ];


    public function mount(Vacante $vacante){
        $this->titulo = $vacante->titulo;
        $this->categoria = $vacante->categoria_id;
        $this->salario = $vacante->salario_id;
        $this->empresa = $vacante->empresa;
        $this->ultimo_dia = Carbon::parse($vacante->ultimo_dia)->format("Y-m-d");
        $this->descripcion = $vacante->descripcion;
        $this->imagen = $vacante->imagen;
        $this->vacante_id = $vacante->id;

    }

    public function editarVacante(){

        $this->validate();

        $vacante = Vacante::find($this->vacante_id);

        if($this->imagen_nueva){
            //guardar imagen
            $imagen = $this->imagen_nueva->store('public/vacantes');
            $nombre_imagen = explode('/',$imagen)[2];

            $vacante->imagen = $nombre_imagen;

        }else{
            $vacante->imagen = $this->imagen;
        }
        
        $vacante->titulo = $this->titulo;
        $vacante->salario_id = $this->salario;
        $vacante->categoria_id = $this->categoria;
        $vacante->empresa = $this->empresa;
        $vacante->ultimo_dia = $this->ultimo_dia;
        $vacante->descripcion = $this->descripcion;
        
        $vacante->save();

        //retornar mensaje
        session()->flash('mensaje','La vacante fue actualizada correctamente');

        //redireccionar
        return redirect()->route('vacantes.index');
    }


    public function render()
    {
        //consultar DB para obtener salarios
        $salarios = Salario::all();

        //consultar DB para obtener categorias
        $categorias = Categoria::all();

        return view('livewire.editar-vacante',[
            "salarios" => $salarios,
            "categorias" => $categorias
        ]);
    }
}
