<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use \App\Models\patient;
class RendezVous extends Model
{
    protected $guarded=["id"];
    protected $table = 'rendez_vous';
    // Modèle Rendezvous.php
public function patient()
{
    return $this->belongsTo(Patient::class);
}

}
