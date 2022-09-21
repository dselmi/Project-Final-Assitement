<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{

    use SoftDeletes;


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
        'number',
        'user_id',
        'medicament_id',
        'quantity',
        'status',
        'created_at',
        'updated_at',
    ];

    public function medicament()
    {
        return $this->belongsTo('App\Models\Medicament','medicament_id');
    }

}

