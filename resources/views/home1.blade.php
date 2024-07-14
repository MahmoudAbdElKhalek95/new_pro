
@extends('layouts.mainapp')

@section('content')



      @if(  auth()->user()->role_id == 1   )

       @include('home_statistics')
      @endif
      @if(    auth()->user()->role_id == 4   )

      @include('trainer_statistics')
     @endif
      @if(  auth()->user()->role_id == 3   )

      @include('company_statistics')
     @endif

     @if(  auth()->user()->role_id == 2   )

     @include('projectmanager_statistics')
    @endif
      <hr>
    <br><br>
    @if(auth()->user()->role_id == 2)

     @include('projectmanager_followup')

    @endif
     {{--  pro- manger --}}


    {{--  trainer --}}
    @if(auth()->user()->role_id == 4)

    @include('trainer_followup')

    @endif
{{-- end trainer --}}

 {{--  company --}}
 @if(auth()->user()->role_id == 3 )
 @include('company_followup')

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


