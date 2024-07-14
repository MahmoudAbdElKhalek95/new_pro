<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentCourse extends Model
{
    use HasFactory;

    
   protected $guarded = [] ;

   public function course(){
       return $this->belongsTO(Course::class, 'course_id' , 'id');
   }

   public function company(){
       return $this->belongsTO(Company::class, 'company_id' , 'id');
   }

   public function student(){
       return $this->belongsTO(Student::class, 'student_id' , 'id');
   }
   

}
