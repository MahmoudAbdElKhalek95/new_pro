<?php
namespace App\Http\Controllers;

use App\Models\Setting;
use App\Models\City;
use App\Models\User;
use App\Models\Trainer;
use App\Models\Training;
use App\Models\Slider;
use App\Models\Notifcation;
use Illuminate\Http\Request;
use App\Models\TraingCandidate;
use App\Models\TraingCondthion;
use App\Models\TraingingTrainers;
use Illuminate\Support\Facades\DB;
use Intervention\Image\Facades\Image;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class SettingController extends Controller
{

    function __construct()
    {
      /*
        $this->middleware('permission:setting-List|setting-Create', ['only' => ['index','store']]);
         $this->middleware('permission:setting-Create', ['only' => ['store']]);
         $this->middleware('permission:setting-Edit', ['only' => ['edit','update']]);
         $this->middleware('permission:setting-Delete', ['only' => ['destroy']]);
         */
    }


    public function index()
    {

        //return  Setting::first() ;

        $data['setting'] =  Setting::first();

        return view('setting.index' , $data ) ;

    }

    public function store( Request $request  )
    {

       // return "Asad" ;

       $request->validate([

            'contact_number'               =>  'numeric' ,
            'adress'                       =>  'string' ,
            'gppgle_map_link'              =>  'url' ,
            'email'                        =>  'email' ,


            ],[


            ]);


            $setting                    =  Setting::first() ;
            $setting->contact_number    =   $request->contact_number  ;
            $setting->adress            =   $request->adress  ;
            $setting->gppgle_map_link   =   $request->gppgle_map_link  ;
            $setting->email             =   $request->email  ;
            $setting->fax               =   $request->fax  ;
            $setting->whatsapp          =   $request->whatsapp  ;
            $setting->save() ;
     

         ///// add notifcation /////////////////////
          ////////////////////// end notifcation ad ///////////
           return back()->with(['success'=>'تمت العملــية بنجاح !!']);


    }


 






 }

