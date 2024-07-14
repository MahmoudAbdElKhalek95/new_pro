

@extends('dashboard.layouts.mainapp')
@section('title' , 'التقارير ')
@section('styles')
<link rel="stylesheet" href="{{ asset('dashboard') }}/assets/css/reports.css">
    <link rel="stylesheet" href="{{ asset('dashboard') }}/assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="{{ asset('dashboard') }}/assets/css/owl.theme.default.min.css">
@endsection
@section('content')

<style>
body {
    font-family: 'Cairo';font-size: 22px;
}
</style>

   <section class="reports">
        <div class="container-fluid">
            <div class="d-md-flex align-items-center justify-content-between mb-4">
                <h3 class=""><img src="{{ asset('dashboard') }}/assets/images/header_icon1.png" class="me-2">التقارير</h3>

            </div>

        </div>
        @if( auth()->user()->role_id == 1)
        <div class="reports-box py-3">

            <div class="container-fluid">
                <div class="reports-name d-flex align-items-center justify-content-between mb-4 ">
                    <h4>تقرير الجهات</h4>
                    <a href="{{ route('companyReport')  }}" >عرض الجميع</a>
                </div>
                <div class="owl-carousel">
                    @foreach ($companies as $company)
                        <div class="item">
                            <div class="report-box">
                                <h4 class="title">{{ $company->name }}</h4>
                                <div class="d-flex align-items-center justify-content-between  mb-4">
                                    <div class="d-flex align-items-center  pe-3">
                                        <img src="{{ asset('dashboard') }}/assets/images/presentation.png" class="pe-2">
                                        <span class="count">{{ $company->trainer_count() }} </span>

                                    </div>
                                    <div class="d-flex align-items-center  pe-3">
                                        <img src="{{ asset('dashboard') }}/assets/images/job.png" class="pe-2">
                                        <span class="count">{{ $company->student_count() }} </span>

                                    </div>
                                </div>
                                <div class="d-flex align-items-center justify-content-between ">
                                    <div class="d-flex align-items-center  pe-3">
                                        <img src="{{ asset('dashboard') }}/assets/images/portfolio.png" class="pe-2">
                                        <span class="count">{{ $company->project_count() }} </span>

                                    </div>
                                    <div class="d-flex align-items-center  pe-3">
                                        <img src="{{ asset('dashboard') }}/assets/images/approach.png" class="pe-2">
                                        <span class="count">{{ $company->course_count() }} </span>

                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach

                </div>
            </div>
        </div>
        @endif
        @if( auth()->user()->role_id == 1 ||  auth()->user()->role_id == 2  )

        <div class="reports-box py-3">

            <div class="container-fluid">
                <div class="reports-name d-flex align-items-center justify-content-between mb-4 ">
                    <h4>تقرير المناطق</h4>
                    <a href="{{ route('cityReport')  }}" >عرض الجميع</a>
                </div>
                <div class="owl-carousel">
                    @foreach ($cities as $city)
                    <div class="item">
                        <div class="report-box">
                            <h4 class="title">{{ $city->name }}</h4>
                            <div class="d-flex align-items-center justify-content-between  mb-4">
                                <div class="d-flex align-items-center  pe-3">
                                    <img src="{{ asset('dashboard') }}/assets/images/presentation.png" class="pe-2">
                                    <span class="count">{{ $city->trainer_count() }} </span>

                                </div>
                                <div class="d-flex align-items-center  pe-3">
                                    <img src="{{ asset('dashboard') }}/assets/images/job.png" class="pe-2">
                                    <span class="count">{{ $city->student_count() }} </span>

                                </div>
                            </div>
                            <div class="d-flex align-items-center justify-content-between ">
                                <div class="d-flex align-items-center  pe-3">
                                    <img src="{{ asset('dashboard') }}/assets/images/portfolio.png" class="pe-2">
                                    <span class="count"> {{ $city->project_count() }} </span>

                                </div>
                                <div class="d-flex align-items-center  pe-3">
                                    <img src="{{ asset('dashboard') }}/assets/images/approach.png" class="pe-2">
                                    <span class="count">{{ $city->course_count() }} </span>

                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
        @endif
        @if( auth()->user()->role_id == 1 ||  auth()->user()->role_id == 2  ||  auth()->user()->role_id == 3 )
        <div class="reports-box py-3">

            <div class="container-fluid">
                <div class="reports-name d-flex align-items-center justify-content-between mb-4 ">
                    <h4>تقرير الحقائب</h4>
                    <a href="{{ route('course_report')  }}" >عرض الجميع</a>
                </div>
                <div class="owl-carousel">
                    @foreach ($courses as $course)
                    <div class="item">
                        <div class="report-box">
                            <h4 class="title">{{ $course->name }}</h4>
                            <div class="d-flex align-items-center justify-content-between  mb-4">
                                <div class="d-flex align-items-center  pe-3">
                                    <img src="{{ asset('dashboard') }}/assets/images/presentation.png" class="pe-2">
                                    <span class="count">{{ $course->trainers()->count() }} </span>

                                </div>
                                <div class="d-flex align-items-center  pe-3">
                                    <img src="{{ asset('dashboard') }}/assets/images/job.png" class="pe-2">
                                    <span class="count">{{ $course->students()->count() }} </span>

                                </div>
                            </div>
                            <div class="d-flex align-items-center justify-content-between ">
                                <div class="d-flex align-items-center  pe-3">
                                    <img src="{{ asset('dashboard') }}/assets/images/portfolio.png" class="pe-2">
                                    <span class="count">{{ $course->course_company()->count() }} </span>

                                </div>
                                <div class="d-flex align-items-center  pe-3">
                                    <img src="{{ asset('dashboard') }}/assets/images/approach.png" class="pe-2">
                                    <span class="count">{{ $course->order_course()->where('status' , 'completed') ->count() }} </span>

                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
        @endif
    </section>

<div class="_modal trigger close-button pagination" data-numberofpages=""></div>

    <script src="{{ asset('dashboard') }}/assets/js/jquery3.2.1.min.js"></script>
    <script src="{{ asset('dashboard') }}/assets/js/owl.carousel.min.js"></script>
    <script src="{{ asset('dashboard') }}/assets/js/reports.js"></script>

@endsection



