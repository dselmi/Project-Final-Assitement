<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Medicament extends Model
{

    use SoftDeletes;

    protected $table = 'medicaments';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'title',
        'image',
        'description',
        'mode_duree_use',
        'quantity',
        'price',
        'created_at',
        'updated_at',
    ];

}

