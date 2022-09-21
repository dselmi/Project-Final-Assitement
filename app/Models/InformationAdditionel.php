<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InformationAdditionel extends Model
{
    use HasFactory;

    protected $fillable = [
        'fiche_id',
        'events_with_presence_children',
        'check_children_victims_violence',
        'which_ones',
        'check_children_disturbed',
        'check_other_witnesses',
        'witnesses',
        'check_responded_verbally_physically_to_attacker',
        'agresser_has_abuser_alcohol_narcotics_medication_other',
        'usually',
        'only_during_violence',
        'attitude_after_violence',
        'check_afraid_and_of_what',
        'have_confided_and_check_witnesses',
    ];

    protected $casts = [
        'events_with_presence_children' => 'boolean',
        'check_children_victims_violence' => 'boolean',
        'check_children_disturbed'=> 'boolean',
        'check_other_witnesses'=> 'boolean',
        'check_responded_verbally_physically_to_attacker'=> 'boolean',
        'usually'=> 'boolean',
        'only_during_violence'=> 'boolean',
    ];
}
