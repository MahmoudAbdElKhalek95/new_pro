<?php

namespace App\Models;

use App\Models\Role;
use App\Models\Company;
use App\Models\Manager;
use App\Models\Student;
use App\Models\Trainer;
use App\Models\Assesment;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable ,  HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role_id',
        'phone',
        'isActive',
        'qualification',
        'specialization',
        'image',


    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    // public function role(){
    //     return $this->belongsTO(Role::class, 'role_id');
    // }

    public function manager(){
        return $this->hasOne(Manager::class, 'user_id');
    }
    public function company(){
        return $this->hasOne(Company::class, 'user_id');
    }
    public function trainer(){
        return $this->hasOne(Trainer::class , 'user_id' , 'id');
    }
    public function student(){
        return $this->hasOne(Student::class , 'user_id' , 'id');
    }
    public function courses(){
        return $this->hasMany(TrainerCourse::class);
    }
    public function assesments(){
        return $this->hasMany(Assesment::class, 'trainer_id');
    }

// -	تمام فهمت قصدك لو الطالب اشترك في اكتر من 7 حقائب نضع له وسام
    public function student_course_register_number ()
    {

        $count = Student::where('user_id' , $this->id )->count() ;

        if(  $count >= 7 )
        {
            return " يستحق وسم إنجاز" ;

        }else{

            return "   لا يستحق وسم إنجاز" ;
        }

    }


    public function status_name()
    {

        if( $this->isActive == 1 )
        {
            return "نشط" ;
        }else{
            return "غير نشط" ;
        }

    }


    public function role_name()
    {
        switch ($this->role_id  ) {
            case '1':
                return "مشرف رئيسي " ;
                break;
                case '2':
                    return " مشرف فرعي " ;
                    break;
                default:
                 return " " ;
                break;
        }

        if( $this->isActive == 1 )
        {
            return "نشط" ;
        }else{
            return "غير نشط" ;
        }

    }
}
