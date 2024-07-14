<?php

namespace App\Models;

use App\Http\Controllers\CourseController;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SurvayAnswer extends Model
{
    use HasFactory;

    protected $guarded = [] ;

    public function question_type()
    {

        return  $this->belongsTo(QuestionType::class , 'question_type_id' , 'id')  ;

    }

    public function course()
    {

        return  $this->belongsTo( Course::class  , 'course_id' , 'id' )  ;

    }
}
