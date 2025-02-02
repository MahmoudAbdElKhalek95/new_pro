<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Report extends Model
{

    use HasFactory;

    protected $guarded = [] ;


    public function report_type()
    {

        return  $this->belongsTo(ReportType::class , 'report_type_id' , 'id')  ;

    }

    public function user()
    {

        return  $this->belongsTo(User::class , 'user_id' , 'id')  ;

    }
}
