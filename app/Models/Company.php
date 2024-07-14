<?php

namespace App\Models;

use App\Models\City;
use App\Models\User;
use App\Models\Assesment;
use App\Models\CompanyCourse;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Company extends Model
{
    use HasFactory;

    protected $guarded = [] ;

   // protected $fillable = ['user_id','name','regulator','clearance_no','city_id','phone', 'doc_name', 'doc_path'];


    public static function getCompanyCourses($company_id){
        $course_ids = CompanyCourse::where('company_id',$company_id)->pluck('course_id');
        return $course_ids;
    }
    public function user(){
        return $this->belongsTo(User::class, 'user_id' , 'id' );
    }
    public function city(){
        return $this->belongsTo(City::class, 'city_id' , 'id');
    }
    public function assesments(){
        return $this->hasMany(Assesment::class);
    }

    public function student(){
          return $this->hasMany(Student::class , 'company_id' , 'id' );
    }



    public function trainer_count()
    {

        $count = CompanyCourse::where('company_id', $this->id)->distinct()->count('trainer');

        return $count ;

    }

    public function student_count()
    {

        $count = Student::where('company_id', $this->id)->count();

        return $count ;

    }

    public function project_count()
    {

        $count = Project::where('env_company_ids','like' , '%'. $this->id .'%' )->count();

        return $count ;

    }

    public function course_count()
    {

        $count = CompanyCourse::where('company_id', $this->id)->distinct()->count('course_id');

        return $count ;

    }



    public function company_course(){
        return $this->hasMany(CompanyCourse::class , 'company_id' , 'id');
    }

    public function order_course(){
        return $this->hasMany( OrderCourse::class , 'company_id' , 'id');
    }

    /// حقايب الجهات

    public function company_order_course(){
        return $this->hasMany( OrderCourse::class , 'company_id' , 'id')->where('status' , 'completed');
    }

    public function payments(){
        return $this->hasMany( Payment::class , 'company_id' , 'id');
    }


}
