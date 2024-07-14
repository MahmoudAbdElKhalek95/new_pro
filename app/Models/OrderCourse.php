<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderCourse extends Model
{
    use HasFactory;

     protected $guarded = [] ;


     public function course()
     {

        return  $this->belongsTo( Course::class , 'course_id' , 'id' )  ;

     }

     public function company()
     {

        return  $this->belongsTo( Company::class , 'company_id' , 'id' )  ;

     }

     public function trainer()
     {

        return  $this->belongsTo( Trainer::class , 'trainer_id' , 'id' )  ;

     }

     public function payment()
     {

        return  $this->hasMany( Payment::class , 'order_id' , 'id' )  ;

     }


     public function status_name()
     {

         switch ( $this->status  ) {
             case 'pending':
                 return  " بانتظار دفع المبلغ "  ;
                 break;

                 case 'revition':
                     return  " قيد المراجعة  "  ;
                     break;

                     case 'confirmed':
                         return  " موكد "  ;
                         break;


                     case 'processing':
                        return  " قيد التنفيذ "  ;
                        break;

                        case 'completed':
                            return  " مكتملة "  ;
                            break;

                 default:
                       return  " بانتظار دفع المبلغ "  ;
                 break;
         }



     }


     public function getTotalAmounts(  $course_id   ) // this for admin


     {

         if ( auth()->user()->role_id == 1  )
         {


             $ordercourse = OrderCourse::where('id' ,  $this->id )->first() ;
             $course      = Course::where('id' ,  $course_id )->first() ;


             $total_student_amount =  $ordercourse->student_quantity *  $course->student_price ;
             $total_trainer_amount =  $ordercourse->trainer_quantity *  $course->trainer_price ;

             $total =   $total_student_amount  +   $total_trainer_amount ;

             return  $total ;


         }



     }


     public function  previous_payed()
     {


        return  $this->payment()->where('status' , 'accepted')->sum('price') ?? 0  ;


     }



}
