<?php

namespace Modules\TramAcad\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Pago extends Model
{
    //use HasFactory;

    protected $fillable = [];
    
    protected static function newFactory()
    {
        //return \Modules\TramAcad\Database\factories\PagoFactory::new();
    }

    //uno a uno a la inversa

    public function tramite(){
		return $this->belongsTo('Modules\TramAcad\Entities\Tramite');
	}
}
