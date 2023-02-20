<?php

namespace Modules\TramAcad\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Estadotramite extends Model
{
    //use HasFactory;

    protected $fillable = [];
    
    protected static function newFactory()
    {
      //  return \Modules\TramAcad\Database\factories\EstadotramiteFactory::new();
    }

    //Uno a muchos

    public function Tramite(){
		return $this->belongsTo('Modules\TramAcad\Entities\Tramite');
	}
}
