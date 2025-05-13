<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    protected $guarded=['id'];
  
    public function farctures(){
        return $this->hasMany(Facture::class);
    }
    public function ordonnance(){
        return $this->hasMany(Ordonnance::class) ;     
}
public function rendez_vous(){
    return $this->hasMany(RendezVous::class) ;     
}
}
