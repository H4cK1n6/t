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
    public function Pago(){		
		return $this->hasOne('Modules\TramAcad\Entities\Pago');
	}

    //Uno a Uno inversa

    public function Tipotramite(){
		//$user = User::find($this->user_id);
		//return $user;
		return $this->belongsTo('Modules\TramAcad\Entities\Tipotramite');
	}

    public function Solicitud(){
		return $this->belongsTo('Modules\TramAcad\Entities\Solicitud');
	}

    //Uno a muchos

    public function Unidad(){
		return $this->belongsTo('Modules\TramAcad\Entities\Unidad');
	}

    public function Estadotramite(){
		return $this->belongsTo('Modules\TramAcad\Entities\Estadotramite');
	}
}
