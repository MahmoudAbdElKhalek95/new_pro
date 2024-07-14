<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class TrainingRequest extends Model
{
    use HasFactory,SoftDeletes;
    protected $table = "training_requests";
    protected $fillable=[
        'qualification','previous_experince','age','good_comunication','stapility_fitness','educational_perceptions','environment_trainees','positivity','compunication','class_managment','self_confidence','attendance','price','trainer_id'
    ];

    public function trainer():?BelongsTo
    {
        return $this->belongsTo(Trainer::class);
    }
}
