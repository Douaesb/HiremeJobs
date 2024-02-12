<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;


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

    public function entreprise()
{
    return $this->belongsTo(User::class, 'user_id');
}

public function chercheurs()
{
    return $this->belongsToMany(User::class, 'emploi_user')->withTimestamps();
}


}
