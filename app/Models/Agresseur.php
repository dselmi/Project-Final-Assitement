<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Agresseur extends Model
{
    use HasFactory;

    protected $fillable = [
        'fiche_id',
        'first_name',
        'last_name',
        'age',
        'nationality',
        'profession',
        'level_instruction',
        'relation',
        'phone',
        'address',
        'state',
    ];

    public function fiche()
    {
        return $this->belongsTo(Fiche::class);
    }
}
