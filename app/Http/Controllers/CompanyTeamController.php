<?php

namespace App\Http\Controllers;

use App\Models\about;
use App\Models\Notifcation;
use Facade\FlareClient\View;
use Illuminate\Http\Request;
use App\Models\CompanyCourse;
use App\Models\CompanyTeam;
use App\Models\TrainerCourse;

class CompanyTeamController extends Controller
{

    public function index()
    {
        $data['company_team'] = CompanyTeam::paginate(5);
        return view('company_team.index', $data ) ;

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

            $image = upload($request->file('image'), 'CompanyTeam');
          }else{
             $image =  null  ;
          }


            $company_team = CompanyTeam::create([

                'name'             => $request->name,
                'description'      => $request->description,
                'image'            =>   $image,
             
            ]);

            return back()->with(['success'=>'تمت العملــية بنجاح !!']);


    }


    public function edit(  $id  )
    {

        $data['company_team'] = CompanyTeam::find( $id );
        return view('company_team.edit', $data ) ;


    }


    public function update( Request $request , $id   )
    {

        $company_team = CompanyTeam::find( $id );
        $request->validate([

            'name'            => 'sometimes|nullable|string|min:3',
            'desscription'    => 'sometimes|nullable|string',
          //  'image'           => 'sometimes|nullable|mimes:png,jpg,jpeg',
           
        ]);

        if($request->file('image')) {

            deleteFile(  $company_team->image  ) ;
            $image = upload($request->file('image'), 'company_team');

          }else{
             $image =  $company_team->image  ;
          }

              $company_team->update([

                'name'                    => $request->name,
                'description'             => $request->description,
                'image'                   => $image,
             
            ]);

            return back()->with(['success'=>'تمت العملــية بنجاح !!']);

    }

    public function activate ( $id )
    {
         $company_team = CompanyTeam::where('id' , $id)->first() ;
        if( $company_team->active==1  )
        {
            $company_team->active = 0 ;
            $company_team->save() ;
        } else{

            $company_team->active = 1 ;
            $company_team->save() ;

        }

        return back()->with('success' , 'تم الحفظ' );

    }

    public function destroy( Request $request , $id )
    {
        $data = CompanyTeam::where('id' , $id)->first() ;
        deleteFile(  $data->image  ) ;
        $data->delete() ;
        return redirect()->route('company_team.index')->with(['success'=>'تمت العملــية بنجاح !!']);

    }


}



