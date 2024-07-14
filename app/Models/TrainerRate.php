<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TrainerRate extends Model
{
    use HasFactory;

    protected $guarded = [] ;

    public function company()
    {

        return $this->belongsTo( Company::class , 'company_id'  , 'id' ) ;

    }


    public function trainer()
    {

        return $this->belongsTo( Trainer::class , 'trainer_id'  , 'id' ) ;

    }
}
