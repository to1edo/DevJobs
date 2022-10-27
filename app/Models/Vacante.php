<?php

namespace App\Models;

use App\Models\Salario;
use App\Models\Categoria;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Vacante extends Model
{
    use HasFactory;

    protected $dates = ['ultimo_dia'];

    protected $fillable = [
        'titulo',
        'categoria_id',
        'salario_id',
        'ultimo_dia',
        'empresa',
        'descripcion',
        'publicado',
        'imagen',
        'user_id'
    ];


    public function salario(){
        return $this->belongsTo(Salario::class);
    }

    public function categoria(){
        return $this->belongsTo(Categoria::class);
    }

    public function postulaciones(){
        return $this->hasMany(Postulacion::class)->orderBy('created_at','DESC');
    }

    public function checkUser(User $user){
        return $this->postulaciones->contains('user_id',$user->id);
    }

    public function reclutador(){
        return $this->belongsTo(User::class,'user_id');
    }
}
