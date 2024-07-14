<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\User;
use App\Models\Trainer;
use App\Models\Training;
use App\Models\Notifcation;
use Illuminate\Http\Request;
use App\Models\TraingCandidate;
use App\Models\TraingCondthion;
use App\Models\TraingingTrainers;
use App\Models\TrainingType;
use Illuminate\Support\Facades\DB;
use Intervention\Image\Facades\Image;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class TrainingController extends Controller
{

    function __construct()
    {
         $this->middleware('permission:trainings-List|trainings-Create', ['only' => ['index','store']]);
         $this->middleware('permission:trainings-Create', ['only' => ['store']]);
         $this->middleware('permission:trainings-Edit', ['only' => ['edit','update']]);
       //  $this->middleware('permission:trainings-Delete', ['only' => ['destroy']]);
    }


    public function index()
    {

       /*  if(  auth()->user()->role_id == 4  )
         {
           $trainer = Trainer::where('user_id' , auth()->id() ) ->first() ;
           $trainer_id  = $trainer->id ;
           $training_ids =   TraingingTrainers::where('trainer_id' ,    $trainer_id  )
                            ->pluck('training_id')->toArray() ;
           $data['training'] = Training:: where('id' , $training_ids )->paginate(10);

        }else{*/

        $data['cities']             =  City::get();
        $data['training_types']     =  TrainingType::get();

        $training = Training::query();

        if(  request()->filled('name') )
        {


           $training->where('name' , 'like' , '%'.request('name').'%' ) ;

        }

        if(  request()->filled('city_id') && request('city_id') != 0   )
        {

           $training->where('city_id' , request('city_id') ) ;

        }

        if( auth()->user()->role_id == 4  )
        {

            $trainer = Trainer::where('user_id' , auth()->id() )->first();
            $data['training'] =  $training->where('city_id' , $trainer->city )->paginate(10);

        }else{

            $data['training'] =  $training->paginate(10);

        }


         // return print_certifcate_status(13) ;



        return view('training.index' , $data ) ;

    }

    public function store( Request $request  )
    {

       // return "Asad" ;

       $request->validate([

            'name'               =>  'required|string|min:2' ,
           // 'from'               =>  'required|date' ,
           // 'to'                 =>  'required|date|after_or_equal:from' ,
          //  'city_id'             =>  'required' ,
           // 'hour_number'         =>  'required|numeric' ,
            ],[

                'name.required'         => ' الاسم مطلوب' ,
               // 'from.required'         => ' الفتره من مطلوب' ,
               // 'to.required'           => ' الفتره الي مطلوب' ,
              // 'city_id.required'      => ' المنطقه مطلوب' ,
              //  'hour_number.required'  => '  عدد الساعات مطلوب'   ,

            ]);

          // return $request->all() ;

          if($request->file('image')) {

            $image = upload($request->file('image'), 'training');

        }else{

            $image =  null  ;
        }

         $training = Training :: create (
         [

            'training_type_id'      => $request->training_type_id ,
            'name'                  => $request->name ,
            // 'from'                 => $request->from ,
            // 'to'                   => $request->to ,
            // 'city_id'              => $request->city_id ,
             // 'trainer_id'         => $trainer_id ,
             // 'trainer_name'       => $request->trainer_name ,
             //'hour_number'          => $request->hour_number ,
            //'specialization'       => $request->specialization ,
             'text_editor'          => $request->text_editor ,
             'image'                 =>   $image  ,
          //   'cert'               => $cert ,
             'status'             => "pending " ,  // accepted  // rejected

         ] ) ;


         /*
         if(  !empty(  request('con')  )  && count(  request('con') )  > 0 )
         {

         foreach(  request('con') as $item  )

          {

             $add = new TraingCondthion () ;
             $add-> condthion = $item['condthion'] ;
             $add->training_id = $training ->id ;
             $add->save() ;

          }



         }

         */


         /*

         if(  !empty(  request('can')  )  && count(  request('can') )  > 0 )
         {

         foreach(  request('can') as $item  )

          {

            $add = new TraingCandidate () ;
             $add-> candidate = $item['candidate'] ;
             $add->training_id = $training ->id ;
             $add->save() ;

          }


        }

        */




         ///// add notifcation /////////////////////
         $message = "تم انشاء دورة  جديده " ;
         $user_ids = User::whereIn('role_id' , [2, 3 , 4 ])->pluck('id')->toArray() ;
         $notifcation = Notifcation::create([

            'user_id'   => auth()->id() ,
            'message'   =>  $message  ,
            'title'     =>  $training->name ?? null   ,
            'to_user'   => implode(',' , $user_ids ) ,

            'link'      =>  route('trainings.index'),


         ]);

          ////////////////////// end notifcation ad ///////////
           return back()->with(['success'=>'تمت العملــية بنجاح !!']);



    }


    public function edit ( $id )
    {



        $data['cities'] =  City::get();
        $data['training_types']     =  TrainingType::get();

        $data['training'] = Training :: find($id);
        return view('training.edit' , $data ) ;


    }


    public function update( Request $request   , $id )
    {

        $request->validate([

            'name'              =>  'sometimes|nullable|string|min:2' ,
          //  'company_name'      =>  'sometimes|nullable|string|min:2' ,
           // 'trainer_name'      =>  'sometimes|nullable|string|min:2' ,
           // 'cert'              =>  'sometimes|nullable|mimes:png,jpg,jpeg,pdf' ,
           // 'hour_number'       =>  'sometimes|nullable|numeric' ,

       ]);

        $training = Training :: find($id);

     /*   if($request->file('cert')) {

              deleteFile(    $training->cert ) ;
              $cert = upload( $request->file('cert') , 'training');

         }

         */

         if($request->file('image')) {

            deleteFile(    $training->image ) ;
            $image = upload($request->file('image'), 'training');

        }else{

            $image =    $training->image  ;
        }

       $training->update (
         [

            'training_type_id'    => $request->training_type_id   ??  $training->training_type_id   ,
             'name'               => $request->name               ??  $training->name           ,
           //  'from'               => $request->from               ??  $training->from    ,
           //  'to'                 => $request->to                 ??  $training->to    ,
            // 'city_id'            => $request->city_id            ??  $training->city_id    ,
           //  'hour_number'        => $request->hour_number        ??  $training->hour_number     ,
            // 'specialization'     => $request->specialization     ??  $training->specialization     ,
             'cert'               => $cert                        ??  $training->cert            ,
             'status'             => $request->status             ??  $training->status          ,
             'text_editor'          => $request->text_editor      ??  $training->text_editor          ,
             'image'              => $image                       ,

         ] ) ;



         /*
         if(  !empty( request('con')[0]['condthion']    ) )
         {



            TraingCondthion::where('training_id' ,  $training ->id ) ->delete() ;

         foreach(  request('con') as $item  )

          {

             $add = new TraingCondthion () ;
             $add-> condthion = $item['condthion'] ;
             $add->training_id = $training ->id ;
             $add->save() ;

          }



         }

         */

         /*

         if(   !empty( request('can')[0]['candidate']  )  )
         {

            TraingCandidate::where('training_id' ,  $training ->id ) ->delete() ;
         foreach(  request('can') as $item  )

          {

            $add = new TraingCandidate () ;
             $add-> candidate = $item['candidate'] ;
             $add->training_id = $training ->id ;
             $add->save() ;

          }


        }

        */


         return redirect()->route('trainings.index')->with(['success'=>'تمت العملــية بنجاح !!']);

    }


    public function trainer_register_page (   )
    {


        $data['training'] = TraingingTrainers ::  paginate(5);

        return view('training.regiter_page' , $data ) ;


    }


    public function trainer_register_status( Request $request , $id )
    {


        $data['training'] = TraingingTrainers ::  find( $id );
        $data['training']->status = $request->status ?? 'pending' ;

        $data['training']->save() ;

         return redirect()->back()->with(['success'=>'تمت العملــية بنجاح !!']);

    }


    public function trainer_register ( Request  $request , $id  )
    {


            $trainer = Trainer :: where('user_id' , auth()->id() ) ->first() ;
            $trainer_id = $trainer->id ;

             $data = TraingingTrainers :: where('training_id' , $id )->where('trainer_id' , $trainer_id )->first()  ;


             if(  ! $data  )
             {


                $new  = new TraingingTrainers();

                $new->trainer_id = $trainer_id ;
                $new->training_id = $id ;
                $new->save() ;
                return redirect()->route('trainings.index')->with(['success'=>'تمت العملــية بنجاح !!']);

             }else{

                return redirect()->route('trainings.index')->with(['error'=>'تم  التسجيل مسبقا !!']);


             }




    }

    public function print( Request $request , $id  )
    {


        $trainer = Trainer :: where('user_id' , auth()->id() ) ->first() ;

        $trainer_name = $trainer->user->name ?? '' ;

        $training = Training :: find($id);

        $img = Image::make(public_path('cert.jpeg'));



    $name  =   arabic_utf8(  $trainer_name  );

    // $name  =     $trainer_name  ;

      $state_name =   $trainer->state->name  ?? null     ;
     $state =  arabic_utf8(   $state_name   );

    // $state =   $trainer->state->name  ?? ''     ;

     $national_id  =  $trainer->national_id   ;   // show  in english
    // $national_id  = arabic_w2e(  $training->trainer->national_id  ) ; show  in arabic

    $img->text(   $name ?? '' , 890, 412, function($font) {
        $font->file(public_path('new/webfonts/helvetica-neue-w23-for-sky-reg.ttf'));
        $font->size(27);
        $font->color('#c49c6c');
        $font->align('right');
        $font->valign('bottom');
        $font->angle(0);
    });

    $img->text(   $state  ?? '' , 815, 515, function($font) {
        $font->file(public_path('new/webfonts/helvetica-neue-w23-for-sky-reg.ttf'));
        $font->size(27);
        $font->color('#c49c6c');
        $font->align('right');
        $font->valign('bottom');
        $font->angle(0);
    });

    $img->text(   $national_id ?? '' , 370, 412, function($font) {
        $font->file(public_path('new/webfonts/helvetica-neue-w23-for-sky-reg.ttf'));
        $font->size(27);
        $font->color('#c49c6c');
        $font->align('right');
        $font->valign('bottom');
        $font->angle(0);
    });


    $img->text($training->created_at->format('Y-m-d'), 360, 515, function($font) {
        $font->file(public_path('new/webfonts/helvetica-neue-w23-for-sky-reg.ttf'));
        $font->size(27);
        $font->color('#c49c6c');
        $font->align('right');
        $font->valign('bottom');
        $font->angle(0);
    });



        $extension = $img -> extension  ;
        $fileName = $img->filename  ;
        $file = rand(1,99999)."_".$fileName.".".$extension ;
        $img->save(public_path( $file ));

        return view("training.print", compact('file'));



    }

 }

