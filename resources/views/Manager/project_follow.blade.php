

@extends('layouts.mainapp1')
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

            <div class="col-md-3" >
              <div class="panel panel-warning" >
                <div class="panel-heading">
                    <div class="text-center" >
                      <input type="checkbox" class="" checked  style=" width: 30px ; height:30px ; " >
                    </div>
                </div>
                <div class="panel-body text-center">   التسجيل في المنصة </div>
              </div>
            </div>

            <div class="col-md-3">
                <div class="panel panel-info">
                  <div class="panel-heading">
                      <div class="text-center">
                        <input type="checkbox" class=""   style=" width: 30px ; height:30px ; "
                        {{-- {{  $data->company_course()->count() > 0 ? 'checked' : ''  }}  --}} >
                      </div>
                  </div>
                  <div class="panel-body text-center">
                    استعراض الجهات التابعة

                  </div>
                </div>
              </div>

              <div class="col-md-3">
                <div class="panel panel-warning">
                  <div class="panel-heading">
                      <div class="text-center">
                        <input type="checkbox" class=""  style=" width: 30px ; height:30px ; "
                        {{-- {{  $data->order_course()->count() > 0 ? 'checked' : ''  }}  --}} >

                      </div>
                  </div>
                  <div class="panel-body text-center">
                    التأكد من جاهزية البيئات
                 </div>
                </div>
              </div>

              <div class="col-md-3">
                <div class="panel panel-warning">
                  <div class="panel-heading">
                      <div class="text-center">
                        <input type="checkbox" class=""  style=" width: 30px ; height:30px ; "
                        {{-- {{  $data->order_course()->count() > 0 ? 'checked' : ''  }}  --}} >

                      </div>
                  </div>
                  <div class="panel-body text-center">
                    التأكد من توفر المدربين

                 </div>
                </div>
              </div>


        </div>


        <div class="row">

            <div class="col-md-3" >
              <div class="panel panel-warning" >
                <div class="panel-heading">
                    <div class="text-center" >
                      {{-- <input type="checkbox" class="" checked  style=" width: 30px ; height:30px ; " > --}}
                    </div>
                </div>
                <div class="panel-body text-center">
                    إقفال المشروع

                </div>
              </div>
            </div>

            <div class="col-md-3">
                <div class="panel panel-info">
                  <div class="panel-heading">
                      <div class="text-center">
                        <input type="checkbox" class=""   style=" width: 30px ; height:30px ; "
                        {{-- {{  $data->company_course()->count() > 0 ? 'checked' : ''  }}  --}} >
                      </div>
                  </div>
                  <div class="panel-body text-center">
                      شواهد التنفيذ النهائية


                  </div>
                </div>
              </div>

              <div class="col-md-3">
                <div class="panel panel-warning">
                  <div class="panel-heading">
                      <div class="text-center">
                        <input type="checkbox" class=""  style=" width: 30px ; height:30px ; "
                        {{-- {{  $data->order_course()->count() > 0 ? 'checked' : ''  }}  --}} >

                      </div>
                  </div>
                  <div class="panel-body text-center">
                    عقد جلسات التطوير والتحسين
                 </div>
                </div>
              </div>

              <div class="col-md-3">
                <div class="panel panel-warning">
                  <div class="panel-heading">
                      <div class="text-center">
                        <input type="checkbox" class=""  style=" width: 30px ; height:30px ; "
                        {{-- {{  $data->order_course()->count() > 0 ? 'checked' : ''  }}  --}} >

                      </div>
                  </div>
                  <div class="panel-body text-center">
                    إجراء الزيارات الميدانية
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



