<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Cherheur extends User
{
    use HasApiTokens, HasFactory, Notifiable;

    public function displayProfile(){
        
    }

}
