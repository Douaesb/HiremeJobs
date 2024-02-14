<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subscription extends Model
{
    use HasFactory;

    protected $fillable = [
        'chercheur_id',
        'entreprise_id',
        'subscribed'
    ];

    public function chercheur()
    {
        return $this->belongsTo(User::class, 'chercheur_id', 'id');
    }

    public function entreprise()
    {
        return $this->belongsTo(User::class, 'entreprise_id', 'id');
    }
}
