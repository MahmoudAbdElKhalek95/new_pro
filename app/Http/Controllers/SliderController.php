<?php
namespace App\Http\Controllers;
use App\Models\City;
use App\Models\User;
use App\Models\Trainer;
use App\Models\Training;
use App\Models\Slider;
use App\Models\Notifcation;
use Illuminate\Http\Request;
use App\Models\TraingCandidate;
use App\Models\TraingCondthion;
use App\Models\TraingingTrainers;
use Illuminate\Support\Facades\DB;
use Intervention\Image\Facades\Image;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class SliderController extends Controller
{

    function __construct()
    {
         $this->middleware('permission:slider-List|slider-Create', ['only' => ['index','store']]);
         $this->middleware('permission:slider-Create', ['only' => ['store']]);
         $this->middleware('permission:slider-Edit', ['only' => ['edit','update']]);
         $this->middleware('permission:slider-Delete', ['only' => ['destroy']]);
    }


    public function index()
    {

        $data['slider'] =  Slider::paginate(9);


        return view('slider.index' , $data ) ;

    }

    public function store( Request $request  )
    {

       // return "Asad" ;


       $request->validate([

            'title'               =>  'required|string|min:2' ,

            'image'                =>   'required|mimes:png,jpg,jpeg' ,

            ],[

                'title.required'         => ' الاسم مطلوب' ,

                'image.required'  => '   الصورة مطلوب'   ,


            ]);



          // return $request->all() ;

          if($request->file('image')) {

            $image = upload($request->file('image'), 'slider');

          }else{
             $image =  null  ;
          }



         $slider = Slider :: create (
         [

             'title'                     => $request->title ,
             'description'               => $request->description ,
             'image'                     => $image ,


         ] ) ;


         ///// add notifcation /////////////////////
         $message = "تم انشاء السليدر  جديده " ;
         $user_ids = User::whereIn('role_id' , [1,2 ])->pluck('id')->toArray() ;
         $notifcation = Notifcation::create([

            'user_id'   => auth()->id() ,
            'message'   =>  $message  ,
            'title'     =>  $slider->name ?? null   ,
            'to_user'   => implode(',' , $user_ids ) ,

            'link'      =>  route('trainings.index'),


         ]);

          ////////////////////// end notifcation ad ///////////
           return back()->with(['success'=>'تمت العملــية بنجاح !!']);


    }


    public function edit ( $id )
    {

        $data['slider'] = Slider :: find($id);
        return view('slider.edit' , $data ) ;

    }

    public function activate ( $id )
    {

        $slider = Slider::where('id' , $id)->first() ;
        if( $slider->active==1  )
        {
            $slider->active = 0 ;
            $slider->save() ;
        } else{

            $slider->active = 1 ;
            $slider->save() ;

        }
     

        return back()->with('success' , 'تم الحفظ' );

    }


    public function update( Request $request   , $id )
    {

        $request->validate([

            'name'              =>  'sometimes|nullable|string|min:2' ,
        
            'image'            =>  'sometimes|nullable|mimes:png,jpg,jpeg' ,

       ]);

        $skider = Slider :: find($id);

        if($request->file('image')) {

            deleteFile(  $skider->image  ) ;
            $image = upload($request->file('image'), 'slider');

          }else{
             $image =  $skider->image  ;
          }


       //  return $request->all() ;
       $skider->update (
         [
             'title'                    => $request->title                      ??  $skider->title           ,
             'description'               => $request->description               ??  $skider->description    ,
             'image'                     => $image                              ??  $skider->image    ,

            
         ] ) ;



         return redirect()->route('sliders.index')->with(['success'=>'تمت العملــية بنجاح !!']);

    }


    public function destroy( $id )
    {

        Slider::where('id' , $id)->delete() ;

        return back()->with('success' , 'تم الحذف' );

    }










 }

