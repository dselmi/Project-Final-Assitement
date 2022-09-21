<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Violence extends Model
{
    use HasFactory;

    protected $fillable = [
        'fiche_id',
        'violence_type',
        'times',
        'lieu',
        'when',
        'who',
        'type_dommage',
        'type',
        'violence_using',
        'other',
        'breakage_objects',
        'makes_threats_against_other_people',
        'which_ones',
        'victim_not_consensual_sexuality',
        'accompanied_physical_brutality_threats',
        'forced_undergo_pornographic_scenarios',
    ];

    protected $casts = [
        'when' => 'date',
        'type_dommage' => 'array',
        'type' => 'array',
        'violence_using' => 'array',
        'accompanied_physical_brutality_threats' => 'boolean',
        'forced_undergo_pornographic_scenarios' => 'boolean',
        'victim_not_consensual_sexuality' => 'boolean',
        'makes_threats_against_other_people' => 'boolean',
        'breakage_objects' => 'boolean',
    ];
}
