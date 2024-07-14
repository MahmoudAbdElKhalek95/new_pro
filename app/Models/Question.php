<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;

    protected $guarded = [] ;

    public $appends = [  'answers_arr' ]  ;
    public function question_type()
    {

        return  $this->belongsTo(QuestionType::class , 'question_type_id' , 'id')  ;

    }


    public function getAnswersArrAttribute()
    {

        if( !empty(  $this->answers )  )
        {
            return  explode(',' ,   $this->answers ) ;
        }else{

            return null ;
        }

    }


    public function getAnswers()
    {

        if( !empty(  $this->answers )  )
        {
            return  explode(',' ,   $this->answers ) ;
        }else{

            return null ;
        }

    }
}
