<?php
namespace App\Http\Controllers;
use App\Models\City;
use App\Models\News;
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

class NewsController extends Controller
{

    function __construct()
    {
         $this->middleware('permission:news-List|news-Create', ['only' => ['index','store']]);
         $this->middleware('permission:news-Create', ['only' => ['store']]);
         $this->middleware('permission:news-Edit', ['only' => ['edit','update']]);
         $this->middleware('permission:news-Delete', ['only' => ['destroy']]);
    }


    public function index()
    {

         $data['news'] =  News::paginate(9);

        return view('news.index' , $data ) ;

    }

    public function store( Request $request  )
    {

       // return "Asad" ;

       $request->validate([

            'title'               =>  'required|string|min:2' ,
              //  'description'         =>  'required|string|min:2' ,
            'image'               =>   'required|mimes:png,jpg,jpeg' ,

            ],[

                'title.required'         => ' الاسم مطلوب' ,
                'image.required'  => '   الصورة مطلوب'   ,

            ]);

           //return $request->all() ;

          if($request->file('image')) {

            $image = upload($request->file('image'), 'news');

          }else{
             $image =  null  ;
          }



         $News = News :: create (
         [

             'title'                     => $request->title ,
             'description'               => $request->description ,
             'text'                     => $request->text ,
             'image'                     => $image ,


         ] ) ;


         ///// add notifcation /////////////////////
         $message = "تم انشاء السليدر  جديده " ;
         $user_ids = User::whereIn('role_id' , [1,2 ])->pluck('id')->toArray() ;
         $notifcation = Notifcation::create([

            'user_id'   => auth()->id() ,
            'message'   =>  $message  ,
            'title'     =>  $News->name ?? null   ,
            'to_user'   => implode(',' , $user_ids ) ,
            'link'      =>  route('trainings.index'),


         ]);

          ////////////////////// end notifcation ad ///////////
           return back()->with(['success'=>'تمت العملــية بنجاح !!']);


    }


    public function edit ( $id )
    {

        $data['news'] = News :: find($id);
        return view('news.edit' , $data ) ;

    }

    public function activate ( $id )
    {

         $news = News::where('id' , $id)->first() ;
        if( $news->active==1  )
        {
            $news->active = 0 ;
            $news->save() ;
        } else{

            $news->active = 1 ;
            $news->save() ;

        }


        return back()->with('success' , 'تم الحفظ' );

    }


    public function update( Request $request   , $id )
    {

        $request->validate([

            'name'              =>  'sometimes|nullable|string|min:2' ,
            'description'       =>  'sometimes|nullable|string|min:2' ,
            'image'             =>  'sometimes|nullable|mimes:png,jpg,jpeg' ,

       ]);

        $news = News :: find($id);

        if($request->file('image')) {

            deleteFile(  $news->image  ) ;
            $image = upload($request->file('image'), 'news');

          }else{
             $image =  $news->image  ;
          }


       //  return $request->all() ;
       $news->update (
         [
             'title'                    => $request->title                      ??  $news->title           ,
             'description'               => $request->description               ??  $news->description    ,
             'text'                      => $request->text                       ??  $news->text    ,

             'image'                     => $image                              ??  $news->image    ,


         ] ) ;



         return redirect()->route('news.index')->with(['success'=>'تمت العملــية بنجاح !!']);

    }


    public function destroy( $id )
    {

        News::where('id' , $id)->delete() ;

        return back()->with('success' , 'تم الحذف' );

    }






 }

