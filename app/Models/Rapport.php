<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Rapport extends Model
{

    //use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
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
