

@extends('dashboard.layouts.mainapp')
@section('title' , 'متابعه المشاريع')

@section('content')
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<link href='https://fonts.googleapis.com/css?family=Cairo' rel='stylesheet'>
<style>
body {
    font-family: 'Cairo';font-size: 22px;
}
</style>

<div class="home-page implementingAgencies">
<div class="container">
    <div class="header-title-page">
      <h5 class="mb-4 mt-2">
        <i class="fa fa-university" aria-hidden="true"></i>
        متابعه المشاريع - {{  $data->name }}
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

        <div class="row">

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

            <div class="col-md-2">
                <div class="panel panel-info">
                  <div class="panel-heading">
                      <div class="text-center">
                        <input type="checkbox" class=""   style=" width: 30px ; height:30px ; "
                            {{  $data->company_course()->count() > 0 ? 'checked' : ''  }} >
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
                        {{  $data->order_course()->count() > 0 ? 'checked' : ''  }} >

                      </div>
                  </div>
                  <div class="panel-body text-center">  طلب الحقائب  </div>
                </div>
              </div>

              <div class="col-md-2">
                <div class="panel panel-warning">
                  <div class="panel-heading">
                      <div class="text-center">
                        <input type="checkbox" class=""  style=" width: 30px ; height:30px ; "

                        {{  $data->payments()->count() > 0 ? 'checked' : '' }} >


                      </div>
                  </div>
                  <div class="panel-body text-center">
                    متابعة الطلب وتحصيل السداد

                </div>
                </div>
              </div>

              <div class="col-md-2">
                <div class="panel panel-warning">
                  <div class="panel-heading">
                      <div class="text-center">

                        <input type="checkbox" class=""  style=" width: 30px ; height:30px ; "
                        {{  $data->payments()->where('status' , 'accepted')->count() > 0 ? 'checked' : '' }} >

                      </div>
                  </div>
                  <div class="panel-body text-center">
                    استلام الطلب والاشعار بذلك


                </div>
                </div>
              </div>



        </div>


        <div class="row">

            <div class="col-md-2" >
              <div class="panel panel-warning" >
                <div class="panel-heading">
                    <div class="text-center" >
                      <input type="checkbox" class=""   style=" width: 30px ; height:30px ; "
                       {{-- {{  $data->order_course()->count() > 0 ? 'checked' : ''  }} --}}

                       >
                    </div>
                </div>
                <div class="panel-body text-center">
                    أدوات قياس الرضا

                </div>
              </div>
            </div>

            <div class="col-md-2" >
                <div class="panel panel-warning" >
                  <div class="panel-heading">
                      <div class="text-center" >
                        <input type="checkbox" class=""   style=" width: 30px ; height:30px ; "
                         {{-- {{  $data->order_course()->count() > 0 ? 'checked' : ''  }} --}}

                         >
                      </div>
                  </div>
                  <div class="panel-body text-center">
                    الزيارة الميدانية


                  </div>
                </div>
              </div>

              <div class="col-md-2" >
                <div class="panel panel-warning" >
                  <div class="panel-heading">
                      <div class="text-center" >
                        <input type="checkbox" class=""   style=" width: 30px ; height:30px ; "
                        {{  $data->order_course()->where('status' , 'processing')->count() > 0 ? 'checked' : ''  }} >
                      </div>
                  </div>
                  <div class="panel-body text-center">
                    البدء بالتنفيذ


                  </div>
                </div>
              </div>

              <div class="col-md-2" >
                <div class="panel panel-warning" >
                  <div class="panel-heading">
                      <div class="text-center" >
                        <input type="checkbox" class=""   style=" width: 30px ; height:30px ; "
                        {{  $data->trainer_count() > 0 ? 'checked' : '' }} >

                      </div>
                  </div>
                  <div class="panel-body text-center">
                    توفر المدرب

                  </div>
                </div>
              </div>

              <div class="col-md-2">
                <div class="panel panel-warning">
                  <div class="panel-heading">
                      <div class="text-center">
                        <input type="checkbox" class=""  style=" width: 30px ; height:30px ; "
                        {{-- {{  $data->order_course()->count() > 0 ? 'checked' : ''  }} --}}

                        >


                      </div>
                  </div>
                  <div class="panel-body text-center">
                    جاهزية مكان التنفيذ

                </div>
                </div>
              </div>



        </div>



        <div class="row">



              <div class="col-md-2" >
                <div class="panel panel-warning" >
                  <div class="panel-heading">
                      <div class="text-center" >
                        <input type="checkbox" class=""   style=" width: 30px ; height:30px ; "
                         {{-- {{  $data->order_course()->count() > 0 ? 'checked' : ''  }} --}}

                         >
                      </div>
                  </div>
                  <div class="panel-body text-center">
                    رفع التقرير النهائي

                  </div>
                </div>
              </div>

              <div class="col-md-2" >
                <div class="panel panel-warning" >
                  <div class="panel-heading">
                      <div class="text-center" >
                        <input type="checkbox" class=""   style=" width: 30px ; height:30px ; "
                         {{-- {{  $data->order_course()->count() > 0 ? 'checked' : ''  }} --}}

                         >
                      </div>
                  </div>
                  <div class="panel-body text-center">
                    طباعة الشهادات للمتدربين

                  </div>
                </div>
              </div>

              <div class="col-md-2">
                <div class="panel panel-warning">
                  <div class="panel-heading">
                      <div class="text-center">
                        <input type="checkbox" class=""  style=" width: 30px ; height:30px ; "
                        {{-- {{  $data->order_course()->count() > 0 ? 'checked' : ''  }} --}}

                        >


                      </div>
                  </div>
                  <div class="panel-body text-center">
                    إقفال المشروع

                </div>
                </div>
              </div>



        </div>










      </div>
    </div>


    </section>

  </div>
</div>

@endsection



