<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Seat extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table = 'seat';
    protected $primaryKey = 'seat_id';

    protected $fillable = [

        'seat_name',
        'seat_id',
        
    ];
   
}
