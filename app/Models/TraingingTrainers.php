<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TraingingTrainers extends Model
{
    use HasFactory;

    protected $guarded = [ ] ;


    public function trainer()
    {
           return $this->belongsTo( Trainer::class  , 'trainer_id' , 'id'  ) ;
    }

    public function training()
    {
           return $this->belongsTo( Training::class  , 'training_id' , 'id'  ) ;
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

                        case 'completed':
                            return  " مكتملة "  ;
                            break;
                default:
                      return  " قيد المراجعة "  ;
                break;
        }



    }
}
