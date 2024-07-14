
@extends('layouts.mainapp')

@section('content')

<div class="container" style="min-height: 1050px ;">
    <div class="header-title-page">
        <h5>
            <i class="fa fa-home"></i>
            الرئيسية
        </h5>
    </div>
    <section class="cards-number">
        <div class="row">
            <div class="col-md-4 col-sm-6">
                <div class="card">
                    <span class="title">الجهات</span>
                    <div class="chart-value">
                        <div class="value">
                            <h4>{{ $company ?? 0 }}</h4>
                            {{-- <small style="color: #04B78A">
                                +21.01%
                                <i class="fa fa-long-arrow-up" aria-hidden="true"></i>
                            </small> --}}

                        </div>
                        <div class="number-chart">
                            <canvas id="myChart4" style="width: 80%"></canvas>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-sm-6">
                <div class="card">
                    <span class="title">المشـرفين</span>
                    <div class="chart-value">
                        <div class="value">
                            <h4>{{ $manager ?? 0 }}</h4>
                            {{-- <small style="color: #FA5087">
                                -21.01%
                                <i class="fa fa-long-arrow-down" aria-hidden="true"></i>
                            </small> --}}

                        </div>
                        <div class="number-chart">
                            <canvas id="myChart6" style="width: 80%"></canvas>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-sm-6">
                <div class="card">
                    <span class="title">المدربين</span>
                    <div class="chart-value">
                        <div class="value">
                            <h4>{{ $trainer ?? 0 }}</h4>
                            {{-- <small style="color: #04B78A">
                                +10.01%
                                <i class="fa fa-long-arrow-up" aria-hidden="true"></i>
                            </small> --}}

                        </div>
                        <div class="number-chart">
                            <canvas id="myChart5" style="width: 80%"></canvas>
                        </div>
                    </div>
                </div>
            </div>


        </div>


          <div class="row">

            <div class="col-md-4 col-sm-6">
                <div class="card">
                    <span class="title">المتدربين</span>
                    <div class="chart-value">
                        <div class="value">
                            <h4>{{ $student ?? 0 }}</h4>
                            {{-- <small style="color: #FA5087">
                                -12.01%
                                <i class="fa fa-long-arrow-down" aria-hidden="true"></i>
                            </small> --}}
                        </div>
                        <div class="number-chart">
                            <canvas id="myChart8" style="width: 80%"></canvas>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-4 col-sm-6">
                <div class="card">
                    <span class="title">الحقائب</span>
                    <div class="chart-value">
                        <div class="value">
                            <h4>{{ $course ?? 0 }}</h4>
                            {{-- <small style="color: #FA5087">
                                -12.01%
                                <i class="fa fa-long-arrow-down" aria-hidden="true"></i>
                            </small> --}}
                        </div>
                        <div class="number-chart">
                            <canvas id="myChart4" style="width: 80%"></canvas>
                        </div>
                    </div>
                </div>
            </div>




        </div>
    </section>
       <hr>
    <br><br>
    @if(auth()->user()->role_id == 2)
    <section>
        <div class="container">

            <div class="row">


                <div class="col-md-3" >
                <div class="card">
                    <div class="card-header" style="text-align: center">
                        <input type="checkbox" class="" checked  style=" width: 30px ; height:30px ; " >
                    </div>
                    <div class="card-body" style="text-align: center">
                        التسجيل في المنصة
                    </div>
                    <div class="card-footer"></div>
                  </div>
                </div>


                  <div class="col-md-3" >
                    <div class="card">
                        <div class="card-header" style="text-align: center">
                            <input type="checkbox" class=""   style=" width: 30px ; height:30px ; ">
                        </div>
                        <div class="card-body" style="text-align: center">
                            استعراض الجهات التابعة
                        </div>
                        <div class="card-footer"></div>
                      </div>
                    </div>


                  <div class="col-md-3" >
                    <div class="card">
                        <div class="card-header" style="text-align: center">
                            <input type="checkbox" class=""   style=" width: 30px ; height:30px ; ">
                        </div>
                        <div class="card-body" style="text-align: center">

                            التأكد من جاهزية البيئات

                        </div>
                        <div class="card-footer"></div>
                      </div>
                    </div>

                  <div class="col-md-3" >
                    <div class="card">
                        <div class="card-header" style="text-align: center">
                            <input type="checkbox" class=""   style=" width: 30px ; height:30px ; ">
                        </div>
                        <div class="card-body" style="text-align: center">

                            التأكد من توفر المدربين

                        </div>
                        <div class="card-footer"></div>
                      </div>
                    </div>


            </div>


            <div class="row">



                <div class="col-md-3" >
                    <div class="card">
                        <div class="card-header" style="text-align: center">
                            <input type="checkbox" class=""   style=" width: 30px ; height:30px ; ">
                        </div>
                        <div class="card-body" style="text-align: center">
                            إقفال المشروع
                        </div>
                        <div class="card-footer"></div>
                      </div>
                    </div>



                  <div class="col-md-3" >
                    <div class="card">
                        <div class="card-header" style="text-align: center">
                            <input type="checkbox" class=""   style=" width: 30px ; height:30px ; ">
                        </div>
                        <div class="card-body" style="text-align: center">
                              شواهد التنفيذ النهائية
                        </div>
                        <div class="card-footer"></div>
                      </div>
                    </div>


                  <div class="col-md-3" >
                    <div class="card">
                        <div class="card-header" style="text-align: center">
                            <input type="checkbox" class=""   style=" width: 30px ; height:30px ; ">
                        </div>
                        <div class="card-body" style="text-align: center">
                            عقد جلسات التطوير والتحسين
                        </div>
                        <div class="card-footer"></div>
                      </div>
                    </div>


                  <div class="col-md-3" >
                    <div class="card">
                        <div class="card-header" style="text-align: center">
                            <input type="checkbox" class=""   style=" width: 30px ; height:30px ; ">
                        </div>
                        <div class="card-body" style="text-align: center">

                            إجراء الزيارات الميدانية

                        </div>
                        <div class="card-footer"></div>
                      </div>
                    </div>


            </div>



          </div>
    </section>
    @endif
     {{--  pro- manger --}}


    {{--  trainer --}}
    @if(auth()->user()->role_id == 4)
    <section>
        <div class="container">

            <div class="row">


                <div class="col-md-2" >
                <div class="card">
                    <div class="card-header" style="text-align: center">
                        <input type="checkbox" class="" checked  style=" width: 30px ; height:30px ; " >
                    </div>
                    <div class="card-body" style="text-align: center">
                        التسجيل في المنصة
                    </div>
                    <div class="card-footer"></div>
                  </div>
                </div>


                  <div class="col-md-2" >
                    <div class="card">
                        <div class="card-header" style="text-align: center">
                            <input type="checkbox" class=""   style=" width: 30px ; height:30px ; "
                            {{  $follow->trainer_training()->count() > 0 ? 'checked' : ''  }}  >
                        </div>
                        <div class="card-body" style="text-align: center">
                            <a href="{{ route('getTrainerAvlableCourses')  }}"  target="_blank">
                               إمكانية التسجيل في الدورات
                            </a>
                        </div>
                        <div class="card-footer"></div>
                      </div>
                    </div>


                  <div class="col-md-2" >
                    <div class="card">
                        <div class="card-header" style="text-align: center">
                            <input type="checkbox" class=""   style=" width: 30px ; height:30px ; ">
                        </div>
                        <div class="card-body" style="text-align: center">

                            الاعتماد من الشركة

                        </div>
                        <div class="card-footer"></div>
                      </div>
                    </div>

                  <div class="col-md-2" >
                    <div class="card">
                        <div class="card-header" style="text-align: center">
                            <input type="checkbox" class=""   style=" width: 30px ; height:30px ; "
                            {{  $follow->orderCourses()->count() > 0 ? 'checked' : ''  }} >
                        </div>
                        <div class="card-body" style="text-align: center">
                            <a href="{{ route('getTrainerAvlableCourses')  }}"  target="_blank">
                            الاطلاع على الفرص التدريبية
                            </a>

                        </div>
                        <div class="card-footer"></div>
                      </div>
                    </div>


                  <div class="col-md-2" >
                    <div class="card">
                        <div class="card-header" style="text-align: center">
                            <input type="checkbox" class=""   style=" width: 30px ; height:30px ; "
                            {{  $follow->trainer_contract()->count() > 0 ? 'checked' : '' }} >
                        </div>
                        <div class="card-body" style="text-align: center">

                            التعاقد مع البيئة

                        </div>
                        <div class="card-footer"></div>
                      </div>
                    </div>



            </div>


            <div class="row">

                <div class="col-md-2" >
                    <div class="card">
                        <div class="card-header" style="text-align: center">
                            <input type="checkbox" class=""   style=" width: 30px ; height:30px ; ">
                        </div>
                        <div class="card-body" style="text-align: center">
                            إقفال المشروع
                        </div>
                        <div class="card-footer"></div>
                      </div>
                    </div>


                  <div class="col-md-2" >
                    <div class="card">
                        <div class="card-header" style="text-align: center">
                            <input type="checkbox" class=""   style=" width: 30px ; height:30px ; ">
                        </div>
                        <div class="card-body" style="text-align: center">
                            <a href="{{ route('getTrainerCourses')  }}" target="_blank">
                            تقييم الحقائب والبيئه
                            </a>
                        </div>
                        <div class="card-footer"></div>
                      </div>
                    </div>


                  <div class="col-md-2" >
                    <div class="card">
                        <div class="card-header" style="text-align: center">
                            <input type="checkbox" class=""   style=" width: 30px ; height:30px ; "
                            {{  $follow->orderCourses()->where('status' , 'processing')->count() > 0 ? 'checked' : ''  }} >
                        </div>
                        <div class="card-body" style="text-align: center">
                           <a href="{{ route('trainings.index')  }}" target="_blank">
                            تنفيذ الدورة
                           </a>

                        </div>
                        <div class="card-footer"></div>
                      </div>
                    </div>


                  <div class="col-md-2" >
                    <div class="card">
                        <div class="card-header" style="text-align: center">
                            <input type="checkbox" class=""   style=" width: 30px ; height:30px ; "
                            {{  $follow->student_count() > 0 ? 'checked' : ''  }} >
                        </div>
                        <div class="card-body" style="text-align: center">
                            <a href="  {{ route('addStudents')  }} "  target="_blank">

                                تسجيل المتدربين

                            </a>

                        </div>
                        <div class="card-footer"></div>
                      </div>
                    </div>

                    <div class="col-md-2" >
                        <div class="card">
                            <div class="card-header" style="text-align: center">
                                <input type="checkbox" class=""   style=" width: 30px ; height:30px ; "
                                           >
                            </div>
                            <div class="card-body" style="text-align: center">

                                التواصل مع مدير المشروع

                            </div>
                            <div class="card-footer"></div>
                          </div>
                        </div>


            </div>



          </div>
    </section>
    @endif
{{-- end trainer --}}

 {{--  company --}}
 @if(auth()->user()->role_id == 3 )
 <section>
     <div class="container">

         <div class="row">


             <div class="col-md-2" >
             <div class="card">
                 <div class="card-header" style="text-align: center">
                     <input type="checkbox" class="" checked  style=" width: 30px ; height:30px ; " >
                 </div>
                 <div class="card-body" style="text-align: center">
                     التسجيل في المنصة
                 </div>
                 <div class="card-footer"></div>
               </div>
             </div>


               <div class="col-md-2" >
                 <div class="card">
                     <div class="card-header" style="text-align: center">
                         <input type="checkbox" class=""   style=" width: 30px ; height:30px ; "
                         {{  $follow->company_course()->count() > 0 ? 'checked' : ''  }}  >
                     </div>
                     <div class="card-body" style="text-align: center">
                       <a href="{{ route('getCompanyCoursesDetails')  }}"  target="_blank">
                        الاعتماد من الشركة
                       </a>
                     </div>
                     <div class="card-footer"></div>
                   </div>
                 </div>


               <div class="col-md-2" >
                 <div class="card">
                     <div class="card-header" style="text-align: center">
                        <input type="checkbox" class=""  style=" width: 30px ; height:30px ; "

                        {{  $follow->order_course()->count() > 0 ? 'checked' : ''  }} >
                     </div>
                     <div class="card-body" style="text-align: center">
                        <a href=" {{ route('getCourseOrder')  }} "  target="_blank">
                          طلب الحقائب
                        </a>

                     </div>
                     <div class="card-footer"></div>
                   </div>
                 </div>

               <div class="col-md-2" >
                 <div class="card">
                     <div class="card-header" style="text-align: center">
                         <input type="checkbox" class=""   style=" width: 30px ; height:30px ; "
                         {{  $follow->payments()->count() > 0 ? 'checked' : ''  }} >
                     </div>
                     <div class="card-body" style="text-align: center">
                        <a href=" {{ route('payments.index')  }}"  target="_blank">
                          متابعة الطلب وتحصيل السداد
                        </a>
                     </div>
                     <div class="card-footer"></div>
                   </div>
                 </div>


               <div class="col-md-2" >
                 <div class="card">
                     <div class="card-header" style="text-align: center">
                         <input type="checkbox" class=""   style=" width: 30px ; height:30px ; "
                         {{  $follow->payments()->where('status' , 'accepted')->count() > 0 ? 'checked' : '' }} >
                     </div>
                     <div class="card-body" style="text-align: center">
                        <a href=" {{ route('getCourseOrder')  }} "  target="_blank">
                        استلام الطلب والاشعار بذلك
                        <a>
                     </div>
                     <div class="card-footer"></div>
                   </div>
                 </div>



         </div>


         <div class="row">

             {{-- <div class="col-md-2" >
                 <div class="card">
                     <div class="card-header" style="text-align: center">
                         <input type="checkbox" class=""   style=" width: 30px ; height:30px ; ">
                     </div>
                     <div class="card-body" style="text-align: center">
                         إقفال المشروع
                     </div>
                     <div class="card-footer"></div>
                   </div>
                 </div> --}}


               <div class="col-md-2" >
                 <div class="card">
                     <div class="card-header" style="text-align: center">
                         <input type="checkbox" class=""   style=" width: 30px ; height:30px ; ">
                     </div>
                     <div class="card-body" style="text-align: center">
                        أدوات قياس الرضا
                     </div>
                     <div class="card-footer"></div>
                   </div>
                 </div>


               <div class="col-md-2" >
                 <div class="card">
                     <div class="card-header" style="text-align: center">
                         <input type="checkbox" class=""   style=" width: 30px ; height:30px ; ">
                     </div>
                     <div class="card-body" style="text-align: center">
                        <a href=" {{ route('company.visit')  }}" target="_blank" >
                        الزيارة الميدانية
                        </a>
                     </div>
                     <div class="card-footer"></div>
                   </div>
                 </div>


               <div class="col-md-2" >
                 <div class="card">
                     <div class="card-header" style="text-align: center">
                         <input type="checkbox" class=""   style=" width: 30px ; height:30px ; "
                         {{  $follow->order_course()->where('status' , 'processing')->count() > 0 ? 'checked' : ''  }} >
                     </div>
                     <div class="card-body" style="text-align: center">
                        <a href=" {{ route('getCourseOrder')  }} "  target="_blank">
                         البدء بالتنفيذ
                        <a>

                     </div>
                     <div class="card-footer"></div>
                   </div>
                 </div>

                 <div class="col-md-2" >
                     <div class="card">
                         <div class="card-header" style="text-align: center">
                             <input type="checkbox" class=""   style=" width: 30px ; height:30px ; "
                             {{  $follow->trainer_count() > 0 ? 'checked' : '' }} >

                         </div>
                         <div class="card-body" style="text-align: center">

                            <a href="{{ route('companyAvailableCourses')  }}" target="_blank">
                            توفر المدرب
                            <a>
                         </div>
                         <div class="card-footer"></div>
                       </div>
                     </div>

                     <div class="col-md-2" >
                        <div class="card">
                            <div class="card-header" style="text-align: center">
                                <input type="checkbox" class=""   style=" width: 30px ; height:30px ; ">

                            </div>
                            <div class="card-body" style="text-align: center">

                                جاهزية مكان التنفيذ
                            </div>
                            <div class="card-footer"></div>
                          </div>
                        </div>


         </div>

         <div class="row">




            <div class="col-md-2" >
            <div class="card">
                <div class="card-header" style="text-align: center">
                    <input type="checkbox" class=""   style=" width: 30px ; height:30px ; ">

                </div>
                <div class="card-body" style="text-align: center">
                    <a href=" {{ route('reports.index')  }} " target="_blank">
                       رفع التقرير النهائي
                    </a>

                </div>
                <div class="card-footer"></div>
              </div>
            </div>



            <div class="col-md-2" >
                <div class="card">
                    <div class="card-header" style="text-align: center">
                        <input type="checkbox" class=""   style=" width: 30px ; height:30px ; ">

                    </div>
                    <div class="card-body" style="text-align: center">
                      <a href="{{ route('trainings.registerpage')  }}" target="_blank" >
                        طباعة الشهادات للمتدربين
                      </a>
                    </div>
                    <div class="card-footer"></div>
                  </div>
                </div>




            <div class="col-md-2" >
                <div class="card">
                    <div class="card-header" style="text-align: center">
                        <input type="checkbox" class=""   style=" width: 30px ; height:30px ; ">

                    </div>
                    <div class="card-body" style="text-align: center">
                        إقفال المشروع
                    </div>
                    <div class="card-footer"></div>
                  </div>
                </div>



      </div>



       </div>
 </section>
 @endif
{{-- end company --}}


    {{-- <section class="traineesStatistics">
        <div class="row">
            <div class="col-lg-8">
                <div class="main-chart">
                    <h5>إحصائيات  المتدربين</h5>
                    <canvas id="myChart8" style="width: 80%"></canvas>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="Supervisors-activity">
                    <h5>نشاط المشرفين</h5>
                    <div class="row">
                        <div class="col-lg-12 col-md-6">
                            <div class="activity">
                                <div class="information">
                                    <div class="image">
                                        <img src="{{ asset('frontend/image/Mask%20Group%202.png')}}">
                                    </div>
                                    <div class="name">
                                        <h6>مصطفى حسن</h6>
                                        <small>مشرف فرعي</small>
                                    </div>
                                </div>
                                <div class="chart-activity">
                                    <canvas id="myChart" style="width: 80%"></canvas>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12 col-md-6">
                            <div class="activity">
                                <div class="information">
                                    <div class="image">
                                        <img src="{{ asset('frontend/image/Mask%20Group%202.png')}}">
                                    </div>
                                    <div class="name">
                                        <h6>مصطفى حسن</h6>
                                        <small>مشرف فرعي</small>
                                    </div>
                                </div>
                                <div class="chart-activity">
                                    <canvas id="myChart1" style="width: 80%"></canvas>
                                </div>
                            </div>

                        </div>
                        <div class="col-lg-12 col-md-6">
                            <div class="activity">
                                <div class="information">
                                    <div class="image">
                                        <img src="{{ asset('frontend/image/Mask%20Group%202.png')}}">
                                    </div>
                                    <div class="name">
                                        <h6>مصطفى حسن</h6>
                                        <small>مشرف فرعي</small>
                                    </div>
                                </div>
                                <div class="chart-activity">
                                    <canvas id="myChart2" style="width: 80%"></canvas>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12 col-md-6">
                            <div class="activity">
                                <div class="information">
                                    <div class="image">
                                        <img src="{{ asset('frontend/image/Mask%20Group%202.png')}}">
                                    </div>
                                    <div class="name">
                                        <h6>مصطفى حسن</h6>
                                        <small>مشرف فرعي</small>
                                    </div>
                                </div>
                                <div class="chart-activity">
                                    <canvas id="myChart3" style="width: 80%"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>


                </div>
            </div>
        </div>
    </section> --}}
    {{-- <section class="table-requests">
        <h5>أحدث الطــــلبات</h5>
        <div class="table-responsive-xl">
            <table class="table">
                <thead>
                <tr class="head-table">
                    <th scope="col">
                        <input  class="check-all form-check-input" type="checkbox" value="" id="flexCheckDefault">
                    </th>
                    <th scope="col">
                        الاسم
                        <i class="fa fa-exchange" aria-hidden="true"></i>
                    </th>
                    <th scope="col">
                        الجوال
                        <i class="fa fa-exchange" aria-hidden="true"></i>
                    </th>
                    <th scope="col">
                        السجل المدني
                        <i class="fa fa-exchange" aria-hidden="true"></i>
                    </th>
                    <th scope="col">
                        الحقيبة
                        <i class="fa fa-exchange" aria-hidden="true"></i>
                    </th>
                    <th scope="col">
                        الجهة المنفذة
                        <i class="fa fa-exchange" aria-hidden="true"></i>
                    </th>
                    <th scope="col">
                        المدرب
                        <i class="fa fa-exchange" aria-hidden="true"></i>
                    </th>
                    <th scope="col">
                        المبلغ
                        <i class="fa fa-exchange" aria-hidden="true"></i>
                    </th>
                </tr>
                </thead>
                <tbody>
               @foreach ( $users as $item )
                <tr>
                    <td><input class="form-check-input" type="checkbox" value="" id="flexCheckDefault1">
                    </td>
                    <td>   {{   $item->name  }} </td>
                    <td>   {{   $item->phone }} </td>
                    <td>   {{   $item->student->national ?? ' ' }}  </td>
                    <td>   {{   $item->student->companyCourse->course->name ?? ''  }}   </td>
                    <td>   {{   $item->student->companyCourse->company->name ?? ''  }}  </td>
                    <td>   {{   $item->student->companyCourse->trainer_name() ?? ''  }} </td>
                    <td class="clock">
                        <span> {{   $item->student->companyCourse->cost ?? ''  }} </span>
                    </td>
                </tr>
                @endforeach

                </tbody>
            </table>
        </div>
    </section> --}}

</div>

@endsection



