<?php

namespace App\Http\Controllers;

use App\Models\AboutUs;
use App\Models\City;
use App\Models\Company;
use App\Models\Course;
use App\Models\Manager;
use App\Models\News;
use App\Models\Notifcation;
use App\Models\NotifcationRead;
use App\Models\OrderCourse;
use App\Models\Payment;
use App\Models\ProjectManager;
use App\Models\Student;
use App\Models\SurvayAnswer;
use App\Models\Trainer;
use App\Models\TraingingTrainers;
use App\Models\Training;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class FrontController extends Controller
{


    public function about()

    {

        $data['about'] = AboutUs::first() ;
        return view('about' , $data) ;
    }


    public function news()

    {

        $data['news'] = News::where('active' , 1 ) ->paginate(6);
        return view('news' , $data) ;
    }

    public function news_details( $id )

    {

        $data['news'] = News::where('id' , $id )->first() ;
        return view('news_details' , $data) ;
    }



    public function courses()

    {
        $data['courses'] = Course::paginate(6);
        return view('courses' , $data) ;
    }

    public function courses_details( $id )

    {

        $data['courses'] = Course::where('id' , $id )->first() ;
        return view('course_details' , $data) ;
    }


    public function training()

    {

        $data['training'] = Training::paginate(6);
        return view('training' , $data ) ;
    }

    public function training_details( $id )

    {

        $data['training'] = Training::where('id' , $id )->first() ;
        return view('training_details' , $data ) ;
    }


    public function addCoursetoCart($id , Request $request)
    {



        $request->validate([

            'shiping_type' => 'required|in:from_office,shiping'

         ],[
            'shiping_type.in' => 'من فضلك قم باختيار نوع حقيبة صحيح'
         ]);



         $total_quantity = (int ) $request->student_quantity + ( int ) $request->trainer_quantity ;

         if(   $request->shiping_type == "shiping" )
         {
 
              $shiping_price = shipping_price($total_quantity) ;
               $total_price = $request->total_price +  $shiping_price  ;
 
         }else{
            $shiping_price = 0 ; 
            $total_price = $request->total_price   ;
         }

        

       $Course = Course::where('id' , $id)->first();




       if (   (int)  $request->trainer_quantity >  (int) $Course->trainer_quantity       )
       {

        return back()->with('error' , '  الكمية المطلوبة اكبر  من الكمية الحالية') ;

       }


       if (     (int) $request->student_quantity  >  (int) $Course->student_quantity      )
       {

        return back()->with('error' , '  الكمية المطلوبة اكبر  من الكمية الحالية') ;

       }

      // return   $request->total_price ;


        $cart = session()->get('cart', []);

        if(isset($cart[$id])) {
          //  $cart[$id]['quantity']++;
          return back()->with('error' , '  تمت الاضافة من قبل ') ;
        } else {
            $cart[$id] = [
                "name"              =>  $Course->name,
                "trainer_quantity"  =>  $request->trainer_quantity ,
                "student_quantity"  =>  $request->student_quantity ,
                "trainer_price"     =>  $Course->trainer_price ,
                "student_price"     =>  $Course->student_price ,
                "total_price"       =>   $total_price  ,
                "shiping_type"      =>  $request->shiping_type ,
                "shiping_price"     =>   $shiping_price  ,
                "desc"              =>  $Course->desc ,
                "course_id"         =>  $Course->id ,
                "hour_number"       =>  $Course->hour_number ,
                "image"             =>  $Course->image_path
            ];
        }
        session()->put('cart', $cart);
        return redirect()->back()->with('success', ' تم اضافه الحقيبه الي عربة التسوق ');
    }

    public function deleteCourseFromCart(Request $request , $id  )
    {
        if($id) {
            $cart = session()->get('cart');
            if(isset($cart[$id])) {
                unset($cart[$id]);
                session()->put('cart', $cart);
            }
            return   back()->with('success', 'تم حذف الحقيبه من عربة التسوق');
        }
    }



    public function getCourseCart( Request $request )
    {

        //session()->flush() ;
        $data['cart'] = session('cart') ;
       // return    ( $data['cart'] ) ;

        return view ('courses_cart' , $data ) ;


    }


    public function courseCheckout( Request $request  ,  $id )
    {




          // return   date('H:i:s')  ;
         $cart = session('cart')[$id] ;
         $company = Company::where('user_id' ,  auth()->id() ) ->first();
         $OrderCourse = OrderCourse :: updateOrCreate (

            [

                'course_id'          =>   $id ,
                'company_id'         =>   $company ->id  ,

            ],
            [

                'trainer_quantity'    => $cart['trainer_quantity'] ,
                'student_quantity'    => $cart['student_quantity'] ,
                'date'                => date('Y-m-d')  ,
                'time'                =>  date('H:i:s') ,
                'shipping_way'        => $cart['shiping_type']   ?? null ,
                'total_price'         => $cart['total_price']     ?? ($cart['trainer_quantity']* $cart['trainer_price'] ) + (  $cart['student_quantity']*$cart['student_price']   )  ,
                'shipping_price'      => $cart['shiping_price']    ?? null,
                'hour_number'         => $cart['hour_number']       ?? null ,
                'status'              => "pending" ,

            ]
            ) ;

            $carts = session()->get('cart');
            if(isset($carts[$id])) {
                unset($carts[$id]);
                session()->put('cart', $carts);
            }


            $message  = " تمت العملــية بنجاح " ;
            $message  .= " الرجاء ارفاق ايصال السداد في الصفحة التاليه " ;
            //$message  .= " <a class ='btn btn-info' href='". route('getCourseOrder')  ."' > اضغط هتا   </a>" ;

            $message  .=  "<a  href='" .route('getCourseOrder') ."' >اضغط هتا  </a> " ;

            return back()->with(['success'=>   $message  ]);


    }



}
