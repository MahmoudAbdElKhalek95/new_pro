<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuestionType extends Model
{
    use HasFactory;

    protected $guarded = [] ;

    public function question()
    {

        return  $this->hasMany(Question::class , 'question_type_id' , 'id')  ;

    }

    public function type_name()
        {


            switch ($this->type) {
                case 'company':
                   return "جهة" ;
                    break;
                    case 'trainer':
                        return "مدرب" ;
                         break;
                         case 'student':
                            return "متدرب" ;
                             break;
                             case 'manager':
                                return " مدير مشروع" ;
                                 break;

                default:
                   return " " ;
                    break;
            }

        }

}
