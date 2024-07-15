<?php

namespace App\Http\Controllers;

use App\Models\about;
use App\Models\Notifcation;
use Facade\FlareClient\View;
use Illuminate\Http\Request;
use App\Models\CompanyCourse;
use App\Models\TrainerCourse;

class AboutController extends Controller
{

    public function index()
    {

        $data['about'] = About::paginate(5);
        return view('abouts.index', $data ) ;

    }

    public function store( Request $request  )
    {


        $request->validate([

            'name'                      => 'required|string|min:3',
            'description'                    => 'required|string',
           // 'image'                    => 'required|mimes:png,jpg,jpeg',
    
        ],[

            'name.required'            => ' إسم المشروع مطلوب' ,
            'description.required'    => ' الوصف مطلوب' ,
            //'image.required'          => ' الصوره  مطلوب' ,
    
        ]);

        if($request->file('image')) {

            $image = upload($request->file('image'), 'about');
          }else{
             $image =  null  ;
          }


            $about = About::create([

                'name'             => $request->name,
                'description'      => $request->description,
                'image'            =>   $image,
             
            ]);

            return back()->with(['success'=>'تمت العملــية بنجاح !!']);


    }


    public function edit(  $id  )
    {

        $data['about'] = About::find( $id );
        return view('abouts.edit', $data ) ;


    }


    public function update( Request $request , $id   )
    {

        $about = About::find( $id );
        $request->validate([

            'name'            => 'sometimes|nullable|string|min:3',
            'desscription'    => 'sometimes|nullable|string',
          //  'image'           => 'sometimes|nullable|mimes:png,jpg,jpeg',
           

        ]);

        if($request->file('image')) {

            deleteFile(  $about->image  ) ;
            $image = upload($request->file('image'), 'about');

          }else{
             $image =  $about->image  ;
          }

              $about->update([

                'name'                    => $request->name,
                'description'             => $request->description,
                'image'                   => $image,
             
            ]);

            return back()->with(['success'=>'تمت العملــية بنجاح !!']);


    }

    public function activate ( $id )
    {

         $about = About::where('id' , $id)->first() ;
        if( $about->active==1  )
        {
            $about->active = 0 ;
            $about->save() ;
        } else{

            $about->active = 1 ;
            $about->save() ;

        }


        return back()->with('success' , 'تم الحفظ' );

    }


}



