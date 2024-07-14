
@extends('dashboard.layouts.mainapp')
@section('styles')
        <link rel="stylesheet" href="{{  asset('dashboard/assets/css/main.css')}}">
@endsection
@section('content')
   <section class="main-content">
        <div class="container-fluid">
           <div class="reports">
            <h4>التقارير والاحصائيات</h4>
            <div class="row">
                <div class="col-12  col-md-6 col-lg-6 col-xl-6 col-xxl-3">
                    <div class="report-box d-flex align-items-center justify-content-between">
                        <div>
                            <span class="report-name"> الجهات </span>
                            <span class="count">{{ $company ?? null  }}</span>
                        </div>
                        <div class="image">
                            <img src="{{ asset('dashboard') }}/assets/images/report6.png">
                        </div>

                    </div>
                    
                </div>
                
              
    
                <div class="col-12  col-md-6 col-lg-6 col-xl-6 col-xxl-3">
                    <div class="report-box d-flex align-items-center justify-content-between">
                        <div>
                            <span class="report-name">المدربين</span>
                            <span class="count">{{ $trainer ?? null  }}</span>
                        </div>
                        <div class="image">
                            <img src="{{ asset('dashboard') }}/assets/images/report2.png">
                        </div>

                    </div>
                </div>

                <div class="col-12  col-md-6 col-lg-6 col-xl-6 col-xxl-3">
                    <div class="report-box d-flex align-items-center justify-content-between">
                        <div>
                            <span class="report-name">المتدربين</span>
                            <span class="count">{{ $student ?? null  }}</span>
                        </div>
                        <div class="image">
                            <img src="{{ asset('dashboard') }}/assets/images/report1.png">
                        </div>

                    </div>
                </div>
                <div class="col-12  col-md-6 col-lg-6 col-xl-6 col-xxl-3">

                    <div class="report-box d-flex align-items-center justify-content-between">
                        <div>
                            <span class="report-name">الحقائب</span>
                            <span class="count">{{ $course ?? null  ?? null  }}</span>
                        </div>
                        <div class="image">

                            <img src="{{ asset('dashboard') }}/assets/images/report3.png">

                        </div>

                    </div>
                </div>


           </div>
{{--
           <div class="row">

            @if( auth()->user()->role_id == 2  )

            @include('projectmanager_followup')

            @elseif ( auth()->user()->role_id == 3  )


            @include('company_followup')

            @elseif ( auth()->user()->role_id == 4  )


            @include('trainer_followup')

            @else

            @include('projectmanager_followup')

            @endif --}}

           </div>
           <div class="analysis">
            <div class="row">
                <div class="col-lg-7">
                    <!-- start supervision -->
                    {{-- <div class="supervision">
                            <h3>الاشراف</h3>
                            <div class="owl-carousel two">

                                <div class="item">
                                    <div class="box d-flex align-items-center justify-content-between" style="--background:#d4f8f7">
                                        <div class="statistics">
                                            <h4>{{ $registerRequest }}</h4>
                                            <span>طلبات التسجيل</span>
                                        </div>
                                        <a class="goTo" href=""><img src="{{ asset('dashboard') }}/assets/images/See more.png" class="img-fluid"></a>
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="box d-flex align-items-center justify-content-between" style="--background:#fbe6e8">
                                        <div class="statistics">
                                            <h4>{{ $manager }}</h4>
                                            <span> مدراء المشاريع</span>
                                        </div>
                                        <a class="goTo" href="{{ route('project_managers.index') }}"><img src="{{ asset('dashboard') }}/assets/images/See more_red.png" class="img-fluid"></a>
                                    </div>
                                </div>

                              </div>
                    </div> --}}
                    <!-- End Supervision -->

                    <!-- start Project follow-up -->
                     {{-- <div class="projects-follow-up">
                        <h3>متابعة المشاريع </h3>

                        <div class="owl-carousel two">
                            <div class="item">
                                <div class="box d-flex align-items-center justify-content-between" style="--background:#d4f8f7">
                                    <div class="statistics">
                                        <h4>{{ $company }}</h4>
                                        <span> الجهات المنفذة </span>
                                    </div>
                                    <a class="goTo" href=""><img src="{{ asset('dashboard') }}/assets/images/See more.png" class="img-fluid"></a>
                                </div>
                            </div>
                            <div class="item">
                                <div class="box d-flex align-items-center justify-content-between" style="--background:#fbe6e8">
                                    <div class="statistics">
                                        <h4>{{ $course }}</h4>
                                        <span>متابعة المشاريع</span>
                                    </div>
                                    <a class="goTo" href=""><img src="{{ asset('dashboard') }}/assets/images/See more_red.png" class="img-fluid"></a>
                                </div>
                            </div>

                          </div>
                    </div> --}}
                    <!-- End Project follow-up -->

                          <!-- start Certifications -->
                          <div class="certifications">
                            <h3>الشهادات</h3>
                            <div class="row">
                                <div class="col-12 col-md-6 mb-2">
                                    <div class="certificates-statistics">
                                        <h4>شهادات الدورات</h4>
                                        <div class="d-flex align-items-center justify-content-between">
                                            <div class="count">
                                                {{ $testimonials ?? null  }}
                                            </div>
                                            <div class="chart"></div>
                                        </div>
                                    </div>
                                </div>
                                {{-- <div class="col-12 col-md-6">
                                    <div class="certificates-statistics">
                                        <h4>شهادات الدورات</h4>
                                        <div class="d-flex align-items-center justify-content-between">
                                            <div class="count">
                                                10
                                            </div>
                                            <div class="chart">
                                                <canvas id="myChart"></canvas>

                                            </div>
                                        </div>
                                    </div>
                                </div> --}}
                            </div>
                          </div>
                        <!-- End Certifications -->

                </div>
                {{-- <div class="col-lg-5 mb-2">
                    <div class="content-box">
                        <div class="general-news border-bottom pb-2">
                            <h3>الاخبار العامة </h3>
                            <div class="survey d-flex align-items-center mb-3">
                                    <img src="{{ asset('dashboard') }}/assets/images/survey.png" class="img-fluid pe-3">

                                <div>
                                    <a href=""><span class="_heading">عرض الاستبيانات</span></a>
                                    <span class="count">لديك {{ $survay }} عرض استبيان</span>
                                </div>
                            </div>
                            <div class="bags d-flex align-items-center mb-3">
                                <img src="{{ asset('dashboard') }}/assets/images/bag.png" class="img-fluid pe-3">

                            <div>
                                <a href=""><span class="_heading"> نموذج طلب حقيبة </span></a>
                                <span class="count">لديك {{ $course }} نموذج طلب حقيبة</span>
                            </div>
                        </div>
                        </div>
                        <div class="payments py-3 border-bottom">
                            <h3>سداد المبالغ والمتابعة</h3>
                            <div class="charts d-flex justify-content-evenly ">
                                @foreach ($payments as $payment)
                                <div class="chart text-center">
                                    <div class="_progress">
                                        <span style="--amount:{{ $payment->price/$total_payment }}%"></span>
                                    </div>
                                    <span>{{ $payment->month }}</span>
                                </div>

                                @endforeach

                            </div>
                        </div>
                        <div class="blogs py-3">
                            <div class="container-fluid">
                                <div class="owl-carousel one">
                                    <div class="item">
                                      <div class="blog">
                                        <div class="image">
                                            <img src="{{ asset('dashboard') }}/assets/images/blog.png">
                                        </div>
                                        <div class="blog-content-details">
                                            <span class="date">Friday, September 10, 2021</span>
                                            <h4 class="blog-header">تجنب الجدولة آخر لحظة</h4>
                                            <p class="content">هناك حقيقة مثبتة منذ زمن طويل وهي أن المحتوى المقروء لصفحة ما سيلهي القارئ عن التركيز على الشكل الخارجي للنص</p>
                                        </div>
                                      </div>
                                    </div>
                                    <div class="item">
                                        <div class="blog">
                                          <div class="image">
                                              <img src="{{ asset('dashboard') }}/assets/images/blog.png">
                                          </div>
                                          <div class="blog-content-details">
                                              <span class="date">Friday, September 10, 2021</span>
                                              <h4 class="blog-header">تجنب الجدولة آخر لحظة</h4>
                                              <p class="content">هناك حقيقة مثبتة منذ زمن طويل وهي أن المحتوى المقروء لصفحة ما سيلهي القارئ عن التركيز على الشكل الخارجي للنص</p>
                                          </div>
                                        </div>
                                      </div>
                                       <div class="item">
                                      <div class="blog">
                                        <div class="image">
                                            <img src="{{ asset('dashboard') }}/assets/images/blog.png">
                                        </div>
                                        <div class="blog-content-details">
                                            <span class="date">Friday, September 10, 2021</span>
                                            <h4 class="blog-header">تجنب الجدولة آخر لحظة</h4>
                                            <p class="content">هناك حقيقة مثبتة منذ زمن طويل وهي أن المحتوى المقروء لصفحة ما سيلهي القارئ عن التركيز على الشكل الخارجي للنص</p>
                                        </div>
                                      </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div> --}}
            </div>
           </div>
        </div>
    </section>

      {{-- @if(  auth()->user()->role_id == 1)

       @include('home_statistics')
      @endif
      @if(auth()->user()->role_id == 4)

      @include('trainer_statistics')
     @endif
      @if(  auth()->user()->role_id == 3)

      @include('company_statistics')
     @endif

     @if(  auth()->user()->role_id == 2)

     @include('projectmanager_statistics')
    @endif
      <hr>
    <br><br>
    @if(auth()->user()->role_id == 2)

     @include('projectmanager_followup')

    @endif

    @if(auth()->user()->role_id == 4)

    @include('trainer_followup')

    @endif

    @if(auth()->user()->role_id == 3)
    @include('company_followup')

    @endif --}}


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
<div class=" _modal trigger close-button"></div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
@endsection


