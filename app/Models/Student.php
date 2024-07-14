<?php

namespace App\Models;

use App\Models\User;
use App\Models\Course;
use App\Models\CompanyCourse;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Student extends Model
{
    use HasFactory;
   // protected $fillable = ['user_id','name','course_id','national','age','company_id'];

   protected $guarded = [] ;

    public function course(){
        return $this->belongsTO(Course::class, 'course_id');
    }

    public function company(){
        return $this->belongsTO(Company::class, 'company_id' , 'id');
    }
    public function user(){
        return $this->belongsTO(User::class, 'user_id');
    }
    public function companyCourse(){
        return $this->belongsTO(CompanyCourse::class, 'course_id' , 'id');
    }

    public function getAvailableStudents($cityid){
        $company = Company::where('city_id',$cityid)->pluck('id');
        $students = Student::whereIn('company_id',$company)->with('companyCourse.company','companyCourse.course','companyCourse.trainer','user')->get();
        return $students;

    }


    public function student_rate()
    {
        return $this->hasMany(StudentRate::class , 'student_id' , 'id') ;
    }

    public function student_rate_status(  )
    {
        $trainer      = Trainer::where('user_id' , auth()->id() )->first() ;
        $trainer_id   =  $trainer->id ; 


        $data = StudentRate::where('trainer_id' , $trainer_id )
                              ->where('student_id' , $this->id )->first() ;

            
            if( $data )
            {

               return " ملتزم" ;

            }else{

                return "  غير  ملتزم  "  ;
            }


           




    }



}
