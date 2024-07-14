<?php

namespace App\Models;

use App\Models\City;
use App\Models\User;
use App\Models\Assesment;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Trainer extends Model
{
    use HasFactory;

    protected $guarded = [] ;
   // protected $fillable = ['user_id','city','t_certificate','cert_path','image','path','remote_work','rate','desc'];

    public function user(){
        return $this->belongsTo(User::class, 'user_id' , 'id');
    }
    public function assesments(){
        return $this->hasMany(Assesment::class);
    }

    public function cities()
    {
        return $this->belongsTo( City::class , 'city' , 'id' ) ;
    }

    public function nationality_name()
    {
        return $this->belongsTo( Country::class , 'nationality' , 'id' ) ;
    }

    
    public function state()
    {
        return $this->belongsTo( State::class , 'state_id' , 'id' ) ;
    }

    public function orderCourses()
    {
        return $this->hasMany( OrderCourse::class , 'trainer_id' , 'id'  ) ;
    }

    public function trainer_training()
    {
        return $this->hasMany( TraingingTrainers::class , 'trainer_id' , 'id'  ) ;
    }

    public function trainer_contract()
    {
        return $this->hasMany( TrainerContract::class , 'trainer_id' , 'id'  ) ;
    }


    public static function getAvailableTrainers($cityid){
        $city = City::where('id',$cityid)->pluck('name');
        // $cityname = $city->name;
        $trainers = Trainer::where('remote_work',1)->orWhere('city',$city)->with('user.assesments')->paginate(5);  //get();
        return $trainers;

    }


    public function student_count()
    {


      /*  $course_ids = $this->orderCourses()
             ->where('status' , 'completed' )
             ->pluck('course_id') ;

        $count = Student::whereIn('course_id' , $course_ids )->count() ;

        return $count ?? 0 ;*/

        $students = $this->student_rate()->pluck('student_id') ;

        return Student::whereIn('id' , $students )->count() ;

    }

    public function course_count()
    {

        $courses = $this->trainer_contract()->where('status' , 'accepted')->pluck('course_id') ;

        return Course::whereIn('id' , $courses )->count() ;

    }



    public function student_rate()
    {
        return $this->hasMany(StudentRate::class , 'trainer_id' , 'id') ;
    }

    // -	إضافة وسم إنجاز عند تدريب عدد 100 من الطلاب. (لم تضاف)
    public function trainerCoursesStudentNumber(  )
    {

        $trainer = Trainer::find( $this->id ) ;

         $trainer_course_ids = $trainer->orderCourses
                 ->where('status' , 'completed' )
                 ->pluck('course_id')->toArray() ;

         //return  count( $trainer_course_ids ) ;
        if(  count( $trainer_course_ids ) > 0  )
        {

            //return "Asd" ;
            $student_number = Student::where('course_id' ,  $trainer_course_ids )->count() ;


            $count =  $student_number ;


        }else{


            $count = 0 ;
        }


        if(  $count >= 100  )
        {
            return " يستحق وسم إنجاز" ;
        }else{

            return "   لا يستحق وسم إنجاز" ;
        }

    }


    public function trainer_companies()
    {

        $company_ids = $this->orderCourses()->where('status' , 'completed' )->pluck('company_id') ;

        $company = Company::whereIn('id' , $company_ids ) ->get() ;

        return $company ;
    }

    public function trainer_companies_paginate()
    {

        $company_ids = $this->orderCourses()->where('status' , 'completed' )->pluck('company_id') ;

        $company = Company::whereIn('id' , $company_ids )->paginate(10);

        return $company ;
    }


    public function trainer_companies_get()
    {

        $company_ids = $this->orderCourses()->pluck('company_id') ;

        $company = Company::whereIn('id' , $company_ids ) ->get() ;

        return $company ;

    }


    public function hour_numbers()
    {


        $hour  = $this->trainer_contract()->sum('hour_number') ;
        if(  $hour > 0 )
        {

            return $hour ;

        }else{

            return 0 ;
        }


    }

    public function rate()
    {

        $trainer_rate = TrainerRate::where('trainer_id' , $this->id)->avg('rate') ;
        $project_manager_trainer_rate = projectMangerRate::where('trainer_id' , $this->id)->avg('rate') ;

        return    $trainer_rate  +   $project_manager_trainer_rate ;


    }

   

}
