<!DOCTYPE html>
<html lang="en" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>سجل الآن</title>
    <link rel="stylesheet" href="{{ asset('frontend/css/bootstrap.rtl.min.css')}}">
    <link rel="stylesheet" href="{{ asset('frontend/css/normalize.css')}}">
    <link rel="stylesheet" href="{{ asset('frontend/css/normalize.css')}}">
    <link rel="stylesheet" href="{{ asset('frontend/css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{ asset('frontend/css/mainStyle.css')}}">
</head>

@php

    $cities = App\Models\City::get() ;
    $states = App\Models\State::get() ;
    $country = App\Models\Country::get() ;
    $courses = App\Models\Course::get() ;
    $company = App\Models\User :: where('role_id' , 3 )->get();

@endphp

<body>
    @include('includes.messages')

<div class="login-page signUp-page">

    <div class="form-login">
        <div class="logo">
            <img src="{{ asset('frontend/image/logo/logo.png')}}">
        </div>
        <div class="form">
            <h4> اختيار التسجيل</h4>
            <small>مرحبا بكم معنا في ارام المستقبل</small>
            <div class="type-registration">
                <div class="row">
                    <div class="col-md-4">
                        <div class="type " id ="trainer">
                            <div class="icon-check">
                                <i class="fa fa-check"></i>
                            </div>
                            {{-- <a type="button" class="btn" data-bs-toggle="modal" data-bs-target="#TrainerModal" > --}}
                            <img src="{{ asset('frontend/image/Group%2077464.png')}}">
                            <img src="{{ asset('frontend/image/active1.png')}}" class="active">
                           {{-- </a> --}}
                           <span>
                                سجل كمـــدرب جديد
                           </span>
                            @include('auth.TrainerModel')
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="type " id ="company">
                            <div class="icon-check">
                                <i class="fa fa-check"></i>
                            </div>
                            {{-- <a type="button" class="btn" data-bs-toggle="modal" data-bs-target="#CompanyModal" > --}}
                            <img src="{{ asset('frontend/image/Group%2077523.png')}}">
                            <img src="{{ asset('frontend/image/active2.png')}}" class="active">
                            {{-- </a> --}}
                            <span>
                                سجل كجهــة منفذة
                            </span>
                            @include('auth.CompanyModel')

                        </div>
                    </div>
                      {{-- student --}}
                   <div class="col-md-4">
                      <div class="type " id ="student">
                        <div class="icon-check">
                            <i class="fa fa-check"></i>
                        </div>
                        {{-- <a type="button" class="btn" data-bs-toggle="modal" data-bs-target="#CompanyModal" > --}}
                        <img src="{{ asset('frontend/image/Group%2077523.png')}}">
                        <img src="{{ asset('frontend/image/active2.png')}}" class="active">
                        {{-- </a> --}}
                        <span>
                            سجل كمتدرب
                        </span>
                        @include('auth.StudentModel')
                      </div>
                   </div>
                  {{-- end studente --}}
                </div>

                <div class="btn-registration">
                    <a href="{{ route('login') }}">
                        <button class="prev-step" >رجوع</button>
                    </a>
                    <button   type="button" data-bs-toggle="modal" data-bs-target="#CompanyModal"  class=" reg form-control">
                      سجل الان
                    </button>
                </div>
            </div>

            <div class="create-account">
                <span>هل لديك حساب بالفعل ؟<a href="{{ route('login') }}">تسجيل الدخول</a></span>
            </div>
            <div class="copyRight">
                <small> @جميع الحقوق محفوظة للبرنامج ارام المستقبل</small>
            </div>
        </div>
    </div>
    <div class="image">
        <img src="{{ asset('frontend/image/Repeat%20Grid%201.png') }}">
    </div>
</div>
</div>
<script src="{{ asset('frontend/js/popper.min.js')}}"></script>
<script src="{{ asset('frontend/js/jquery-3.6.1.min.js')}}"></script>
<script src="{{ asset('frontend/js/bootstrap.min.js')}}"></script>
<script src="{{ asset('frontend/js/mainScript.js')}}"></script>
</body>
</html>
