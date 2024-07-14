

@extends('dashboard.layouts.mainapp')
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

                 <section class="supervisors-accounts">


                    <div class="row">

                        <div class="col-md-4" >
                          <div class="panel panel-warning" >
                            <div class="panel-heading">
                                <div class="text-center" >
                                  <input type="checkbox" class="" checked  style=" width: 30px ; height:30px ; " >
                                </div>
                            </div>
                            <div class="panel-body text-center">
                                 تسجيل الجهة
                            </div>

                            <div class="panel-footer text-center">
                                <i class="fa fa-arrow-left"></i>
                            </div>
                          </div>
                        </div>

                        <div class="col-md-4">
                            <div class="panel panel-info">
                              <div class="panel-heading">
                                  <div class="text-center">
                                    <input type="checkbox" class=""   style=" width: 30px ; height:30px ; "
                                    {{  $data->trainer_count() > 0 ? 'checked' : '' }} >
                                  </div>
                              </div>
                              <div class="panel-body text-center">
                                 إضافة مدرب
                            </div>
                            <div class="panel-footer text-center">
                                <i class="fa fa-arrow-left"></i>
                            </div>
                            </div>
                          </div>

                          <div class="col-md-4">
                            <div class="panel panel-warning">
                              <div class="panel-heading">
                                  <div class="text-center">
                                    <input type="checkbox" class=""  style=" width: 30px ; height:30px ; "
                                    {{  $data->order_course()->count() > 0 ? 'checked' : ''  }} >

                                  </div>
                              </div>
                              <div class="panel-body text-center">
                                طلب حقيبة
                            </div>
                            <div class="panel-footer text-center">
                                <i class="fa fa-arrow-down"></i>
                            </div>
                            </div>
                          </div>






                    </div>


                    <div class="row">

                        <div class="col-md-4" >
                          <div class="panel panel-warning" >
                            <div class="panel-heading">
                                <div class="text-center" >
                                  <input type="checkbox" class=""   style=" width: 30px ; height:30px ; " >
                                </div>
                            </div>
                            <div class="panel-body text-center">
                                إغلاق المشروع


                            </div>
                            <div class="panel-footer text-center">
                                <i class="fa fa-arrow-right"></i>
                            </div>
                          </div>
                        </div>

                        <div class="col-md-4" >
                            <div class="panel panel-warning" >
                              <div class="panel-heading">
                                  <div class="text-center" >
                                    <input type="checkbox" class=""   style=" width: 30px ; height:30px ; "
                                     {{-- {{  $data->order_course()->count() > 0 ? 'checked' : ''  }} --}}

                                     >
                                  </div>
                              </div>
                              <div class="panel-body text-center">
                                التقارير(يكون اختياري)

                              </div>
                              <div class="panel-footer text-center">
                                <i class="fa fa-arrow-right"></i>
                            </div>
                            </div>
                          </div>

                          <div class="col-md-4" >
                            <div class="panel panel-warning" >
                              <div class="panel-heading">
                                  <div class="text-center" >
                                    <input type="checkbox" class=""   style=" width: 30px ; height:30px ; "
                                    {{  $data->order_course()->where('status' , 'processing')->count() > 0 ? 'checked' : ''  }} >
                                  </div>
                              </div>
                              <div class="panel-body text-center">
                                شحن الطلب
                              </div>
                              <div class="panel-footer text-center">
                                <i class="fa fa-arrow-right"></i>
                            </div>
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



