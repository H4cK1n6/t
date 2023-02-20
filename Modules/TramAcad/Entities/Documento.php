<?php

namespace Modules\TramAcad\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Documento extends Model
{
    //use HasFactory;

    protected $fillable = [];
    
    protected static function newFactory()
    {
       // return \Modules\TramAcad\Database\factories\DocumentoFactory::new();
    }

    public function solicitudes(){
		return $this->hasMany('Modules\TramAcad\Entities\Solicitud');
	}
}
