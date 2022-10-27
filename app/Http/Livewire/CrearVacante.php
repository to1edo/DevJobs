<?php

namespace App\Http\Livewire;

use App\Models\Categoria;
use App\Models\Salario;
use App\Models\Vacante;
use Livewire\Component;
use Livewire\WithFileUploads;

class CrearVacante extends Component
{

    public $titulo;
    public $salario;
    public $categoria;
    public $empresa;
    public $ultimo_dia;
    public $descripcion;
    public $imagen;

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
        "imagen" => 'required|image',
    ];


    public function crearVacante(){
        $this->validate();

        //guardar imagen
        $imagen = $this->imagen->store('public/vacantes');

        $nombre_imagen = explode('/',$imagen)[2];
        
        //crear vacante
        Vacante::create([
            "titulo" => $this->titulo,
            "salario_id" => $this->salario,
            "categoria_id" => $this->categoria,
            "empresa" => $this->empresa,
            "ultimo_dia" => $this->ultimo_dia,
            "descripcion" => $this->descripcion,
            "imagen" => $nombre_imagen,
            "publicado" => 1,
            "user_id" => auth()->user()->id
        ]);


        //retornar mensaje
        session()->flash('mensaje','La vacante fue creada correctamente');

        //redireccionar
        return redirect()->route('vacantes.index');
    }


    public function render()
    {
        //consultar DB para obtener salarios
        $salarios = Salario::all();

        //consultar DB para obtener categorias
        $categorias = Categoria::all();

        return view('livewire.crear-vacante',[
            "salarios" => $salarios,
            "categorias" => $categorias
        ]);
    }
}
