<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Postulacion extends Model
{
    use HasFactory;
    protected $table = 'postulaciones';
    
    protected $fillable = [
        'user_id',
        'vacante_id',
        'cv'
    ];

    public function usuario(){
        return $this->belongsTo(User::class,'user_id');
    }

}
