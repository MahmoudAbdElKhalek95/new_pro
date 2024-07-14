<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Course;
use App\Models\Company;
use App\Models\Project;
use App\Models\Student;
use App\Models\Notifcation;
use Facade\FlareClient\View;
use Illuminate\Http\Request;
use App\Models\CompanyCourse;
use App\Models\TrainerCourse;

class ProjectController extends Controller
{

    public function index()
    {

        $data['projects'] = Project::paginate(5);
        $data['company']   =   Company::get();

        return view('project.index', $data ) ;


    }

    public function store( Request $request  )
    {


        $request->validate([

            'name'                      => 'required|string|min:3',
            'number'                    => 'required|numeric|unique:projects,number',
            'age'                       => 'required',
            'support_company'           => 'required|string',
            'project_manager'            => 'required|string',
            'start_date'                 => 'required|date',
            'end_date'                    => 'required|date',
            'location'                    => 'required|string',
           ///'env_number'                  => 'required|numeric',

          //  'trainer_number'             => 'required|numeric',
           // 'student_number'             => 'required|numeric',
            //'course_number'              => 'required|numeric',
           // 'company_number'              => 'required|numeric',


        ],[

            'name.required'                              => ' إسم المشروع مطلوب' ,
            'number.required'                            => ' رقم المشروع مطلوب' ,
            'age.required'                               => ' الفئة العمريه مطلوب' ,
            'support_company.required'                   => ' الدعم المشروع  مطلوب' ,
            'project_manager.required'                   => ' مدير المشروع مطلوب' ,
            'start_date.required'                        => ' تاريخ البدايه  مطلوب' ,
            'end_date.required'                          => ' تاريخ النهايه مطلوب' ,
            'location.required'                          => ' الموقع مطلوب' ,
          //  'env_number.required'                        => '  مطلوب' ,
           // 'trainer_number.required'                    => '  مطلوب' ,
           // 'student_number.required'                    => '  مطلوب' ,
           // 'course_number.required'                     => '  مطلوب' ,
            //'company_number.required'                    => '  مطلوب' ,




        ]);



            $Project = Project::create([

                'name'                    => $request->name,
                'number'                  => $request->number,
                'support_company'        =>$request->support_company,
                'project_manager'         =>$request->project_manager,
                'start_date'              =>$request->start_date,
                'end_date'                =>$request->end_date,
                //'age'                      =>$request->age,
                'age'                      => implode(',' , $request->age ),

                'location'                 =>$request->location,
             //   'env_number'                =>$request->env_number,
               /*
                'trainer_number'            =>$request->trainer_number,
                'student_number'            =>$request->student_number,
                'course_number'            =>$request->course_number,
                'company_number'            =>$request->company_number,
                'env_company_ids'           => implode(',' , $request->env_company_ids ) ,
                */

            ]);


            ///// add notifcation /////////////////////


          $message = "تم انشاء   نموذج    المشاريع    "    ;
          $user_ids = User::whereIn('role_id' , [ 1 , 2 ])->pluck('id')->toArray() ;
           $notifcation = Notifcation::create([

           'user_id'   => auth()->id() ,
           'message'   =>  $message  ,
           'title'     => $request->name ?? null  ,
           'to_user'   => implode(',' , $user_ids ) ,
           'link'      =>  route('getProject') ,


        ]);

         ////////////////////// end notifcation ad ///////////

            return back()->with(['success'=>'تمت العملــية بنجاح !!']);




    }


    public function edit(  $id  )
    {

        $data['project'] = Project::find( $id );
        $data['company'] =   Company::get();
        return view('project.edit', $data ) ;


    }


    public function update( Request $request , $id   )
    {

        $project = Project::find( $id );

        $request->validate([

            'name'                      => 'sometimes|nullable|string|min:3',
            'number'                    => 'sometimes|nullable|numeric',
            'age'                       => 'sometimes|nullable',
            'support_company'           => 'sometimes|nullable|string',
            'project_manager'            => 'sometimes|nullable|string',
            'start_date'                 => 'sometimes|nullable|date',
            'end_date'                    => 'sometimes|nullable|date',
            'location'                    => 'sometimes|nullable|string',
          //  'env_number'                  => 'sometimes|nullable|numeric',


        ]);


              $project->update([

                'name'                    => $request->name,
                'number'                  => $request->number,
                'support_company'         => $request->support_company,
                'project_manager'         => $request->project_manager,
                'start_date'              => $request->start_date,
                'end_date'                => $request->end_date,
                'age'                     => $request->age,
                'age'                     => implode(',' , $request->age ),
                'location'                => $request->location,
             //   'env_number'                =>$request->env_number,
              
             /*
               'trainer_number'         => $request->trainer_number,
                'student_number'         => $request->student_number,
                'course_number'          => $request->course_number,
                'company_number'         => $request->company_number,
                'env_company_ids'        => implode(',' , $request->env_company_ids ) , 
             */

            ]);

            return back()->with(['success'=>'تمت العملــية بنجاح !!']);



    }


}



