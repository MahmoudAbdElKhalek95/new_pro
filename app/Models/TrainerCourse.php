<?php

namespace App\Models;

use App\Models\User;
use App\Models\Course;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class TrainerCourse extends Model
{
    use HasFactory;
   // protected $fillable = ['trainer_id','course_id'];
    protected $guarded = [] ;
    public function trainer(){
        return $this->belongsTo(User::class, 'trainer_id');
    }
   /* public function trainer(){
        return $this->belongsTo(Trainer::class, 'trainer_id');
    }*/
    public function course(){
        return $this->belongsTo(Course::class, 'course_id' , 'id' );
    }

    public function company(){
        return $this->belongsTo(Company::class, 'company_id' , 'id' );
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
