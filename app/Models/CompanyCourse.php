<?php

namespace App\Models;

use App\Models\User;
use App\Models\Course;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CompanyCourse extends Model
{
    use HasFactory;
    protected $fillable = [
        'course_id',
        'company_id',
        'seats',
        'cost',
        'trainer',
        'start',
        'end',
    ];

    public function company(){
        return $this->belongsTo(Company::class, 'company_id');
    }
    public function course(){
        return $this->belongsTo(Course::class, 'course_id');
    }
    public function trainer(){
        return $this->belongsTo(User::class, 'trainer' , 'id');
    }

    public function trainer_name(){
        $user = User :: where('id' ,$this->trainer )->first() ;
        return $user->name ?? null ;
    }
}
