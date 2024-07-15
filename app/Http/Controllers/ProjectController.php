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
        return view('project.index', $data ) ;
    }

    public function store( Request $request  )
    {
        $request->validate([
            'name'                      => 'required|string|min:3',
            'description'                    => 'required|string',
            'image'                    => 'required|mimes:png,jpg,jpeg',
        ],[
            'name.required'            => ' إسم المشروع مطلوب' ,
            'description.required'    => ' الوصف مطلوب' ,
            'image.required'          => ' الصوره  مطلوب' ,
        ]);

        if($request->file('image')) {

            $image = upload($request->file('image'), 'projects');
          }else{
             $image =  null  ;
          }
            $Project = Project::create([

                'name'             => $request->name,
                'description'      => $request->description,
                'image'            =>   $image,
            ]);

            return back()->with(['success'=>'تمت العملــية بنجاح !!']);


    }


    public function edit(  $id  )
    {

        $data['project'] = Project::find( $id );
        return view('project.edit', $data ) ;
    }


    public function update( Request $request , $id   )
    {

        $project = Project::find( $id );

        $request->validate([

            'name'            => 'sometimes|nullable|string|min:3',
            'desscription'    => 'sometimes|nullable|string',
            'image'           => 'sometimes|nullable|mimes:png,jpg,jpeg',
           

        ]);

        if($request->file('image')) {

            deleteFile(  $project->image  ) ;
            $image = upload($request->file('image'), 'projects');

          }else{
             $image =  $project->image  ;
          }

              $project->update([

                'name'                    => $request->name,
                'description'             => $request->description,
                'image'                   => $image,
             
            ]);

            return back()->with(['success'=>'تمت العملــية بنجاح !!']);


    }


    public function destroy( Request $request , $id )
    {
        $data = Project::where('id' , $id)->first() ;
        deleteFile(  $data->image  ) ;
        $data->delete() ;
        return redirect()->route('getProject')->with(['success'=>'تمت العملــية بنجاح !!']);

    }


}



