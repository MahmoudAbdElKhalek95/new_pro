<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notifcation extends Model
{
    use HasFactory;


    protected $guarded = [] ;


    public function user()
    {

        return $this->belongsTo(User::class , 'user_id' , 'id') ;

    }


    public function to_users()
    {

        $user_ids =  explode(',' , $this->to_user ) ;
        $users    = User::whereIn( 'id' , $user_ids )->get() ;
         return $users ;

    }

    public function read()
    {
        return $this->hasMany( NotifcationRead :: class , 'notifcation_id' , 'id') ; 
    }
}
