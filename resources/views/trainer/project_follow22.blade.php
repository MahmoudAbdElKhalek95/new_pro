

@extends('dashboard.layouts.mainapp1')
@section('title', 'متابعه المشاريع')



@section('content')


<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<link href='https://fonts.googleapis.com/css?family=Cairo' rel='stylesheet'>
<style>
body {
    font-family: 'Cairo';font-size: 22px;
}
</style>


  <!-- Start page content -->
<section class="supervisors-accounts">
    <div class="container-fluid">
        <div class="d-md-flex align-items-center justify-content-between mb-4">



        </div>
        <div class="supervisors">


            {{--  --}}

         <div class="container">
    <div class="header-title-page">
      <h5 class="mb-4 mt-2">
        <i class="fa fa-university" aria-hidden="true"></i>
        متابعه المشاريع - {{  $data->user->name ?? '' }}
      </h5>
      <div class="view-type-modal">
        {{-- <div class="view-type">
          <i class="fa fa-list"></i>
          <i class="fa fa-th-large" aria-hidden="true"></i>
        </div> --}}
        <!-- Button trigger modal -->


      </div>


     </div>

    <section class="table-requests">





      <div class="table-responsive-xl" >
        <div class="container">

        {{-- <div class="row">

            <div class="col-md-2" >
              <div class="panel panel-warning" >
                <div class="panel-heading">
                    <div class="text-center" >
                      <input type="checkbox" class="" checked  style=" width: 30px ; height:30px ; " >
                    </div>
                </div>
                <div class="panel-body text-center">   التسجيل في المنصة </div>
              </div>
            </div>

            <div class="col-md-2" >
                <div class="panel panel-warning" >
                  <div class="panel-heading">
                      <div class="text-center" >
                        <input type="checkbox" class=""   style=" width: 30px ; height:30px ; "
                        {{  $data->trainer_training()->count() > 0 ? 'checked' : ''  }}  >
                      </div>
                  </div>
                  <div class="panel-body text-center">   إمكانية التسجيل في الدورات </div>
                </div>
              </div>



            <div class="col-md-2">
                <div class="panel panel-info">
                  <div class="panel-heading">
                      <div class="text-center">
                        <input type="checkbox" class=""   style=" width: 30px ; height:30px ; ">

                      </div>
                  </div>
                  <div class="panel-body text-center">  الاعتماد من الشركة </div>
                </div>
              </div>

              <div class="col-md-2">
                <div class="panel panel-warning">
                  <div class="panel-heading">
                      <div class="text-center">
                        <input type="checkbox" class=""  style=" width: 30px ; height:30px ; "
                        {{  $data->orderCourses()->count() > 0 ? 'checked' : ''  }} >

                      </div>
                  </div>
                  <div class="panel-body text-center">
                      الاطلاع على الفرص التدريبية
                  </div>
                </div>
              </div>

              <div class="col-md-2">
                <div class="panel panel-success">
                  <div class="panel-heading">
                      <div class="text-center">
                        <input type="checkbox" class=""  style=" width: 30px ; height:30px ; "
                        {{  $data->trainer_contract()->count() > 0 ? 'checked' : '' }} >
                      </div>
                  </div>
                  <div class="panel-body text-center">
                      التعاقد مع البيئة
                  </div>
                </div>
              </div>


        </div> --}}


        {{-- <div class="row">


            <div class="col-md-2">
                <div class="panel panel-warning">
                  <div class="panel-heading">
                      <div class="text-center">
                        <input type="checkbox" class=""  style=" width: 30px ; height:30px ; "
                           >
                      </div>
                  </div>
                  <div class="panel-body text-center">    ا قفال المشروع </div>
                </div>
              </div>


              <div class="col-md-2">
                <div class="panel panel-info">
                  <div class="panel-heading">
                      <div class="text-center">
                        <input type="checkbox" class=""  style=" width: 30px ; height:30px ; "
                           >

                      </div>
                  </div>
                  <div class="panel-body text-center">

                    تقييم الحقائب والبيئة


                   </div>
                </div>
              </div>

              <div class="col-md-2">
                <div class="panel panel-warning">
                  <div class="panel-heading">
                      <div class="text-center">
                        <input type="checkbox" class=""  style=" width: 30px ; height:30px ; "

                        {{  $data->orderCourses()->where('status' , 'processing')->count() > 0 ? 'checked' : ''  }} >

                      </div>
                  </div>
                  <div class="panel-body text-center">
                    تنفيذ الدورة

                  </div>
                </div>
              </div>


              <div class="col-md-2">
                <div class="panel panel-warning">
                  <div class="panel-heading">
                      <div class="text-center">
                        <input type="checkbox" class=""  style=" width: 30px ; height:30px ; "

                        {{  $data->student_count() > 0 ? 'checked' : ''  }} >

                      </div>
                  </div>
                  <div class="panel-body text-center">
                       تسجيل المتدربين
                  </div>
                </div>
              </div>

              <div class="col-md-2">
                <div class="panel panel-default">
                  <div class="panel-heading">
                      <div class="text-center">
                        <input type="checkbox" class=""  style=" width: 30px ; height:30px ; "

                             >

                      </div>
                  </div>
                  <div class="panel-body text-center">
                    التواصل مع مدير المشروع
                   </div>
                </div>
              </div>












        </div> --}}

        {{--  new modifcation  --}}

        <div class="row">

            <div class="col-md-4">
                <div class="panel panel-warning" >
                    <div class="panel-heading">
                        <div class="text-center" >
                          <input type="checkbox" class="" checked  style=" width: 30px ; height:30px ; " >
                        </div>
                    </div>
                    <div class="panel-body text-center">
                         تسجيل مدير المشروع

                         <i class="fa fa-arrow-left" style="margin:25px;"></i>

                    </div>
                  </div>
                </div>




            <div class="col-md-4">

                <div class="panel panel-warning" >
                    <div class="panel-heading">
                        <div class="text-center" >
                          <input type="checkbox" class=""   style=" width: 30px ; height:30px ; " >
                        </div>
                    </div>
                    <div class="panel-body text-center">
                         الاعتماد من المشرف العام
                         <i class="fa fa-arrow-left" style="margin:25px;"></i>

                    </div>
                  </div>
                </div>


            <div class="col-md-4">

                <div class="panel panel-warning" >
                    <div class="panel-heading">
                        <div class="text-center" >
                          <input type="checkbox" class=""   style=" width: 30px ; height:30px ; " >
                        </div>
                    </div>
                    <div class="panel-body text-center">
                        الاطلاع على الجهات المنفذة

                         <i class="fa fa-arrow-down" style="margin:25px;"></i>

                    </div>
                  </div>
                </div>

            </div>


        </div>

        <div class="row">

            <div class="col-md-4">
            </div>

            <div class="col-md-4">
                <div class="panel panel-warning" >
                    <div class="panel-heading">
                        <div class="text-center" >
                          <input type="checkbox" class=""   style=" width: 30px ; height:30px ; " >
                        </div>
                    </div>
                    <div class="panel-body text-center">
                        رفع التقارير

                         <i class="fa fa-arrow-right" style="margin:25px;"></i>

                    </div>
                  </div>
                </div>




            <div class="col-md-4">

                <div class="panel panel-warning" >
                    <div class="panel-heading">
                        <div class="text-center" >
                          <input type="checkbox" class=""   style=" width: 30px ; height:30px ; " >
                        </div>
                    </div>
                    <div class="panel-body text-center">
                        إجراء الزيارات الميدانية

                         <i class="fa fa-arrow-right" style="margin:25px;"></i>

                    </div>
                  </div>
                </div>


        </div>

        {{-- end ne wadd  --}}


      </div>
    </div>


    </section>

  </div>
</div>


            {{--  --}}

        </div>
    </div>
</section>

<!-- End page content -->




@endsection



