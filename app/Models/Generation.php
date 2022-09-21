<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Generation extends Model
{
    use HasFactory;

    protected $fillable = [
        'mode',
        'type_id',
        'date',
        'nfacture',
        'quantite',
        'prix_uni',
        'fourni',
    ];


    protected $casts = [
        'date' => 'date'
    ];

    public function type()
    {
      return $this->belongsTo(Type::class);
    }
}
