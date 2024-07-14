<?php

namespace App\Models;

use App\Models\Student;
use App\Models\TrainerCourse;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Course extends Model
{
    use HasFactory;

    protected $guarded = [] ;

   // public $appends = ['total_amount'] ;

    public function students(){
        return $this->hasMany(Student::class);
    }
    public function trainers(){
        return $this->hasMany(TrainerCourse::class);
    }




    public function company_course(){
        return $this->hasMany(CompanyCourse::class , 'course_id' , 'id');
    }


    public function order_course(){
        return $this->hasMany( OrderCourse::class , 'course_id' , 'id');
    }


    public function survay(){
        return $this->hasMany( SurvayAnswer::class , 'course_id' , 'id');
    }

    public function payments(){
        return $this->hasMany( Payment::class , 'course_id' , 'id');
    }

    public function course_company()  //  والجهات التي نفذ فيها،
    {

        $company_ids = $this->order_course()->where('status' , 'completed')->pluck('company_id') ;

        $company = Company::whereIn('id' , $company_ids)->get() ;
        return $company ;

    }

    public function tariner_staus()
    {

        $trainer = Trainer::where('user_id' ,  auth()->user()->id  )->first() ;

        if(  !empty(  $trainer ) )
        {

            $trainer_id = $trainer->id ;

            if(  $this->trainers()->where('course_id' , $this->id   ) ->where('trainer_id', $trainer_id  ) ->count()  >  0   )
            {

                   return   "  متاح "  ;
            }else{

                    return "غير متاح" ;
            }

        }


    }


  /*  public function getTotalAmountAttribute()


    {

        if ( auth()->user()->role_id == 3  )
        {

            $company      = Company::where('user_id' , auth()->user()->id )->first() ;
            $company_id   = $company->id ;
            $ordercourse = OrderCourse::where('company_id' ,  $company_id )->where('course_id' , $this->id)->first() ;

            $total_student_amount =  $ordercourse->student_quantity * $this->student_price ;
            $total_trainer_amount =  $ordercourse->trainer_quantity * $this->trainer_price ;

            $total =   $total_student_amount  +   $total_trainer_amount +  $ordercourse->shipping_price  ;

            if (  !empty(  $ordercourse->discount )   )
            {

                $total = $total -  $ordercourse->discount ;

            }

            return  $total ;


        }



    }*/


}
