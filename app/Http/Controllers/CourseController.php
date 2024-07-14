<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Course;
use App\Models\Company;
use App\Models\Student;
use App\Models\Notifcation;
use App\Models\OrderCourse;
use Facade\FlareClient\View;
use Illuminate\Http\Request;
use App\Models\CompanyCourse;
use App\Models\StudentCourse;
use App\Models\TrainerCourse;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class CourseController extends Controller
{

    function __construct()
    {
         $this->middleware('permission:Course-List|Course-Create', ['only' => ['getCourse','createCourse']]);
         $this->middleware('permission:Course-Create', ['only' => ['createCourse']]);
         $this->middleware('permission:Course-Edit', ['only' => ['edit','updateCourse']]);
         $this->middleware('permission:Course-Delete', ['only' => ['delete']]);
    }

    /**


     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getCourse( Request $request )
    {
        $data['company'] = Company::get() ;
        $data['courses'] =  Course::query()   ;    //paginate(5);

        if(  $request->filled( 'company_id'  ) )
        {

            $CompanyCourse_ids = CompanyCourse::where('company_id' , $request->company_id) ->pluck('course_id');

            $data['courses']  ->whereIn('id' , $CompanyCourse_ids )  ;

        }

        if(  $request->filled( 'age'  ) )
        {

          //  return $request->all() ;

            $data['courses']  ->where('age' , $request->age )  ;

        }

        if( auth()->user()->role_id == 5  ) // student
        {


            $student = Student::where('user_id' , auth()->id())->first() ;
            $company_id =  $student->company_id  ;

            $course_ids = OrderCourse::where('company_id' , $company_id  )->where('status' , 'completed')
                       ->pluck('course_id')->toArray() ;

            $data['courses'] =  $data['courses']->whereIn('id' , $course_ids )->paginate(5);


        }else{

            $data['courses'] =  $data['courses']->paginate(5);


        }



        return view('Course.home' , $data ) ;
    }

    public function getStudentsCourses()
    {
        $users = User::where('role_id',5)->with('student.companyCourse.course','student.companyCourse.trainer','student.companyCourse.company')->get();
        // foreach ($users as $key => $user) {
        //     $comp = Company::where('user_id',$user->id)->first();
        //     $users[$key]['company']=$comp;
        // }
        return $users;
    }
    public function companyStudents(Request $request){

        $company = Company::where( 'user_id' , auth()->id() )->first() ;

        $company_id = $company->id ;

        $data['courses']  =  Course::get() ;
        $data['students']  =   Student::query()->where('company_id', $company_id  )
        ->with('companyCourse.course','companyCourse.trainer','user') ;  //  ->paginate(10);

        if(  $request->filled( 'national'  )   )
        {


                  $data['students'] ->where('national' , request('national') )  ;

        }



           $data['students'] =   $data['students']->paginate(10);

        return view('student.StudentHome', $data ) ;

    }

    public function getCompanyCourses(Request $request){

        $company = Company::where('user_id' , auth()->id() ) ->first() ;
        $course_ids = Company::getCompanyCourses( $company->id );
        $data['courses'] = Course::paginate(10);

        foreach ($data['courses'] as $key => $course) {
            $count=0;
            foreach ($course_ids as $key2 => $course_id) {
                if($course->id == $course_id){ $count++;}
            }
            if($count>0){$data['courses'][$key]->enrolled = true;}
            else{$data['courses'][$key]->enrolled = false;}
        }

        return view('Course.CompanyHome' , $data ) ;
        //return $courses;
    }
    public function editdCourseToCompany(Request $request , $id ){ //  الحقائب التدريبية

         $trainers = TrainerCourse::where('course_id',$id)->pluck('trainer_id');
        $data['trainers'] = User::whereIn('id',$trainers)->select('id','name')->get();
        $data['courses']  = Course::find($id);
       // return    $data['courses']->company_course()->count() ;
        return view('Course.editTrainer' , $data) ;
    }
    public function addCourseToCompany(Request $request  , $id ){


        $request->validate([

            'trainer_id' => 'required|exists:users,id' ,
            'seats'      => 'required|numeric' ,
            'cost'       => 'required|numeric' ,
            'start'      => 'required|date' ,
            'end'        => 'required|date|after_or_equal:start' ,


        ],[

            'trainer_id.required'                 => ' المدرب مطلوب' ,
            'seats.required'                      => ' عدد المقاعد مطلوب' ,
            'cost.required'                       => ' السعــر مطلوب' ,
            'start.required'                      => ' الفتره من مطلوب' ,
            'end.required'                        => '  الفتره الي مطلوب'   ,

        ]);
       // $trainers = TrainerCourse::where('course_id',$id)->pluck('trainer_id');
         $company = Company::where('user_id' , auth()->id() ) ->first() ;



        CompanyCourse::updateOrCreate(
            [
                'trainer'=>$request->trainer_id,
                'company_id'=> $company->id,
                'course_id'=>$id
            ],
            [
            'seats'=>$request->seats,
            'cost'=>$request->cost,
            'start'=>$request->start,
            'end'=>$request->end,

        ]);

        //   return "Asad" ;

          ///// add notifcation /////////////////////

          $course = Course::find(  $id ) ;
          $message = " تم انشاء   نموذج الحقائب التدريبية      "    ;
           $user_ids = User::where('id' , $request->trainer_id   )->pluck('id')->toArray() ;
          $notifcation = Notifcation::create([

         'user_id'   => auth()->id() ,
         'message'   =>  $message  ,
         'title'     => $course->name    . " " .   $company->user->name ??  null    ,
         'to_user'   => implode(',' , $user_ids ) ,
       //  'link'      =>  route('trainerCourses', )  ,
         'link'      =>   null  ,


      ]);



       ////////////////////// end notifcation ad ///////////

        return redirect()->route('getCompanyCourses')->with(['success'=>'تمت العملــية بنجاح !!']);

    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createCourse(Request $request)
    {

        $request->validate([

            'name'          => 'required|string|min:3',
            'desc'          => 'required|string|min:3',
            'age'           => 'required|string',
            'image'         => 'required|image|mimes:pdf,png,jpg,jpeg',
            'trainer_price'          => 'required',
            'student_price'          => 'required',
            'trainer_quantity'       => 'required',
            'student_quantity'       => 'required',
            'field'                  => 'required|string',
            //'level'                => 'required|string',
            'hour_number'            => 'required|string',
            


        ],[

            'name.required'                       => ' الاسم مطلوب' ,
            'desc.required'                       => ' الوصف مطلوب' ,
            'age.required'                        => ' الفئة العمريه مطلوب' ,
            'image.required'                      => ' غلاف الحقيبة مطلوب' ,
            'trainer_price.required'              => ' سعر نسخة المدرب مطلوب' ,
            'student_price.required'              => '  سعر نسخة المتدرب مطلوب'   ,
            'trainer_quantity.required'              => '  الكمية المتدرب مطلوب'   ,
            'student_quantity.required'              => '  الكمية المتدرب مطلوب'   ,

            'field.required'                      => '  مجال الحقيبة مطلوب'   ,
           // 'level.required'                      => '  مستوى الحقيبة مطلوب'   ,
            'hour_number.required'                => '  عدد الساعات مطلوب'   ,


        ]);

        if( auth()->user()->role_id == 3   ) /// الجهات المنفذة
        {

            $company      = Company::where('user_id' , auth()->id() ) ;
            $company_id  = $company->id ;  // الجهات المنفذة

        }else{

            $company_id = null  ;
        }

        if($request->file('image')) {


            $image = upload($request->file('image'), 'course');

        }else{

            $image =  "files/uploads/default.png" ;
        }

            $course = Course::create([
                'image_path'  => $image,
                'age'         =>$request->age,
                'desc'        =>$request->desc,
                'name'        =>$request->name,

                'trainer_price'           =>$request->trainer_price,
                'student_price'           =>$request->student_price,
                'trainer_quantity'         =>$request->trainer_quantity,
                'student_quantity'         =>$request->student_quantity,
                'field'                   =>$request->field,
                'hours'                   =>$request->hours,
                'activities'              =>$request->activities,
                'units'                   =>$request->units,
                'ideas'                   =>$request->ideas,
                'goals'                   =>$request->goals,
                'kfayat'                   =>$request->kfayat,
               // 'level'                 =>$request->level,
                'hour_number'             =>$request->hour_number,
                'company_id'               =>$company_id,  // الجهات المنفذة


            ]);

               ///// add notifcation /////////////////////

             $message = " تم انشاء   نموذج الحقائب التدريبية      "    ;
             $user_ids = User::whereIn('role_id' , [ 1 , 2 ])->pluck('id')->toArray() ;
             $notifcation = Notifcation::create([

            'user_id'   => auth()->id() ,
            'message'   =>  $message  ,
            'title'     => $request->name ?? null   ,
            'to_user'   => implode(',' , $user_ids ) ,
            'link'      =>  route('getCourse')  ,


         ]);

          ////////////////////// end notifcation ad ///////////
            return back()->with(['success'=>'تمت العملــية بنجاح !!']);



    }

    public function edit (  Request $request , $id )
    {

        $data['courses']  = Course::find($id);

        return view('Course.edit' , $data ) ;

    }
    public function updateCourse(Request $request , $id  )
    {

        $course = Course::find($id);

        if($request->file('image')) {

            $image = upload($request->file('image'), 'course');
        }else{
            $image =  $course->image_path ;
        }

        $course->name = $request->name                              ?? $course->name ;
        $course->age = $request->age                                ?? $course->age ;
        $course->desc = $request->desc                              ?? $course->desc ;
        $course->trainer_price = $request->trainer_price            ?? $course->trainer_price ;
        $course->student_price = $request->student_price            ?? $course->student_price ;
        $course->trainer_quantity = $request->trainer_quantity      ?? $course->trainer_quantity ;
        $course->student_quantity = $request->student_quantity      ?? $course->student_quantity ;
        $course->field = $request->field                            ?? $course->field ;
        $course->level = $request->level                            ?? $course->level ;
        $course->hour_number = $request->hour_number                ?? $course->hour_number ;
        $course->hours = $request->hours                            ?? $course->hours ;
        $course->activities = $request->activities                  ?? $course->activities ;
        $course->units = $request->units                            ?? $course->units ;
        $course->ideas = $request->ideas                            ?? $course->ideas ;
        $course->goals = $request->goals                            ?? $course->goals ;
        $course->kfayat = $request->kfayat                          ?? $course->kfayat ;
        $course->status     = $request->status                      ?? $course->status ;
        $course->image_path = $image                                ?? $course->image ;
        $course->save();
        return redirect()->route('getCourse')->with(['success'=>'تمت العملــية بنجاح !!']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function delete(  $id  )
    {

        $course = Course::find($id)->delete();

        return back()->with('success' , 'تم الحذف' );
    }


    public function get_course_amount ( $id  )
    {

        $course = Course :: find($id);
        $order = OrderCourse :: where('course_id' , $id  )->orderBy('id' , 'desc')->first();


       // return $course
      // return $course->total_amount + $order->shipping_price ;
      if( $order->shipping_way == "shipping" )
      {
        return (float) $course->total_amount +  (0.5) ;

      }else{
        return (float) $course->total_amount ;
      }

    //   return json_encode(  $course  ) ;
     //   return json_encode(  $course->course_total_amount()  ) ;




     }


     public function course_subscribe( $course_id  )  ////  add student to course  /////////
     {



        $student       = Student::where('user_id' , auth()->id())->first() ;
        $company_id    =  $student->company_id  ;
        $student_id    =  $student->id  ;

        $course = Course::where('id' , $course_id )->first() ;
        if( $course->student_quantity <= 0  )
        {

            $message  = " عفوا غير متاح الاشتراك  بالحقيبة لكتمال العدد " ;
            return back()->with('error' , $message )  ;


        }


        $check = StudentCourse::where('student_id' , $student_id)->where('course_id' , $course_id ) ->first() ;
        if( $check )
        {

            $message  = " تم الاشتراك  بالحقيبة من قبل " ;
            return back()->with('error' , $message )  ;
        }

        $data = StudentCourse:: updateOrCreate(

            [

                'student_id' =>  $student_id  ,
                'course_id' =>  $course_id  ,


            ],
            [

                'company_id' =>  $company_id  ,

            ]
        ) ;

        $course->student_quantity =  $course->student_quantity - 1 ;
        $course->save() ;



           $message  = " تم الاشتراك  بنجاح " ;
          return back()->with('success' , $message )  ;


     }


}
