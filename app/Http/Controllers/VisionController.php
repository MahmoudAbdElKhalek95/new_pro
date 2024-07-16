<?php

namespace App\Http\Controllers;

use App\Models\about;
use App\Models\Notifcation;
use Facade\FlareClient\View;
use Illuminate\Http\Request;
use App\Models\CompanyCourse;
use App\Models\Vision;

use App\Models\TrainerCourse;
class VisionController extends Controller
{
    public function index()
    {
        $data['vision'] = Vision::paginate(5);
        return view('vision.index', $data ) ;

    }

    public function store( Request $request  )
    {

        $request->validate([

          //  'name'                      => 'required|string|min:3',
           // 'description'                    => 'required|string',
            'image'                    => 'required|mimes:png,jpg,jpeg',
    
        ],[

           // 'name.required'            => ' إسم المشروع مطلوب' ,
           // 'description.required'    => ' الوصف مطلوب' ,
            'image.required'          => ' الصوره  مطلوب' ,
    
        ]);

        if($request->file('image')) {

            $image = upload($request->file('image'), 'vision');
          }else{
             $image =  null  ;
          }


            $vision = Vision::create([

                'name'             => $request->name,
                'description'      => $request->description,
                'image'            =>   $image,
             
            ]);

            return back()->with(['success'=>'تمت العملــية بنجاح !!']);


    }


    public function edit(  $id  )
    {

        $data['vision'] = Vision::find( $id );
        return view('vision.edit', $data ) ;


    }


    public function update( Request $request , $id   )
    {

        $vision = Vision::find( $id );
        $request->validate([

            'name'            => 'sometimes|nullable|string|min:3',
            'desscription'    => 'sometimes|nullable|string',
            'image'           => 'sometimes|nullable|mimes:png,jpg,jpeg',
           
        ]);

        if($request->file('image')) {

            deleteFile(  $vision->image  ) ;
            $image = upload($request->file('image'), 'vision');

          }else{
             $image =  $vision->image  ;
          }

              $vision->update([

                'name'                    => $request->name,
                'description'             => $request->description,
                'image'                   => $image,
             
            ]);

            return back()->with(['success'=>'تمت العملــية بنجاح !!']);

    }

    public function activate ( $id )
    {
         $vision = Vision::where('id' , $id)->first() ;
        if( $vision->active==1  )
        {
            $vision->active = 0 ;
            $vision->save() ;
        } else{

            $vision->active = 1 ;
            $vision->save() ;

        }

        return back()->with('success' , 'تم الحفظ' );

    }

    public function destroy( Request $request , $id )
    {
        $data = Vision::where('id' , $id)->first() ;
        deleteFile(  $data->image  ) ;
        $data->delete() ;
        return redirect()->route('vision.index')->with(['success'=>'تمت العملــية بنجاح !!']);

    }


}



