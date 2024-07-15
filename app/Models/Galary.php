<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Galary extends Model
{
    use HasFactory;

    protected $guarded = [] ;


    function get_table_name()
    {

        $type = $this->type ;
        switch ($type) {
            case 'project':
                 $data = Project::find($this->table_id) ;
                 return $data->name ; 
                break;
             case 'service':
                 $data = Service::find($this->table_id) ;
                 return $data->name ; 
                 break;    
            
            default:
             // $data = null  ;
              return  null ; 
                break;
        }
    }

}
