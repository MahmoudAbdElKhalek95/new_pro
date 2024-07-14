<?php

namespace App\Models;

use App\Models\Manager;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class City extends Model
{
    use HasFactory;

    public function managers(){
        return $this->hasMany(Manager::class);
    }


    public function trainer_count()
    {

        $company_ids = Company::where('city_id' , $this->id ) ->pluck('id') ;

        $count = CompanyCourse::whereIn('company_id', $company_ids )->distinct()->count('trainer');

        return $count ;

    }

    public function student_count()
    {

        $company_ids = Company::where('city_id' , $this->id ) ->pluck('id') ;
        $count = Student::whereIn('company_id', $company_ids  )->count();

        return $count ;

    }

    public function project_count()
    {

           $company_ids = Company::where('city_id' , $this->id ) ->pluck('id')->toArray() ;
           $company_ids = implode(',' , $company_ids) ;
           $count = Project::where('env_company_ids','like' , '%'.  $company_ids .'%' )->count();
           return $count ;

    }

    public function course_count()
    {

        $company_ids = Company::where('city_id' , $this->id ) ->pluck('id') ;

        $count = CompanyCourse::whereIn('company_id', $company_ids )->distinct()->count('course_id');

        return $count ;

    }

    public function manager_count()
    {

        $Manager = Manager::where('city_id' , $this->id )->count() ;

        return $Manager ;

    }

}
