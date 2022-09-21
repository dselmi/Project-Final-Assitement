<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Renseignement extends Model
{
    use HasFactory;

    protected $fillable = [
        'fiche_id',
        'first_name',
        'last_name',
        'date_naissance',
        'lieu_naissance',
        'nationality',
        'profession',
        'level_instruction',
        'cin_passeport',
        'phone',
        'address',
        'delegation',
        'governorate',
        'ordered_by',
        'place_residence',
    ];
}
