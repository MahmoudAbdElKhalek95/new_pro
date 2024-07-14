<?php

namespace App\Models;

use App\Models\City;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Manager extends Model
{
    use HasFactory;
    protected $fillable = ['user_id','city_id' , 'state_id'];


    public function city(){
        return $this->belongsTo(City::class, 'city_id');
    }

    public function state(){
        return $this->belongsTo(State::class, 'state_id');
    }

    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }
}
