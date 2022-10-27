<?php

namespace App\Http\Livewire;

use App\Models\Postulacion;
use App\Notifications\NuevaPostulacion;
use Livewire\Component;
use Livewire\WithFileUploads;

class PostularVacante extends Component
{
    public $cv;
    public $vacante;

    //establecer reglas para la validacion
    protected $rules = [
        "cv" => 'required|mimes:pdf|max:2048'
    ];

    //habilitar subida de archivos
    use WithFileUploads;


    public function postularVacante(){
        $this->validate();
        
        //guardar pdf del CV
        $cv= $this->cv->store('public/postulaciones');
        $nombre_cv = explode('/',$cv)[2];

        //guardar postulacion
        $postulacion = new Postulacion();

        $postulacion->user_id = auth()->user()->id;
        $postulacion->vacante_id = $this->vacante->id;
        $postulacion->cv = $nombre_cv;

        $postulacion->save();
        
        //enviar notificacion
        $this->vacante->reclutador->notify(new NuevaPostulacion($this->vacante->id,$this->vacante->titulo,auth()->user()->id));
        
        //retornar mensaje
        session()->flash('mensaje','Tus datos fueron enviados correctamente, mucha suerte!');
        return redirect()->back();
    }

    public function render()
    {
        return view('livewire.postular-vacante');
    }
}
