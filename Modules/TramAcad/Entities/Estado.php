<?php

namespace Modules\TramAcad\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Estado extends Model
{
    //use HasFactory;

    protected $fillable = [];
    
    protected static function newFactory()
    {
        //return \Modules\TramAcad\Database\factories\EstadoFactory::new();
    }

    public function tipotramites(){
		return $this->belongsToMany('Modules\TramAcad\Entities\Tipotramite');
	}
}
