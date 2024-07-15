<?php

namespace App\Http\Controllers;

use App\Models\about;
use App\Models\Notifcation;
use Facade\FlareClient\View;
use Illuminate\Http\Request;
use App\Models\CompanyCourse;
use App\Models\History;
use App\Models\TrainerCourse;

class HistoryController extends Controller
{

    public function index()
    {
        $data['history'] = History::paginate(5);
        return view('history.index', $data ) ;

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

            $image = upload($request->file('image'), 'History');
          }else{
             $image =  null  ;
          }


            $history = History::create([

                'name'             => $request->name,
                'description'      => $request->description,
                'image'            =>   $image,
             
            ]);

            return back()->with(['success'=>'تمت العملــية بنجاح !!']);


    }


    public function edit(  $id  )
    {

        $data['history'] = History::find( $id );
        return view('history.edit', $data ) ;


    }


    public function update( Request $request , $id   )
    {

        $history = History::find( $id );
        $request->validate([

            'name'            => 'sometimes|nullable|string|min:3',
            'desscription'    => 'sometimes|nullable|string',
          //  'image'           => 'sometimes|nullable|mimes:png,jpg,jpeg',
           
        ]);

        if($request->file('image')) {

            deleteFile(  $history->image  ) ;
            $image = upload($request->file('image'), 'history');

          }else{
             $image =  $history->image  ;
          }

              $history->update([

                'name'                    => $request->name,
                'description'             => $request->description,
                'image'                   => $image,
             
            ]);

            return back()->with(['success'=>'تمت العملــية بنجاح !!']);

    }

    public function activate ( $id )
    {
         $history = History::where('id' , $id)->first() ;
        if( $history->active==1  )
        {
            $history->active = 0 ;
            $history->save() ;
        } else{

            $history->active = 1 ;
            $history->save() ;

        }

        return back()->with('success' , 'تم الحفظ' );

    }

    public function destroy( Request $request , $id )
    {
        $data = History::where('id' , $id)->first() ;
        deleteFile(  $data->image  ) ;
        $data->delete() ;
        return redirect()->route('history.index')->with(['success'=>'تمت العملــية بنجاح !!']);

    }


}



