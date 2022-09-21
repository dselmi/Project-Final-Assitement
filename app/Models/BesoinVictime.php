<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BesoinVictime extends Model
{
    use HasFactory;

    protected $fillable = [
        'fiche_id',
        'medical_follow',
        'social_follow',
        'psychological_follow',
        'legal_follow',
        'other_needs',
    ];

    protected $casts = [
        'medical_follow' => 'boolean',
        'social_follow' => 'boolean',
        'psychological_follow' => 'boolean',
        'legal_follow' => 'boolean',
    ];
}
