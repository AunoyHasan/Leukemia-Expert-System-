<?php

namespace App\Models;

use App\Models\Symptom;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class History extends Model
{
    use HasFactory;

    public function symptom(){
        return $this->belongsTo(Symptom::class, 'symptom_id');
    }
}
