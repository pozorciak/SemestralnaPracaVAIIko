<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;



class Pripomienky extends Model
{
    protected $table = "pripomienky";
    use HasFactory,Notifiable;


    protected $fillable = [
        'meno',
        'text',
    ];

}
