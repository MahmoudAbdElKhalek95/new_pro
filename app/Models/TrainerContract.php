<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TrainerContract extends Model
{
    use HasFactory;

    protected $guarded = [] ;

    public function company()
    {

        return $this->belongsTo( Company::class , 'company_id'  , 'id' ) ;

    }

    public function course()
    {

        return $this->belongsTo( Course::class , 'course_id'  , 'id' ) ;

    }

    public function trainer()
    {

        return $this->belongsTo( Trainer::class , 'trainer_id'  , 'id' ) ;

    }

    public function order_course()
    {

        return $this->belongsTo( OrderCourse::class , 'order_course_id'  , 'id' ) ;

    }


    public function status_name()
    {

        switch ( $this->status  ) {
            case 'pending':
                return  " قيد المراجعة "  ;
                break;

                case 'accepted':
                    return  " مقبولة  "  ;
                    break;

                    case 'rejected':
                        return  " مرفوضة "  ;
                        break;

                default:
                      return  " قيد المراجعة "  ;
                break;
        }

    }


}
