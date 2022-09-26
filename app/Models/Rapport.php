<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rapport extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'parent_id',
        'fiche_id',
        'rapport_type',
        'date',
        'place',
        'rapport',
    ];

    protected $casts = [
        'date' => 'date'
    ];

    public function ecoutante()
    {
        return $this->belongsTo(User::class,'user_id','id');
    }
}
