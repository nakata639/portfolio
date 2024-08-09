<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Class extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table = 'class';
    protected $primaryKey = 'class_id';

    protected $fillable = [
        
        'class_times',
        'class_hour',
        'class_day',
        'class_id',
        
    ];

}
  