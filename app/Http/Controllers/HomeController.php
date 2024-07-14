<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Company;
use App\Models\Course;
use App\Models\Manager;
use App\Models\Notifcation;
use App\Models\NotifcationRead;
use App\Models\Payment;
use App\Models\ProjectManager;
use App\Models\Student;
use App\Models\SurvayAnswer;
use App\Models\Trainer;
use App\Models\TraingingTrainers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
  /*
     public function __construct()
    {
        $this->middleware('auth');
    }

    */


    public function getLogin()
    {

         return view('auth.home_login') ;
      
    }

    public function postLogin()
    {
       
        $success = auth()->attempt([
            'email' => request('email'),
            'password' => request('password')
        ]   );

        if($success) {

            if( auth()->user()->role_id == 3 )
            {
              return redirect()->route('store')->with('success' , ' تم تسجيل الدخول بنجاح ');
            }else{

                return  redirect()->route('home')->with('success' , ' تم تسجيل الدخول بنجاح ');
            }
        }

        return back()->withErrors([
            'error' => 'The provided credentials do not match our records.',
        ]);

        
    }

    public function logout()
    {
        auth()->logout();

        return redirect()->route('store');
    }

    public function store()

    {

        return view('store') ;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        $data['company']    = User::where('role_id',3)->count();
        $data['student']    = User::where('role_id',5)->count();
        $data['trainer']    = User::where('role_id',4)->count();
        $data['manager']    =  User::where('role_id',2)->count();
     
        $user_id = auth()->id() ;

        if (auth()->check() && auth()->user()->role_id == 1   )   {
                return view('home' , $data );
          
        }else{
             return  redirect()->route('home.getLogin' );
        }
       
    }

    public function project_follow()
    {

        
       if( auth()->user()->role_id == 2  )
       {
         
        return  view('projectmanager_followup') ;

       }

    
       elseif ( auth()->user()->role_id == 3  )
       {

          return view('company_followup') ;

       }


       elseif ( auth()->user()->role_id == 4  )
       {

          return view('trainer_followup') ;

       }
      

       else
       {

          return view('projectmanager_followup') ;

       }


   
    }

}
