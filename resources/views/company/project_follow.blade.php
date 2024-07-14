
@extends('dashboard.layouts.mainapp')
@section('title' , 'متابعة المشاريع')
@section('styles')
@endsection


@section('content')
   <section class="main-content">
        <div class="container-fluid">


           <div class="analysis">
            <div class="row">

                    <!-- start supervision -->
                    {{-- <div class="supervision">
                            <h3>الاشراف</h3>
                            <div class="owl-carousel two">

                                <div class="item">
                                    <div class="box d-flex align-items-center justify-content-between" style="--background:#d4f8f7">
                                        <div class="statistics">
                                            <h4>{{ $registerRequest ?? "" }}</h4>
                                            <span>طلبات التسجيل</span>
                                        </div>
                                        <a class="goTo" href=""><img src="{{ asset('dashboard') }}/assets/images/See more.png" class="img-fluid"></a>
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="box d-flex align-items-center justify-content-between" style="--background:#fbe6e8">
                                        <div class="statistics">
                                            <h4>{{ $manage ?? ""  }}</h4>
                                            <span> مدراء المشاريع</span>
                                        </div>
                                        <a class="goTo" href="{{ route('project_managers.index') }}"><img src="{{ asset('dashboard') }}/assets/images/See more_red.png" class="img-fluid"></a>
                                    </div>
                                </div>

                              </div>
                    </div> --}}
                    <!-- End Supervision -->

                    <!-- start Project follow-up -->
                     <div class="projects-follow-up">
                        <h3>متابعة المشاريع  - {{  $data->name }} </h3>

                        {{-- start row1 --}}
                         <div class="row">
                            <div class="col-md-4">
                             <div class="item">
                                <div class="box d-flex align-items-center justify-content-between" style="--background:#d4f8f7">
                                    <div class="statistics">
                                        
                                        <span> تسجيل الجهة </span>

                                    </div>
                                    <div class="text-center" >

                                        <input type="checkbox" class="" checked  style=" width: 30px ; height:30px ; " >

                                      </div>
                                      <i class="fa fa-arrow-left"></i>
                                </div>
                             </div>
                            </div>
                            <div class="col-md-4">
                              <div class="item">
                                <div class="box d-flex align-items-center justify-content-between" style="--background:#fbe6e8">
                                    <div class="statistics">
                                      
                                        <span> إضافة مدرب</span>
                                    </div>

                                     <div class="text-center">
                                        <input type="checkbox" class=""   style=" width: 30px ; height:30px ; "
                                        {{  $data->trainer_count() > 0 ? 'checked' : '' }} >
                                      </div>

                                      <i class="fa fa-arrow-left"></i>

                                </div>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="item">
                                <div class="box d-flex align-items-center justify-content-between" style="--background:#d4f8f7">
                                    <div class="statistics">
                                      
                                        <span> طلب حقيبة</span>
                                    </div>

                                    <div class="text-center">
                                        <input type="checkbox" class=""  style=" width: 30px ; height:30px ; "
                                         {{  $data->order_course()->count() > 0 ? 'checked' : ''  }} >
                                      </div>

                                      <i class="fa fa-arrow-down"></i>

                                </div>
                            </div>
                        </div>


                    </div>

                    {{-- end  row 1 --}}

                    <hr>
                       {{-- start row 2 --}}
                       <div class="row">
                        <div class="col-md-4">
                         <div class="item">
                            <div class="box d-flex align-items-center justify-content-between" style="--background:#d4f8f7">
                                <div class="statistics">
                                    
                                    <span> إغلاق المشروع </span>

                                </div>
                                <div class="text-center" >

                                    <input type="checkbox" class=""   style=" width: 30px ; height:30px ; " >

                                  </div>
                                  <i class="fa fa-arrow-right"></i>
                            </div>
                         </div>
                        </div>
                        <div class="col-md-4">
                          <div class="item">
                            <div class="box d-flex align-items-center justify-content-between" style="--background:#fbe6e8">
                                <div class="statistics">
                                  
                                    <span>   التقارير(يكون اختياري)</span>
                                </div>

                                 <div class="text-center">
                                    <input type="checkbox" class=""   style=" width: 30px ; height:30px ; "
                                    {{-- {{  $data->order_course()->count() > 0 ? 'checked' : ''  }} --}}

                                    >
                                  </div>

                                  <i class="fa fa-arrow-right"></i>

                            </div>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="item">
                            <div class="box d-flex align-items-center justify-content-between" style="--background:#d4f8f7">
                                <div class="statistics">
                                  
                                    <span> شحن الطلب</span>
                                </div>

                                <div class="text-center">
                                    <input type="checkbox" class=""   style=" width: 30px ; height:30px ; "
                                    {{  $data->order_course()->where('status' , 'processing')->count() > 0 ? 'checked' : ''  }} >
                                  </div>

                                  <i class="fa fa-arrow-right"></i>

                            </div>
                        </div>
                    </div>


                </div>

                {{-- end  row 2 --}}


                    <!-- End Project follow-up -->



                </div>

            </div>
           </div>
        </div>
    </section>



  </div>
<div class=" _modal trigger close-button"></div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
@endsection


