<?php

namespace App\Http\Controllers;

use App\Models\about;
use App\Models\Notifcation;
use Facade\FlareClient\View;
use Illuminate\Http\Request;
use App\Models\CompanyCourse;
use App\Models\Certificate;

use App\Models\TrainerCourse;
class CertificateController extends Controller
{
    public function index()
    {
        $data['certificate'] = Certificate::paginate(5);
        return view('certificate.index', $data ) ;

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

            $image = upload($request->file('image'), 'certificate');
          }else{
             $image =  null  ;
          }


            $certificate = Certificate::create([

                'name'             => $request->name,
                'description'      => $request->description,
                'image'            =>   $image,
             
            ]);

            return back()->with(['success'=>'تمت العملــية بنجاح !!']);


    }


    public function edit(  $id  )
    {

        $data['certificate'] = Certificate::find( $id );
        return view('certificate.edit', $data ) ;


    }


    public function update( Request $request , $id   )
    {

        $certificate = Certificate::find( $id );
        $request->validate([

            'name'            => 'sometimes|nullable|string|min:3',
            'desscription'    => 'sometimes|nullable|string',
            'image'           => 'sometimes|nullable|mimes:png,jpg,jpeg',
           
        ]);

        if($request->file('image')) {

            deleteFile(  $certificate->image  ) ;
            $image = upload($request->file('image'), 'certificate');

          }else{
             $image =  $certificate->image  ;
          }

              $certificate->update([

                'name'                    => $request->name,
                'description'             => $request->description,
                'image'                   => $image,
             
            ]);

            return back()->with(['success'=>'تمت العملــية بنجاح !!']);

    }

    public function activate ( $id )
    {
         $certificate = Certificate::where('id' , $id)->first() ;
        if( $certificate->active==1  )
        {
            $certificate->active = 0 ;
            $certificate->save() ;
        } else{

            $certificate->active = 1 ;
            $certificate->save() ;

        }

        return back()->with('success' , 'تم الحفظ' );

    }

    public function destroy( Request $request , $id )
    {
        $data = Certificate::where('id' , $id)->first() ;
        deleteFile(  $data->image  ) ;
        $data->delete() ;
        return redirect()->route('certificate.index')->with(['success'=>'تمت العملــية بنجاح !!']);

    }


}



