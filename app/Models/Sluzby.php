<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\DB;


class Sluzby extends Model
{
    protected $table = "ponuky";
    use HasFactory,Notifiable;


    protected $fillable = [
        'meno',
        'priezvisko',
        'email',
        'mesto',
        'datum',
        'poznamka',
    ];

}
