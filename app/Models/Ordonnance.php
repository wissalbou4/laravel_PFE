<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ordonnance extends Model
{
    protected $guarded=["id"];

    protected $casts = [
        'traitement' => 'array'
    ];

    public function patients(){
        return $this->belongsTo(Patient::class) ;     
}


}
