<?php

namespace App\Http\Controllers;

use App\Models\partiner;
use App\Models\Notifcation;
use Facade\FlareClient\View;
use Illuminate\Http\Request;
use App\Models\CompanyCourse;
use App\Models\TrainerCourse;

class PartinerController extends Controller
{

    public function index()
    {
        $data['partiner'] = Partiner::paginate(5);
        return view('partiner.index', $data ) ;
    }

    public function store( Request $request  )
    {

        $request->validate([

            'type'                  => 'required|string',
            'image'                    => 'required|mimes:png,jpg,jpeg',
    
        ]);

        if($request->file('image')) {

            $image = upload($request->file('image'), 'partiner');
          }else{
             $image =  null  ;
          }


            $partiner = Partiner::create([

                'type'             => $request->type,
                'image'            =>   $image,
             
            ]);

            return back()->with(['success'=>'تمت العملــية بنجاح !!']);


    }


    public function edit(  $id  )
    {
        $data['partiner'] = Partiner::find( $id );
        return view('partiner.edit', $data ) ;
    }


    public function update( Request $request , $id   )
    {

        $partiner = Partiner::find( $id );
        $request->validate([

          
            'image'           => 'sometimes|nullable|mimes:png,jpg,jpeg',
           

        ]);

        if($request->file('image')) {

            deleteFile(  $partiner->image  ) ;
            $image = upload($request->file('image'), 'partiner');

          }else{
             $image =  $partiner->image  ;
          }

              $partiner->update([

                'type'                    => $request->type,
                'image'                   => $image,
             
            ]);

            return redirect()->route('partiner.index')->with(['success'=>'تمت العملــية بنجاح !!']);
          
           // return back()->with(['success'=>'تمت العملــية بنجاح !!']);


    }

    public function activate ( $id )
    {

         $partiner = Partiner::where('id' , $id)->first() ;
        if( $partiner->active==1  )
        {
            $partiner->active = 0 ;
            $partiner->save() ;
        } else{

            $partiner->active = 1 ;
            $partiner->save() ;

        }


        return back()->with('success' , 'تم الحفظ' );

    }


    public function destroy( Request $request , $id )
    {
        $data = Partiner::where('id' , $id)->first() ;
        deleteFile(  $data->image  ) ;
        $data->delete() ;
        return redirect()->route('partiner.index')->with(['success'=>'تمت العملــية بنجاح !!']);

    }


}



