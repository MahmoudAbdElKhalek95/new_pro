<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Visit extends Model
{
    use HasFactory;


    protected  $guarded = [] ;

    public function project_manager()
    {

        return $this->belongsTo(User::class , 'project_manager_id' , 'id') ; // role_id  2

    }

    public function company()
    {

        return $this->belongsTo(Company::class , 'company_id' , 'id') ;

    }


}
