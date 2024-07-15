<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Course;
use App\Models\galaty;
use App\Models\Galary;
use App\Models\Student;
use App\Models\Notifcation;
use Facade\FlareClient\View;
use Illuminate\Http\Request;
use App\Models\CompanyCourse;
use App\Models\TrainerCourse;

class GalaryController extends Controller
{

    public function index( Request $request , $id  )
    {
        //return $id  ;
        $type =  $request->type ; 
        $data['galarys'] = Galary::where('type' , $type )->where('table_id' , $id)->get() ;
        $data['id'] = $id ;
        $data['type'] = $type;
       // return $data ;

        return view('galary.index', $data ) ;
    }

    public function store( Request $request , $id  )
    {
        

        $request->validate([
            'image' => 'required|mimes:png,jpg,jpeg',
        ]);

        if($request->file('image')) {

            $image = upload($request->file('image'), 'galary');
          }else{
             $image =  null  ;
          }

            $galaty = Galary::create([

                'table_id'          => $request->id,
                'type'             => $request->type,
                'image'            =>   $image,
             
            ]);

            return back()->with(['success'=>'تمت العملــية بنجاح !!']);


    }


    public function edit(  Request $request ,  $id  )
    {

        $data['galary'] = Galary::where('id' , $id )->first();
       // return $data['galary'] ->image ;
        return view('galary.edit', $data ) ;


    }


    public function update( Request $request , $id   )
    {

       
        $galaty = Galary::find( $id );

        $request->validate([

            'image'           => 'sometimes|nullable|mimes:png,jpg,jpeg',
           
        ]);

      //  return   $galaty ;
        if($request->file('image')) {

            deleteFile(  $galaty->image  ) ;
            $image = upload($request->file('image'), 'galary');

          }else{
             $image =  $galaty->image  ;
          }

              $galaty->update([

                'image'      => $image, 
             
            ]);

            return back()->with(['success'=>'تمت العملــية بنجاح !!']);


    }


}



