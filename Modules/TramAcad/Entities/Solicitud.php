<?php

namespace Modules\TramAcad\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Solicitud extends Model
{
    //use HasFactory;

    protected $fillable = [];

    protected $table = "solicitudes";
    
    protected static function newFactory()
    {
        //return \Modules\TramAcad\Database\factories\SolicitudFactory::new();
    }

    //Uno a Uno

    public function tramite(){		
		return $this->hasOne('Modules\TramAcad\Entities\Tramite');
	}

    //Uno a muchos
    public function user(){
		return $this->belongsTo('App\User');
	}

    public function Unidad(){
		return $this->belongsTo('Modules\TramAcad\Entities\Unidad');
	}

    public function Documento(){
		return $this->belongsTo('Modules\TramAcad\Entities\Documento');
	}
}
