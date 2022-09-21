<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Fiche extends Model
{
    use SoftDeletes;

    protected $dates = ['deleted_at'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'parent_id',
        'type',
        'date',
        'lieu',
        'femme',
        'naissance',
        'etat_civil',
        'adresse',
        'oriente_par',
        'motif_visite',
        'agresseur',
        'type_violence',
        'fils_victimes',
        'etapes',
        'decision',
        'date',
        'seance_num',
        'rapport',
        'activities',
        'demande',
    ];

    protected $casts = [
        'date' => 'date',
        'naissance' => 'date',
        'motif_visite' => 'array',
        'agresseur' => 'array',
        'decision' => 'array',
        'type_violence' => 'array',
        'fils_victimes' => 'boolean',
    ];

    protected $with = ['agresseur', 'renseignement', 'besions', 'stateVictime', 'rdv', 'rapport'];

    public function accueillante()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function ecoutante()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function ecoute()
    {
        return $this->hasOne(Fiche::class, 'parent_id', 'id');
    }
    public function garde()
    {
        return $this->hasOne(Fiche::class, 'parent_id', 'id');
    }

    public function rdv()
    {
        return $this->hasOne(RenderVous::class, 'fiche_id', 'id');
    }

    public function renseignement()
    {
        return $this->hasOne(Renseignement::class);
    }

    public function besions()
    {
        return $this->hasOne(BesoinVictime::class);
    }

    public function stateVictime()
    {
        return $this->hasOne(Victime::class);
    }

    public function agresseur()
    {
        return $this->hasOne(Agresseur::class);
    }

    public function rapport()
    {
        return $this->hasOne(Rapport::class);
    }

}
