<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Associates_classroom_and_seat extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table = 'associates_classroom_and_seat';
    //classroom_idとseat_idがカラムにあるから主キーを設定できない

    protected $fillable = [
      
        'classroom_and_seat_id',
        'classroom_id'
        'seat_id'
        
    ];

}
