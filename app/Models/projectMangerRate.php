<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class projectMangerRate extends Model
{
    use HasFactory;

    protected $guarded = [] ;

    public function user()
    {

        return $this->belongsTo( User::class , 'user_id'  , 'id' ) ;

    }


    public function trainer()
    {

        return $this->belongsTo( Trainer::class , 'trainer_id'  , 'id' ) ;

    }
}
