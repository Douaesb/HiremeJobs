<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Emploi extends Model
{
    use HasFactory;

    protected $fillable = [
        'nom',
        'titre',
        'description',
        'competences',
        'type_contrat',
        'emplacement',
        'user_id',
    ];
}
