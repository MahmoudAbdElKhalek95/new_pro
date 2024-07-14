<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\User;
use App\Models\Company;
use App\Models\Manager;
use App\Models\Student;
use App\Models\Trainer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{


    public function index()
    {

        $data['users'] = User::paginate(10)  ;
        $data['roles'] = DB::table('roles')->get()  ;


        return view('users.index' , $data ) ;

    }

    public function changeAccountStatus(  $id ){

        $user = User::find( $id );
        if( $user->isActive == 0 )
        {

            $user->isActive = 1 ;
        } else{
            $user->isActive = 0 ;
        }
        $user->save();
        return back()->with(['success'=>'تمت العملــية بنجاح !!'  ]);
    }
    public function changePass(Request $request)
    {
        $user = User::find($request->userid);
        $user->password= Hash::make($request->password);
        $user->save();
        return response(['text'=>' تم تحديث كلمة المرور !! ', 'color'=>'success']);
    }
    public function changephone(Request $request){
        $user = User::find($request->userid);
        $user->name= $request->name;
        $user->phone= $request->phone;
        $user->save();
        return response(['text'=>' تم تحديث  الحساب !! ', 'color'=>'success']);
    }
    public  function getUser(Request $request)
    {
        $user = User::find($request->userid);
        return $user;
    }

    // 8888888888888888888888888888888888888888888888888888888888888888
    // 8888888888888888888888888888888888888888888888888888888888888888
    public function getCompanies()
    {
        $users = User::where('role_id',3)->get();
        foreach ($users as $key => $user) {
            $comp = Company::with('city')->where('user_id',$user->id)->first();
            $users[$key]['company']=$comp;
        }
        return $users;
    }
    public function createCompany(Request $request)
    {
        $sts = $request->status;
        if ($request->status==true) {
            $sts = 1;
        }
        if ($request->status==false) {
            $sts = 0;
        }
        // return $sts;
        $user = User::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>Hash::make($request->password),
            'role_id'=>3,
            'phone'=>"05".$request->phone,
            'isActive'=>$sts,
        ]);
        if ($user) {
            if($request->file()) {
                $doc_name = time().'_'.$request->doc->getClientOriginalName();
                $doc_path = $request->file('doc')->storeAs('uploads', $doc_name, 'public');
                $company = Company::create([
                    'user_id'=>$user->id,
                    'name'=>$request->company,
                    'regulator'=>$request->regulator,
                    'clearance_no'=>$request->clearance,
                    'city_id'=>$request->city,
                    'phone'	=>"05".$request->phone,
                    'doc_name'	=>$doc_name,
                    'doc_path'	=>$doc_path,
                ]);
                return response(['text'=>'تمت العملــية بنجاح !!', 'color'=>'success']);
            }else {
                $company = Company::create([
                    'user_id'=>$user->id,
                    'name'=>$request->company,
                    'regulator'=>$request->regulator,
                    'clearance_no'=>$request->clearance,
                    'city_id'=>$request->city,
                    'phone'	=>"05".$request->phone,
                ]);
                return response(['text'=>'تمت العملــية بنجاح !!', 'color'=>'success']);
            }
        } else {return response(['text'=>' ، الايميل مستخدم مسبقا تعذر تنفيذ العملية', 'color'=>'danger']);}
    }


    public function updateCompany(Request $request){
        $user  = User::find($request->user['id']);
        $user->name = $request->user['name'];
        $user->phone = $request->user['phone'];
        $user->save();
        $company  = Company::where('user_id',$request->user['id'])->first();
        $company->regulator = $request->user['company']['regulator'];
        $company->clearance_no = $request->user['company']['clearance_no'];
        // $company->city = $request->user['company']['city'];
        $company->save();
        if($user && $company){
            return response(['text'=>'تمت التحديث بنجاح !!', 'color'=>'success']);
        } else {return response(['text'=>'تعذر تنفيذ العملية', 'color'=>'danger']);}
    }
    // 8888888888888888888888888888888888888888888888888888888888888888
    // 8888888888888888888888888888888888888888888888888888888888888888
    public function getTrainers(){
        $users = User::where('role_id',4)->with('trainer','assesments')->get();
        return $users;
    }
    public function getCompanyTrainers(Request $request)
    {
        $company =  Company::where('user_id' , auth()->id() )->first() ;
        $company_id =  $company->id ;
       // $city = Company::find( $company_id  ) ;

         $data['trainers'] = Trainer::getAvailableTrainers( $company->city_id );
        // $users = User::where('role_id',4)->with('trainer','assesments')->get();
        foreach ( $data['trainers'] as $key => $trainer) {
            $count=0;
           if( !empty( $trainer->user->assesments )  )
           {
             foreach ($trainer->user->assesments as $key2 => $assesment) {
                 if ($assesment->company_id == $company_id) {
                    $count++;
                  }
             }
          }
            if($count>0){ $data['trainers'][$key]->assesed = true;}
            else{ $data['trainers'][$key]->assesed = false;}
        }

        $data['cities'] = City::get() ;
        return view('trainer.Companyhome' , $data ) ;
        //return  $data['trainers'];
    }
    public function createTrainer(Request $request)
    {
        if ($request->status=='true') {
            $sts = 1;
        }
        if ($request->status=='false') {
            $sts = 0;
        }
        $user = User::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>Hash::make($request->password),
            'role_id'=>4,
            'phone'=>"05".$request->phone,
            'isActive'=>$sts,
        ]);
        if ($user) {
            if($request->file()) {
                // $request->validate([
                //     'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                //     // 'cert' => 'mimes:pdf,docx,svg|max:3048',
                // ]);
                $image_name = time().'_'.$request->image->getClientOriginalName();
                $cert_name = time().'_'.$request->cert->getClientOriginalName();
                $image_path = $request->file('image')->storeAs('uploads', $image_name, 'public');
                $cert_path = $request->file('cert')->storeAs('uploads', $cert_name, 'public');
                $company = Trainer::create([
                    'user_id'=>$user->id,
                    'image'=>$image_name,
                    'path'=>$image_path,
                    't_certificate'=>$cert_name,
                    'cert_path'	=>$cert_path,
                    'city'=>$request->city,
                    'remote_work'=> !! $request->remote_work,
                ]);
                return response(['text'=>'تمت العملــية بنجاح !!', 'color'=>'success']);
            }
            else{
                $company = Trainer::create([
                    'user_id'=>$user->id,
                    'image'=>"default.png",
                    'path'=>"uploads/default.png",
                    'city'=>$request->city,
                    'remote_work'=> !! $request->remote_work,
                ]);
                return response(['text'=>'تمت العملــية بنجاح !!', 'color'=>'success']);
            }
        }
         else {return response(['text'=>'تعذر التنفيذالإيميل مستخدم مسبقاً ', 'color'=>'danger']);}
    }


    public function updateTrainer(Request $request){
        // dd (json_decode($request->user));
        // return $request->phone;
        // if($request->file('cert')) {
        //     return "hahah";
        // }
        // if($request->file('image')) {
        //     return "hahah";
        // }
        // $image_name = time().'_'.$request->image->getClientOriginalName();
        // $cert_name = time().'_'.$request->cert->getClientOriginalName();
        // $image_path = $request->file('image')->storeAs('uploads', $image_name, 'public');
        // $cert_path = $request->file('cert')->storeAs('uploads', $cert_name, 'public');
        // $trainer  = Trainer::where('user_id', $request->user['id'])->first();
        // $trainer->path = $image_path;
        // $trainer->cert_path = $cert_path;
        // $trainer->save();
        $user  = User::find($request->id);
        $user->name = $request->name;
        $user->phone = $request->phone;
        $user->save();
        $trainer  = Trainer::where('user_id', $request->id)->first();
        $trainer->city = $request->city;
        $trainer->save();
        return response(['text'=>'تمت العملــية بنجاح !!', 'color'=>'success']);
    }
    // 8888888888888888888888888888888888888888888888888888888888888888
    // 8888888888888888888888888888888888888888888888888888888888888888

    public function getManagers()
    {
        $users = User::whereIn('role_id',[1,2])->with('manager.city')->get();
        // foreach ($users as $key => $user) {
        //     $comp = Company::where('user_id',$user->id)->first();
        //     $users[$key]['company']=$comp;
        // }
        return $users;
    }
    public function createManager(Request $request)
    {
        $user = User::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>Hash::make($request->password),
            'role_id'=>$request->role_id,
            'phone'=>"05".$request->phone,
            'isActive'=>1,
        ]);
        if ($user->role_id == 1) {
            return response(['text'=>'تمت العملــية بنجاح !!', 'color'=>'success']);
        } else if ($user->role_id == 2) {
            Manager::create([
                'user_id' => $user->id,
                'city_id' => $request->city,
            ]);
            return response(['text'=>'تمت العملــية بنجاح !!', 'color'=>'success']);
        }
         else {return response(['text'=>'تعذر تنفيذ العملية', 'color'=>'danger']);}
    }


    public function updateManager(Request $request){
        $user  = User::find($request->user['id']);
        $user->name = $request->user['name'];
        $user->phone = $request->user['phone'];
        $user->save();
        if($user){
            return response(['text'=>'تمت التحديث بنجاح !!', 'color'=>'success']);
        } else {return response(['text'=>'تعذر تنفيذ العملية', 'color'=>'danger']);}

    }
    // 8888888888888888888888888888888888888888888888888888888888888888
    // 8888888888888888888888888888888888888888888888888888888888888888
    public function getStudents()
    {
        $data['users'] = User::where('role_id',5)->with('student.companyCourse.course','student.companyCourse.trainer','student.companyCourse.company')->paginate(5);

        $data['cities'] = City::get() ;
        $data['company'] = Company::get() ;

        return view('student.home' , $data ) ;
    }
    public function createStudent(Request $request)
    {

        if( auth()->check()  && auth()->user()->role_id == 3  )
        {
          $company = Company::where('user_id' , auth()->user()->id )->first() ;
          $company_id = $company->id ;

        }else{

            $company_id = $request->company_id ;

        }

        DB::beginTransaction();
         $user = User::create([
            'name'=>$request->name,
            'email'=>$request->national."@autoGenerated.com",
            'password'=>Hash::make($request->password),
            'role_id'=>5,
            'phone'=>"05".$request->phone,
            'isActive'=>0,
        ]);
        if ($user) {
            $student = Student::create([
                'user_id'=>$user->id,
                'name'=>$request->name,
                'course_id'=>$request->course_id,
                'national'=>$request->national,
                'company_id'=>$company_id,
                'age'=>$request->age,
            ]);

            Db::commit() ;
            return back()->with(['success'=>'  تم تسجيل المتـدرب بنجاخ    !!' ]);
        } else {
            DB::rollBack();
            return back()->with(['error'=>'تعذر تنفيذ العملية' ]);
        }
    }


    public function updateStudent(){

    }

    // 8888888888888888888888888888888888888888888888888888888888888888
    // 8888888888888888888888888888888888888888888888888888888888888888

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

          $user  =  User::where('id' , $id )->first() ;


          $role = DB::table('roles')->where('id' , $request->role_id) ->first() ;
          $user->syncRoles([ $role->name ]);
          $message = "  تم تعديل الصلاحية بتجاح " ;
          return back()->with('success' ,  $message ) ;

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }


    public function profile ()
    {

        return  view('profile') ;

    }

    public function update_profile(  Request $request  )
    {

       ///// return "ASad" ;

        $request->validate([

            'name'          => 'required|string|min:3',
            'email'         => 'required|email' ,
            'phone'         => 'required|numeric' ,
            'password'      => 'sometimes|nullable|confirmed',

        ],[

            'name.required'                 => ' الاسم مطلوب' ,
            'email.required'                => '  البــريد الإلكتروني مطلوب'   ,
            'phone.required'                => ' الجـوال مطلوب'  ,
           // 'password.required'             => ' كلمة السر مطلوب'  ,
            'password.confirmed'            => ' كلمة السر  غير متاطبقه'  ,

        ]);


         //return $request->all() ;

        $user = User::find( auth()->id() ) ;
        $user->update([

            'name'=>$request->name,
            'email'=>$request->email,
            'password'=> ( $request->filled('password')  ) ? Hash::make($request->password) :  $user->password   ,
            'phone'=> $request->phone,

        ]);

        return back()->with(['success'=>'تمت العملــية بنجاح !!']);

    }

}
