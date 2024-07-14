<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $guarded = [ ] ;


    public function getCompaines()
    {

        $company_ids = explode(',' , $this->env_company_ids ) ; 
        $companys = Company::whereIn('id' , $company_ids  ) -> get() ;

        return $companys ;

    }
}
