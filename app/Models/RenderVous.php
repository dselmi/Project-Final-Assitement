<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class RenderVous extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'fiche_id',
        'date_rdv',
        'phone_femme'
    ];

    protected $casts = [
        'date_rdv' => 'date',
    ];
}
