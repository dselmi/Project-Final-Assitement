<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Victime extends Model
{
    use HasFactory;

    protected $fillable = [
        'fiche_id',
        'state',
        'duration_state',
        'nb_childrens',
        'check_other_people',
        'other_people',
        'situation_victime',
        'maladies',
        'living_together_with_times_events',
    ];

    protected $casts = [
        'check_other_people' => 'boolean',
        'situation_victime' => 'array',
        'living_together_with_times_events'=> 'boolean',
    ];
}
