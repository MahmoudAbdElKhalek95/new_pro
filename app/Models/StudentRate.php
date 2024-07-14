<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentRate extends Model
{
    use HasFactory;


    protected $guarded = [] ;

    public function student()
    {
        return $this->belongsTo(Student::class , 'student_id' , 'id' ) ;
    }

    public function trainer()
    {
        return $this->belongsTo(Trainer::class , 'trainer_id' , 'id' ) ;
    }
    
    public function course(){
        return $this->belongsTO(Course::class, 'course_id' , 'id');
    }
 

}
