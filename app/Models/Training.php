<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Training extends Model
{
    use HasFactory;

    protected $guarded = [] ;


    public function trainer()
    {
           return $this->belongsTo( Trainer::class  , 'trainer_id' , 'id'  ) ;
    }


    public function city()
    {
        return $this->belongsTo( City::class , 'city_id' , 'id' ) ;
    }


    public function training_type()
    {
        return $this->belongsTo( TrainingType::class , 'training_type_id' , 'id' ) ;
    }


    public function trainer_trainings()
    {
        return $this->hasMany( TraingingTrainers::class , 'training_id' , 'id'  ) ;
    }

    public function training_candidate()
    {
        return $this->hasMany( TraingCandidate::class , 'training_id' , 'id'  ) ;
    }

    public function training_condthion()
    {
        return $this->hasMany( TraingCondthion::class , 'training_id' , 'id'  ) ;
    }




    public function print_certifcate_status(  )
    {

        if(  auth()->user()->role_id == 4   )
        {

          $trainer = Trainer :: where('user_id' , auth()->id() ) ->first() ;
          $trainer_id = $trainer->id ;
          $data = TraingingTrainers :: where('training_id' , $this->id )
                     ->where('trainer_id' , $trainer_id )
                     ->whereIn('status' , [ 'accepted' , 'completed' ] )
                     ->first()  ;



                  //   return $data ;
          if(    $data   )
          {

                 return 1 ;
          }else{

                  return 0 ;

          }

        }

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



    public function getSpecilization()
    {

        switch ($this->specialization) {
            case 'men':
              return " المتربات " ;
                break;

                case 'trainer':
                    return " المدرب " ;
                      break;

                      case 'company':
                        return " الجه " ;
                          break;
            default:
                return "  " ;
                break;
        }
    }
}
