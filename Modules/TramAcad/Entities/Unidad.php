<?php

namespace Modules\TramAcad\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Unidad extends Model
{
    //use HasFactory;

    protected $fillable = [];

    protected $table = "unidades";
    
    protected static function newFactory()
    {
        //return \Modules\TramAcad\Database\factories\UnidadFactory::new();
    }
    //uno a muchos

    public function solicitudes(){
		return $this->hasMany('Modules\TramAcad\Entities\Solicitud');
	}

    public function tramites(){
		return $this->hasMany('Modules\TramAcad\Entities\Tramite');
	}
}
