<?php

namespace App\Models;

use App\Models\User;
use App\Models\Company;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Assesment extends Model
{
    use HasFactory;
    protected $fillable = ['trainer_id','company_id','rate','desc','type'];
    
    public function trainer(){
        return $this->belongsTO(User::class, 'trainer_id');
    }
    public function company(){
        return $this->belongsTo(Company::class, 'company_id');
    }
}
