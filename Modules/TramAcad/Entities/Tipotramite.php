<?php

namespace Modules\TramAcad\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Tipotramite extends Model
{
    //use HasFactory;

    protected $fillable = [];
    
    protected static function newFactory()
    {
        //return \Modules\TramAcad\Database\factories\TipotramiteFactory::new();
    }

    //Uno a Uno

    public function tramite(){
		//$profile = Profile::where('user_id', $this->id)->first();
		//return $profile;
		
		//return $this->hasOne(Profile::class);
		
		return $this->hasOne('Modules\TramAcad\Entities\Tramite');
	}

    public function estados(){
		return $this->belongsToMany('Modules\TramAcad\Entities\Estado');
	}
}
