<?php
namespace App\Http\Controllers;

use App\Models\AboutUs;
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

class AboutUsController extends Controller
{

    function __construct()
    {
         $this->middleware('permission:about-List|about-Create', ['only' => ['index','store']]);
         $this->middleware('permission:about-Create', ['only' => ['store']]);
         $this->middleware('permission:about-Edit', ['only' => ['edit','update']]);
         $this->middleware('permission:about-Delete', ['only' => ['destroy']]);
    }



    public function index()
    {

        //return  AboutUs::first() ;

        $data['about'] =  AboutUs::first();

        return view('about.index' , $data ) ;

    }

    public function store( Request $request  )
    {

       // return "Asad" ;

       $request->validate([

            'text'               =>  'required' ,


            ],[

                'text.required'         => ' النص مطلوب' ,


            ]);




         $exist = AboutUs::count() ;
         if(  $exist == 0  )
         {

         $about = AboutUs :: create (
         [

             'text'                     => $request->text ,

         ] ) ;

         }else{

            $about          =  AboutUs::first() ;
            $about->text    =   $request->text  ;
            $about->save() ;

         }


         ///// add notifcation /////////////////////


          ////////////////////// end notifcation ad ///////////
           return back()->with(['success'=>'تمت العملــية بنجاح !!']);


    }


    public function edit ( $id )
    {

        $data['about'] = AboutUs :: find($id);
        return view('about.edit' , $data ) ;

    }



    public function update( Request $request   , $id )
    {

        $request->validate([

            'text'              =>  'sometimes|nullable' ,

       ]);

        $skider = AboutUs :: find($id);

       $skider->update (
         [
             'text'     => $request->text    ??  $skider->text     ,

         ] ) ;

         return redirect()->route('about.index')->with(['success'=>'تمت العملــية بنجاح !!']);

    }


    public function destroy( $id )
    {

        AboutUs::where('id' , $id)->delete() ;

        return back()->with('success' , 'تم الحذف' );

    }





 }

