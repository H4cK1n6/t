<?php

namespace Modules\TramAcad\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Tramite extends Model
{
    //use HasFactory;

    protected $fillable = [];
    
    protected static function newFactory()
    {
        //return \Modules\TramAcad\Database\factories\TramiteFactory::new();
    }

    //Uno a uno
    public function pago(){		
		return $this->hasOne('Modules\TramAcad\Entities\Pago');
	}

    //Uno a Uno inversa

    public function solicitud(){
		return $this->belongsTo('Modules\TramAcad\Entities\Solicitud');
	}

    //Uno a muchos

    public function unidad(){
		return $this->belongsTo('Modules\TramAcad\Entities\Unidad');
	}

    public function estadotramite(){
		return $this->hasMany('Modules\TramAcad\Entities\Estadotramite');
	}
}
