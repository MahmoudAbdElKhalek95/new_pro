<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Course;
use App\Models\Company;
use App\Models\Service;
use App\Models\Student;
use App\Models\Notifcation;
use Facade\FlareClient\View;
use Illuminate\Http\Request;
use App\Models\CompanyCourse;
use App\Models\TrainerCourse;

class ServiceController extends Controller
{

    public function index()
    {

        $data['services'] = Service::paginate(5);
        return view('service.index', $data ) ;

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

            $image = upload($request->file('image'), 'services');
          }else{
             $image =  null  ;
          }


            $service = Service::create([

                'name'             => $request->name,
                'description'      => $request->description,
                'image'            =>   $image,
             
            ]);

            return back()->with(['success'=>'تمت العملــية بنجاح !!']);


    }


    public function edit(  $id  )
    {

        $data['service'] = Service::find( $id );
        $data['company'] =   Company::get();
        return view('service.edit', $data ) ;


    }


    public function update( Request $request , $id   )
    {

        $service = Service::find( $id );

        $request->validate([

            'name'            => 'sometimes|nullable|string|min:3',
            'desscription'    => 'sometimes|nullable|string',
          //  'image'           => 'sometimes|nullable|mimes:png,jpg,jpeg',
           

        ]);

        if($request->file('image')) {

            deleteFile(  $service->image  ) ;
            $image = upload($request->file('image'), 'services');

          }else{
             $image =  $service->image  ;
          }

              $service->update([

                'name'                    => $request->name,
                'description'             => $request->description,
                'image'                   => $image,
             
            ]);

            return back()->with(['success'=>'تمت العملــية بنجاح !!']);


    }


}



