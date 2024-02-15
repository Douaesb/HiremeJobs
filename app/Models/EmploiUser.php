<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmploiUser extends Model
{
    use HasFactory;

    protected $table = 'emploi_user';
    protected $fillable = [
        'user_id',
        'emploi_id',
    ];

    
}