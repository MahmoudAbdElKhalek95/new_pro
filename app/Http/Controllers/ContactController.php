<?php

namespace App\Http\Controllers;

use App\Models\about;
use App\Models\Notifcation;
use Facade\FlareClient\View;
use Illuminate\Http\Request;
use App\Models\CompanyCourse;
use App\Models\Contact;
class ContactController extends Controller
{
    public function index()
    {
        $data['contact'] = Contact::paginate(5);
        return view('contact.index', $data ) ;

    }

    public function store( Request $request  )
    {
       // return $request->all() ;

    
       
            $contact = Contact::create([

                'name'             => $request->name ?? null  ,
                'title'             => $request->title ?? null  ,
                'email'             => $request->email ?? null  ,
                'description'      => $request->description ?? null  ,
             
            ]);

            return back()->with(['success'=>'تمت العملــية بنجاح !!']);


    }


    public function edit(  $id  )
    {

        $data['contact'] = Contact::find( $id );
        return view('contact.edit', $data ) ;


    }


    public function update( Request $request , $id   )
    {

        $contact = Contact::find( $id );
      
              $contact->update([

                'name'              => $request->name,
                'title'             => $request->title,
                'email'             => $request->email,
                'description'       => $request->description,
             
            ]);

            return back()->with(['success'=>'تمت العملــية بنجاح !!']);

    }

    public function activate ( $id )
    {
         $contact = Contact::where('id' , $id)->first() ;
        if( $contact->active==1  )
        {
            $contact->active = 0 ;
            $contact->save() ;
        } else{

            $contact->active = 1 ;
            $contact->save() ;

        }

        return back()->with('success' , 'تم الحفظ' );

    }

    public function destroy( Request $request , $id )
    {
        $data = Contact::where('id' , $id)->first() ;
        deleteFile(  $data->image  ) ;
        $data->delete() ;
        return redirect()->route('contact.index')->with(['success'=>'تمت العملــية بنجاح !!']);

    }


}



