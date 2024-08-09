<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Associates_user_and_subject extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table = 'associates_user_and_subject';
    //カラムにuser_idとsubject_idがあるから主キーを設定できない

    protected $fillable = [
        
        'user_and_subject_id',
        'user_id',
        'subject_id',
        
    ];

}
