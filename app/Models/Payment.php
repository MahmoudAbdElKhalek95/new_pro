<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
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


    public function order()
    {

       return  $this->belongsTo( OrderCourse::class , 'order_id' , 'id' )  ;

    }


    public function payment_way_name()
    {

        switch ( $this->payment_way  ) {
            case 'cash':
                return  "  نقد "  ;
                break;

                case 'check':
                    return  " شيك  "  ;
                    break;

                    case 'transfer':
                        return  " تحويل "  ;
                        break;

                default:
                      return  "   "  ;
                break;
        }

    }

    public function status_name(  )
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
