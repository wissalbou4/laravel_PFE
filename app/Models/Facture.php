<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Facture extends Model
{
    protected $guarded=["id"];

    public function patient(){
        return $this->belongsTo(Patient::class);
    }
}
